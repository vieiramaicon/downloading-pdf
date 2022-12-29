<?php

use App\Models\Arquivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return view('index');
});

Route::post('/', function(Request $request) {
    $arquivo = $request->file('arquivo');

    $nome = substr($arquivo->getClientOriginalName(), 0, -4);
   
    DB::table('arquivos')->insert([
        'nome' => $nome,
        'arquivo' => $arquivo->get()
    ]);

    return redirect('/downloading');
});

Route::get('/downloading', function() {
    $arquivos = Arquivo::all();

    return view('downloading', ['arquivos' => $arquivos]);
});

Route::post('/downloading', function(Request $request) {
    $arquivo = Arquivo::find($request->id);
    
    return response($arquivo->arquivo)
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'attachment; filename=' . $arquivo->nome .'.pdf');
});

Route::get('/downloading/{id}', function($id) {
    $arquivo = Arquivo::find($id);

    return response($arquivo->arquivo)
                ->header('Content-Type', 'application/pdf')
                ->header('Content-Disposition', 'attachment; filename=' . $arquivo->nome .'.pdf');
});
