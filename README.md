# 🚀 BlazePHP Framework

**BlazePHP** is a modern, lightweight, and high-performance PHP framework.  
It supports Vue.js for the frontend, making it ideal for building efficient web applications with complete user and permission management, including JWT-based authentication.

---

## 📁 Project Structure

```
BlazePHP/
├── app/                      ← Application Controllers (MVC)
│   └── Controllers/
│       └── PermissionController.php
├── core/                     ← Core System Components (DB, Auth, Response)
│   ├── Auth.php
│   ├── DB.php
│   ├── init.php
│   └── Response.php
├── frontend/                 ← Frontend using Vue 3 + Vite
│   └── vue-admin/
│       ├── src/
│       │   ├── components/
│       │   │   ├── Login.vue
│       │   │   ├── UserDashboard.vue
│       │   │   ├── PermissionManager.vue
│       │   │   └── ...
│       │   └── App.vue
│       └── package.json
├── public/                   ← Public entry point + API endpoints
│   └── api/
│       ├── login.php
│       └── user.php
├── routes/
│   └── web.php               ← Route definitions using $router
├── install.php               ← One-click installer for DB and default user
└── README.md                 ← This file
```

---

## ✅ BlazePHP Features

- 🔐 JWT-based authentication system
- 👥 Full user permission management via `PermissionController`
- 🧠 Simple and extendable MVC structure
- ⚡ Vue 3 + Vite interactive admin panel
- 🗂️ Ready-to-use RESTful APIs
- 🌐 Default demo user:
  - Email: `admin@example.com`
  - Password: `password123`

---

## 🛠️ Installation Steps

### 1. Set Up Database

- Create a MySQL database named `blazephp` using phpMyAdmin.
- Run in your browser:
  ```
  http://localhost/BlazePHP/install.php
  ```

This will automatically create all required tables.

---

### 2. Start the Frontend (Vue)

```bash
cd frontend/vue-admin
npm install
npm run dev
```

Then open:
```
http://localhost:5173
```

---

### 3. API Endpoints

| Endpoint                          | Description               |
|----------------------------------|---------------------------|
| POST `/api/login`                | User login                |
| GET  `/api/user`                 | Fetch authenticated user  |
| GET  `/api/admin/permissions`    | List all permissions      |
| POST `/api/admin/permissions/store` | Add new permission    |
| POST `/api/admin/permissions/{id}/delete` | Delete permission |

---

## 🧩 Core Vue Components

- **Login.vue**: Login interface
- **UserDashboard.vue**: Authenticated user dashboard
- **PermissionManager.vue**: Manage user permissions

---

## 📜 License
This project is open source — feel free to use and modify it as needed.

---

© 2025 - BlazePHP by Saif Sajad

---

## 🚀 BlazePHP is Under Active Development

BlazePHP is a lightweight, high-performance PHP framework built for modern web applications.  
It integrates Vue 3 + Vite on the frontend and provides a clean, extendable backend using PHP and REST APIs.

### 🔧 Status: In Active Development — Contributions Welcome!

We are actively developing BlazePHP and looking for contributors:
- Know PHP or Vue? You're welcome.
- Have design, testing, or documentation skills? We need you too.
- Open a Pull Request or an Issue — let's collaborate.

---

## 🌟 Features At a Glance
- ✅ JWT-based login and authentication
- ✅ User permissions management system
- ✅ Vue.js 3 + Vite interactive admin interface
- ✅ Organized MVC backend
- ✅ Clean RESTful API design
- ✅ One-click installer (`install.php`)

---

## 🤝 How to Contribute

1. Fork this repository
2. Create a new branch: `feature/your-feature-name`
3. Make your changes
4. Submit a Pull Request
5. We will review and merge!

---

## 📬 Contact

For suggestions or questions, feel free to open an issue or reach out via email listed in the repository.
