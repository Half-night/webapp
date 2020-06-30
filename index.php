<?php

$start_time = microtime(true);

require_once '_dev/dev_init.php';
require_once 'init.php';
require_once FRAMEWORK_DIR . '/init.php';
require_once APP_DIR . '/init.php';
require_once FRAMEWORK_DIR . '/core/ClassMap.php';

spl_autoload_register(function($class) {
    ClassMap::requireClass($class);
});

ClassMap::generate(FRAMEWORK_DIR);
ClassMap::generate(APP_DIR);

Config::load(APP_DIR . '/config/settings.php');


$app = new App();
$app->run();

$end_time = microtime(true);
echo PHP_EOL . ($end_time - $start_time);
