# 🧠 Attenia API

API REST desarrollada con Laravel para la gestión de tareas y sesiones de enfoque orientada a estudiantes con TDAH.

---

## 📌 Descripción

Attenia es una API que permite a los usuarios:

* Registrarse y autenticarse
* Gestionar tareas
* Registrar sesiones de enfoque (tipo Pomodoro)
* Mejorar la organización personal

---

## 🎯 Objetivo

Desarrollar una API REST funcional utilizando Laravel que permita la administración de tareas y sesiones, aplicando buenas prácticas de desarrollo backend.

---

## ⚙️ Tecnologías utilizadas

* PHP 8.x
* Laravel 12
* MySQL
* Laravel Sanctum (autenticación)
* Thunder Client (pruebas)

---

## 🏗️ Arquitectura

El proyecto sigue el patrón MVC:

* **Models:** Manejo de datos (User, Task, Session)
* **Controllers:** Lógica de negocio
* **Routes:** Definición de endpoints

---

## 🗄️ Base de datos

Tablas principales:

* `users`
* `tasks`
* `focus_sessions`

---

## 🚀 Instalación

### 1. Clonar repositorio

```bash
git clone https://github.com/CedrikHG/attenia-api.git
cd attenia-api
```

### 2. Instalar dependencias

```bash
composer install
```

### 3. Configurar archivo `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=attenia
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generar clave

```bash
php artisan key:generate
```

### 5. Ejecutar migraciones

```bash
php artisan migrate
```

### 6. Iniciar servidor

```bash
php artisan serve
```

---

## 🔐 Autenticación

Se implementó autenticación mediante Laravel Sanctum.

Para acceder a rutas protegidas se debe incluir el token:

```http
Authorization: Bearer {token}
```

---

## 🔗 Endpoints

### 🔓 Públicos

| Método | Endpoint      | Descripción       |
| ------ | ------------- | ----------------- |
| POST   | /api/register | Registrar usuario |
| POST   | /api/login    | Iniciar sesión    |

---

### 🔒 Protegidos

| Método | Endpoint        | Descripción         |
| ------ | --------------- | ------------------- |
| POST   | /api/logout     | Cerrar sesión       |
| GET    | /api/user       | Usuario autenticado |
| GET    | /api/tasks      | Listar tareas       |
| POST   | /api/tasks      | Crear tarea         |
| PUT    | /api/tasks/{id} | Actualizar tarea    |
| DELETE | /api/tasks/{id} | Eliminar tarea      |
| GET    | /api/sessions   | Listar sesiones     |
| POST   | /api/sessions   | Crear sesión        |

---

## 🧪 Pruebas

Las pruebas se realizaron con Thunder Client:

* Registro de usuario ✔
* Inicio de sesión ✔
* Autenticación con token ✔
* CRUD de tareas ✔
* Registro de sesiones ✔

---

## 📊 Ejemplo de request

### Crear tarea

```json
{
  "title": "Estudiar Laravel",
  "description": "Practicar API REST",
  "status": "pending"
}
```

---

## 📌 Problemas y soluciones

| Problema                   | Solución                             |
| -------------------------- | ------------------------------------ |
| Conflicto tabla `sessions` | Se renombró a `focus_sessions`       |
| Error `payload`            | Ajuste de migraciones                |
| Rutas API no detectadas    | Configuración en `bootstrap/app.php` |
| Error GitHub SSH           | Uso de HTTPS                         |

---

## ✅ Resultados

Se desarrolló una API REST completamente funcional con:

* Autenticación
* Persistencia de datos
* Arquitectura organizada
* Endpoints funcionales

---

## 📌 Conclusión

Laravel permitió desarrollar una API robusta y escalable, aplicando buenas prácticas de desarrollo backend y resolviendo problemas reales durante la implementación.

---

## 👨‍💻 Autor

Cedric Armando Hernandez Garcia

---

## 📎 Repositorio

https://github.com/CedrikHG/attenia-api
