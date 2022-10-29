## ==== Documentação de para uso da API ===== ##

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


