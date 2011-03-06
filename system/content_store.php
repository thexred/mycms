<?php
	//								ID			 ORDER	 	SRC				BLOCK 			DATA
	$db_pages = array (
			'main'  	=> array (1 => "main",   2 => 1, 3 => "main.html", 4 => "content", 5 => null ),
			'news'  	=> array (1 => "news",   2 => 2, 3 => "news.html", 4=> "content", 5 => null ),
			'about' 	=> array (1 => "about",  2 => 3, 3 => "about.html",4=> "content", 5 => null ),
			'newspre'  	=> array (1 => "newspre",2 => 1, 3 => "newspre.html", 4=> "left", 5 => null ),
			'menu'  	=> array (1 => "menu",	 2 => 1, 3 => "menu.html", 4=> "head", 5 => null ),
		);
		
	// привязка модулей к страницам
	$db_modules = array (
			'main' 		=> array ('newspre', 'menu'),
			'news' 		=> array ('newspre', 'menu'),
			'about' 	=> array ('newspre', 'menu'),
		);

?>