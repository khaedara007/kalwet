# CI Base Boilerplate (CodeIgniter 3.1.13)

A clean, reusable **CodeIgniter 3.1.13 boilerplate** optimized for PHP 7.3 environments. Designed as a long-term foundation for secure and maintainable web applications.

---

## 🚀 Overview

**CI Base** provides a pre-configured structure and best practices to speed up development while maintaining backward compatibility with older CodeIgniter projects.

This boilerplate focuses on **security**, **reusability**, and **developer efficiency** — making it suitable for internal systems, small enterprise apps, or microservices.

---

## 🔧 Core Features

- **CodeIgniter 3.1.13** with full PHP 7.3 compatibility
- **Security-focused hooks** for XSS, headers, and escaping
- **Global input escaping** using `html_escape()`
- **Session-based login limiter (IP-based)** to mitigate brute force attacks
- **Database-stored sessions** with IP match validation
- **Preconfigured CSRF and cookie settings**
- **Custom helpers** for login, escaping, and form handling
- **Docker-ready** configuration for quick local setup
- **Clean structure** for controllers, models, and libraries

---

## 🧱 Project Goals

The main purpose of this boilerplate is to:

1. **Simplify setup** — eliminate repetitive configuration.
2. **Standardize security** — enforce secure defaults across projects.
3. **Encourage modularity** — reusable components and helpers.
4. **Serve as a base for internal frameworks** — easily fork for different projects.

---

## 🧩 Included Components

- 🔒 **Security Hooks:** automatic escaping, strict headers, and CSRF enforcement.
- 🧰 **Helpers:** login limitation, safe form utilities, input sanitization.
- 🧠 **Libraries:** preloaded session, input validation, and authentication base.
- 🧾 **Config templates:** ready-to-edit `config.php`, `database.php`, and Docker env.
- 🧱 **Example structure:** minimal but scalable folder layout.

---

## 🧰 Recommended Use Cases

- Admin dashboards or internal systems
- Microfinance or ERP back-office tools
- API backends for mobile or web apps
- Internal company frameworks (e.g., _NBA Base_)

---

## 🧩 Developer Benefits

- Faster setup time for new projects
- Consistent security and performance tuning
- Easily extendable for login, CRUD, and API modules
- Ideal for teams maintaining multiple CI apps

---

## 🧭 Next Steps

1. Configure environment and database.
2. Customize the project name and namespace.
3. Set up `EscapeInput` and `SecurityHeaders` hooks.
4. Test login limiter and session persistence.

---

## 🧱 Example Naming

You can rename this boilerplate to fit your organization’s identity:

- **IgniteBase** – General developer-friendly name
- **NBA Base** – Internal corporate naming for microfinance projects
- **CoreIgniter** – Custom core for your team’s standard

---

## 📄 License

This boilerplate is free to use internally or for private projects. You may rename and customize it as part of your organization’s framework standard.
