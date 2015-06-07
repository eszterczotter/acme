<?php

require 'autoload.php';

$application = Acme\Application\Application::create(__DIR__ . '/..');

$application->bootstrap();

$application->debug();

return $application;
