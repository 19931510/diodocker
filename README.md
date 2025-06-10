# Projeto CRUD Dockerizado com PHP, MySQL, Bootstrap e AJAX

Este projeto é um sistema de gerenciamento de contatos (CRUD) desenvolvido utilizando tecnologias modernas e boas práticas de desenvolvimento. O principal objetivo foi criar um ambiente portável e consistente utilizando Docker para facilitar a replicação em diferentes máquinas, além de demonstrar habilidades tanto em back-end quanto em front-end.

## Tecnologias Utilizadas

- **Docker & Docker Compose:** Containerização do ambiente, que inclui o servidor web (PHP/Apache) e o banco de dados MySQL.
- **PHP:** Linguagem de programação utilizada para a lógica do back-end, com uso de prepared statements para segurança contra SQL Injection.
- **MySQL:** Banco de dados relacional utilizado para persistência dos dados dos contatos.
- **Bootstrap 4.5:** Framework CSS para uma interface responsiva e moderna.
- **jQuery & AJAX:** Para envio assíncrono dos dados do formulário, proporcionando feedback imediato sem recarregamento da página.
- **Git:** Controle de versão para gerenciar e distribuir o projeto.
- **Visual Studio Code:** Ambiente de desenvolvimento utilizado para codificação, versionamento e testes.

## Funcionalidades

### Create (Criar)
- **Formulário de Contato:** Interface onde o usuário insere nome e e-mail.
- **Envio via AJAX:** Os dados são enviados de forma assíncrona para o servidor, proporcionando uma experiência de usuário mais fluida.
- **Feedback Imediato:** Em caso de sucesso, o usuário é redirecionado para uma página de confirmação; caso contrário, exibe mensagens de erro apropriadas.

### Read (Ler)
- **Listagem de Contatos:** Página que exibe todos os registros salvos, com opções para editar ou excluir cada contato.
- **Interface Responsiva:** Utilizando o Bootstrap para garantir que a listagem seja bem apresentada em diversos dispositivos.

### Update (Atualizar)
- **Formulário de Edição:** Permite a modificação dos dados de um contato já existente. Ao clicar em "Editar", os campos do formulário são pré-preenchidos com os dados atuais do registro.
- **Processo Seguro:** A atualização é realizada utilizando prepared statements para evitar falhas de segurança.

### Delete (Excluir)
- **Exclusão Segura:** Ao clicar em "Excluir", o sistema solicita uma confirmação via JavaScript antes de remover o registro.
- **Feedback Visual:** O usuário é informado sobre a remoção do contato através da interface.

## Estrutura do Projeto

A estrutura de diretórios e arquivos está organizada da seguinte forma:
meu-projeto-dio/
├── html/ │   
├── contato.html        
# Formulário de contato com AJAX 
│   ├── salvar.php          
# Processa a inserção via prepared statements 
│   ├── sucesso.html      
# Página de confirmação de operação bem-sucedida 
│   ├── list.php            
# Listagem dos contatos com opções para editar e excluir 
│   ├── delete.php         
# Processa a exclusão de contatos 
│   ├── update_form.php     
# Formulário para editar os dados do contato 
│   └── update.php          
# Processa a atualização dos dados do contato 
├── Dockerfile              
# Configuração do container PHP/Apache 
├── docker-compose.yml      
# Orquestra os containers, incluindo MySQL 
├── .gitignore              
# arquivos e pastas a serem ignorados pelo Git 
└── README.md              
# Documentação do projeto (este arquivo)


Essa estrutura facilita a compreensão e manutenção do projeto, separando claramente a camada de front-end (na pasta `html`) da configuração do ambiente (Docker e Git).
