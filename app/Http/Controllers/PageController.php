<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Departures;
use App\Models\Order;
use App\Models\Origins;
use App\Models\Travel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function destinationIndex(Request $request)
    {
        $travels = Travel::when($request->origin, function ($query, $origin) {
            return $query->where('id_origin', $origin);
        })
            ->when($request->destination, function ($query, $destination) {
                return $query->where('id_destination', $destination);
            })
            ->when($request->departure, function ($query, $departure) {
                return $query->where('id_departure', $departure);
            })
            ->when($request->price, function ($query, $price) {
                return $query->where('travel_price', 'like', '%' . $price . '%');
            })
            ->get();
        $origins = Origins::all();
        $departures = Departures::all();

        return view('landing.destination', ['travels' => $travels, 'departures' => $departures, 'origins' => $origins]);
    }

    public function checkoutIndex()
    {
        $userId = Auth::user()->id ?? null;

        if (is_null($userId)) {
            return redirect()->route('login')->with('error', 'You need to be logged in to proceed to checkout.');
        }

        $carts = Cart::where('id_user', $userId)->get();

        $totalCost = 0;
        foreach ($carts as $cart) {
            $itemCost = $cart->quantity * $cart->travel->travel_price;
            $totalCost += $itemCost;
        }

        return view('landing.checkout', ['carts' => $carts, 'totalCost' => $totalCost]);
    }

    public function orderIndex()
    {
        $userId = Auth::user()->id ?? null;

        if (is_null($userId)) {
            return redirect()->route('login')->with('error', 'You need to be logged in to proceed to checkout.');
        }

        $orders = Order::where('id_user', $userId)->get();

        return view('landing.order', ['orders' => $orders]);
    }
}
