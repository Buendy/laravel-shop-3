<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = auth()->user()->carts->where('status', 'Pending');
        $ordersDone = auth()->user()->carts->where('status', 'Done');
        //dd($orders);
        return view('home', compact('orders', 'ordersDone'));
    }
}
