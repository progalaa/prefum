<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\Menu;
use App\Product;
use App\SubCat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ProductsController extends Controller
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

        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }


    public function ajax(Request $request){
        $product = Product::findOrFail($request->product_id);
        $status = $request->status;
        //dd($request->product_id);
        if($status == 1)
        {
           $product->status = 0;
        }
        elseif($status == 0)
        {
            $product->status = 1;
        }
        return response()->json([
          'data' =>[
              'success'=> $product->save(),
          ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('crud')) {
            return abort(401);
        }
        $products = Product::all();
        $menus = Menu::all();
        $categories = Category::all();
        $sub_categories = SubCat::all();
        $brands = Brand::all();
        return view('admin.products.create')->with(compact('products'))->with(compact('menus'))->with(compact('categories'))->with(compact('sub_categories'))->with(compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('crud')) {
            return abort(401);
        }
        else{
            if (Input::hasFile('image'))
            {
                $name = time().'.'.$request->image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                Input::file('image')->move($destinationPath,$name);
                $data = array(
                    'name_ar'=>$request->get('name_ar'),
                    'name_en'=>$request->get('name_en'),
                    'image'=>$name,
                    'title_ar'=>$request->get('title_ar'),
                    'title_en'=>$request->get('title_en'),
                    'description_ar'=>$request->get('description_ar'),
                    'description_en'=>$request->get('description_en'),
                    'price'=>$request->get('price'),
                    'execlusive'=>$request->get('execlusive'),
                    'offer'=>$request->get('offer'),
                    'status'=>$request->get('status'),
                    'menu_item_id'=>$request->get('menu_item_id'),
                    'category_id'=>$request->get('category_id'),
                    'sub_category_id'=>$request->get('sub_category_id'),
                    'brand_id'=>$request->get('brand_id')
                );
                Product::create($data);
                return redirect()->route('admin.products.index');
            }
            else{
                Product::create($request->all());
                return redirect()->route('admin.products.index');
            }

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('crud')) {
            return abort(401);
        }
        $product = Product::findOrFail($id);
        $menus = Menu::all();
        $sub_categories = SubCat::all();
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.products.edit')->with(compact('product'))->with(compact('menus'))->with(compact('categories'))->with(compact('sub_categories'))->with(compact('brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Gate::allows('crud')) {
            return abort(401);
        } else
        {
            if (Input::hasFile('image')){
                $products = Product::findOrFail($id);
                if (Input::hasFile('image') == null){
                    $request->image = $products->image;
                }
                $name = time().'.'.$request->image->getClientOriginalExtension();
                $destinationPath = public_path('/images');
                Input::file('image')->move($destinationPath,$name);

                $data = array(
                    'name_ar'=>$request->get('name_ar'),
                    'name_en'=>$request->get('name_en'),
                    'image'=>$name,
                    'title_ar'=>$request->get('title_ar'),
                    'title_en'=>$request->get('title_en'),
                    'description_ar'=>$request->get('description_ar'),
                    'description_en'=>$request->get('description_en'),
                    'price'=>$request->get('price'),
                    'execlusive'=>$request->get('execlusive'),
                    'offer'=>$request->get('offer'),
                    'status'=>$request->get('status'),
                    'menu_item_id'=>$request->get('menu_item_id'),
                    'category_id'=>$request->get('category_id'),
                    'sub_category_id'=>$request->get('sub_category_id'),
                    'brand_id'=>$request->get('brand_id')
                );

                $products->update($data);

                return redirect()->route('admin.products.index');
            }else{
                $products = Product::findOrFail($id);
                $products->update($request->all());

                return redirect()->route('admin.products.index');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('crud')) {
            return abort(401);
        }
        $products = Product::findOrFail($id);
        $products->delete();

        return redirect()->route('admin.products.index');
    }

    public function massDestroy(Request $request)
    {
        if (! Gate::allows('crud')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Product::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
