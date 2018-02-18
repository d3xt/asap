<?php

require_once('AsapPage.php');

class Asap {

    /**@var string $url */
    public $url;

    /** @var string $rootDir */
    protected $rootDir;

    function __construct($url) {
        $this->rootDir = dirname(__DIR__);
        $this->url = $url;
        //$this->filename = $this->rootDir . preg_replace('#(\?.*)$#', '', $url);
    }

    /**
     * @return AsapPage[]
     */
    public function getAllPages() {
        $pageDir = $this->rootDir . DIRECTORY_SEPARATOR . 'pages';
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
            echo $filepath;
            if (is_file($filepath)) $pages[] = new AsapPage($filepath);
        }
        return $pages;
    }
}