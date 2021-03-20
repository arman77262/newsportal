<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\SubDistrictController;
use App\Http\Controllers\Backend\WebsiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin/index');
})->name('dashboard');

//Admin Logout route
Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

//Admin All Category route
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/add/category', [CategoryController::class, 'create'])->name('add.category');
Route::post('/store/category', [CategoryController::class, 'StoreCategory'])->name('store.category');
Route::get('/edit/category/{id}', [CategoryController::class, 'EditCategory'])->name('edit.category');
Route::post('/update/category/{id}', [CategoryController::class, 'UpdateCategory'])->name('update.category');
Route::get('/delete/category/{id}', [CategoryController::class, 'DeleteCategory'])->name('delete.category');

//Admin ALl subcategory route
Route::get('/subcategory', [SubCategoryController::class, 'index'])->name('subcategory');
Route::get('/add/subcategory', [SubCategoryController::class, 'create'])->name('add.subcategory');
Route::post('/store/subcategory', [SubCategoryController::class, 'StoreSubcat'])->name('store.subcategory');
Route::get('/edit/subcategory/{id}', [SubCategoryController::class, 'EditSubcat'])->name('edit.subcategory');
Route::post('/update/subcategory/{id}', [SubCategoryController::class, 'UpdateSubcat'])->name('update.subcategory');
Route::get('/delete/subcategory/{id}', [SubCategoryController::class, 'DeleteSubcat'])->name('delete.subcategory');


//district All route
Route::get('/district', [DistrictController::class, 'index'])->name('district');
Route::get('/add/district', [DistrictController::class, 'create'])->name('add.district');
Route::post('/store/district', [DistrictController::class, 'StoreDistrict'])->name('store.district');
Route::get('/edit/district/{id}', [DistrictController::class, 'EditDistrict'])->name('edit.district');
Route::post('/update/district/{id}', [DistrictController::class, 'UpdateDistrict'])->name('update.district');
Route::get('/delete/district/{id}', [DistrictController::class, 'DeleteDistrict'])->name('delete.district');


//Subdistrict route all heare
Route::get('/subdistrict', [SubDistrictController::class, 'index'])->name('subdistrict');
Route::get('/add/subdistrict', [SubDistrictController::class, 'create'])->name('add.subdistrict');
Route::post('/store/subdistrict', [SubDistrictController::class, 'StoreSubDistrict'])->name('store.subdistrict');
Route::get('/edit/subdistrict/{id}', [SubDistrictController::class, 'EditSubDistrict'])->name('edit.subdistrict');
Route::post('/update/subdistrict/{id}', [SubDistrictController::class, 'UpdateSubDistrict'])->name('update.subdistrict');
Route::get('/delete/subdistrict/{id}', [SubDistrictController::class, 'DeleteSubDistrict'])->name('delete.subdistrict');


//All subCategory and subdistrict realatied route will go here
Route::get('/get/subcategory/{category_id}', [PostController::class, 'getSubcategory']);
Route::get('/get/subdistrict/{district_id}', [PostController::class, 'getSubdsitrict']);

//Admin All Post Route
Route::get('/all/post', [PostController::class, 'index'])->name('allpost');
Route::get('/add/post', [PostController::class, 'AddPost'])->name('addpost');
Route::post('/store/post', [PostController::class, 'StorePost'])->name('store.post');
Route::get('/edit/post/{id}', [PostController::class, 'EditPost'])->name('edit.post');
Route::post('/update/post/{id}', [PostController::class, 'UpdatePost'])->name('update.post');
Route::get('/delete/post/{id}', [PostController::class, 'DeletePost'])->name('delete.post');

//social setting route
Route::get('/social/setting', [SettingController::class, 'SocialSetting'])->name('social.setting');
Route::post('/social/update/{id}', [SettingController::class, 'Socialupdate'])->name('update.social');

//seo setting route will go here
Route::get('/seo/setting', [SettingController::class, 'SeoSetting'])->name('seo.setting');
Route::post('/seo/update/{id}', [SettingController::class, 'Seoupdate'])->name('update.seo');

//prayer setting route
Route::get('/paryer/setting', [SettingController::class, 'PrayerSetting'])->name('prayer.setting');
Route::post('/paryer/update/{id}', [SettingController::class, 'Prayerupdate'])->name('update.prayer');

//Live setting route
Route::get('/livetv/setting', [SettingController::class, 'LiveTvSetting'])->name('livetv.setting');
Route::post('/livetv/update/{id}', [SettingController::class, 'LiveTvUpdate'])->name('update.livetv');
Route::get('/livetv/deactive/{id}', [SettingController::class, 'LiveTvDeactive'])->name('deactive.livetv');
Route::get('/livetv/active/{id}', [SettingController::class, 'LiveTvActive'])->name('active.livetv');


//Notice setting
Route::get('/notice/setting', [SettingController::class, 'NoticeSetting'])->name('notice.setting');
Route::post('/notice/update/{id}', [SettingController::class, 'NoticeUpdate'])->name('update.notice');
Route::get('/notice/deactive/{id}', [SettingController::class, 'NoticeDeactive'])->name('deactive.notice');
Route::get('/notice/active/{id}', [SettingController::class, 'NoticeActive'])->name('active.notice');

//Website All Route
Route::get('/website/links', [WebsiteController::class, 'index'])->name('website.link');
Route::get('/website/add', [WebsiteController::class, 'AddLink'])->name('add.website');
Route::post('/website/store', [WebsiteController::class, 'StoreLink'])->name('store.website');
Route::get('/website/edit/{id}', [WebsiteController::class, 'EditLink'])->name('edit.link');
Route::post('/website/update/{id}', [WebsiteController::class, 'UpdateLink'])->name('update.website');
Route::get('/website/delete/{id}', [WebsiteController::class, 'DeleteLink'])->name('delete.link');

