# Laravel 12 + Docker + Jetstream (Starter)

![Laravel](https://img.shields.io/badge/Laravel-12-red)
![Docker](https://img.shields.io/badge/Docker-ready-blue)
![License](https://img.shields.io/badge/License-MIT-green)

---

## 📌 O que é

Um starter kit base para projetos **Laravel 12.x** utilizando **Docker** e **Jetstream 5.x**, com ambiente completo já configurado para desenvolvimento.

---

## 🎯 Para que serve

- Iniciar novos projetos Laravel rapidamente
- Padronizar o ambiente entre desenvolvedores
- Eliminar dependências locais (PHP, MySQL, Redis)
- Servir como base reutilizável para outros branches

---

## 🧱 Stack

- PHP 8.2
- Laravel 12.x
- Docker
- Docker Compose
- Nginx
- MySQL 8
- PHPMyAdmin
- Redis

---

## 🧠 Como funciona

A aplicação roda totalmente em containers Docker:

1. O **Nginx** recebe as requisições HTTP
2. Encaminha requisições PHP para o container **app**
3. O **Laravel** processa a requisição
4. Dados são persistidos no **MySQL**
5. Cache, filas e sessões utilizam **Redis**
6. Jobs assíncronos são processados pelo container **queue**

A comunicação ocorre via **network interna do Docker**, usando o nome dos serviços como host.

---

## 🐳 Serviços Docker

- **app**: container principal da aplicação Laravel
- **queue**: worker para processamento de filas
- **nginx**: servidor web
- **db**: banco de dados MySQL
- **phpmyadmin**: interface gráfica para o MySQL
- **redis**: cache, filas e sessões

---

## 🚀 Instalação Rápida]

1️⃣ Clone o repositório

```
git clone -b Laravel-12.x-Docker-Jetstream-5.x https://github.com/EzequielTzofeheer/Laravel-Docker
```

2️⃣ Acesse a pasta do projeto

```
cd Laravel-Docker
```

3️⃣ Crie o arquivo de ambiente
```
cp .env.example .env
```

4️⃣ Suba os containers Docker

```
sudo docker compose up -d
```

5️⃣ Acesse o container do Docker

```
sudo docker compose exec app bash
```

6️⃣ Instale as dependências do Laravel

```
composer install
```

7️⃣ Gere a chave da aplicação

```
php artisan key:generate
```

8️⃣ Instale as dependências utilizando NPM 

```
npm install
```

9️⃣ Compile as dependências utilziando NPM

```
npm run build
```

🔟 Migre o banco de dados

```
php artisan migrate
```

---

## 🌐 Acessos

- Aplicação: http://localhost:8090
- PhpMyAdmin: http://localhost:8550

---

## 🌱 Branches do Repositório

- Laravel-12.x-Docker → base do projeto
- Laravel-12.x-Docker-Jetstream-5.x
- Laravel-12.x-Docker-Livewire-4.x-Starter-Kit

---

## 🧩 Compatibilidade

- PHP: 8.2+
- Laravel: 12.x
- Docker: 29+
- Docker Compose: 5+
- Jetstream 5+

---

## 🤝 Contribuição

Contribuições são bem-vindas.

- Abra uma issue para sugestões ou bugs
- Pull requests devem ser claros e objetivos

---

## 👤 Autor

Criado e mantido por **Ezequiel Tzofeheer**

- Desenvolvedor Full Stack
- Foco em arquitetura, produtividade, segurança e boas práticas

---

## 🙌 Créditos

- PHP
- Laravel Framework
- Jetstream
- Docker
- Comunidade Open Source

---

## ⭐ Apoie o Projeto

Se este repositório te ajudou:

- Deixe uma ⭐ no GitHub
- Compartilhe feedback
- Contribua com melhorias

---

## 📄 Licença

Este projeto está sob a licença MIT.
