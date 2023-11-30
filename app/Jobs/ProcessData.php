<?php

namespace App\Jobs;

use Illuminate\Bus\Batch;
use App\Services\UserService;
use App\Services\OrderService;
use App\Services\AddressService;
use App\Services\UploadFilesService;
use Illuminate\Bus\Batchable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ProcessData implements ShouldQueue
{
    use Batchable,Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    private UploadFilesService $uploadFilesService;
    private UserService $userService;
    private AddressService $addressService;
    private OrderService $orderService;
    /**
     * Create a new job instance.
     */


     public function __construct($data)
     {
         $this->data   = $data;
         $this->uploadFilesService =  new UploadFilesService;
         $this->userService =  new UserService;
         $this->addressService =  new AddressService;
         $this->orderService =  new OrderService;
     }


    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->data as $detils) {
            $user=$this->userService->processUserData($detils);
            $this->addressService->processAddressData($user,$detils['user']['addresses']);
            $this->orderService->processOrderData($user,$detils['user']['orders']);
           }

    }




}
