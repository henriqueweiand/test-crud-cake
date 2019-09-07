# test-crud-cake

## Proposta

Encontra-se no Teste de aptidão - Loginfo.pdf deste repositório

## Dependências

- Docker

## Instruções para rodar

Você pode optar rodar de duas formas

### 1) Execute o arquivo `run.sh` da pasta raiz, podendo ser via terminal com por exemplo:

`sh ./run.sh`

Este comando ira executar uma série de passos que você poderá acompanhar via terminal, referente a:
1) Build
2) Install das dependências do framework lumen
3) Run migrations para a criação das tabelas
4) O ambiente pode ser acessado no http://localhost:8080

### 2) Execute os seguintes passos separadamente no seu terminal dentro da pasta do projeto:

`docker-compose up --build -d`

`docker exec -it php /app/bin/cake migrations migrate`

O ambiente pode ser acessado no http://localhost:8080

### Importante

Sempre fique atento que não exista outro processo rodando nas portas 80, 9000 e 3306 pois serão as portas utilizadas ao executar o docker
