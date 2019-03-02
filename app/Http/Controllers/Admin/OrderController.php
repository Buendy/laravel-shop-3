<?php

namespace App\Http\Controllers\Admin;
use App\Cart;
use App\CartDetail;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $carts = Cart::where('status','Pending')->get();



        return view('admin.orders.index', compact('carts'));
    }

    public function show($id)
    {
        $cartDetails = CartDetail::where('cart_id', $id)->get();
        return view('admin.orders.show', compact('cartDetails'));

    }

    public function accept($id)
    {
        $cart = Cart::find($id);
        $cart->status = 'Done';
        $cart->save();
        return back()->with('status', 'El pedido se ha aceptado');

    }
}
