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
        return view('client.order.index', compact('orders'));
    }

    public function create()
    {
        return view('client.order.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $order = ListOrder::where('id', $id)->first();
        return view('client.order.read', compact('order'));
    }
}
