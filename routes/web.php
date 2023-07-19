<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderCOntroller;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\ContactController; 
use App\Http\Controllers\Home\AboutUsController;


Route::get('/', function () {
    return view('frontend.index');
});


Route::get('/profile/edit', function () {
    return ('');})->name('profile.edit');

Route::controller(DemoController::class)->group(function(){
    Route::get('/about','Index')->name('about.page')->middleware('check');
    Route::get('/contact', 'ContactMethod'); 
        
});
//Admin All Route
Route::controller(AdminController::class)->group(function(){
     Route::get('/admin/logout','destroy')->name('admin.logout');
     Route::get('/admin/profile','profile')->name('admin.profile'); 
     Route::get('/edit/profile','EditProfile')->name('edit.profile');   
     Route::post('/store/profile','StoreProfile')->name('store.profile');   
     Route::get('/Change/Password','ChangePwd')->name('change.password');  
     Route::post('/Change/Password','UpdatePassword')->name('update.password');  
    
});

  //Home Slide All route

Route::controller(HomeSliderCOntroller::class)->group(function(){
    Route::get('/home/slide','HomeSlider')->name('home.slide');
     Route::post('/update/slider', 'UpdateSlider')->name('update.slider');

});

Route::controller(AboutController::class)->group(function(){
   Route::get('/about/page','AboutPage')->name('about.page');   
   Route::post('/update/about', 'UpdateAbout')->name('update.about');
   Route::post('/multi/image', 'AboutMultiImage')->name('about.multi.image');


});

Route::controller(ContactController::class)->group(function(){

    Route::get('/contact','Contact')->name('contact.me'); 
   Route::post('/store/message', 'StoreMessage')->name('store.message'); 
   Route::get('/contact/message','ContactMessage')->name('contact.message'); 
   Route::get('/delete/message/{id}', 'DeleteMessage')->name('delete.message'); 
});


Route::controller(AboutUsController::class)->group(function(){

    Route::get('/about','About')->name('about.me'); 
});




Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth','verified'])->name('dashboard');




require __DIR__.'/auth.php';