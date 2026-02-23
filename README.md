#  Colocation Expense Manager

A Laravel web application to manage shared housing expenses, members, and reimbursements with automatic balance calculation and role-based administration.

---

##  Project Overview

This platform helps people living together manage shared expenses in a simple and transparent way.

Users can:
- Create a shared housing group (colocation)
- Invite members via email/token
- Add and track shared expenses
- Automatically calculate balances
- View simplified reimbursements
- Record payments
- Monitor financial behavior through a reputation system

The system also includes a global administration panel for platform moderation and statistics.

---

##  Functional Objectives

- Manage shared housing groups
- Track shared expenses
- Automatically calculate individual balances
- Display simplified reimbursements ("who owes whom")
- Control access with roles and permissions

---

## ️ Technical Architecture

- **Framework:** Laravel (Monolithic MVC)
- **Database:** MySQL / PostgreSQL
- **ORM:** Eloquent
- **Authentication:** Laravel Breeze / Jetstream
- **Frontend:** Blade + Tailwind CSS
- **Version Control:** Git / GitHub

Architecture principles:
- MVC separation
- OOP design
- Secure data handling
- Role-based authorization

---

##  Roles and Permissions

###  Global Admin
- Access platform statistics
- Ban / unban users
- Monitor colocations and expenses
- Can also be Owner or Member

###  Owner
- Creator of a colocation
- Invites members
- Removes members
- Manages categories
- Cancels the colocation

###  Member
- Joins a colocation
- Adds expenses
- Views balances
- Records payments
- Leaves the colocation

---

##  Core Features

###  User Management
- Registration and authentication
- Profile management
- Automatic promotion of first user to Global Admin
- Automatic logout for banned users

###  Colocation Management
- Create, update, cancel, delete colocations
- Invitation system using token and email
- One active colocation per user
- Member join and leave tracking

###  Expense Management
- Add expenses (amount, date, category, payer)
- Expense history
- Monthly filtering
- Category statistics

###  Balance Calculation
For each member:
```
balance = total_paid − individual_share
```

System automatically generates:
- Individual balances
- Simplified reimbursements
- "Who owes whom" view

###  Payments
Users can record settlements using:
```
Mark as Paid
```
This reduces outstanding debt between members.

###  Reputation System
Financial behavior affects reputation:

| Situation | Reputation |
|----------|-----------|
| Leave without debt | +1 |
| Leave with debt | -1 |
| Owner removes indebted member | Debt transferred to owner |

###  Global Administration
- Platform statistics
- User moderation
- Ban / unban system

---

## ️ Database Model (Main Entities)

- User
- Colocation
- Membership (pivot table)
- Expense
- Category
- Invitation
- Payment

Key relationships:
- User ↔ Colocation → many-to-many
- Colocation → has many Expenses
- Expense → belongs to User (payer)
- Membership stores role and timestamps

---

##  Main Workflows

###  Invitation Flow
1. Owner sends invitation with token
2. User accepts or declines
3. System verifies email
4. Membership is created if valid

###  Expense Flow
1. Member adds expense
2. System recalculates balances
3. Settlement view updates automatically

###  Member Exit with Debt
- Reputation penalty applied
- Debt redistributed
- If removed by Owner → Owner absorbs debt

---

##  Security Measures
- Authentication via Laravel's built-in Auth
- Password hashing
- CSRF protection
- XSS protection via Blade escaping
- Server-side validation
- Prepared queries via Eloquent
- Role-based authorization
- Input sanitization

---

##  Admin Dashboard

Provides:
- Total users
- Total colocations
- Total expenses
- Banned users management

---

##  Installation

```bash
git clone <repository_url>
cd project-name
composer install
cp .env.example .env
php artisan key:generate
```

Configure database in `.env`

```bash
php artisan migrate
php artisan serve
```

---

##  Testing Scenarios

Recommended tests:
- Invitation acceptance
- Expense creation and balance update
- Member leaving with debt
- Role-based access control
- Multi-colocation restriction

---

##  UML Diagrams

Project includes:

- Use Case Diagram
- Class Diagram

---

##  Deliverables

- GitHub repository
- UML diagrams
- Presentation slides
- Functional web application

---

##  Evaluation Criteria

- Respect of MVC architecture
- Clean and maintainable code
- Proper use of Eloquent relationships
- Secure data handling
- Responsive UI
- Git versioning
- Functional correctness

---

##  Future Improvements (Out of Scope)

- Online payments integration
- Real-time notifications
- Calendar system
- Data export

---

##  Author

gmail: [alhabibridouane@gmail.com](mailto:alhabibridouane.@gmail.com)

------



