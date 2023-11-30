<?php

namespace App\Console\Commands;

use App\Jobs\ProcessData;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Bus;
use App\Services\UploadFilesService;

class UploadDocumentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

     protected UploadFilesService $uploadFilesService;

    protected $signature = 'import:json';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to upload data from files';

    /**
     * Execute the console command.
     */
    public function __construct(UploadFilesService $uploadFilesService)
    {
        parent::__construct();
        $this->uploadFilesService = $uploadFilesService;

    }


    public function handle()
    {

            ini_set('memory_limit', '1024M');
            ini_set('max_execution_time', 120 );
            $files=$this->uploadFilesService->getFiles();
            foreach ($files as $file) {
                $fileContent=json_decode(file_get_contents($file),true);
                $batch = Bus::batch([])->dispatch();
                foreach (array_chunk($fileContent, 1000) as $data) {
                    $batch->add(new ProcessData($data));
                }
                unset($fileContent);
            }
            $this->info('Data Uploaded successfully!');
        //
    }
}
