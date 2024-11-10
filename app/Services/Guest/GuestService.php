<?php

namespace App\Services\Guest;

use App\Http\Resources\GuestResource;
use App\Models\Guest;

class GuestService
{
    public function store($guest){

        $guest->save();

        return response()->json(new GuestResource($guest), 201);

    }
    public function update($guest,$data){

        $guest->update($data);

        return response()->json(new GuestResource($guest), 201);

    }
}