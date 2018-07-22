<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require('constant.php');
require('database.php');

if (!isset($_GET['keyword'])) {
	die();
}
$keyword = $_GET['keyword'];
$data = array("alpaca", "buffalo", "cat", "tiger");
$data = searchForKeyword($keyword);
echo json_encode($data);
if (!isset($_GET['keyword1'])) {
	die();
}
$keyword1 = $_GET['keyword1'];
$data1 = searchForKeyword1($keyword1);
echo json_encode($data1);
?>