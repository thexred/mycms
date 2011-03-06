<?php
// загрузка CSS
//Cms::loadThemeCSS ("default.css");
Cms::flushCSS ();

// загрузка JS
//Cms::loadSystemJS ("jquery.js");
//Cms::flushJS ();
?>
<HTML>
<HEAD>
	<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=UTF-8">
</HEAD>
<BODY bgcolor="ffffff">

<div id="main" >
	<div id="logo">
		<?php $content->getBlock ('logo'); ?>
	</div>
	<div id="menu">
		<?php $content->getBlock ('menu'); ?>
	</div>
	<div id = "content">
		<?php $content->getBlock ('content'); ?>
	</div>
	<div id = "bottom">
		<?php $content->getBlock ('bottom'); ?>
	</div>
</div>


</BODY>
</HTML>