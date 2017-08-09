<?php

namespace App\Http\Controllers\Admin;

use App\CartProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Product;

class CartProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('crud')) {
            return abort(401);
        }
        $products = CartProducts::all();
        return view('admin.cart_products.index')->with(compact('products'))->with(['controller'=>'CartController']);
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
     * @param  \App\CartProducts  $cartProducts
     * @return \Illuminate\Http\Response
     */
    public function show(CartProducts $cartProducts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CartProducts  $cartProducts
     * @return \Illuminate\Http\Response
     */
    public function edit(CartProducts $cartProducts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CartProducts  $cartProducts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartProducts $cartProducts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CartProducts  $cartProducts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('crud')) {
            return abort(401);
        }
        $products = CartProducts::findOrFail($id);
        $products->delete();

        return redirect()->route('admin.cart_products.index');
    }
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('crud')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = CartProducts::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
