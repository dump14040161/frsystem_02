<?php

use App\Facility;
use App\Reservation;
use Illuminate\Http\Request;

//モデル(コマンドで打刻して作った)で使えるように、他のところにあるファイルを参照できるように、住所みたいな感じ

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
    // データベースから値を持ってきている
    $facilities = Facility::orderBy('created_at', 'asc')->get();
    // viewによってfacilities.blade.phpをページとして処理している。ファシリーズテーブル　asになる
    return view(
        'facilities',
        [
            'facilities' => $facilities,
            //  'reservation' => 'reservation'

        ]
    );
});

// タスク作成
Route::post('/facilities', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $facility= new Facility();
    $facility->name = $request->name;
    $facility->save();

    return redirect('/');
});

// 削除ボタン
Route::delete('/facilities/{id}', function ($id) {
    Facility::findOrFail($id)->delete();

    return redirect('/');
});



Route::get('/reservation_page', function () {
    // データベースから値を持ってきている
    $reservations = Reservation::orderBy('created_at', 'asc')->get();
    // viewによってreservation.blade.phpをページとして処理している。
    return view(
        'reservations',
        [
            'reservations' => $reservations

        ]
    );
});

// タスク作成,post=create
Route::post('/reservations', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        'start' => 'required',
        'end' => 'required',
        'count_adult' => 'required',
        'count_child' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect('/reservation_page')
            ->withInput()
            ->withErrors($validator);
    }

    $reservation= new Reservation();
    // $facility->name = $request->name;
    $reservation->start = $request->start;
    $reservation->end = $request->end;
    $reservation->count_adult = $request->count_adult;
    $reservation->count_child = $request->count_child;
    $reservation->save();

    return redirect('/facilities');
});

// キャンセルボタン
Route::delete('/reservations/{id}', function ($id) {
    Reservation::findOrFail($id)->delete();

    return redirect('/');
});

