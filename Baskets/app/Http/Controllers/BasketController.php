<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function index()
    {
        $baskets = response()->json(Basket::all());
        return $baskets;
    }

    public function show($user_id, $item_id)
    {
        $basket = Basket::where('user_id', $user_id)
            ->where('item_id', $item_id)
            ->first();
        // ->get();
        // return $basket[0];
        return $basket;
    }

    public function store(Request $request)
    {
        $basket = new Basket();
        $basket->user_id = $request->user_id;
        $basket->item_id = $request->item_id;
        $basket->save();
    }

    // request - query
    // $user_id, $item_id --> paraméter
    public function update(Request $request, $user_id, $item_id)
    {
        // összetett kulcsnál a find helyett a show-t használjuk
        // $basket = Basket::find($id);
        $basket = $this->show($user_id, $item_id);
        $basket->user_id = $request->user_id;
        $basket->item_id = $request->item_id;
        $basket->save();
    }


    public function destroy($user_id, $item_id)
    {
        $this->show($user_id, $item_id)->delete();
        // basket::find($id)->delete();
    }
}
