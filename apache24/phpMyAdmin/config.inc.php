<?php
declare(strict_types=1);

/**
 * -------------------------------------------------------------
 * LocalOps phpMyAdmin Configuration
 * -------------------------------------------------------------
 * Local Development Only
 * Auto Login (No Login Screen)
 * -------------------------------------------------------------
 */

$cfg['blowfish_secret'] = 'cfwxbj1cpZ8Id271QKsLWSy9bOpOOT9j';

$i = 0;
$i++;

/* -------------------------------------------------------------
 * Server
 * ------------------------------------------------------------- */

$cfg['Servers'][$i]['auth_type'] = 'config';

$cfg['Servers'][$i]['host'] = '127.0.0.1';
$cfg['Servers'][$i]['port'] = '3306';

$cfg['Servers'][$i]['user'] = 'root';
$cfg['Servers'][$i]['password'] = '';

$cfg['Servers'][$i]['AllowNoPassword'] = true;
$cfg['Servers'][$i]['compress'] = false;

/* -------------------------------------------------------------
 * UI
 * ------------------------------------------------------------- */

$cfg['DefaultLang'] = 'en';
$cfg['DefaultConnectionCollation'] = 'utf8mb4_unicode_ci';

$cfg['UploadDir'] = '';
$cfg['SaveDir'] = '';
$cfg['TempDir'] = 'D:/LocalOpsExtender/temp/phpmyadmin';