### Pré-requisitos

Certifique-se de ter os seguintes pré-requisitos instalados em seu sistema:

- Docker: https://www.docker.com/get-docker
- Docker Compose: https://docs.docker.com/compose/install/

### Passo 1: Clone o repositório

1. Abra o terminal ou o prompt de comando.
2. Navegue até o diretório onde deseja clonar o repositório.
3. Execute o seguinte comando para clonar o repositório:

   ```bash
   git clone https://github.com/MacartyFabio/fazcommex-dev-test.git
   ```

4. Após a conclusão, você terá uma cópia local do repositório em seu sistema.

### Passo 2: Configure as variáveis de ambiente

1. Navegue até o diretório do projeto clonado.
2. Renomeie o arquivo `.env.example` para `.env`.
3. Abra o arquivo `.env` em um editor de texto.
4. Defina os valores das variáveis de ambiente de acordo com sua configuração. Certifique-se de definir as seguintes variáveis:

    - `DB_CONNECTION`: O driver de conexão do banco de dados (por exemplo, `mysql`).
    - `DB_HOST`: O endereço do host do banco de dados (por exemplo, `db`).
    - `DB_PORT`: A porta do banco de dados (por exemplo, `3306`).
    - `DB_DATABASE`: O nome do banco de dados.
    - `DB_USERNAME`: O nome de usuário do banco de dados.
    - `DB_PASSWORD`: A senha do banco de dados.

5. Salve o arquivo.

### Passo 3: Execute o Docker Compose

1. No terminal ou prompt de comando, navegue até o diretório do projeto clonado.
2. Execute o seguinte comando para iniciar os contêineres do Docker:

   ```bash
   docker-compose up -d
   ```

3. O Docker Compose baixará e configurará todas as dependências necessárias e iniciará os contêineres.
4. Aguarde até que o processo seja concluído.

### Passo 4: Execute as migrações e as seeds

1. Após iniciar os contêineres, execute o seguinte comando para acessar o shell do contêiner da aplicação:

   ```bash
   docker-compose exec app bash
   ```

2. Dentro do shell do contêiner, execute as migrações do banco de dados usando o seguinte comando:

   ```bash
   php artisan migrate
   ```

3. Quando as migrações e as seeds forem concluídas, você terá o banco de dados configurado e preenchido.

### Passo 5: Acesse o aplicativo

1. Abra o navegador da web.
2. Acesse a seguinte URL:

   ```
   http://localhost:80
   ```

3. Você será redirecionado para a página inicial do aplic

ativo.

### Passo 6: Explorando o Projeto

Agora que o aplicativo está instalado e em execução, você pode explorar as funcionalidades:

- Acesse a página inicial para visualizar a lista de pedidos.
- Clique em "Editar" para modificar um DU-E existente.
- Clique em "Importar" para importar um DU-E.

### Exemplos de json
JSON
```
{
    "numero": "22BR000396386-0",
    "ruc": "2BR8263864420000000009999999999",
    "identificacao": "EXBR104513",
    "declarante_cpf_cnpj": "82638644000174",
"declarante_razao_social": "Empresa Teste",
    "moeda": "220",
    "incoterm": "FCA",
    "pais_destino": "BOL",
    "despacho_rfb": "0000700",
    "despacho_em_recinto": 1,
    "despacho_recinto": "201701",
    "embarque_rfb": "0000700",
    "embarque_em_recinto": 1,
    "embarque_recinto": "201701",
    "informacoes_complementares": "EXBR104513 - 2 CONTAINERS - FCA",
    "importador_nome": "COMPANHIA INDUSTRIAL",
    "importador_pais": "BOL",
    "importador_endereco": "AVENIDA CHACALTAYA NO 2141, LA PAZ, , BOLIVIA",
    "due_itens": [
        {
            "item": 1,
            "nfe_chave": "43220382638644000174550010001089351014405555",
            "nfe_item": 1,
            "ncm": "24013000",
            "vmle": 12790.00,
            "vmcv": 18490.00,
            "peso_liquido": 19800.0,
            "enquadramento1": "80000",
            "enquadramento2": null,
            "enquadramento3": null,
            "enquadramento4": null,
            "descricao_complementar": "RESÍDUOS DE TABACO, VIRGINIA, ESTUFA, ESTERELIZADO, TEE-RES-ST, MARCA ULT90003"
        },
        {
            "item": 2,
            "nfe_chave": "43220382638644000174550010001089361019925555",
            "nfe_item": 1,
            "ncm": "24013000",
            "vmle": 77290.00,
            "vmcv": 66490.00,
            "peso_liquido": 19800.0,
            "enquadramento1": "99101",
            "enquadramento2": null,
            "enquadramento3": null,
            "enquadramento4": null,
            "descricao_complementar": "RESÍDUOS DE TABACO, VIRGINIA, ESTUFA, ESTERELIZADO, TEE-RES-ST, MARCA ULT90003"
        },
{
            "item": 3,
            "nfe_chave": "43220382638644000174550010001089361019925555",
            "nfe_item": 1,
            "ncm": "48202000",
            "vmle": 77290.00,
            "vmcv": 66490.00,
            "peso_liquido": 19800.0,
            "enquadramento1": "81101",
            "enquadramento2": null,
            "enquadramento3": null,
            "enquadramento4": null,
            "descricao_complementar": "RESÍDUOS DE TABACO, VIRGINIA, ESTUFA, ESTERELIZADO, TEE-RES-ST, MARCA ULT90003"
        },
{
            "item": 4,
            "nfe_chave": "43220382638644000174550010001089361019925555",
            "nfe_item": 1,
            "ncm": "45781236",
            "vmle": 77290.00,
            "vmcv": 66490.00,
            "peso_liquido": 19800.0,
            "enquadramento1": "81101",
            "enquadramento2": null,
            "enquadramento3": null,
            "enquadramento4": null,
            "descricao_complementar": "RESÍDUOS DE TABACO, VIRGINIA, ESTUFA, ESTERELIZADO, TEE-RES-ST, MARCA ULT90003"
        }
    ]
}

```
### Passo 7: Encerrando os contêineres

Quando você terminar de usar o aplicativo, você pode encerrar os contêineres do Docker:

1. No terminal ou prompt de comando, navegue até o diretório do projeto clonado.
2. Execute o seguinte comando para encerrar os contêineres:

   ```bash
   docker-compose down
   ```
## Contribuição

Contribuições são bem-vindas! Se você encontrar algum problema, tiver alguma sugestão ou quiser contribuir de alguma forma, sinta-se à vontade para abrir uma issue ou enviar um pull request.

## Licença

Este projeto está licenciado sob a licença MIT. Leia o arquivo [LICENSE](LICENSE) para mais detalhes.
