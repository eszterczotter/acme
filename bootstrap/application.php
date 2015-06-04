<?php

require 'autoload.php';

$application = Acme\Application\Application::create(__DIR__ . '/..');

$application->bootstrap();

return $application;
