<?php
namespace src\controllers;

use \core\Controller;
use \core\murano\DB;
use \src\handlers\UserHandler;

class DashboardController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }


    public function index() {

    }

}