<?php

require_once('AsapConfig.php');

class AsapPage {

    /** @var string $filepath */
    public $filepath;

    /** @var string $url */
    public $url;

    /**
     * @param string $filepath
     */
    function __construct($filepath) {
        $this->filepath = $filepath;
        $this->url = $this->formatFilepathToUrl($filepath);
    }

    /** @return string */
    public function getUrl() {
        return $this->url;
    }

    /**
     * @param string $filepath
     * @return string
     */
    private function formatFilepathToUrl($filepath) {
        $config = AsapConfig::getInstance();
        $pagesDir = $config->getPagesDir();
        $postsDir = $config->getPostsDir();

        if (strpos($filepath, $pagesDir) === 0) {
            $filepath = substr($filepath, strlen($pagesDir));
        }

        if (strpos($filepath, $postsDir) === 0) {
            $filepath = substr($filepath, strlen($postsDir));
        }

        $lenToFirstDot = strpos($filepath, '.');
        return substr($filepath, 0, $lenToFirstDot);
    }

    /** @return boolean */
    public function isPage() {
        return true;
    }

    /** @return boolean */
    public function isPost() {
        return false;
    }

    /** @return string[] */
    public function getHttpHeaders() {
        return array();
    }

    /** @return string */
    public function render() {
        ob_start();
        include($this->filepath);
        return ob_get_clean();
    }
}