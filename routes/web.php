<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\HomeUser;
use App\Http\Livewire\Auth\RegisterUser;
use App\Http\Livewire\Auth\RegisterSalon;


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

Route::get('/', HomeUser::class)->name('user.home');
Route::get('/register', RegisterUser::class)->name('register');
Route::get('/register-salon', RegisterSalon::class)->name('register.salon');
Route::get('/salon-list/{search}',\App\Http\Livewire\ListSalonHome::class)->name('list.salon.home');
Route::get('/salon/{salonName}/{id}', \App\Http\Livewire\DetailSalon::class)->name('detail.salon');
Route::get('/about-us', \App\Http\Livewire\AboutUs::class)->name('aboutus');
Route::get('/cara-pemesanan', \App\Http\Livewire\HowToBuy::class)->name('howto');
Route::get('/join-us', \App\Http\Livewire\JoinUs::class)->name('joinus');

Route::group(['middleware' => ['auth:sanctum', config('jetstream.auth_session'),'verified']], function () {
    Route::group(['middleware' => 'role:user'], function() {
        Route::get('/user/dashboard', \App\Http\Livewire\User\Dashboard::class)->name('dashboard');
        Route::get('/reservasi/{id}', \App\Http\Livewire\Reservasi::class)->name('reservasi');
        Route::get('/payment/{bookingcode}', \App\Http\Livewire\Payment::class)->name('payment');
        Route::get('/user/edit-profile', \App\Http\Livewire\User\EditProfile::class)->name('user.edit.profile');
        Route::get('/user/my-order', \App\Http\Livewire\User\MyOrder::class)->name('user.myorder');
    });
    Route::group(['middleware' => 'role:salon'], function() {
        Route::get('/salon/dashboard', \App\Http\Livewire\Salon\Dashboard::class)->name('salon.dashboard');
        Route::get('/salon/list-product', \App\Http\Livewire\Salon\ListProduct::class)->name('salon.listproduct');
        Route::get('/salon/edit-profile', \App\Http\Livewire\Salon\EditProfile::class)->name('salon.editprofile');
        Route::get('/salon/image-salon', \App\Http\Livewire\Salon\ImageSalon::class)->name('salon.image');
        Route::get('/salon/work-hour', \App\Http\Livewire\Salon\WorkHour::class)->name('salon.workhour');
        Route::get('/salon/list-book', \App\Http\Livewire\Salon\ListBook::class)->name('salon.listbook');
        Route::get('/salon/list-allbooking', \App\Http\Livewire\Salon\AllBooking::class)->name('salon.listallbook');
    });
    Route::group(['middleware' => 'role:admin'], function() {
        Route::get('/admin/dashboard', \App\Http\Livewire\Admin\Dashboard::class)->name('admin.dashboard');
        Route::get('/admin/list-salon', \App\Http\Livewire\Admin\ListSalon::class)->name('admin.listsalon');
        Route::get('/admin/pending-salon', \App\Http\Livewire\Admin\PendingSalon::class)->name('admin.pendingsalon');
        Route::get('/admin/list-pembayaran', \App\Http\Livewire\Admin\ListPembayaran::class)->name('admin.listpembayaran');
        Route::get('/admin/add-admin', \App\Http\Livewire\Admin\AddAdmin::class)->name('admin.addadmin');
    });
});
