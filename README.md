# Laravel Task Manager

A role-based Task Management System built with **Laravel 10**, **Breeze**, and **Bootstrap**. Admins can create, assign, and manage tasks. Agents (clients) can log in, view their assigned tasks, and mark them as completed.

---

## Features

- 🧑‍💼 **Multi-auth system** (Admin & Agent)
- ✅ Admin can:
  - Create/Edit/Delete Tasks
  - Assign tasks to multiple agents
  - Toggle task visibility on agent dashboard
- 👤 Agent can:
  - View assigned tasks
  - Mark tasks as complete
- 🛡️ Role-based route protection
- 🎨 Simple Bootstrap-based UI

---

## Installation

```bash
git clone https://github.com/AdnanAlMaruf/Task-manager.git
cd Task-manager
composer install
npm install && npm run dev
cp .env.example .env
php artisan key:generate
Configuration
Create a database and update .env with your DB credentials.

Run migrations and seeders:

bash
Copy
Edit
php artisan migrate --seed
The seeder will create:

An Admin user (admin@example.com, password: password)

An Agent user (agent@example.com, password: password)

Login Routes
Admin Login: /admin/login

Agent Login: /client/login

Usage
After logging in as Admin:

Access Admin Dashboard: /admin/dashboard

Manage tasks: /admin/tasks

After logging in as Agent:

Access Agent Dashboard: /agent/dashboard

View assigned tasks

Tech Stack
Laravel 10

Laravel Breeze (Inertia)

Bootstrap 5

MySQL

License
This project is open-source and available under the MIT License.

yaml
Copy
Edit

---

Let me know if you want to add project screenshots, badges, or deployment instructions (e.g., for H
