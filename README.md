<div align="center">

# 🚀 PulseDesk

### Modern Survey & Feedback Management Platform built with Laravel 12

Collect feedback, manage clients, build dynamic surveys, analyze responses and generate insightful reports — all from one powerful dashboard.

<br>

![Laravel](https://img.shields.io/badge/Laravel-12-red?style=for-the-badge&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.3-blue?style=for-the-badge&logo=php)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5-purple?style=for-the-badge&logo=bootstrap)
![MySQL](https://img.shields.io/badge/MySQL-Database-blue?style=for-the-badge&logo=mysql)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

</div>

---

# 📖 About

PulseDesk is a modern SaaS-ready Survey & Feedback Management Platform developed using Laravel 12.

It enables organizations to create surveys, collect customer feedback, manage clients, analyze responses, and control user access using Role-Based Access Control (RBAC).

The project follows clean Laravel architecture with reusable Blade components, responsive Bootstrap UI, and scalable database relationships.

---

# ✨ Features

## Authentication

- Login
- Registration
- Logout
- Remember Me
- Role Based Authentication

---

## Dashboard

- Beautiful Admin Dashboard
- Statistics Cards
- Survey Overview
- Response Summary
- Recent Activity

---

## Client Management

- Create Client
- Edit Client
- Delete Client
- Search Clients
- Pagination

---

## Survey Builder

- Dynamic Survey Creation
- Multiple Question Types
- Required Questions
- Draft / Published / Closed Status
- Public Survey Link
- Survey Slug

---

## Question Types

- Text
- Textarea
- Radio
- Checkbox
- Dropdown
- Rating (1–5)

---

## Response Management

- Public Survey Submission
- Anonymous Responses
- View Individual Responses
- Delete Responses

---

## Reports

- Survey Analytics
- Response Statistics
- Rating Average
- Option Percentage
- Question Wise Report

---

## User Management

- Create Users
- Assign Roles
- Active / Inactive Status
- Search Users

---

## Roles & Permissions

Powered by Spatie Laravel Permission.

- Super Admin
- Admin
- Staff

Permission based authorization throughout the application.

---

## Settings

- Application Name
- Company Name
- Timezone
- Default Survey Status
- Company Logo
- Favicon
- Allow Multiple Responses

---

# 🛠 Tech Stack

| Technology | Version |
|------------|---------|
| Laravel | 12 |
| PHP | 8.3 |
| Bootstrap | 5 |
| MySQL | Latest |
| Blade | Laravel Blade |
| Spatie Permission | Latest |
| Eloquent ORM | ✔ |
| MVC Architecture | ✔ |

---

# 📂 Project Structure

```
app/
bootstrap/
config/
database/
public/
resources/
routes/
storage/
```

---

# 🗄 Database Modules

- Users
- Roles
- Permissions
- Clients
- Surveys
- Questions
- Question Options
- Responses
- Response Answers
- Settings

---

# 📸 Screenshots

Coming Soon

- Login
- Dashboard
- Clients
- Surveys
- Public Survey
- Responses
- Reports
- Users
- Roles
- Settings

---

# ⚙ Installation

Clone the repository

```bash
git clone https://github.com/Raj-Gajjar/pulsedesk.git
```

Move into project

```bash
cd pulsedesk
```

Install dependencies

```bash
composer install
```

Copy environment

```bash
cp .env.example .env
```

Generate application key

```bash
php artisan key:generate
```

Configure database inside `.env`

Run migrations

```bash
php artisan migrate
```

Seed database

```bash
php artisan db:seed
```

Create storage link

```bash
php artisan storage:link
```

Start development server

```bash
php artisan serve
```

---

# 👤 Demo

Currently not publicly available.

---

# 🚀 Roadmap

- Email Notifications
- Survey Expiry
- Export PDF
- Export Excel
- CSV Reports
- Charts & Graphs
- API Support
- Multi Language
- Dark Mode
- Email Templates
- Survey Themes
- Public Analytics
- QR Code Survey Sharing

---

# 🤝 Contributing

Contributions are welcome.

1. Fork the repository
2. Create a new branch
3. Commit your changes
4. Push your branch
5. Open a Pull Request

---

# 👨‍💻 Author

**Raj Gajjar**

GitHub

https://github.com/Raj-Gajjar

---

# 📄 License

This project is licensed under the MIT License.

---

<div align="center">

Made with ❤️ using Laravel 12

</div>
