<?php
// config start
$projectName = 'Noah';
// config end

require 'vendor/markdown.php';
require 'markdown.php';
$titleAndHeads = Markdown::parseFiles();
if (!empty($_GET['file'])) {
	$content = Markdown::parseFile($_GET['file']);
}

require 'view.php';
