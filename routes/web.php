<?php

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
// Authenitication and dashboard routes
Route::get('register', 'Auth\RegisterController@register');
Auth::routes();//['verify' => true]

Route::prefix('/dashboard')->group(function() {
  Route::get('/', 'HomeController@index')->name('dashboard');//->middleware('verified');
  Route::get('/favorites', 'HomeController@favorites');//->middleware('verified');
  Route::get('/my-courses', 'HomeController@my_courses');//->middleware('verified');
  Route::get('/{id}/edit', 'HomeController@edit')->name('member.edit');//->middleware('verified');
  Route::put('/{id}/update', 'HomeController@update')->name('member.update');//->middleware('verified');
});

// Pages and authenitication routes
Route::get('/', 'PagesController@index');
// All the course routes below will only be available for authenticated users
Route::prefix('/courses')->group(function() {
  Route::get('/create', 'HomeController@create_course')->name('course.create');//->middleware('role:Teacher','verified');
  Route::post('/store', 'HomeController@store_course')->name('course.store');//->middleware('role:Teacher','verified');
  Route::delete('/{course_id}/delete', 'HomeController@delete_course')->name('course.delete');//->middleware('role:Teacher','verified');
  Route::get('/{course_id}/create-chapter', 'HomeController@create_chapter')->name('chapter.create');//->middleware('role:Teacher','verified');
  Route::post('/{course_id}/store-chapter', 'HomeController@store_chapter')->name('chapter.store');//->middleware('role:Teacher','verified');
  Route::get('/{course_id}/{chapter_number}/edit', 'HomeController@edit_chapter')->name('chapter.edit');//->middleware('role:Teacher','verified');
  Route::delete('/{course_id}/{chapter_number}/delete', 'HomeController@delete_chapter')->name('chapter.delete');//->middleware('role:Teacher','verified');
  Route::put('/{course_id}/{chapter_number}/update', 'HomeController@update_chapter')->name('chapter.update');//->middleware('role:Teacher','verified');
  Route::get('/{course_id}/{chapter_number}', 'HomeController@show_course')->name('course.show');//->middleware('role:Teacher','verified');
  Route::get('/download/{course_id}/{chapter_handout}', 'HomeController@download_chapter_handout')->name('chapter_handout.download');//->middleware('role:Teacher','verified');
});
Route::get('/download/{course_id}/{chapter_id}', 'HomeController@download_chapter_handout')->name('handout.download');

// Routes for comment
Route::resource('comment','CommentsController',['only'=>['update','destroy']]);
Route::post('comment/create/{chapter}','CommentsController@store_chapter_comment')->name('chapter_comment.store');
Route::get('comment/show','CommentsController@ajax_show')->name('comment.show');
Route::post('comment/store','CommentsController@ajax_store')->name('comment.store');
// Route::post('comment/create/1/axios','CommentsController@store_chapter_comment_axios')->name('chapter_comment.axios_store');
// Route::post('/chirps/{id}/act', 'CommentsController@actOnChirp');

// Routes for like
Route::post('/{course_id}/like', 'LikesController@store')->name('like.store');
Route::post('/{course_id}/favor', 'FavoritesController@store')->name('favorite.store');