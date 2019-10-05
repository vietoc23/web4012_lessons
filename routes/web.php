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

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('users', function () {
    $users = User::all();
    return view('starter', [
        'users' => $users
    ]);
})->name('users.index');

Route::view('users/create', 'users.create')->name('users.create');

Route::post('users/store', function (Request $request) {
    User::create([
        'name' => $request->name,
        'birthday' => $request->birthday,
        'email' => $request->email,
        'password' => bcrypt('123456'),
        'role' => 1
    ]);

    return redirect()->route('users.index');
})->name('users.store');

Route::get('users/{id}', function ($id) {
    $user = User::find($id);

    return view('users.show', [
        'user' => $user
    ]);
})->name('users.show');

Route::get('users/{id}/edit', function ($id) {
    $user = User::find($id);

    return view('users.update', [
        'user' => $user
    ]);
});

Route::post('users/{id}/update', function ($id, Request $request) {
    $user = User::find($id);

    $user->update([
        'name' => $request->name,
        'birthday' => $request->birthday,
        'email' => $request->email
    ]);

    return redirect()->route('users.index');
})->name('users.update');

Route::post('users/{id}/delete', function ($id) {
    $user = User::find($id);

    $user->delete();

    return redirect()->route('users.index');
})->name('users.delete');

Route::get('posts', function () {
    $posts = factory(Post::class, 10)->make();

    return view('posts', [
        'posts' => $posts
    ]);
});


