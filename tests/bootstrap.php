<?php
if (!$loader = @include __DIR__ . '/..//vendor/autoload.php') {
	die('You must set up the project dependencies, run the following commands:'.PHP_EOL.
			'curl -s http://getcomposer.org/installer | php'.PHP_EOL.
			'php composer.phar install'.PHP_EOL);
}

$loader->add('HiPay\\', __DIR__ );
$loader->add('Unit\HiPay\\', __DIR__ );
$loader->add('Integration\HiPay\\', __DIR__ );
$loader->add('End2end\HiPay\\', __DIR__ );
//echo(print_r($loader->getPrefixes(),true).chr(10));
//die(print_r($loader->getPrefixesPsr4(),true).chr(10));

Dotenv\Dotenv::createImmutable(__DIR__)->safeLoad();