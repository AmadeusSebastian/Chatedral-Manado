# ⛪ Cathedral Parish Information Management System
**A Modern, Responsive, and Comprehensive Web Platform for Paroki Katedral Manado.**

![Project Banner](user/images/foto_gereja.jpg) ## 📌 Overview
The Cathedral Parish Information Management System is a full-stack web application designed to bridge the gap between the church administration and the congregation. This platform serves as a centralized digital hub for disseminating liturgical schedules, parish announcements, pastoral team profiles, and providing a seamless cashless offering system (QRIS).

Built with a strong emphasis on **pixel-perfect UI/UX**, **mobile-first responsiveness**, and **secure administrative workflows**, this project demonstrates a complete cycle of software development from frontend aesthetics to backend database management.

## ✨ Key Features & Business Value

### 👥 User-Facing Portal (Frontend)
* **Modern Premium UI:** Implemented a *Glassmorphism* navigation bar and high-contrast cinematic layouts using **Tailwind CSS**.
* **Mobile-First & Responsive:** Fully optimized for various devices (tested down to iPhone 14 Pro widths) preventing layout breaks and overflow issues using precise grid/flexbox architectures.
* **Interactive UX:** Integrated typing animations via **Alpine.js** and smooth, touch-friendly announcement carousels using **Swiper.js**.
* **Accessibility & Readability:** Engineered custom typography scaling using Google Fonts (*Playfair Display* for majestic headers, *Lora* for highly readable Latin prayers).
* **Seamless Integration:** Features deep-linking for instant WhatsApp/Email redirection and a direct 1-click QRIS download system for modern cashless offerings.

### 🔐 Administrative Dashboard (Backend)
* **Enterprise-Grade Login:** A cinematic split-screen login interface with secure, session-based authentication.
* **Bulletproof Data Validation:** Eliminated human error in data entry (e.g., missing mass schedules) by implementing strict, dynamic client-side validation using **SweetAlert2** modals, backed by server-side PHP validation.
* **Dynamic Content Management:** Full CRUD (Create, Read, Update, Delete) capabilities for announcements, liturgy readings, mass schedules, and daily reflections.
* **Safe-Delete Mechanism:** Intercepted destructive actions with custom SweetAlert2 confirmation dialogs to prevent accidental data loss.

## 🛠️ Tech Stack & Architecture

**Frontend:**
* HTML5 / CSS3
* **Tailwind CSS** (Utility-first styling, Custom Themes, Responsive Design)
* **Alpine.js** (Lightweight DOM manipulation & animations)
* **Swiper.js** (Advanced touch sliders)
* **SweetAlert2** (Premium pop-up modals)

**Backend & Database:**
* **PHP 8.x** (Server-side logic, routing, session management)
* **MySQL** (Relational database management)
* PDO / MySQLi for secure database queries

## 🚀 Installation & Setup

To run this project locally, follow these steps:

1. **Clone the repository:**
   ```bash
   git clone [https://github.com/yourusername/katedral-manado-system.git](https://github.com/yourusername/katedral-manado-system.git)
