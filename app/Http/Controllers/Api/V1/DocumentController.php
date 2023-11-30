<?php

namespace App\Http\Controllers\Api\V1;

use App\Jobs\ProcessData;

use Illuminate\Support\Facades\Bus;
use App\Http\Controllers\Controller;
use App\Services\UploadFilesService;


class DocumentController extends Controller
{

    private UploadFilesService $uploadFilesService;
    public function __construct(UploadFilesService $uploadFilesService)
    {
        $this->uploadFilesService = $uploadFilesService;
    }

    public function __invoke()
    {
     
        $files=$this->uploadFilesService->getFiles();
        foreach ($files as $file) {
            $fileContent=json_decode(file_get_contents($file),true);
            $batch = Bus::batch([])->dispatch();
            foreach (array_chunk($fileContent, 1000) as $data) {
                $batch->add(new ProcessData($data));
            }
            unset($fileContent);
        }
        return response()->json(['msg'=>'uploaded Successfully']);
    }

    // public function batch($id) {
    //     $batchId = $id;
    //     $batch = Bus::findBatch($batchId);
    //     return $batch->progress();
    // }
}
