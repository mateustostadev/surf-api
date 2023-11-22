# Surf Horizon API

## Introdução

Bem-vindo à documentação da API Surf Horizon. Esta API permite gerenciar competições de surfe, surfistas, baterias, ondas e notas associadas a cada onda. A aplicação foi desenvolvida utilizando o framework Laravel, versão mais recente (10.32.0), e utiliza o banco de dados MySQL (8.0) para armazenar os dados.

## Instalação e Configuração do Laravel

### Pré-requisitos

Antes de começar, certifique-se de ter os seguintes requisitos instalados em seu sistema:

1. [Composer](https://getcomposer.org/): Um gerenciador de dependências para PHP.
2. [XAMPP](https://www.apachefriends.org/index.html) ou outro servidor MySQL e PHP.
3. [Git](https://git-scm.com/downloads): Para controle de versão.

### Passos para Instalação

1. Clone o repositório:

    ```bash
    git clone https://github.com/Mateusmbarreto/surf-api.git
    ```

2. Navegue até o diretório do seu projeto:

    ```bash
    cd surf-api
    ```

3. Instale as dependências do Composer:

    ```bash
    composer install
    ```

4. Faça uma cópia do arquivo `.env.example` e renomeie para `.env`.

   
5.  Abra o arquivo `.env` e configure as variáveis de ambiente, especialmente as relacionadas à conexão com o banco de dados.

       ```dotenv
       DB_CONNECTION=mysql
       DB_HOST=127.0.0.1
       DB_PORT=3306
       DB_DATABASE=seu-banco-aqui      
       DB_USERNAME=seu-usuario
       DB_PASSWORD=sua-senha
       ```


6. Execute as migrações para criar as tabelas do banco de dados:

    ```bash
    php artisan migrate
    ```

7. Inicie o servidor Laravel:

    ```bash
    php artisan serve
    ```

8. Acesse o Laravel em `http://127.0.0.1:8000` no seu navegador e faça os devidos testes da API.

## Utilizando a API

A API Surf Horizon oferece as seguintes funcionalidades:

1. **Obter Todos os Surfistas Cadastrados**
   - Rota: `GET /api/surfistas`
  
    **Resposta Exemplo:**
   ```json
   [
     {
       "numero": 1,
       "nome": "Surfista1",
       "país": "Brasil"
       "created_at": "2023-11-22T12:52:26.000000Z",
       "updated_at": "2023-11-22T12:52:26.000000Z"   
     },
     {
       "numero": 2,
       "nome": "Surfista2",
       "país": "EUA"
       "created_at": "2023-11-22T12:52:26.000000Z",
       "updated_at": "2023-11-22T12:52:26.000000Z"   
     }
   ]
   ```
   
### 2. Inserir Surfistas
- **Rota:** `POST /api/surfistas`
- **Parâmetros de Entrada:**
  - `nome` (string)
  - `país` (string)

**Resposta Exemplo:**
```json
{
  "message": "Surfista cadastrado com sucesso.",
  "surfista": {
    "id": 1,
    "nome": "Mateus",
    "país": "Brazil"
  }
}
```

### 3. Criar Novas Baterias
- **Rota:** `POST /api/baterias`
- **Parâmetros de Entrada:**
- `surfista1` (integer)
- `surfista2` (integer)

**Resposta Exemplo:**
```json
{
    "message": "Bateria cadastrada com sucesso.",
    "bateria": {
        "id": 1,
        "surfista1_numero": 1,
        "surfista2_numero": 2
    }
}
```

### 4. Cadastrar Nova Onda em uma Bateria
- **Rota:** `POST /api/ondas`
- **Parâmetros de Entrada:**
  - `bateria` (integer)
  - `surfista` (integer)

**Resposta Exemplo:**
```json
{
    "message": "Onda cadastrada com sucesso.",
    "onda": {
        "bateria": 1,
        "surfista": 1,
        "updated_at": "2023-11-22T13:34:21.000000Z",
        "created_at": "2023-11-22T13:34:21.000000Z",
        "id": 1
    }
}
```
     
### 5. Cadastrar Novas Notas em uma Onda
- **Rota:** `POST /api/notas`
- **Parâmetros de Entrada:**
  - `onda` (integer)
  - `notaParcial1` (double)
  - `notaParcial2` (double)
  - `notaParcial3` (double)

**Resposta Exemplo:**
```json
{
    "message": "Notas cadastradas com sucesso."
}
```

### 6. Obter o Vencedor de uma Bateria
   - **Rota:** `GET /api/baterias/{id}/vencedor`
   - **Parâmetros de Entrada:**
   -  `id` (integer).

**Resposta Exemplo:**
```json
{
    "vencedor": 2,
    "participantes": [
        {
            "info": {
                "surfista_id": 1,
                "notas_finais": [
                    {
                        "nota_final": 2.3333333333333335
                    },
                    {
                        "nota_final": 2.5
                    }
                ],
                "soma_notas_finais_maiores": 4.833333333333334
            }
        },
        {
            "info": {
                "surfista_id": 2,
                "notas_finais": [
                    {
                        "nota_final": 2.5
                    },
                    {
                        "nota_final": 2.5
                    }
                ],
                "soma_notas_finais_maiores": 5
            }
        }
    ]
}
```

## Exemplo no Postman

Você pode testar os endpoints utilizando o [Postman](https://www.postman.com/). Importe a coleção "API SURF V1 - HORIZON TESTE 2" do Postman usando o seguinte link:

[![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/30099208-e66491d3-77a5-445e-8e55-235b3abd8353)

## Considerações Finais

Certifique-se de seguir as instruções e exemplos fornecidos para interagir corretamente com a API Surf Horizon. Em caso de dúvidas ou problemas, consulte a documentação ou entre em contato.
