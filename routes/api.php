<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\VisitorController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\SiteInfoController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductListController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductDetailsController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\ProductCartController;
use App\Http\Controllers\Admin\FavouriteController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\ForgetController;
use App\Http\Controllers\User\ResetController;
use App\Http\Controllers\User\UserController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::get('/getvisitor', [VisitorController::class, 'GetVisitorDetails']);
Route::post('/postcontact', [ContactController::class, 'PostContactDetails']);
Route::get('/allsiteinfo', [SiteInfoController::class, 'AllSiteinfo']);

// All Category Route
Route::get('/allcategory', [CategoryController::class, 'AllCategory']);


// Product List Routes

Route::get('/productlistbyremark/{remark}',[ProductListController::class, 'ProductListByRemark']);
Route::get('/productlistbycategory/{category}', [ProductListController::class, 'ProductListByCategory']);
Route::get('/productlistbysubcategory/{category}/{subcategory}', [ProductListController::class, 'ProductListBySubCategory']);

// Slider Route
Route::get('/allslider', [SliderController::class, 'AllSlider']);

// Product Details Route
Route::get('/productdetails/{id}', [ProductDetailsController::class, 'ProductDetails']);

// NotificaitonHistory Route
Route::get('/notification', [NotificationController::class, 'NotificaitonHistory']);

// Productbysearch Route
Route::get('/search/{key}', [ProductListController::class, 'ProductBySearch']);

// Similar Product Route
Route::get('/similar/{subcategory}',[ProductListController::class, 'SimilarProduct']);

// Review Product List
Route::get('/reviewlist/{product_code}',[ReviewController::class, 'ReviewList']);


//Login Route
Route::post('/login', [AuthController::class,'Login']);


//Register Route
Route::post('/register', [AuthController::class, 'Register']);

//Forget Password Route
Route::post('/forgetpassword', [ForgetController::class, 'Forget']);

//Reset Password Route
Route::post('/resetpassword', [ResetController::class, 'ResetPassword']);

// Current User Route
Route::get('/user',[UserController::class, 'User'])->middleware('auth:api');


// Product Cart Route
Route::post('/addtocart',[ProductCartController::class, 'addToCart']);

// Cart Count Route
Route::get('/cartcount/{email}',[ProductCartController::class, 'CartCount']);


// Favourite Route
Route::get('/favourite/{product_code}/{email}',[FavouriteController::class, 'AddFavourite']);
// Favourite List
Route::get('/favouritelist/{email}',[FavouriteController::class, 'FavouriteList']);
// Remove Favourite List
Route::get('/favouriteremove/{product_code}/{email}',[FavouriteController::class, 'FavouriteRemove']);

// Product Cart

Route::get('/cartlist/{email}', [ProductCartController::class, 'CartList']);
Route::get('/removecartlist/{id}',[ProductCartController::class, 'RemoveCartList']);

Route::get('/cartitemplus/{id}/{quantity}/{price}',[ProductCartController::class, 'CartItemPlus']);
Route::get('/cartitemminus/{id}/{quantity}/{price}',[ProductCartController::class, 'CartItemMinus']);

// Cart Order Route
Route::post('/cartorder',[ProductCartController::class, 'CartOrder']);

//get order list by user
Route::get('/orderlistbyuser/{email}',[ProductCartController::class, 'OrderListByUser']);


// Post Product Review Route
Route::post('/postreview',[ReviewController::class, 'PostReview']);