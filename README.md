# 🧠 Attenia API

API REST desarrollada con Laravel para la gestión de tareas y sesiones de enfoque orientada a estudiantes con TDAH.

---

## 📌 Descripción

Attenia es una API que permite a los usuarios:

- Registrarse y autenticarse
- Gestionar tareas
- Registrar sesiones de enfoque (tipo Pomodoro)
- Mejorar la organización personal

---

## 🎯 Objetivo

Desarrollar una API REST funcional utilizando Laravel que permita la administración de tareas y sesiones, aplicando buenas prácticas de desarrollo backend.

---

## ⚙️ Tecnologías utilizadas

- PHP 8.x
- Laravel 12
- MySQL
- Laravel Sanctum (autenticación)
- Thunder Client (pruebas)

---

## 🏗️ Arquitectura

El proyecto sigue el patrón MVC:

- **Models:** Manejo de datos (User, Task, Session)
- **Controllers:** Lógica de negocio
- **Routes:** Definición de endpoints

---

## 🗄️ Base de datos

Tablas principales:

- `users`
- `tasks`
- `focus_sessions`

---

## 🚀 Instalación

1. Clonar repositorio:

```bash
git clone https://github.com/CedrikHG/attenia-api.git
cd attenia-api

2. Instalar dependencias:
composer install

3. Configurar archivo .env:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=attenia
DB_USERNAME=root
DB_PASSWORD=

4. Generar clave:
php artisan key:generate

5. Ejecutar migraciones:
php artisan migrate

6. Iniciar servidor:
php artisan serve