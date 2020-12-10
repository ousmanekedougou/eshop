<?php

use App\Mail\ContactMessageCreated;
use Gloudemans\Shoppingcart\Facades\Cart;
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

// Route::get('/', function () {
//     return view('user/welcome');
// });

Route::get('/test_email', function () {
    return new ContactMessageCreated('Ousmane Diallo','email@gmail.com','Merci');
});


  
    Route::get('/','User\HomeController@index')->name('user_home');
    
    Route::resource('/contact','User\ContactController');
    
    Route::resource('/inscription','User\InscriptionController');
    
    // Route::resource('/login','User\ConnecterController');
    
    Route::resource('/admission','User\AdmissionController');
    
    Route::resource('/show','User\ShowController');

    Route::post('/new','User\NewsleterController@store')->name('home_news');
    
    Route::get('/header','User\HeaderController@index');
    
Auth::routes();
  
  // ________________________________________________________________________________
  
Route::prefix('/admin')->name('admin.')->group(function() {

    Route::get('/home', 'Admin\HomeController@index')->name('home');



    // Tout ce qui est gestion du front end

    // les options des services
    Route::resource('/service', 'Admin\ServiceController');
    Route::resource('/add_service', 'Admin\ServiceController@create');
    // fin des options des services

    // les options d'admin
    Route::resource('/admin', 'Admin\AdminController');
    // Route::resource('/add_admin', 'Admin\ActiviteController@create');
    // fin des options d'admin

    // option des produits
    Route::resource('/produit', 'Admin\ProduitController');
    // fin option des produits
    
    Route::resource('/contact', 'Admin\ContactController');

    // Tout ce qui est Personnelle
    // Route::resource('/personnel', 'Admin\PersonnelController');
    
    // option des category 
    Route::resource('/category', 'Admin\CategoryController');
    // fin des option de category

    // option des tag 
    Route::resource('/tag', 'Admin\TagController');
    // fin des option de tag

    // option des uesr 
    Route::resource('/user', 'Admin\UserController');
    // fin des option de uesr


     // option des info 
     Route::resource('/information', 'Admin\InformationController');
     // fin des option de info

       // option des partenaire
       Route::resource('/partener', 'Admin\PartenerController');
       // fin des option de partenaire

         // option des team
         Route::resource('/team', 'Admin\TeamController');
         // fin des option de team

  // option des social
  Route::resource('/social', 'Admin\SocialController');
  // fin des option de social


    // option des slider
    Route::resource('/slider', 'Admin\SlideController');
    // fin des option de slider

      // option des gallery
      Route::resource('/gallery', 'Admin\GalleryController');
      // fin des option de gallery
    
      // option des status
      Route::resource('/status', 'Admin\StatuController');
      // fin des option de status


      // option des commission
      Route::resource('/commission', 'Admin\CommissionController');
      // fin des option de commission

      //Options du panier
      Route::resource('/panier','Admin\PanierController');
      //Fin des options du panier

      //Options du panier
      Route::resource('/cart','Admin\CartController');
      //Fin des options du panier


        //Options du panier
        Route::get('/videpanier','Admin\VidepanierController@sup')->name('videpanier');
        //Fin des options du panier
     


       // Admin Auth Routes
    // Route::get('admin-login','Admin\Auth\LoginController@showLoginForm')->name('admin.login');
    // Route::post('admin-login','Admin\Auth\LoginController@login')->name('admin.login');
    // Route::post('admin-logout','Admin\Auth\LoginController@logout')->name('admin.logout');
});


Route::get('/home', 'HomeController@index')->name('home');
