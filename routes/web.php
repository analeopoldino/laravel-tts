<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\TextToSpeechController;

// Rota para MOSTRAR o formulário quando o usuário acessar a página inicial
Route::get('/', [TextToSpeechController::class, 'showForm'])->name('tts.form');

// Rota para PROCESSAR o texto quando o usuário enviar o formulário
Route::post('/generate-speech', [TextToSpeechController::class, 'generateSpeech'])->name('tts.generate');
