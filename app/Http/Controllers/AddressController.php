<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
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
            'message' => $response ? 'Endereço deletado com sucesso!' : 'Erro ao deletar endereço!',
        ], $response ? 204 : 500);
    }
}
