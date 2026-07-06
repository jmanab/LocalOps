# LocalOps vHost Configuration

Each site only defines its own name and document root. Everything else is inherited from the centralized LocalOps template.

## Configuration

```apache
# ==================================================
# LocalOps Virtual Host
# ==================================================

Define DOMAIN_NAME "mysite"
Define DOMAIN_DOC_ROOT "D:/Projects/mysite"

Define LOCAL_DOMAIN "${DOMAIN_NAME}${LOCAL_TLD}"

Include "${VHOST_TEMPLATE}/default-vhost.conf"

# ==================================================
```

## Variables

| Variable          | Description                                         |
| ----------------- | --------------------------------------------------- |
| `DOMAIN_NAME`     | Site name (without the TLD)                         |
| `DOMAIN_DOC_ROOT` | Absolute path to the project                        |
| `LOCAL_DOMAIN`    | Generated automatically (`DOMAIN_NAME + LOCAL_TLD`) |

## Global Configuration

These values are provided by LocalOps and should not be changed in individual vHost files.

| Variable         | Default                                       |
| ---------------- | --------------------------------------------- |
| `LOCAL_TLD`      | `.dev.io`                                     |
| `VHOST_TEMPLATE` | `apache24/conf/templates` |


## Note

The `Include` directive is defined in:

`apache24/conf/httpd.localops.ts.conf`

**Default Include Path**

`apache24/conf/sites-enabled/{any_folder}/*.conf`

**Limitation**

Only `.conf` files inside subfolders are loaded. Files placed directly under:

`apache24/conf/sites-enabled/*.conf`

are **not** included.

**Optional**

To load both root-level and subfolder configuration files, add the following `Include` directive to `httpd.localops.ts.conf`:

```apache
Include "apache24/conf/sites-enabled/*.conf"
Include "apache24/conf/sites-enabled/*/*.conf"
```

This enables Apache to load:

* `apache24/conf/sites-enabled/*.conf`
* `apache24/conf/sites-enabled/{any_folder}/*.conf`

