<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::where('id_user', Auth::user()->id)->get();
        return view('landing.cart', ['carts' => $carts]);
    }

    public function addToCart(string $id)
    {
        $userId = Auth::user()->id;

        if ($userId == null) {
            return response()->json(['message' => 'Silahkan login dulu']);
        }

        $findCart = Cart::where('id_user', $userId)->where('id_travel', $id)->first();

        $totalCart = Cart::where('id_user', $userId)->where('id_travel', $id)->count();

        if (!$findCart) {
            Cart::create([
                'id_user' => $userId,
                'id_travel' => $id,
                'quantity' => 1,
            ]);

            return response()->json(['message' => 'Item added to cart successfully']);
        } else {
            $findCart->update([
                'quantity' => $findCart->quantity + 1,
            ]);

            return response()->json(['message' => 'Item quantity updated successfully']);
        }
    }

    public function checkOutAll()
    {
        $userId = Auth::user()->id;

        $carts = Cart::where('id_user', $userId)->get();

        if ($carts->isEmpty()) {
            return response()->json(['message' => 'Cart is empty'], 400);
        }

        DB::beginTransaction();

        try {
            foreach ($carts as $cart) {
                Order::create([
                    'id_user' => $cart->id_user,
                    'id_travel' => $cart->id_travel,
                    'quantity' => $cart->quantity,
                    'status' => 'paid',
                ]);
            }

            Cart::where('id_user', $userId)->delete();

            DB::commit();

            return response()->json(['message' => 'Purchased successfully']);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json(['message' => 'Checkout failed', 'error' => $e->getMessage()], 500);
        }
    }
}
