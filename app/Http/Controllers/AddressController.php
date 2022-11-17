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

    public function store(Request $request)
    {
        return Address::create([
            'street' => $request->street,
            'number' => $request->number,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'user_id' => $request->user_id
        ]);
    }

    public function show(Address $address)
    {
        return $address;
    }

    public function update(Request $request, Address $address)
    {
        $address->update([
            'street' => $request->street,
            'number' => $request->number,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country
        ]);
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
