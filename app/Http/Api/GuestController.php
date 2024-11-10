<?php

namespace App\Http\Api;

use App\Http\Requests\Guest\StoreRequest;
use App\Http\Requests\Guest\UpdateRequest;
use App\Http\Resources\GuestResource;
use App\Models\Guest;

class GuestController extends BaseController
{
    public function index()
    {
        return GuestResource::collection(Guest::all());
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        return $this->service->store(new Guest($data));
    }

    public function show(Guest $guest)
    {
        return new GuestResource($guest);
    }

    public function update(UpdateRequest $request, Guest $guest)
    {
        $data = $request->validated();

        return $this->service->update($guest,$data);
    }

    public function destroy(Guest $guest)
    {
        $guest->delete();
        return response()->json(null, 204);
    }

}
