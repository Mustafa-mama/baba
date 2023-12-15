<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\LanguagesController;
use App\Http\Controllers\Admin\MainCatgerieController;
use App\Http\Controllers\Admin\ProfileContorller;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\VendoresController;
use App\Http\Controllers\SubcategorieController;
use Illuminate\Routing\RouteGroup;



 define('PAGINATION_COUNT',5);

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
  //define('PAGINATION-COUNT',10);

    Route::group(['middleware' => 'auth:admin'], function(){      
      Route::get('/index', [IndexController::class, 'index'])->name('index.admin'); 
        ########################### route profile##############################################  
        Route::controller(ProfileContorller::class)->group(function(){    
       
          Route::group(['prefix' => 'profile'], function(){
          Route::get('/', 'profile')->name('profile.admin');  
          Route::get('logout', 'logout')->name('logout.admin');          
                     
            
          });
  
        }); 
      ########################### route lang############################################## 

        Route::controller(LanguagesController::class)->group(function(){    
       
          Route::group(['prefix' => 'languages'], function(){
            Route::get('/', 'langindex')->name('lang.admin');
            Route::get('adds', 'addlang')->name('addlang.admin');
            Route::post('store', 'store')->name('store.admin');
            Route::get('edit/{id}', 'edit')->name('edit.admin');
            Route::post('updat/{id}', 'update')->name('updatelang.admin');
            Route::get('delete/{id}','delete')->name('delete.lang.admin');
            Route::get('approve/{id}','approve')->name('approve.lang.admin');
                  
            });

        });
      ########################### route catgorie############################################## 

         Route::controller(MainCatgerieController ::class)->group(function(){    
       
          Route::group(['prefix' => 'categorie'], function(){
            Route::get('/', 'index')->name('index.catgerie.admin');
            Route::get('add', 'cearte')->name('add.catgerie.admin');
            Route::post('store', 'store')->name('sto.cat.admin');
            Route::get('edit/{id}', 'edit')->name('edit.cat.admin');
            Route::post('update/{id}', 'update')->name('update.cat.admin');
            Route::get('delete/{id}', 'delete')->name('delete.cat.admin');
            Route::get('approve/{id}', 'approve')->name('approve.cat.admin');
            
               
        });

        });
      ########################### route vendores##############################################  
      Route::controller(VendoresController::class)->group(function(){    
       
        Route::group(['prefix' => 'vendore'], function(){
          Route::get('/', 'index')->name('index.vendore.admin');
          Route::get('add', 'cearte')->name('cearte.vendore.admin');
          Route::post('store', 'store')->name('store.vendore.admin');
          Route::get('edit/{id}', 'edit')->name('edit.vendore.admin');
          Route::post('update/{id}', 'update')->name('update.vendore.admin');
          Route::get('delete/{id}','delete')->name('delete.vendore.admin');
          Route::get('approve/{id}', 'approve')->name('approve.vendore.admin'); 

        
          });

      }); 
       ########################### route subcatgorie############################################## 

       Route::controller(SubcategorieController ::class)->group(function(){    
       
        Route::group(['prefix' => 'Subcategorie'], function(){
          Route::get('/', 'index')->name('index.subcategorie.admin');
          Route::get('create', 'create')->name('admin.subcatgerie.create');
         
          
          
              
          
  
      });

      });
    ########################### route item ############################################## 
    Route::controller(ItemController::class)->group(function(){    
       
      Route::group(['prefix' => 'item'], function(){
        Route::get('/', 'index')->name('index.item.admin');
        Route::get('create', 'create')->name('create.item.admin');
        Route::post('store', 'store')->name('store.item.admin');
        Route::get('edit/{id}', 'edit')->name('edit.item.admin');
        Route::post('update/{id}', 'update')->name('update.item.admin');
        Route::get('delete/{id}', 'delete')->name('delete.item.admin');
        Route::get('approve/{id}', 'approve')->name('approve.item.admin');
       
          
        

        });

       });
       ########################## route subcatgorie############################################## 

       Route::controller(SliderController ::class)->group(function(){    
       
        Route::group(['prefix' => 'Slider'], function(){ 
          
            Route::get('/', 'addImages')->name('admin.slider.create');
            Route::post('images', 'saveSliderImages')->name('admin.sliders.images.store');
            Route::post('images/db', 'saveSliderImagesDB')->name('admin.sliders.images.store.db');

       
          
           
        });

        });
    
    }); 
   




Route::controller(LoginController::class)->group(function () {
    Route::group(['middleware' => 'guest:admin'], function(){
        Route::get('/', 'getlogin')->name('getlogin');
        Route::post('login', 'postlogin')->name('admin.login');
        

    });
   
});

// Route::get('/admin', function () {
//     // return view('admin.auth.log');

// });
// Route::get('/', [LoginController::class, 'login']);

// Route::prefix('admin')->group(function () {
//     // Route::get('/users', function () {
//         // Matches The "/admin/users" URL
//         Route::get('/', function () {
//              return view('admin.auth.log');
//         });
        
//     });
// });
