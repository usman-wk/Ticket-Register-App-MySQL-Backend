# 🎫 Ticket Registration System (MySQL)

A full-featured web-based ticket registration platform designed for managing event signups efficiently. Built using PHP, MySQL, HTML, Bootstrap, and React, the system provides an intuitive interface for users to register for events and for admins to manage those registrations with ease.

---

## 🔍 Overview

This system is suitable for managing registrations for exhibitions, seminars, university events, conferences, and other gatherings that require attendee tracking. It provides both user-facing and admin-facing interfaces:

* **User View**: Clean and responsive registration form
* **Admin View**: Secure dashboard to manage, view, and delete records
* **Database Integration**: Seamless interaction with MySQL for data persistence
* **Frontend Interactivity**: React used for dynamic elements to enhance UX

---

## ✅ Key Features

* 📥 User registration with input validation
* 📊 Admin dashboard to view registration records
* 🗑️ Ability to delete/modify user entries (optional)
* 💾 MySQL database for storing event data
* 📱 Fully responsive layout with Bootstrap
* ⚛️ React-powered dynamic components for interactivity
* 🔐 Basic security practices applied (input sanitation, validation)

---

## 🛠️ Tech Stack

| Layer    | Technology             |
| -------- | ---------------------- |
| Frontend | HTML, Bootstrap, React |
| Backend  | PHP                    |
| Database | MySQL                  |

---

## 🚀 Getting Started

### 1. Clone the Repository

```bash
git clone https://github.com/yourusername/ticket-registration-system.git
```

### 2. Set Up Environment

* Install XAMPP/WAMP (or use an online PHP environment)
* Place project files inside the `htdocs` folder (XAMPP)
* Start Apache and MySQL from the control panel

### 3. Import Database

* Open `phpMyAdmin`
* Create a new database (e.g., `ticket_system`)
* Import the provided `.sql` file from the repo

### 4. Configure Credentials

Edit the PHP configuration file to match your database settings:

```php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'ticket_system';
```

### 5. Run the Application

Navigate to:

```
http://localhost/ticket-registration-system/
```

---

## 🧪 Testing & Usage

* Submit the form as a user
* Visit the admin panel to view all registrations
* Test add/delete functionality

---

## 📸 Demo (Optional)

> Add screenshots or a YouTube demo link here.

---

## 🤝 Contribution

Contributions, bug reports, and suggestions are welcome. Feel free to open an issue or fork the repo.

---

## 📄 License

MIT License – free to use, modify, and distribute with credit.

---
