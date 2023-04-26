<?php

namespace App\Http\Controllers\Client;

use App\Models\SubLayanan;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ClientSubLayananController extends Controller
{
    public function show(string $id)
    {
        $sublayanans = SubLayanan::all();
        return view('client.sublayanan.index', compact('sublayanans'));
    }
}
