<?php

require_once('AsapConfig.php');
require_once('AsapPage.php');

class AsapPage404 extends AsapPage {

    function __construct() {
        $config = AsapConfig::getInstance();
        parent::__construct($config->getPagesDir() . DIRECTORY_SEPARATOR . '404.php');
    }

    /** @return string[] */
    public function getHttpHeaders() {
        $headers = parent::getHttpHeaders();
        $headers['status'] = 404;
        return $headers;
    }

}
