<?php

use App\Facility;
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
    //データベスから値を持ってきている
    // return view('facilities');
    $facilities = Facility::orderBy('created_at', 'asc')->get();
    //viewhablade.phpの処理繰り返してくれるr
    return view(
        ' facilities',
        [
            'facilities' => $facilities
        ]
    );
});

//タスク作成
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

//削除ボタン
Route::delete('/facility/{id}', function ($id) {
    Facility::findOrFail($id)->delete();

    return redirect('/');
});
