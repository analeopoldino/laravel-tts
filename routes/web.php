<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TextToSpeechController;

// Rota criada para mostrar o formulário para o usuário ao acessar a página
Route::get('/', [TextToSpeechController::class, 'showForm'])->name('tts.form');

// Rota criada para processar o texto quando o usuário enviar o formulário
Route::post('/generate-speech', [TextToSpeechController::class, 'generateSpeech'])->name('tts.generate');