# Agenda de contatos para a vaga da Vertex
https://vertex-contact.herokuapp.com/

## Instalação

### Pré requisitos
* LAMP ou equivalente
* Git
* Composer

### Clonar o repositório
```git clone https://github.com/thiagomneves/vertex.git```

### Instalar as dependências 
```composer install```

### criar um banco de dados 
```create database nome_dobanco```

### Definir environment
```cp .env.example .env``` 

e configurar as variáveis do banco de dados

#### gerar a chave
```php artisan key:generat```

### Criar as tabelas
```php artisan migrate```

### Popular as tabelas (opcional)
```php artisan db:seed```