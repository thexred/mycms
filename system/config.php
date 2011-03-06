<?php
$config = array (

	// Основные
	'system.state'			=> 0,		// блокировка системы: 0 открыто, 1 заблокировано
	'system.default.page'	=> "main",

	// Загрузка скриптов
	'script.css.load'	=> 2,	// 1 динамик, 2 статик
	'script.js.load'	=> 2,	// 1 динамик, 2 статик

	// Темы
	'theme.current'	=> "default",

	// Дополнительные классы
	'classloader.addons'	=> array (
				'JavaScriptPacker'	=> 'class.JavaScriptPacker.php',
				'ParseMaster'		=> 'class.JavaScriptPacker.php',
			),
);

return $config;
?>