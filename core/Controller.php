<?php
namespace core;

use \src\Config;
class Controller {

    protected function redirect($url) {
        header("Location: ".$this->getBaseUrl().$url);
        
        exit;
    }

    public function getBaseUrl() {
        $base = (isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') ? 'https://' : 'http://';
        $base .= $_SERVER['SERVER_NAME'];
        if($_SERVER['SERVER_PORT'] != '80') {
            $base .= ':'.$_SERVER['SERVER_PORT'];
        }
        $base .= Config::BASE_DIR;
        
        return $base;
    }

    public function base(){
        $base = self::getBaseUrl();
        return $base;
    }

    private function _render($folder, $viewName, $viewData = []) {
        if(file_exists('../src/views/'.$folder.'/'.$viewName.'.php')) {
            
            extract($viewData);
            $render = fn($vN, $vD = []) => $this->renderPartial($vN, $vD);
            $base = $this->getBaseUrl();
            require '../src/views/'.$folder.'/'.$viewName.'.php';

        }
    }

    private function renderPartial($viewName, $viewData = []) {
        $this->_render('', $viewName, $viewData);
    }

    public function render($viewName, $viewData = []) {
        $this->_render('pages', $viewName, $viewData);
    }

    public function returnPage(){
        header("Location: ".$_SERVER['HTTP_REFERER']."");
        exit;
    }

    public static function dd($code){
        echo '<pre>';
        print_r($code);
        echo '</pre>';
        exit;
    }
    public static function d($code){
        echo '<pre>';
        print_r($code);
        echo '</pre>';
    }

}