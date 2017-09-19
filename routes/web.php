<?php

/***************************  Website Routes   ****************************/
Route::get('/{locale}', 'HomeController@main')->name('home');
Route::get('/{locale}/menu/{men_id}', 'HomeController@menu')->name('menu');
Route::get('/{locale}/category/{cat_id}', 'HomeController@category')->name('category');
Route::get('/{locale}/subCat/{sub_id}', 'HomeController@subCat')->name('subCat');
Route::get('/{locale}/product/{pro_id}', 'HomeController@product')->name('product');
Route::get('/{locale}/login', 'HomeController@login')->name('login');




$this->post('review', 'HomeController@review')->name('review');

// wishlist routes
Route::get('/{locale}/wishlist', 'HomeController@wishlist')->name('wishlist');
Route::post('/AddWishlist','HomeController@AddWishlist')->name('AddWishlist');
Route::post('/deleteWishlistItem','HomeController@deleteWishlistItem')->name('deleteWishlistItem');

//cart routes
Route::get('/{locale}/cart', 'HomeController@cart')->name('Webcart');
Route::post('/AddCart','HomeController@AddCart')->name('AddCart');
Route::post('/updateCartQty','HomeController@updateCartQty')->name('updateCartQty');
Route::post('/deleteCartItem','HomeController@deleteCartItem')->name('deleteCartItem');
Route::post('/clearCart','HomeController@clearCart')->name('clearCart');
Route::post('/updateCart','HomeController@updateCart')->name('updateCart');




/***************************  Cpanel Routes   ****************************/

// Authentication Routes...
$this->get('admin/login', 'Auth\LoginController@showLoginForm')->name('auth.login');

$this->post('register', 'Auth\RegisterController@register')->name('register');
//$this->post('login', 'Auth\LoginController@login')->name('auth.login');

Route::post('login', function()
{
    $credentials = \Illuminate\Support\Facades\Input::only('email', 'password');
    if ( ! Auth::attempt($credentials))
    {
        return Redirect::back()->withMessage('Invalid credentials');
    }
    if (Auth::user()->admin == 1)
    {
        return Redirect::to('/admin/home');
    }
    return Redirect::to('/en');
});



//$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');


// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    // Brands Routes
    Route::resource('brands', 'Admin\BrandsController');
    Route::post('brands_mass_destroy', ['uses' => 'Admin\BrandsController@massDestroy', 'as' => 'brands.mass_destroy']);

    // menu items
    Route::resource('menus', 'Admin\MenusController');
    Route::post('menus_mass_destroy', ['uses' => 'Admin\MenusController@massDestroy', 'as' => 'menus.mass_destroy']);

    // Categories Routes
    Route::resource('categories', 'Admin\CategoriesController');
    Route::post('categories_mass_destroy', ['uses' => 'Admin\CategoriesController@massDestroy', 'as' => 'categories.mass_destroy']);

    // Sub Categories Routes
    Route::resource('sub_categories', 'Admin\SubCatsController');
    Route::post('sub_categories_mass_destroy', ['uses' => 'Admin\SubCatsController@massDestroy', 'as' => 'sub_categories.mass_destroy']);

    // locations routes
    Route::resource('locations', 'Admin\LocationsController');
    Route::post('locations_mass_destroy', ['uses' => 'Admin\LocationsController@massDestroy', 'as' => 'locations.mass_destroy']);

    // Site users items
    Route::resource('site_users', 'Admin\SiteUsersController');
    Route::post('site_users_mass_destroy', ['uses' => 'Admin\SiteUsersController@massDestroy', 'as' => 'site_users.mass_destroy']);

    // Products Routes
    Route::resource('products', 'Admin\ProductsController');
    Route::post('products_ajax',['uses' => 'Admin\ProductsController@ajax', 'as' => 'products.ajax']);
    Route::post('products_mass_destroy', ['uses' => 'Admin\ProductsController@massDestroy', 'as' => 'products.mass_destroy']);

    // Cart Routes
    Route::resource('cart', 'Admin\CartController');

    // Cart Products Routes
    Route::resource('cart_products', 'Admin\CartProductsController');
});
