<?php

use App\Models\Client;

if(!function_exists('getClientIdForForm')) {
    function getClientIdForForm()
    {
        $client = Client::latest()->first();

        if($client) {
            return $client->id + 1;
        }

        return 1;
    }
}
