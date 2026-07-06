# LocalOps

> A portable Apache, PHP & MariaDB development environment for Windows with multi-PHP support, virtual hosts, SSL, and phpMyAdmin.

---

## ✨ Features

- Portable installation (no installer required)
- Apache HTTP Server 2.4
- Multi PHP version support
- MariaDB
- phpMyAdmin
- Wildcard SSL (*.dev.io)
- Virtual Host templates
- Easy PHP version switching
- Modular configuration
- Windows native

---

## 📦 Requirements

- Windows 10/11
- Apache HTTP Server
- PHP (Thread Safe)
- MariaDB
- phpMyAdmin
- mkcert

---

## 🚀 Installation

### 1. Download

Download:

- Apache HTTP Server
- MariaDB
- PHP (Thread Safe)
- phpMyAdmin

### 2. Extract

```text
C:\LocalOps
├── Apache24/
├── database/
├── php/
└── phpMyAdmin/
````

### 3. Clone LocalOpsExtender

```text
D:\LocalOpsExtender
```

### 4. Include LocalOps

Add to:

```apache
Apache24/conf/httpd.conf
```

```apache
Include "D:/LocalOpsExtender/apache24/conf/httpd.localops.ts.conf"
```

### 5. Generate SSL

Follow **MKCERT.md**

### 6. Validate

```powershell
& "C:\LocalOps\Apache24\bin\httpd.exe" -t
```

Expected:

```text
Syntax OK
```

### 7. Start Services

* Apache
* MariaDB

### 8. Create Your First Site

Create a Virtual Host inside:

```text
apache24/conf/sites-enabled/
```

Open:

```text
https://mysite.dev.io
```

---

## 📚 Documentation

* Installation Guide
* MKCERT.md
* httpd.localops.ts.conf.md
* site.conf.md
* CLI Handbook

---

## 📂 Project Structure

```text
LocalOps/
├── Apache24/
├── database/
├── php/
├── phpMyAdmin/
└── LocalOpsExtender/
```

---

## 🤝 Contributing

Contributions, issues, and feature requests are welcome.

---

## ❤️ Support LocalOps

If **LocalOps** saves you time, consider supporting its development.

<p align="center">
  <a href="https://chai.technotizia.com/">
    <img src="https://img.shields.io/badge/☕-Buy%20Me%20a%20Chai-FF6B35?style=for-the-badge&logo=buymeacoffee&logoColor=white" alt="Buy Me a Chai">
  </a>
</p>

Your support helps fund maintenance, bug fixes, new features, and future releases.

---

## 📄 License

Released under the MIT License.

