#!/usr/bin/env php
<?php
declare(strict_types=1);

use OhceKata\OutsideIn\Input\CliInput;
use OhceKata\OutsideIn\Ohce;
use OhceKata\OutsideIn\Output\CliOutput;

require_once __DIR__ . '/../../vendor/autoload.php';

$name = isset($argv[1]) ? trim($argv[1]) : '';

if ($name === '') {
    fwrite(STDERR, 'Please, provide a name as an argument.');

    exit(255);
}

$input = new CliInput();
$output = new CliOutput();
$time = new DateTime();

$app = new Ohce($input, $output, $time);
$app->run($name);
