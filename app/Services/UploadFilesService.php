<?php

namespace App\Services;


use App\Models\User;

use App\Models\Provider;

use App\Classes\Enums\ProviderTypes;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use App\Classes\ProviderStrategy\ProviderContext;
use App\Models\Address;

class UploadFilesService
{

    public function getFiles(){
        $path=env('FILESPath')??'FILES';
        $jsonFiles=File::files(public_path($path));
        $jsonFiles = array_filter($jsonFiles, function ($file) {
            return in_array(basename($file),['6.json'])
                    &&!empty(file_get_contents($file));
        });

        return  $jsonFiles;
    }





}
