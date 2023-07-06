<?php

$config = new PhpCsFixer\Config();
return $config
	->setRiskyAllowed(true)
	->setIndent("\t")
	->setRules([
		'@PSR12' => true,
	])
	->setFinder(
		PhpCsFixer\Finder::create()
			// ->exclude([
			// 	'fuel/app/cache',
			// 	'fuel/app/config',
			// 	'fuel/app/lang',
			// 	'fuel/app/logs',
			// 	'fuel/app/migrations',
			// 	'fuel/app/modules',
			// 	'fuel/app/tasks',
			// 	'fuel/app/tests',
			// 	'fuel/app/themes',
			// 	'fuel/app/tmp',
			// 	'fuel/app/vendor',
			// 	'fuel/app/views',
			// 	'fuel/core',
			// 	'fuel/package',
			// 	'fuel/vendor',
			// ])
			// ->in(__DIR__)
			->in('./fuel/app/classes/')
	);
