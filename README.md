# Cinema Uneb

## Configurações
Copiar o arquivo sample.env tornando-o apenas .env e aplicando os valores para as respectivas variáveis:

    DATABASE_HOST=
    DATABASE_USER=
    DATABASE_PASSWORD=
    DATABASE_NAME=

## Estrutura
- ### Domain 
	- Entities: *Contém todas as entidades envolvidas em regras de negócio*
 	- Ports: *Contém todas as interfaces que serão implementadas dentro*
	- Factories: *Factories que irão criar instâncias de classes com dependências que podem ser complexas*
	- Repositories: *Repositórios responsáveis por fazer as operações de banco de dados utilizando um adapter*
	- Usecases: *Usecases executarão as regras de negócio*
- ### Infra
	- Controllers: *Porta de entrada para qualquer requisição*
	- Validators: *Responsável por validar informações vindas através da requisição*
	- Router: *Faz o match entre rota e função do controller*
	- Database: *Contém os adapters de banco de dados que implementam a interface criada no domínio*

## Como implementar um novo fluxo de negócio
-	Etapa 1: Criar a entidade que atuará naquele fluxo, caso não exista.
-	Etapa 2: Criar o repositório daquela entidade para que utilizará o adapter do banco para realizar as operações.
-	Etapa 3: Criar o Usecase responsável por realizar as operações de negócio e usando o repositório para aplicar no banco.
-	Etapa 4: Criar um factory para o Usecase, dessa forma não precisará se precupar sempre com as dependências da classe.
-	Etapa 5: Criar um controller e adicionar uma rota ao router registry para que a funcionalidade fique disponível.
