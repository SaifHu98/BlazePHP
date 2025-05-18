# BlazePHP Framework

BlazePHP is a full-stack, high-performance, and secure PHP framework designed for modern web development. It includes:

- RESTful API support with JWT authentication
- Role-Based Access Control (RBAC)
- Secure middleware (CSRF, Permission checks)
- Vue-based admin dashboard
- File upload system
- Background jobs / scheduler
- Auto-installation scripts
- Documentation and Swagger support

---

## Features

- Modular MVC structure
- API-first architecture with token auth
- Dynamic permissions management
- Encrypted fields and secure session handling
- CLI utilities and queue support
- VueJS Admin Panel (in `frontend/vue-admin`)
- Setup script and database schema included

---

## Installation

```bash
git clone https://github.com/YOUR_USERNAME/blazephp.git
cd blazephp
composer install
cp config/env.example.php config/env.php
sh install/setup.sh
```

Import the database:
```bash
mysql -u root -p blazephp < install/setup.sql
```

---

## Run Locally

```bash
php -S localhost:8000 -t public
```

Start Vue Admin:

```bash
cd frontend/vue-admin
npm install
npm run serve
```

---

## Documentation

Full documentation available in `/docs` and via Swagger `/docs/swagger.yaml`.

---

## License

MIT License
