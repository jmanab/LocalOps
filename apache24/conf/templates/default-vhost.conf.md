# `default-vhost.conf`

The default Virtual Host template used by LocalOps.

Every site inherits this configuration, so individual vHost files only need to define:

* `DOMAIN_NAME`
* `DOMAIN_DOC_ROOT`
* `LOCAL_DOMAIN`

---

## Features

* HTTP (`:80`) and HTTPS (`:443`) Virtual Hosts
* Automatic HTTP → HTTPS redirection
* Wildcard subdomain support
* Shared SSL certificate
* Per-site access and error logs
* `AllowOverride All` for `.htaccess` support

---

## Directory Configuration

```apache
<Directory "${DOMAIN_DOC_ROOT}">
    Options +Indexes +FollowSymLinks
    AllowOverride All
    Require all granted
</Directory>
```

Grants Apache access to the project directory and enables `.htaccess`.

---

## HTTP Virtual Host

* Listens on **Port 80**
* Uses `${LOCAL_DOMAIN}` as the hostname
* Redirects all requests to HTTPS

---

## HTTPS Virtual Host

* Listens on **Port 443**
* Uses the same document root
* Enables SSL using the shared wildcard certificate

```apache
SSLCertificateFile "{root}/apache24/certs/wildcard.dev.io.pem"
SSLCertificateKeyFile "{root}/apache24/certs/wildcard.dev.io-key.pem"
```

---

## Log Files

Each site automatically gets its own log files.

```text
logs/${LOCAL_DOMAIN}-access.log
logs/${LOCAL_DOMAIN}-error.log
```

Example:

```text
logs/mysite.dev.io-access.log
logs/mysite.dev.io-error.log
```

---

## Variables

| Variable          | Description                  |
| ----------------- | ---------------------------- |
| `DOMAIN_DOC_ROOT` | Website root directory       |
| `LOCAL_DOMAIN`    | Fully qualified local domain |

---

## Note

This is a **shared template** for all LocalOps sites.

Avoid making site-specific changes here. Instead, configure individual sites in their own vHost files under:

```text
apache24/conf/sites-enabled/
```
