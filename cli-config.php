<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;

$app = require_once __DIR__ . '/bootstrap/application.php';

$doctrine = $app->container()->get('doctrine');

return ConsoleRunner::createHelperSet($doctrine);
