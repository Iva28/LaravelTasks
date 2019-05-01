<?php
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

/*
Route::get('/', function () {
    return view('welcome');
}); */


Route::get('tasks','TasksController@index');
Route::get('tasks/add','TasksController@addFile');
Route::post('tasks/add','TasksController@addFilePost');
Route::get('tasks/{id}/download', 'TasksController@download')->where('id', '[0-9]+')->name('tasks.download');;
Route::get('tasks/{id}/delete', 'TasksController@delete')->where('id', '[0-9]+')->name('tasks.delete');;

