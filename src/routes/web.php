<?php

use App\Facilitie;
use Illuminate\Http\Request;

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
    return view('facilities');
    $facilities = Facilities::orderBy('created_at', 'asc')->get();
    //viewhablade.phpの処理繰り返してくれるr
    return view(
        ' facilities',
        [
            'facilites' => $facilities
        ]
    );
});

Route::post('/facilities', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $facilite = new Facilitie();
    $facilite->name = $request->name;
    $facilite->save();

    return redirect('/');
});
