## ==== Documentação de para uso da API ===== ##
OBS: para testar o uso da API, deve-se criar uma cópia do projeto, e dicionar ela em um local de sua preferência em seu dispositivo, onde esteja rodando o Wampp, Xampp ou qualquer outro servidor PHP com Mysql ou MariaDB. Em seguida configure esse projeto em seu banco de dados, com base na descrição abaixo.
VOCÊ PODE FAZER A MESMA CONFIGURAÇÃO DE BANCO DE DADOS NO PROJETO USADO COMO FRONTEND PARA SEUS TESTES.

------ Configuração no arquivo .env ------------
-> Criar uma base de dados com Mysql ou MariaDB;
-> Configurar a base de dados criada na variável DB_DATABASE;
-> Configurar o usuário do banco de dados na variável DB_USERNAME;
-> Configurar a senha de acesso a base de dados na variável DB_PASSWORD;

-------- Criação de tabelas ---------
-> Abrir um terminal de comandos no diretório raiz do projeto;
-> Executar o comando: php artisan migrate;


--------- Cadastro de produtos -------
-> Abrir um termminal de comandos no diretório raiz do projeto;
-> Executar o comando: php artisan serve;
-> Navegar na rota ou url: http://127.0.0.1:8000/frontend
-> Usar os campos inputs para inserir dados e ao final clicar no botão "salvar";
-> Se o registro passar nas validações, ele será exibido em uma tabela logo abaixo do formulário;

** OBS: O cadastro, edição e exclusão de registros são realizados uzando a rota API criada para tal finalidade por meio de requisição Ajax, conforme pode ser visto na view, "front.index"


