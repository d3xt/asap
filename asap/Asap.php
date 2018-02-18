<?php

require_once('AsapConfig.php');
require_once('AsapPage.php');
require_once('AsapPage404.php');

class Asap {
    /** @var string $url */
    public $url;

    /** @var AsapConfig $config */
    private $config;

    /**
     * @param string $url
     */
    function __construct($url) {
        $this->config = AsapConfig::getInstance();
        $this->url = $url;
        //$this->filename = $this->rootDir . preg_replace('#(\?.*)$#', '', $url);
    }

    /**
     * @return AsapPage[]
     */
    public function getAllPages() {
        $pageDir = $this->config->getPagesDir();
        $pages = $this->getPagesFromFolder($pageDir);
        return $pages;
    }

    /**
     * @param string $folder
     * @return AsapPage[]
     */
    private function getPagesFromFolder($folder) {
        $pages = array();
        foreach(scandir($folder) as $item) {
            if ($item == '.' || $item == '..') continue;
            $filepath = $folder . DIRECTORY_SEPARATOR . $item;
            if (is_file($filepath)) $pages[] = new AsapPage($filepath);
        }
        return $pages;
    }

    /** @return AsapPage */
    public function getCurrentPage() {
        $pages = $this->getAllPages();

        foreach($pages as $page) {
            if ($page->url === $this->url) return $page;
        }

        return new AsapPage404();
    }
}