<?php

namespace App\Core;

class Conf
{
    const MYSQL = [
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'dbname' => 'dbdom'
    ];
    const DEFAULT_CONTROLLER = 'Site';
    const DEFAULT_ACTION = 'LoginForm';
    const DEFAULT_PLAIN_LAYOUT = 'templates/_layouts/plainLayout.php';
    const DEFAULT_LAYOUT = 'templates/_layouts/mainLayout.php';
    const DEFAULT_PATTERNS_PATH = 'templates/site/';
    const CLEAN_URL = false;
}
