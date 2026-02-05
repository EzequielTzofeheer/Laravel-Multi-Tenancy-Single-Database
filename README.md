# 🏢 Laravel Multi Tenancy — Single Database

![Laravel](https://img.shields.io/badge/Laravel-12-red)
![Docker](https://img.shields.io/badge/Docker-ready-blue)
![License](https://img.shields.io/badge/License-MIT-green)

---

## 📌 O que é

Um starter kit arquitetural para projetos Laravel 12.x utilizando Multi Tenancy com Banco de Dados Único (Single Database).

O projeto fornece uma base sólida para aplicações SaaS, B2B ou plataformas multiempresas, onde múltiplos tenants compartilham o mesmo banco de dados, mantendo isolamento lógico, segurança e escalabilidade.

Tudo roda em Docker, com ambiente padronizado e pronto para desenvolvimento.

---

## 🎯 Para que serve

- Construir aplicações multi-tenant desde o início
- Criar SaaS com múltiplas empresas, clientes ou organizações
- Reduzir custos de infraestrutura (1 banco, N tenants)
- Padronizar ambiente entre desenvolvedores
- Acelerar o início de novos projetos
- Servir como base reutilizável para outros produtos ou branches

---

## 🧠 O que é Multi Tenancy (Single Database)

Neste modelo:

- Um único banco de dados
- Múltiplos tenants (empresas/organizações)
- Cada tenant possui seus próprios dados
- O isolamento ocorre por tenant_id
- O Laravel garante que cada requisição enxergue apenas seus próprios dados
- Mais simples de manter
- Mais barato
- Ideal para SaaS em crescimento

---

## 🧩 Modelo de Tenancy adotado

- Single Database
- Single Schema
- Isolamento por tenant_id
- Resolução automática do tenant via:
  - usuário autenticado
  - subdomínio (opcional)
  - header ou contexto da requisição

---

## 🧱 Stack

- PHP 8.2
- Laravel 12.x
- Jetstream 5.x
- Docker
  - Docker Compose
  - Nginx
  - MySQL 8
  - Redis
  - PHPMyAdmin
  - Node.js / NPM

---

## 🐳 Arquitetura Docker

A aplicação roda totalmente em containers:

1. O **Nginx** recebe as requisições HTTP
2. Encaminha requisições PHP para o container **app**
3. O **Laravel** processa a requisição
4. Dados são persistidos no **MySQL**
5. Cache, filas e sessões utilizam **Redis**
6. Jobs assíncronos são processados pelo container **queue**

Toda a comunicação ocorre via network interna do Docker.

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
https://github.com/EzequielTzofeheer/Laravel-Multi-Tenancy-Single-Database
```

2️⃣ Acesse a pasta do projeto

```
cd Laravel-Multi-Tenancy-Single-Database
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

- Aplicação: http://localhost:8092
- PhpMyAdmin: http://localhost:8552

---

## 🏷️ Versionamento

- A branch **main** acompanha sempre a versão mais recente
- As **tags** representam a versão do Laravel

---

## 🌱 Branches do Repositório

- main → última versão estável

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

- Abra uma **issue** para sugestões ou bugs
- Envie um **pull requests** bem documentados
- Siga o padrão de commits do projeto

---

## 👤 Autor

Criado e mantido por **Ezequiel Tzofeheer**

- Desenvolvedor Full Stack
- Foco em arquitetura, SaaS, produtividade e boas práticas
- Laravel • Docker • Sistemas Escaláveis

---

## ⭐ Apoie o Projeto

Se este repositório te ajudou:

- Deixe uma ⭐ no GitHub
- Compartilhe feedback
- Contribua com melhorias

---

## 📄 Licença

Este projeto está sob a licença MIT.
