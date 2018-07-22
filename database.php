<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getDbConnection() {
  $db = new PDO(DB_DRIVER . ":dbname=" . DB_DATABASE . ";host=" . DB_SERVER . ";charset=utf8", DB_USER, DB_PASSWORD);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  return $db;
}


// This is the 'search' function that will return all possible rows starting with the keyword sent by the user
function searchForKeyword($keyword) {
    $db = getDbConnection();
   /*$stmt = $db->prepare("SELECT location as country FROM `population` WHERE location LIKE ? ORDER BY country");*/
    $stmt = $db->prepare("SELECT slug as country FROM `population` WHERE slug LIKE ? ORDER BY country");
    //$smt=$db->prepare("select * from population");
     $keyword = $keyword . '%';
    $stmt->bindParam(1, $keyword, PDO::PARAM_STR, 100);
    $isQueryOk = $stmt->execute();
      $results = array();
    if ($isQueryOk) {
      $results = $stmt->fetchAll(PDO::FETCH_COLUMN);
    } else {
      trigger_error('Error executing statement.', E_USER_ERROR);
    }
    $db = null; 
    return $results;
}
      //db_close();
?>