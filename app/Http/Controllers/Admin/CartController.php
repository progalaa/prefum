<?php

namespace App\Http\Controllers\Admin;

use App\Cart;
use App\CartProducts;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $state = array(
            '1'=>'معلق',
            '2'=>'جاري التجهيز',
            '3'=>'تم الشحن',
            '4'=>'مكتمل',
            '5'=>'ملغي',
        );
        if (! Gate::allows('crud')) {
            return abort(401);
        }
        $carts = Cart::all();
        return view('admin.cart.index')->with(compact('carts'))->with(compact('state'))->with(['controller'=>'CartController']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $state = array(
            '1'=>'معلق',
            '2'=>'جاري التجهيز',
            '3'=>'تم الشحن',
            '4'=>'مكتمل',
            '5'=>'ملغي',
        );
        if (! Gate::allows('crud')) {
            return abort(401);
        }
        $carts = Cart::find($id);
        return view('admin.cart.show')->with(compact('carts'))->with(compact('state'))->with(['controller'=>'CartController']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$request->state;
        if (! Gate::allows('crud')) {
            return abort(401);
        }
        $data = array(
            'state'=>$request->state,
        );
        $cart= Cart::findOrFail($id);
        $cart->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('crud')) {
            return abort(401);
        }
        $products = Cart::findOrFail($id);
        $products->delete();

        return redirect()->route('admin.cart_products.index');
    }
}
