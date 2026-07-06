# LocalOps Installation Guide

This guide assumes a fresh installation on **Windows**.

---

## 1. Download Required Software

Download the latest ZIP packages for:

* **Apache HTTP Server** (2.4.x)
* **MariaDB**
* **PHP** (Thread Safe)
* **phpMyAdmin**

---

## 2. Extract Files

Extract everything under `C:\LocalOps`.

```text
C:\LocalOps
├── Apache24/
├── database/
│   └── MariaDB/
├── php/
│   ├── php-8.3.x/
│   ├── php-8.4.x/
│   └── php-8.5.x/
└── phpMyAdmin/
```

---

## 3. Clone LocalOpsExtender

Clone this repository and place it anywhere (recommended: `D:\LocalOpsExtender`).

```text
LocalOpsExtender/
└── apache24/
    ├── certs/
    ├── conf/
    │   ├── httpd.localops.ts.conf
    │   ├── sites-enabled/
    │   └── templates/
    ├── php/
    └── phpMyAdmin/
```

---

## 4. Update Configuration

### Apache

Edit:

```text
Apache24/conf/httpd.conf
```

Add the LocalOpsExtender include:

```apache
Include "D:/LocalOpsExtender/apache24/conf/httpd.localops.ts.conf"
```

### phpMyAdmin

Edit:

```text
phpMyAdmin/config.inc.php
```

Update the LocalOps configuration paths as required.

---

## 5. Generate SSL Certificates

Generate the wildcard certificate by following **MKCERT.md**.

This creates:

```text
wildcard.dev.io.pem
wildcard.dev.io-key.pem
```

---

## 6. Configure Paths

Update all required paths inside:

* `httpd.localops.ts.conf`
* `php.ini`
* `config.inc.php`

Ensure they match your installation directories.

---

## 7. Validate Apache

Run:

```powershell
& "C:\LocalOps\Apache24\bin\httpd.exe" -t
```

Expected output:

```text
Syntax OK
```

---

## 8. Start Services

Once Apache validates successfully, start the required services.

* Apache
* MariaDB

---

## 9. Create Your First Site

Create a new vHost configuration inside:

```text
apache24/conf/sites-enabled/{project}/
```

using the provided template.

---

## 10. Verify

Open your site:

```text
https://mysite.dev.io
```

If everything is configured correctly, the site should load over HTTPS without certificate warnings.

---

## Next Steps

* Read **MKCERT.md** for SSL setup.
* Read **httpd.localops.ts.conf.md** for global configuration.
* Read **default-vhost.conf.md** for Virtual Host templates.
* Use the **CLI Handbook** for starting, stopping, and managing LocalOps services.
