<?php
/**
 * Created by PhpStorm.
 * User: maunil
 * Date: 25-10-2016
 * Time: 20:05
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH."third_party/PHPExcel.php";

class Excel extends PHPExcel {
    public function __construct() {
        parent::__construct();
    }
}