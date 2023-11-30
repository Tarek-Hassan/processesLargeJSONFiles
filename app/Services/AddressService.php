<?php

namespace App\Services;

use App\Models\User;
use App\Models\Address;

class AddressService
{

    public function processAddressData(User $user, $addresses)
    {
        $insertedAddresses=[];
        $user_id=$user->id;
        // foreach (array_chunk($addresses, 100) as $address) {
        foreach ($addresses as $address) {
                if (array_key_exists('id',$address)) {unset($address['id']);}
                if(!$user->addresses()->where($address)->first()){
                    $address['user_id'] = $user_id;
                    $insertedAddresses[]= $address;
                }
            }
        Address::insert($insertedAddresses);
    }

}
