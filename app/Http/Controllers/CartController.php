<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CartDetail;
use App\Mail\NewOrder;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade;

class CartController extends Controller
{
    public function update()
    {
        $cart = auth()->user()->cart;
        $cart->status = 'Pending';
        $cart->order_date = Carbon::now();
        $user = auth()->user();

        $cart->save();

        $admins = User::where('admin', true)->get();
        Mail::to($admins)->send(new NewOrder(auth()->user(), $cart));
//        $pdf = Facade::loadView('pdf.invoice', compact('cart','user'));
//        return $pdf->download($cart->order_date . '--invoice.pdf');

        return back()->with('status', 'Tu pedido se ha registrado correctamente');
    }

    public function generatePdf($id)
    {
        $cart = auth()->user()->carts->where('id', $id)->first();
        $user = auth()->user();

        $pdf = Facade::loadView('pdf.invoice', compact('cart','user'));
        return $pdf->download($cart->order_date . '--invoice.pdf');

    }

    public function destroy(Request $request)
    {

        $cart = Cart::find($request->order_id);
        $cartDetails = CartDetail::where('cart_id', $request->order_id);
        $cartDetails->delete();
        $cart->delete();

        return back()->with('status', 'Tu pedido se ha borrado correctamente');
    }
}
