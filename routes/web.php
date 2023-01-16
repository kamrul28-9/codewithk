<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Role;

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
    Auth::logout();
    return view('welcome');
});


Auth::routes();

//Route::auth();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/home', 'App\Http\Controllers\HomeController@index');

Route::get('/admin', function()
{
  return view('admin.index');
});


Route::group(['middleware' => 'admin'], function()
{

  Route::resource('/admin/users', 'App\Http\Controllers\AdminUsersController');
  Route::resource('/admin/posts', 'App\Http\Controllers\AdminPostsController');
  Route::resource('/admin/categories', 'App\Http\Controllers\AdminCategoriesController');
  Route::resource('/admin/media', 'App\Http\Controllers\AdminMediasController');

  //Route::get('/admin/media/upoad', ['as' => 'admin.media.upload', 'uses' => 'App\Http\Controllers\AdminMediasController@store']);


});



Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout');











//what need to to create project app syncronously
  //1. laravel installtion
  //2. Database Configuration
  //3. Setting up views
  //4. User table Migration
  //5. Relation setup and data entry.
  //6. Testing relation with tinker.
  //7. Admin controller and routes.
  //8. Testing Methods.
  //9. Installing node.js and file downloads.
  //10. Gulp and assets.
  //11. Admin master file and downloads file.
  //12. Version Controll and modifing master.
  //13. Displaing users.
  //14. Creating page.
  //15. Laravel Collective html and package
  //16. Testing form and creating form fields

//Bash control: imported dependecies, composer.
 // 1. composer create-project --prefer-dist laravel/laravel codewithK
 // 2. php artisan migrate
 // 3. composer require laravel/ui
 // 4. php artisan ui vue --auth
 // 5. php artisan make:model Role -m




 //git control:
 //1. git init
 //2. git status
 //3. git add .
 //4. git config --global user.email "you@example.com"
 //5. git config --global user.name "Your Name"
 //6. git commit -m "......."
 //7. git log




 //find user in tinker.
        // 1.  $user = App\Models\User::find(1)
              //$user->role
 //Create user in tinker
        //$user = new App\Models\User();
        //$user->password = Hash::make('the-password-of-choice');
        //$user->email = 'the-email@example.com';
        //$user->name = 'My Name';
        //$user->save();
 //Create user in tinker in one line
        //$user = new App\Models\User();
        //App\Models\User::create(['name' => 'Tasnim Rima','email' => 'tasnim@mail.com','password' => Hash::make('123456789')]);

 //Delete specific user from database using tinker
        //$user = App\Models\User::find(3)
        //$user->forceDelete(3)
