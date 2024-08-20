# SQL CODE
``` 
CREATE TABLE clientes(

  id INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(255),
  cpf VARCHAR(255),
  email VARCHAR(255),
  data_nas VARCHAR(255),
  genero VARCHAR(255),
  telefone VARCHAR(255),
  endereco VARCHAR(255)
);

CREATE TABLE imoveis(
	id INT PRIMARY KEY AUTO_INCREMENT,
  titulo VARCHAR(255),
  imagem VARCHAR(555),
  metros_quadrado VARCHAR(255),
  valor_metro VARCHAR(255),
  valor_total VARCHAR(255),
  descricao TEXT
);
```

# .ENV
```
MYSQL_ROOT_PASSWORD=suasenha
MYSQL_DATABASE=imobiliaria
MYSQL_USER=seuusuario
MYSQL_PASSWORD=suasenha
```

# IMPORTANTE
É nescessario alterar o **.env.exemple** para apenas **.env**


Seu objetivo como desenvolvedor FullStack é criar uma plataforma de vendas de imoveis.

Esta Plataforma terá dois utilizadores:

-Administrador (gerenciador do negocio)

-Cliente (usuário comum)

Para o Ambiente do Administrador deverá ter as seguintes funcionalidades:

-Login

-Gerenciar Clientes (id, Nome, cpf, email, data nasc, genero, telefone, endereço)

-Gerenciar Imoveis (id, Descricao,imagem , Metros2, valor metro2, valor total)

-Gerenciar Vendas (id_venda, id_cliente, id_imovel, valor, forma de pagamento)

O Administrador ja estará 'pré-cadastrado', ao realizar o login ele terá acesso total ao sistema e todas as funcionalidades

Para o ambiente de Cliente deverá ter as seguintes funcionalidades:

-Login

-Registro

-Visualização de Imóveis disponíveis

Deverá também ter restrição de acesso, o cliente poderá somente ver os imóveis disponíveis para venda e nada mais.

Caso o cliente tente acessar alguma pagina do administrador deverá receber uma mensagem de acesso negado.

Caso algum usuário não cadastrado tente acessar diretamente as paginas também deverá receber uma mensagem de acesso negado e redirecionar ao Login.


Observações:

Utilizar Bootstrap ou algum framework de css.

Validação de formulários.

Confirmações de exclusão.


Dicas:

Para controlar o acesso poderá ter uma coluna no BD dizendo o nível de acesso (ex: 1,2, 3)

assim quando realizar o login basta checar a coluna de acesso e setar essa informação na $_SESSION