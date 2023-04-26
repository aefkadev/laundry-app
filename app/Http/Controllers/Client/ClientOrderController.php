<?php

namespace App\Http\Controllers\Client;

use App\Models\ListOrder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientOrderController extends Controller
{
    public function index()
    {
        $orders = ListOrder::all();
        return view('client.listorder.index', compact('orders'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }
}
