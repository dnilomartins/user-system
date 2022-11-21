<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;

class AddressController extends Controller
{
    public function index()
    {
        return Address::all();
    }

    public function store(StoreAddressRequest $request)
    {
        $address = $request->validated();

        return Address::create($address);
    }

    public function show(Address $address)
    {
        return $address;
    }

    public function update(UpdateAddressRequest $request, Address $address)
    {
        $address = $request->validated();

        return $address;
    }

    public function destroy(Address $address)
    {
        $response = $address->delete();
    
        return response()->json([
            'content' => '',
            'response' => $response,
        ], $response ? 204 : 500);
    }
}
