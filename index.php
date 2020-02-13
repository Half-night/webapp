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

ClassMap::load(FRAMEWORK_DIR . '/config/class_map.php');
ClassMap::load(APP_DIR . '/config/class_map.php');
//d(ClassMap::getAll());

Config::load(APP_DIR . '/config/settings.php');

$app = new App();
$app->run();


$end_time = microtime(true);
echo PHP_EOL . ($end_time - $start_time);