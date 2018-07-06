# Projeto "desafio" PHP
Projeto simples de gestão de vendas de produtos.

## Intruções para instalação, usando o XAMPP:
1 - Criar uma base de dados no phpMyAdmin, com o nome desafio.  
2 - Importar na base de dados o arquivo "modelo fisico.sql" que se encontra na pasta "der", para criação das tabelas do banco.  
3 - Altere o usuario e a senha do aquivo "desafio\src\dao\conexao.php" de acordo com as configurações do seu banco.  
4 - Importar na base de dados o arquivo "inserções.sql" que se encontra na pasta "der", para inserção dos dados basicos do banco.  
5 - Copiar a pasta "desafio" para o diretorio "xampp\htdocs\".  

## Instruções de ultilizaçao:
1 - Com o Apache iniciado, no seu navegador, navegue ate apagina index.php do projeto.  
2 - Escolha o produto de sua preferência, informe a quantidade desejada, e clique em comprar.  
3 - Você sera redirecionado para a tela de login, nessa tela use o email "cliente@cliente.com" e a senha "cliente" e clique em entrar.  
4 - Pronto, agora o produto foi adicionado ao seu carrinho, nessa tela tem acesso ao endereço do cliente, e a possibilidade de confirmar 
ou cancelar sua compra, respectivamento nos botões "Confirmar" e "Cancelar".  
5 - Clicando em Confirmar, sua compra será confirmada, e você será redirecionado para a tela onde tera acesso a todas suas compras. Agora, 
caso clique em Cancelar, seu produto será removido do Carrinho.  
6 - Para voltar aos produtos, basta clicar no link "Desafio.com" no canto superior esquerdo.  
