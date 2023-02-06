<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\LendController;
use App\Http\Controllers\BookController;



Route::group(['prefix' => 'Users', 'controller' => UserController::class], function() {
   Route::get('/GetAllUsers', 'getAllUsers');
   Route::get('/GetAnUser/{user}', 'getAnUser');
   Route::get('/GetAllLendsByUser/{user}', 'getAllLendsByUser');
   Route::get('/GetAllUsersWithLends', 'getAllUsersWithLends');
   Route::post('/CreateUser', 'createUser');
   Route::put('/UpdateUser/{user}', 'updateUser');
   Route::delete('/DeleteUser/{user}', 'deleteUser');
});

Route::group(['prefix' => 'Lends', 'controller' => LendController::class], function() {
   Route::post('/CreateLend', 'createLend');

});

// Route::group(['prefix' => 'Books', 'controller' => BookController::class], function() {
//    Route::get('/GetAllBooks', 'getAllBooks');
//    Route::get('/GetAnBook/{book}', 'getAnBook');
//    Route::delete('/DeleteBook/{book}', 'deleteBook');
//    Route::put('/UpdateBook/{book}', 'updateBook');
// });

//Books
Route::group(['prefix' => 'Books','controller' => BookController::class], function()
{
        Route::get('/GetAllBooks', 'getAllBooks');
        Route::post('/SaveBook', 'saveBook');
        
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