# Teste Prático - Conversor de Texto para Áudio (Estágio Laravel)

Esta é uma aplicação simples que permite que o usuário digite um texto em um formulário e, ao submeter, consome a **API externa de Text-to-Speech da VoiceRSS** para gerar e reproduzir o áudio correspondente ao texto.



## Funcionalidades

- Formulário para inserção de texto.
- Integração com a API externa VoiceRSS para conversão de texto em áudio.
- Player de áudio para reprodução do resultado.



## Tecnologias Utilizadas

- PHP 8.x  
- Laravel 10+  
- API VoiceRSS (Text-to-Speech)  



## Instalação e Execução

Siga os passos abaixo para executar o projeto em seu ambiente local:

1. **Clone o repositório:**
    ```bash
    git clone https://github.com/analeopoldino/laravel-tts.git
    ```

2. **Acesse a pasta do projeto:**
    ```bash
    cd laravel-tts
    ```

3. **Instale as dependências do Composer:**
    ```bash
    composer install
    ```

4. **Configure o arquivo de ambiente:**
    - Copie o arquivo de exemplo `.env.example` para um novo arquivo `.env`:
        ```bash
        cp .env.example .env
        ```
    - Gere a chave da aplicação Laravel:
        ```bash
        php artisan key:generate
        ```

5. **Configure a chave da API VoiceRSS:**
    - Cadastre-se gratuitamente no site [voicerss.org](http://www.voicerss.org/) para obter sua chave de API.
    - Abra o arquivo `.env` e adicione sua chave de API na linha:
        ```env
        VOICERSS_API_KEY=SUA_CHAVE_DE_API_AQUI
        ```

6. **Inicie o servidor local:**
    ```bash
    php artisan serve
    ```

7. **Acesse a aplicação:**  
   Abra o navegador no endereço: `http://127.0.0.1:8000`



## Observações

- A aplicação é simples e serve como demonstração do consumo de APIs externas em Laravel.  
- Para testes, insira qualquer texto no formulário e clique em "Gerar Áudio".  
