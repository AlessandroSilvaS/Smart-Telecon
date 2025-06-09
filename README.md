# Desafio Técnico de estágio para smart telecom

Sistema web desenvolvido em Laravel com Jetstream e gerenciamento de times, voltado para provedores de internet. Este projeto simula um sistema completo de administração de planos, usuários, permissões e geração de contratos.

Tecnologias

- [Laravel](https://laravel.com/) (versão mais recente)
- [Laravel Jetstream](https://jetstream.laravel.com/) com Teams
- [Livewire](https://laravel-livewire.com/) para componentes dinâmicos
- [Tailwind CSS](https://tailwindcss.com/) (via Jetstream)
- [Sneat Free Template](https://themeselection.com/item/sneat-free-bootstrap-5-html-admin-template/) (interface base)
- [PHPWord (PhpOffice)](https://github.com/PHPOffice/PHPWord) para geração de documentos
- [jQuery DataTables](https://datatables.net/) para exibição de dados
- [API Receitaws](https://receitaws.com.br/) para dados de CNPJ

---

## 🎯 Funcionalidades Principais

- Cadastro de usuários (provedores e admins)
- Gerenciamento de times e permissões (Owner, Membro, Convidado)
- Listagem e CRUD de planos de internet por provedor
- Dashboard administrativo com estatísticas
- Geração de contrato .docx com dados do time
- Tabelas com filtros, busca e exportação (CSV, PDF)
- Formulários dinâmicos com validação AJAX
- Responsividade total em todas as páginas

---

## instalação

### ⚙️ Pré-requisitos

- PHP >= 8.1
- Composer
- MySQL ou MariaDB
- Node.js + npm
- Git
- XAMPP, Laragon ou similar

---

### 📥 Passo a Passo

```bash
# Clone o repositório
git clone https://github.com/ermesonramosdev/smart-telecom.git
cd Smart-Telecon

# Instale as dependências PHP
composer install

# Instale as dependências JavaScript
npm install && npm run build

# Copie o arquivo de ambiente
cp .env.example .env

# Gere a chave da aplicação
php artisan key:generate

# Crie o banco de dados (no MySQL) e configure o .env:
# DB_DATABASE=smart
# DB_USERNAME=root
# DB_PASSWORD=

# Execute as migrations e seeders
php artisan migrate --seed

# Rode o servidor
php artisan serve

#Admin
email: 'adminSmartTelecon@gmail.com
senha: adm1234

