<?php

class AsapConfig {
    /** @var string $rootDir */
    public $rootDir;

    /** @var AsapConfig $instance */
    private static $instance;

    function __construct() {
        $this->rootDir = dirname(__DIR__);
    }

    /** @return string */
    public function getPagesDir() {
        return $this->rootDir . DIRECTORY_SEPARATOR . 'pages';
    }

    /** @return string */
    public function getPostsDir() {
        return $this->rootDir . DIRECTORY_SEPARATOR . 'posts';
    }

    /** @return AsapConfig */
    public static function getInstance() {
        if (!AsapConfig::$instance) {
            AsapConfig::$instance = new AsapConfig();
        }

        return AsapConfig::$instance;
    }
}