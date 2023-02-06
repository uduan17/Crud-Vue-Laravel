<?php

use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

Route::get('/test', function(){
    // return Role::all()->pluck('name');
    // $users = User::get();
    // foreach ($users as $user){
    //     if($user->number_id == 4535290875){
    //       $user->assignRole('admin');
    //     }else{
    //         $user->assignRole('user');
    //     }
    // }
    // Role::create(['name' => 'user']);
});


//Books
Route::get('/', [BookController::class, 'showHomeWithBooks']);


// Users
Route::group(['prefix' => 'Users', 'middleware' =>['auth', 'role:admin'],
'controller' => UserController::class], function()
{
        Route::get('/', 'showAllUsers')->name('users');
        Route::get('/CreateUser', 'showCreateUser')->name('user.create');
        Route::get('/EditUser/{user}', 'showEditUser')->name('user.edit');
        Route::post('/CreateUser', 'createUser')->name('user.create.post');
        Route::put('/EditUser/{user}', 'updateUser')->name('user.edit.put');
        Route::delete('/DeleteUser/{user}', 'deleteUser')->name('user.delete');

});


// Books
Route::group(['prefix' => 'Books', 'middleware' =>['auth', 'role:admin'], 'controller' => BookController::class], function()
{
        Route::get('/', 'showBooks')->name('books');
        Route::get('/GetAllBooks', 'getAllBooks');
        Route::get('/GetAllBooksDataTable', 'getAllBooksForDataTable');
        Route::post('/SaveBook', 'saveBook');
        Route::get('/GetABook/{book}', 'getABook');
        Route::post('/UpdateBook/{book}', 'updateBook');
        Route::delete('/DeleteBook/{book}', 'deleteBook');

        // Route::get('/CreateUser', 'showCreateUser')->name('user.create');
        // Route::get('/EditUser/{user}', 'showEditUser')->name('user.edit');
        // Route::post('/CreateUser', 'createUser')->name('user.create.post');
        // Route::put('/EditUser/{user}', 'updateUser')->name('user.edit.put');
        // Route::delete('/DeleteUser/{user}', 'deleteUser')->name('user.delete');

});

//Categories
Route::group(['prefix' => 'Categories','controller' => CategoryController::class], function()
{
        Route::get('/GetAllCategories', 'getAllCategories');
});

//Authors
Route::group(['prefix' => 'Authors','controller' => AuthorController::class], function()
{
        Route::get('/GetAllAuthors', 'getAllAuthors');
});


//Auth----------------------------------------------
Route::group(['controller' => LoginController::class], function()
{
    // Login Routes...
        Route::get('login', 'showLoginForm')->name('login');

        Route::post('login', 'login');

    // Logout Routes...
        Route::post('logout', 'logout')->name('logout');
});

Route::group(['controller' =>  ForgotPasswordController::class], function()
{
    // Password Reset Routes...
        Route::get('password/reset', 'showLinkRequestForm')
        ->name('password.request');

        Route::post('password/email', 'sendResetLinkEmail')
        ->name('password.email');
});

Route::group(['controller' => ResetPasswordController::class ], function()
{
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')
    ->name('password.reset');

    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
});

Route::group(['controller' => ConfirmPasswordController::class ], function()
{
    // Password Confirmation Routes...
        Route::get('password/confirm', 'showConfirmForm')->name('password.confirm');

        Route::post('password/confirm', 'confirm');
});

Route::group(['controller' => VerificationController::class ], function()
{
    // Email Verification Routes...
        Route::get('email/verify', 'show')->name('verification.notice');

        Route::get('email/verify/{id}/{hash}', 'verify')->name('verification.verify');

        Route::post('email/resend', 'resend')->name('verification.resend');   
});




