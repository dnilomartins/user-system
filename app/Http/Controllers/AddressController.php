<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;

class AddressController extends Controller
{
    public function index(Request $request)
    {
        return Address::when($request->street, function($query) use($request){
            $query->where('street', 'ILIKE', '%'. $request->street .'%');
        })
        ->when(isset($request->number), function($query) use($request){
            $query->where('number', 'ILIKE', '%'. $request->number .'%');
        })
        ->when($request->order_by_created_at, function($query) use($request){
            $query->orderBy('created_at', $request->order_by_created_at);
        })
        ->get();
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
