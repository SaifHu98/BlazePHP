# 🚀 BlazePHP - Final Complete Release

BlazePHP is a modern, modular, and developer-first PHP framework built for **performance**, **security**, and **unlimited extensibility**.

This final release is **production-ready** and includes everything you need to build powerful applications with speed, clarity, and creativity.

---

## 🔥 Core Highlights
- RESTful API architecture with JWT Authentication
- Role-Based Access Control (RBAC) with full UI
- Live Plugin System to register hooks dynamically
- AI Developer Assistant to provide real-time code suggestions
- Secure Live Code Runner inside the admin dashboard
- Markdown rendering + SEO meta tag generator
- Multilingual support + translation engine
- VueJS Admin Panel (included under `frontend/vue-admin`)
- Fully documented & tested (PHPUnit + Bootstrap tests)
- GitHub Actions CI/CD + Dockerized ready for cloud deployment

---

## ✅ Installation Guide

```bash
composer install
cp config/env.example.php config/env.php
sh install/setup.sh
mysql -u root -p blazephp < install/setup.sql
php -S localhost:8000 -t public
```

---

## 🖥 Vue Admin Panel

```bash
cd frontend/vue-admin
npm install
npm run serve
```

---

## 🧪 Testing Support

```bash
vendor/bin/phpunit
```

And includes GitHub CI/CD for automated tests and deployment!

---

## 🐳 Run with Docker

```bash
docker-compose up -d --build
```

---

## ❤️ Contribute

- Build and register your own plugins
- Submit pull requests for modules, fixes, or enhancements
- Translate the platform to your language

---

**MIT License**  
Made with passion for PHP, VueJS, and open source innovation.
