<?php

use TexLab\MyDB\DB;
use TexLab\MyDB\Runner;
use App\Core\Conf;

require __DIR__."/../vendor/autoload.php";

$file = file_get_contents(__DIR__.'/db.sql');
$mySQLConnectData = Conf::MYSQL;

unset($mySQLConnectData['dbname']);

class NewRunner extends Runner {
    protected function errorHandler(array $error)
    {
        // print_r($error);
    }
}

$run = new NewRunner(DB::Link($mySQLConnectData));

foreach (explode(';', $file) as $value) {

    if (!empty($value)) {
        $run->runSQL($value);
    }
}
