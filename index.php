<?php

require_once('asap/Asap.php');

// 0. Instantiate Asap and bootstrap
// 1. List all posts and pages
// 2. Figure out if request is for a Post or Page
// 3. Load the AsapPost or AsapPage reffered
// 4. Trigger load event
// 5. Generate the html
// 6. Send the html

$asap = new Asap($_SERVER['REQUEST_URI']);

$pages = $asap->getAllPages();
var_dump($pages);

die();
$page = $asap->getCurrentPage();

$asap->trigger('load', $page);

$html = $page->render();

echo $html;
die();