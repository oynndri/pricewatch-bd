  <div align="center">            PriceWatch BD - Market Intelligence System

<div align="center">

[![Visitors](https://api.visitorbadge.io/api/visitors?path=oynndri%2Fpricewatch-bd&labelColor=%23059669&countColor=%2310b981&style=flat-square)](https://visitorbadge.io/status?path=oynndri%2Fpricewatch-bd)
[![PHP Version](https://img.shields.io/badge/PHP-%3E%3D%208.2-777bb4?style=flat-square&logo=php)](https://www.php.net/)
[![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=flat-square&logo=laravel)](https://laravel.com/)
[![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=flat-square&logo=mysql)](https://www.mysql.com/)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg?style=flat-square)](https://opensource.org/licenses/MIT)

<img src="https://readme-typing-svg.herokuapp.com?font=Plus+Jakarta+Sans&weight=700&size=24&pause=1000&color=059669&center=true&vCenter=true&width=500&lines=Market+Intelligence;Price+Prediction;Inflation+Tracking;Empowering+Consumers" alt="Typing SVG" />

</div>

---

## 🌟 Overview

**PriceWatch BD** is a state-of-the-art, feature-rich market intelligence platform designed for the **Bangladesh** community. It bridges the gap between consumers and authentic commodity prices, using a centralized repository for real-time tracking, AI-powered predictions, and market analysis.

![Project Banner](https://placehold.co/1200x400/059669/FFF?text=PriceWatch+BD+-+Market+Intelligence)

### 🔴 The Problem
Consumers often struggle to find consistent, authentic market prices for daily essentials, leading to exploitation during inflation and a lack of transparency in the commodity market.

### 🟢 The Solution (PriceWatch BD)
A centralized, secure, and real-time portal that organizes market data across 64 districts, verifies submissions through admin moderation, and provides predictive insights through a premium-grade user experience.

---

## 🚀 Key Features

| | Feature | Description |
|---|---|---|
| 📦 | **Market Intelligence** | Real-time price tracking across 64 districts and 640+ markets with instant scannability. |
| 🔍 | **AI Price Prediction** | Advanced forecasting using machine learning to predict commodity prices for the next 7 days. |
| 🏆 | **Smart Shopping** | "Shopping List" feature that automatically finds the cheapest market for your selected items. |
| 🛡️ | **Admin Moderation** | Robust verification system for user-submitted prices to ensure data authenticity and reliability. |
| 📊 | **Interactive Trends** | Visual trend analysis using sparklines and integrated Chart.js for real-time market insights. |
| 📍 | **Market Matrix** | Map-based discovery of authentic markets with ratings, verification status, and location data. |

---

## 🖼️ System Preview

<div align="center">

| Market Insights | Mobile Experience |
| --- | --- |
| ![Dashboard](https://placehold.co/800x600/059669/FFF?text=Dashboard+Preview) | <img src="https://placehold.co/280x600/059669/FFF?text=Mobile+UI" width="280"> |

</div>

---

## 🏗️ Architecture

PriceWatch BD follows a robust **Model-View-Controller (MVC)** architectural pattern using the **Laravel 12** framework for a reactive and scalable experience.

```mermaid
flowchart TD
    A[User Browser] -->|HTTP Request| B[Vite / Web Server]
    B -->|Route Handling| C[Laravel 12 Controller]

C -->|Fetch / Save Data| D[Eloquent Model]
D -->|SQL Queries| E[(MySQL Database)]

C -->|Render Dynamic UI| F[Blade Views + Tailwind CSS]
F -->|Responsive HTML| A

subgraph "Security Layer"
    G["Role-Based Access (Admin/User)"]
    H["CSRF Protection"]
    I["Rate Limiter"]
    J["Secure Authentication"]
end

C -. Security Checks .-> G
C -. Security Checks .-> H
C -. Security Checks .-> I
C -. Security Checks .-> J
```

---

## 📊 Visual Documentation

### 🗄️ Database ER Diagram
```mermaid
erDiagram
    USERS ||--o{ PRICE_ENTRIES : submits
    MARKETS ||--o{ PRICE_ENTRIES : has
    PRODUCTS ||--o{ PRICE_ENTRIES : contains
    
    USERS {
        int id PK
        string name
        string email
        string password
        string role
        int contributions
    }
    PRODUCTS {
        int id PK
        string name
        string nameEn
        string category
        string unit
        string icon
    }
    MARKETS {
        int id PK
        string name
        string nameEn
        string location
        string district
        decimal rating
        boolean verified
    }
    PRICE_ENTRIES {
        int id PK
        int productId FK
        int marketId FK
        decimal price
        string submittedBy
        date date
        boolean verified
    }
```

### 🛣️ User Flow
```mermaid
graph LR
    Start((Start)) --> Landing[Home Page]
    Landing --> Auth{Authenticated?}
    Auth -- No --> Login[Login / Register]
    Auth -- Yes --> Dash[User Dashboard]
    Login --> Dash
    Dash --> Submit[Submit Price]
    Dash --> Explore[Explore Products]
    Dash --> Prediction[AI Price Forecast]
    Explore --> Market[Market Comparison]
    Explore --> Shopping[Smart Shopping List]
```

### 🔁 Price Verification Process
```mermaid
stateDiagram-v2
    [*] --> Submitted
    Submitted --> PendingApproval: Initial Submission
    PendingApproval --> Verified: Admin Approved
    PendingApproval --> Rejected: Invalid Data
    Verified --> Public: Visible to Consumers
    Verified --> Historical: Archived Data
    Rejected --> [*]: Entry Removed
```

---

## 🛡️ Security Hardening

- **CSRF Protection**: Native Laravel tokens for all state-changing interactions.
- **Role-Based Access Control**: Strict separation between Admin moderation and User submissions.
- **Rate Limiting**: Integrated anti-spam mechanisms for price submissions (Throttle middleware).
- **Secure Sessions**: HTTP-Only and SameSite cookie policies via Laravel Session layer.
- **XSS Prevention**: Automated Blade output encoding for all user-generated content.
- **SQLi Protection**: Full abstraction via Eloquent ORM and Query Builder.

---

## 🛠️ Installation Guide

### Prerequisites
- PHP 8.2+
- MySQL 8.0+
- Composer & NPM

### Setup Steps
1. **Clone the repository**:
   ```bash
   git clone https://github.com/oynndri/pricewatch-bd.git
   ```
2. **Install Dependencies**:
   ```bash
   composer install
   npm install
   ```
3. **Environment Setup**:
   - Copy `.env.example` to `.env`.
   - Configure your `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD`.
   ```bash
   php artisan key:generate
   ```
4. **Database Setup**:
   - Create the database and run migrations:
   ```bash
   php artisan migrate --seed
   ```
   - *Alternative*: Import `schema.sql` directly into your MySQL instance.
5. **Compile Assets & Launch**:
   ```bash
   npm run dev
   # Open another terminal
   php artisan serve
   ```

---

## 👩💻 Developed By

**Oynndrila Singh Purkayestha**  
*System Admin & Full Stack Developer*

[![LinkedIn](https://img.shields.io/badge/LinkedIn-Profile-blue?style=flat-square&logo=linkedin)](https://www.linkedin.com/in/oynndrila-singh-purkayestha)
[![Github](https://img.shields.io/badge/GitHub-Profile-black?style=flat-square&logo=github)](https://github.com/oynndri)

---
<div align="center">
  <sub>Built for the Bangladesh Market Transparency</sub>
</div>
