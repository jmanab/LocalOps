# mkcert Guide

LocalOps uses **mkcert** to generate trusted SSL certificates for local development.

---

## Prerequisites

* `mkcert`
* `nss` *(required for Firefox support)*

---

## Install

Using Winget:

```powershell
winget install FiloSottile.mkcert
winget install Mozilla.NSS
```

Verify installation:

```powershell
mkcert -version
```

---

## Install Local CA

Run once on your machine:

```powershell
mkcert -install
```

This installs the local Certificate Authority into the system trust store.

---

## Generate Wildcard Certificate

Navigate to the certificates directory:

```powershell
cd {root}\apache24\certs
```

Generate the certificate:

```powershell
mkcert -cert-file wildcard.dev.io.pem `
-key-file wildcard.dev.io-key.pem `
"*.dev.io" "dev.io"
```

Generated files:

```text
wildcard.dev.io.pem
wildcard.dev.io-key.pem
```

---

## Apache Configuration

Reference the generated certificates:

```apache
SSLCertificateFile "{root}/apache24/certs/wildcard.dev.io.pem"
SSLCertificateKeyFile "{root}/apache24/certs/wildcard.dev.io-key.pem"
```

---

## Test

Open any LocalOps site:

```text
https://mysite.dev.io
```

The browser should display a **trusted** HTTPS connection with no certificate warnings.

---

## Regenerate Certificate

Delete the existing certificate files and run:

```powershell
mkcert -cert-file wildcard.dev.io.pem `
-key-file wildcard.dev.io-key.pem `
"*.dev.io" "dev.io"
```

---

## Uninstall Local CA

Remove the local Certificate Authority:

```powershell
mkcert -uninstall
```
