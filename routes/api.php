<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Models\Prueba;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//SQLServer 2008 r2


Route::post('intersection', function (Request $request) {
    
    $body = $request->all() ; // body de la peticion del servidor
    

    // URL del servidor externo
    $url = 'https://jsonplaceholder.typicode.com/posts';

    // Encabezados de la solicitud POST, poner aqui tambien token y autorizacion 
    $headers = [
        'Content-Type' => 'application/json',
    ];

    // Realiza la solicitud POST
    $response = Http::post($url, $body , $headers);
    $data = json_decode($response->body());
    Prueba::create(
        [
            'nombre' => $data->titulo,
            'body' => $data->body,
            'UserId' => $data->userId
        ]
    );
    return $data;
});

Route::get('intersection', function (Request $request) {
    
    //$body = $request->all() ; // body de la peticion del servidor
    

    // URL del servidor externo
    $url = 'https://jsonplaceholder.typicode.com/posts';

    // Encabezados de la solicitud POST, poner aqui tambien token y autorizacion 
    $headers = [
        'Content-Type' => 'application/json',
    ];

    // Realiza la solicitud POST
    $body  = [
        'titulo' => 'Miguel Estanga get',
        'body' => 'miguelestanga12@gail.com',
        'UserId' => '10'
    ];

    $response = Http::post($url,  $body , $headers);
    $data = json_decode($response->body());
    
    Prueba::create(
        [
            'nombre' => $data->titulo,
            'body' => $data->body,
            'UserId' => $data->UserId
        ]
    );
    return $data;
});



