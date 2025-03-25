# 📝notasapp-php

## Descrição

Este é um projeto simples de aplicação de bloco de notas desenvolvido em **PHP** com **TailwindCSS** para estilização e **MySQL** como banco de dados. A aplicação permite que os usuários:

- Visualizem todas as notas criadas
- Adicionem novas notas
- Editem notas existentes
- Excluam notas

O projeto segue uma estrutura organizada em pastas para simular um microframework, separando **models**, **controllers**, **routes**, **views** e **database**.

![image](https://github.com/user-attachments/assets/426ddacf-4fbf-40e6-bc86-4add19038f19)

---

## Estrutura de Diretórios

```plaintext
notepad_app/
├── controllers/
│   └── NoteController.php  # Controlador principal para manipulação de notas
├── database/
│   ├── db.php              # Configuração do banco de dados
│   └── migration.php       # Script para criação da tabela `notes`
├── models/
│   └── Note.php            # Model da entidade Nota
├── routes/
│   └── routes.php          # Arquivo de definição de rotas
├── views/
│   ├── create.php          # Formulário para criar novas notas
│   ├── edit.php            # Formulário para editar notas existentes
│   ├── index.php           # Página inicial para listar notas
├── index.php               # Arquivo inicial que redireciona para as views
└── README.md               # Documentação do projeto
```

---

## Requisitos

- **PHP 7.4 ou superior**
- **MySQL**
- **Servidor Apache ou outro servidor compatível com PHP** (recomenda-se o uso do XAMPP para ambientes locais)
- Conexão com a internet para carregar o TailwindCSS via CDN

---

## Configuração do Banco de Dados

1. Acesse o **phpMyAdmin** ou outro gerenciador de banco de dados.
2. Crie um banco de dados chamado `notepad` (ou outro nome de sua escolha).
3. OPCAO 1: Apos inserir os dados do banco em database/db.php, subir o servidor e acessar > url /database/migration.php pelo navegador.
4. OPCAO 2: Execute o seguinte comando SQL para criar a tabela `notes` manualmente em um gerenciador de banco de dados:

```sql
CREATE TABLE IF NOT EXISTS notes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

4. Atualize as credenciais de conexão no arquivo `database/db.php` com base em seu ambiente:

```php
<?php
$host = 'localhost';        // Host do banco de dados
$dbname = 'notepad';        // Nome do banco de dados
$user = 'root';             // Usuário do banco (padrão: root para XAMPP)
$password = '';             // Senha do banco (padrão: vazio para XAMPP)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
```

5. Opcional: Execute o script de migração localizado em `database/migration.php` para criar automaticamente a tabela:

```bash
php database/migration.php
```

---

## Como Executar o Projeto

1. **Baixe e instale o XAMPP (ou outro servidor local)**

   - Certifique-se de que o Apache e o MySQL estejam em execução.

2. **Clone ou copie o repositório para a pasta `htdocs`** do XAMPP:

   ```bash
   git clone https://github.com/seu-usuario/notepad_app.git
   ```

   Ou copie manualmente os arquivos do projeto para `C:\xampp\htdocs\notepad_app`.

3. **Configure o Banco de Dados**:

   - Acesse `http://localhost/phpmyadmin`.
   - Crie o banco de dados conforme instruções na seção **Configuração do Banco de Dados**.

4. **Acesse o Projeto no Navegador**:

   - Abra `http://localhost/notepad_app` no navegador.
   - Você será redirecionado para a página inicial, onde as notas serão listadas (ou uma mensagem vazia será exibida se não houver notas).

5. **Testando a Aplicação**:
   - **Criar Notas**: Clique em "Add Note" e preencha o formulário.
   - **Editar Notas**: Clique em "Edit" em qualquer nota listada.
   - **Excluir Notas**: Clique em "Delete" em qualquer nota listada.

---

## Funcionalidades

1. **Listagem de Notas**:

   - A página inicial (`views/index.php`) exibe todas as notas cadastradas no banco de dados, ordenadas pela data de criação (mais recente primeiro).

2. **Criação de Notas**:

   - O formulário em `views/create.php` permite adicionar um título e conteúdo para novas notas.

3. **Edição de Notas**:

   - O formulário em `views/edit.php` permite modificar o título e conteúdo de uma nota existente.

4. **Exclusão de Notas**:
   - Um botão de exclusão na página inicial permite apagar notas do banco de dados.

---

## Estrutura do Banco de Dados

Tabela: `notes`

| Campo        | Tipo         | Descrição                    |
| ------------ | ------------ | ---------------------------- |
| `id`         | INT          | Identificador único da nota  |
| `title`      | VARCHAR(255) | Título da nota               |
| `content`    | TEXT         | Conteúdo da nota             |
| `created_at` | TIMESTAMP    | Data/hora de criação da nota |

---

## Tecnologias Utilizadas

- **PHP**: Linguagem principal para a lógica de aplicação.
- **MySQL**: Banco de dados para armazenar as notas.
- **TailwindCSS**: Framework CSS para estilização responsiva e moderna.
- **HTML**: Estrutura das páginas.

---

## Possíveis Problemas e Soluções

1. **Erro de Conexão com o Banco**:

   - Verifique se as credenciais no arquivo `database/db.php` estão corretas.
   - Certifique-se de que o MySQL esteja em execução.

2. **Nota Não Aparece na Listagem**:

   - Confirme se a nota foi salva no banco de dados acessando o phpMyAdmin e verificando a tabela `notes`.

3. **CSS Não Aplica**:
   - Verifique se o TailwindCSS está carregando corretamente via CDN.

---
