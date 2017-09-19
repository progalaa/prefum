<?php

namespace App\Http\Controllers;

use App\CartProducts;
use App\Category;
use App\Http\Requests;
use App\Menu;
use App\Review;
use App\Product;
use App\SubCat;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function main($locale){
        App::setLocale($locale);
        $Menu = Menu::all();
        $category = Category::all();
        $subCat = SubCat::all();

        // skin care products
        $products = Product::where('status',1)->inRandomOrder()->get();
        $skinCareItems = Product::where('status',1)->where('menu_item_id',4)->get();
        $latest = Product::where('status',1)->orderBy('created_at', 'desc')->get();
        $latest3 = Product::where('status',1)->where('offer',1)->orderBy('created_at', 'desc')->take(3)->get();
        $ordered = Product::where('status',1)->orderBy('order_count', 'desc')->get();
        $offers = Product::where('status',1)->where('offer',1)->get();
        return view('main')->with(compact('Menu'))->with(compact('category'))->with(compact('subCat'))
            ->with(compact('skinCareItems'))->with(compact('latest'))->with(compact('ordered'))
            ->with(compact('offers'))->with(compact('products'))->with(compact('latest3'));
    }

    public function category($locale ,$cat_id){

        App::setLocale($locale);
        $Menu = Menu::all();
        $category = Category::all();
        $subCat = SubCat::all();
        $cat_name = Category::find($cat_id);
        // skin care products
        $products = Product::where('status',1)->inRandomOrder()->get();
        $skinCareItems = Product::where('status',1)->where('menu_item_id',4)->get();
        $latest = Product::where('status',1)->orderBy('created_at', 'desc')->get();
        $latest3 = Product::where('status',1)->where('offer',1)->orderBy('created_at', 'desc')->take(3)->get();
        $ordered = Product::where('status',1)->orderBy('order_count', 'desc')->get();
        $offers = Product::where('status',1)->where('offer',1)->get();
        $cats = Product::where('status',1)->where('category_id',$cat_id)->get();
        return view('Category')->with(compact('Menu'))->with(compact('category'))->with(compact('subCat'))
            ->with(compact('skinCareItems'))->with(compact('latest'))->with(compact('ordered'))
            ->with(compact('offers'))->with(compact('products'))->with(compact('latest3'))->with(compact('cats'))->with(compact('cat_name'));
    }

    public function subCat($locale ,$sub_id){

        App::setLocale($locale);
        $Menu = Menu::all();
        $category = Category::all();
        $subCat = SubCat::all();
        $subCat_name = SubCat::find($sub_id);
        // skin care products
        $products = Product::where('status',1)->inRandomOrder()->get();
        $skinCareItems = Product::where('status',1)->where('menu_item_id',4)->get();
        $latest = Product::where('status',1)->orderBy('created_at', 'desc')->get();
        $latest3 = Product::where('status',1)->where('offer',1)->orderBy('created_at', 'desc')->take(3)->get();
        $ordered = Product::where('status',1)->orderBy('order_count', 'desc')->get();
        $offers = Product::where('status',1)->where('offer',1)->get();
        $subCats = Product::where('status',1)->where('sub_category_id',$sub_id)->get();
        return view('SubCat')->with(compact('Menu'))->with(compact('category'))->with(compact('subCat'))
            ->with(compact('skinCareItems'))->with(compact('latest'))->with(compact('ordered'))
            ->with(compact('offers'))->with(compact('products'))->with(compact('latest3'))->with(compact('subCats'))->with(compact('subCat_name'));
    }

    public function product($locale,$pro_id){
        App::setLocale($locale);
        $Menu = Menu::all();
        $category = Category::all();
        $subCat = SubCat::all();

        // skin care products
        $products = Product::where('status',1)->inRandomOrder()->get();
        $skinCareItems = Product::where('status',1)->where('menu_item_id',4)->get();
        $latest = Product::where('status',1)->orderBy('created_at', 'desc')->get();
        $latest3 = Product::where('status',1)->where('offer',1)->orderBy('created_at', 'desc')->take(3)->get();
        $ordered = Product::where('status',1)->orderBy('order_count', 'desc')->get();
        $offers = Product::where('status',1)->where('offer',1)->get();
        $product = Product::find($pro_id);
        $reviews = Review::where('product_id',$pro_id)->get();
        // product review calc
        $rateCount = Review::where('product_id',$pro_id)->count();
        $ratesum = Review::where('product_id',$pro_id)->sum('value');
        if($rateCount > 0){
            $rateVal = floor($ratesum / $rateCount);
        }else{
            $rateVal = floor($ratesum / 1);
        }

        return view('Product')->with(compact('Menu'))->with(compact('category'))->with(compact('subCat'))
            ->with(compact('skinCareItems'))->with(compact('latest'))->with(compact('ordered'))
            ->with(compact('offers'))->with(compact('products'))->with(compact('latest3'))->with(compact('product'))
            ->with(compact('reviews'))->with(compact('rateVal'));
    }

    public function menu($locale,$men_id){
        App::setLocale($locale);
        $Menu = Menu::all();
        $category = Category::all();
        $subCat = SubCat::all();

        // skin care products
        $products = Product::where('status',1)->inRandomOrder()->get();
        $skinCareItems = Product::where('status',1)->where('menu_item_id',4)->get();
        $latest = Product::where('status',1)->orderBy('created_at', 'desc')->get();
        $ordered = Product::where('status',1)->orderBy('order_count', 'desc')->get();
        $latest3 = Product::where('status',1)->where('offer',1)->orderBy('created_at', 'desc')->take(3)->get();
        $offers = Product::where('status',1)->where('offer',1)->get();
        $Menus = Product::where('status',1)->where('menu_item_id',$men_id)->get();
        return view('Menu')->with(compact('Menu'))->with(compact('category'))->with(compact('subCat'))
            ->with(compact('skinCareItems'))->with(compact('latest'))->with(compact('ordered'))
            ->with(compact('offers'))->with(compact('products'))->with(compact('latest3'))->with(compact('Menus'))->with(compact('cat_name'));
    }

    public function login($locale){
        App::setLocale($locale);
        $Menu = Menu::all();
        $category = Category::all();
        $subCat = SubCat::all();

        // skin care products
        $products = Product::where('status',1)->inRandomOrder()->get();
        $skinCareItems = Product::where('status',1)->where('menu_item_id',4)->get();
        $latest = Product::where('status',1)->orderBy('created_at', 'desc')->get();
        $latest3 = Product::where('status',1)->where('offer',1)->orderBy('created_at', 'desc')->take(3)->get();
        $ordered = Product::where('status',1)->orderBy('order_count', 'desc')->get();
        $offers = Product::where('status',1)->where('offer',1)->get();
        return view('Login')->with(compact('Menu'))->with(compact('category'))->with(compact('subCat'))
            ->with(compact('skinCareItems'))->with(compact('latest'))->with(compact('ordered'))
            ->with(compact('offers'))->with(compact('products'))->with(compact('latest3'));
    }

    public static function getproductCount($catID){
        $offers = Product::where('category_id',$catID)->count();
        return $offers;
    }

    public static function getsubproductCount($catID){
        $offers = Product::where('sub_category_id',$catID)->count();
        return $offers;
    }

    public function maintainance()
    {
        return view('maintainance');
    }

    // create reviews for every product throught a form
    public function review(Request $data){
        Review::create($data->all());
        return redirect()->back();
    }

    public function wishlist($locale){
        App::setLocale($locale);
        $Menu = Menu::all();
        $category = Category::all();
        $subCat = SubCat::all();

        // skin care products
        $products = Product::where('status',1)->inRandomOrder()->get();
        $skinCareItems = Product::where('status',1)->where('menu_item_id',4)->get();
        $latest = Product::where('status',1)->orderBy('created_at', 'desc')->get();
        $latest3 = Product::where('status',1)->where('offer',1)->orderBy('created_at', 'desc')->take(3)->get();
        $ordered = Product::where('status',1)->orderBy('order_count', 'desc')->get();
        $offers = Product::where('status',1)->where('offer',1)->get();

        $user_id = Auth::user()->id;
        $wishlist = Wishlist::where('user_id',$user_id)->get();
        //$ratesum = Wishlist::where('user_id',$user_id)->sum('value');
        return view('Wishlist')->with(compact('Menu'))->with(compact('category'))->with(compact('subCat'))
            ->with(compact('skinCareItems'))->with(compact('latest'))->with(compact('ordered'))
            ->with(compact('offers'))->with(compact('products'))->with(compact('latest3'))->with(compact('wishlist'));
    }


    public function AddWishlist(Request $request){
        Wishlist::create($request->all());
        return redirect()->back();
    }
    
    public function deleteWishlistItem(Request $request){
        $wish = Wishlist::find($request->id);
        $wish->delete();
        return 1;
    }


    public function cart($locale){
        App::setLocale($locale);
        $Menu = Menu::all();
        $category = Category::all();
        $subCat = SubCat::all();

        // skin care products
        $products = Product::where('status',1)->inRandomOrder()->get();
        $skinCareItems = Product::where('status',1)->where('menu_item_id',4)->get();
        $latest = Product::where('status',1)->orderBy('created_at', 'desc')->get();
        $latest3 = Product::where('status',1)->where('offer',1)->orderBy('created_at', 'desc')->take(3)->get();
        $ordered = Product::where('status',1)->orderBy('order_count', 'desc')->get();
        $offers = Product::where('status',1)->where('offer',1)->get();

        $user_id = Auth::user()->id;
        $carts= CartProducts::where('user_id',$user_id)->get();
        //$ratesum = Wishlist::where('user_id',$user_id)->sum('value');
        return view('Cart')->with(compact('Menu'))->with(compact('category'))->with(compact('subCat'))
            ->with(compact('skinCareItems'))->with(compact('latest'))->with(compact('ordered'))
            ->with(compact('offers'))->with(compact('products'))->with(compact('latest3'))->with(compact('carts'));
    }


    public function AddCart(Request $request){
        CartProducts::create($request->all());
        return 1;
    }

    public function deleteCartItem(Request $request){
        $cart = CartProducts::find($request->id);
        $cart->delete();
        return 1;
    }
    
    public function clearCart(Request $request){
        $clearCart =CartProducts::where('user_id', $request->user_id)->delete();
        return 1;
    }
    
    public function updateCartQty(Request $request){
        $cart =CartProducts::find($request->id);
        $cart->qty = $request->new_qty;
        $cart->save();
        return 1;
    }
    
    public function updateCart(Request $request){
        $total = $request->total;
        $user_id = $request->user_id;
        $request->session()->put('cart_total', $total);
        //Session::set('cart_total', $total);
        return 1;
    }
}
