<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Teste Prático - Texto para Áudio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body class="container pt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="mb-4">Conversor de Texto para Áudio</h1>

            {{-- Exibe erros da API, se houver --}}
            @if($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first('api_error') }}
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('tts.generate') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="text" class="form-label">Digite o texto:</label>
                            <textarea name="text" id="text" class="form-control" rows="5" required placeholder="O texto que você digitar aqui será convertido em áudio."></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Converter para Áudio</button>
                    </form>

                    {{-- Se existir um caminho de áudio na sessão, exibe o player --}}
                    @if(session('audio_path'))
                        <div class="mt-4">
                            <hr>
                            <h3 class="mb-3">Seu áudio está pronto:</h3>
                            <audio controls autoplay class="w-100">
                                <source src="{{ asset(session('audio_path')) }}" type="audio/mpeg">
                                Seu navegador não suporta o elemento de áudio.
                            </audio>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>
</html>