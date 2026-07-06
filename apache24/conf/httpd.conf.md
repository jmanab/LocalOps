# `httpd.localops.ts.conf`
It is actually **Extender of httpd.conf**.  
A centralized LocalOps configuration for PHP, phpMyAdmin, and Virtual Hosts.
1) Go to : `{path_to_apache}\conf\httpd.conf`.
2) Add at bottom  : `Include "{path_to_extender}/httpd.localops.ts.conf.conf"`.

---

## Responsibilities

* Configure the active PHP version
* Load the PHP Apache module
* Set the PHP configuration (`PHPIniDir`)
* Register the phpMyAdmin alias
* Define global Virtual Host variables
* Load all site vHost configurations

---

## PHP Configuration

Set the default PHP version by changing:

```apache
Define ACTIVE_PHP "${PHP84}"
```

Available versions:

```apache
Define PHP83 "php-8.3.31-Win32-vs16-x64"
Define PHP84 "php-8.4.23-Win32-vs17-x64"
Define PHP85 "php-8.5.8-Win32-vs17-x64"
```

> Keep the PHP folder names unchanged so `ACTIVE_PHP` resolves correctly.

---

## phpMyAdmin

Accessible at:

```text
http://localhost/phpmyadmin
```

Configured using:

```apache
Alias /phpmyadmin "C:/LocalOps/phpMyAdmin"
```

---

## Virtual Host Settings

Global variables available to every LocalOps vHost:

| Variable         | Default                                       |
| ---------------- | --------------------------------------------- |
| `LOCAL_TLD`      | `.dev.io`                                     |
| `VHOST_TEMPLATE` | `{root}/apache24/conf/templates` |

---

## Loading Virtual Hosts

All site configuration files are loaded automatically using:

```apache
Include "{root}/apache24/conf/sites-enabled/*/*.conf"
```

### Default Include Path

```text
apache24/conf/sites-enabled/*/*.conf
```

### Limitation

Only `.conf` files inside subfolders are loaded.

```text
apache24/conf/sites-enabled/*.conf
```

is **not** included by default.

### Optional

To load both root-level and subfolder configuration files, add:

```apache
Include "{root}/apache24/conf/sites-enabled/*.conf"
```

This will load:

```text
apache24/conf/sites-enabled/*.conf
apache24/conf/sites-enabled/*/*.conf
```

