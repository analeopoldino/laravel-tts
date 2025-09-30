<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class TextToSpeechController extends Controller
{
    // Função que exibe a view para o usuário digitar o texto
    public function showForm()
    {
        return view('text_to_speech');
    }

    // Função que chama a API VoiceRSS para converter o texto do usuário em áudio .mp3
    public function generateSpeech(Request $request)
    {
        // Valida se o texto digitado pelo usuário não ultrapassa o tamanho máximo permitido
        $request->validate(['text' => 'required|string|max:5000']);

        // Inicializa a chave da API a partir do arquivo .env
        $apiKey = env('VOICERSS_API_KEY'); 

        // Verifica se a chave da API está configurada; se não, retorna erro
        if (empty($apiKey)) {
            return back()->withErrors(['api_error' => 'A chave da API VoiceRSS não foi configurada no arquivo .env.']);
        }

        // Chama a API VoiceRSS para gerar o áudio
        $response = Http::get('http://api.voicerss.org/', [
            'key'  => $apiKey,
            'hl'   => 'pt-br',
            'src'  => $request->input('text'),
            'c'    => 'MP3',
            'f'    => '44khz_16bit_stereo',
        ]);

        // Verifica se a API retornou o áudio corretamente
        if ($response->successful() && strpos($response->header('Content-Type'), 'audio') !== false) {
            $audioContent = $response->body();

            $path = 'audio/';
            $filename = $path . 'speech_' . time() . '.mp3';
            File::ensureDirectoryExists(public_path($path));
            file_put_contents(public_path($filename), $audioContent);

            return redirect()->route('tts.form')->with('audio_path', $filename);
        }
        
        // Retorna erro caso a API não funcione corretamente
        return back()->withErrors(['api_error' => 'Erro da API: ' . $response->body()]);
    }
}
