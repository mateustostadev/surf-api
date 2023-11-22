# Surf Horizon API

## Introdução

Bem-vindo à documentação da API Surf Contest. Esta API permite gerenciar competições de surfe, surfistas, baterias, ondas e notas associadas a cada onda. A aplicação foi desenvolvida utilizando o framework Laravel, versão mais recente (10.32.0), e utiliza o banco de dados MySQL (8.0) para armazenar os dados.

## Instalação e Configuração do Laravel

### Pré-requisitos

Antes de começar, certifique-se de ter os seguintes requisitos instalados em seu sistema:

1. [Composer](https://getcomposer.org/): Um gerenciador de dependências para PHP.
2. [XAMPP](https://www.apachefriends.org/index.html) ou outro servidor MySQL e PHP.

### Passos para Instalação

1. Instalando o Laravel:
- Criar um novo projeto Laravel via Composer
    ```bash
    composer create-project laravel/laravel surf-api
    ```
    
2. Clone o repositório:

    ```bash
    git clone https://github.com/Mateusmbarreto/surf-api.git
    ```

3. Navegue até o diretório do seu projeto:

    ```bash
    cd surf-api
    ```

4. Instale as dependências do Composer:

    ```bash
    composer install
    ```

5. Copie o arquivo `.env.example` para um novo arquivo chamado `.env`:

    ```bash
    cp .env.example .env
    ```

6. Configure o acesso ao banco de dados no arquivo `.env`.

7. Execute as migrações para criar as tabelas do banco de dados:

    ```bash
    php artisan migrate
    ```

8. Inicie o servidor Laravel:

    ```bash
    php artisan serve
    ```

9. Acesse o Laravel em `http://127.0.0.1:8000` no seu navegador.

## Utilizando a API

A API Surf Contest oferece as seguintes funcionalidades:

1. **Inserir Surfistas**
   - Rota: `POST /api/surfistas`
   - Parâmetros de entrada: `nome` (string), `país` (string).

2. **Obter Todos os Surfistas Cadastrados**
   - Rota: `GET /api/surfistas`

3. **Criar Novas Baterias**
   - Rota: `POST /api/baterias`
   - Parâmetros de entrada: `surfista1` (integer), `surfista2` (integer).

4. **Cadastrar Novas Notas em uma Onda**
   - Rota: `POST /api/notas`
   - Parâmetros de entrada: `onda` (integer), `notaParcial1` (float), `notaParcial2` (float), `notaParcial3` (float).

5. **Obter o Vencedor de uma Bateria**
   - Rota: `GET /api/baterias/{id}/vencedor`
   - Parâmetros de entrada: `id` (integer).

## Exemplo no Postman

Você pode testar os endpoints utilizando o [Postman](https://www.postman.com/). Importe a coleção do Postman usando o seguinte link:

[![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/SEU_ID_AQUI)

## Considerações Finais

Certifique-se de seguir as instruções e exemplos fornecidos para interagir corretamente com a API Surf Horizon. Em caso de dúvidas ou problemas, consulte a documentação ou entre em contato com o suporte técnico.
