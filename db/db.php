<?php 
  function connect_to_db(){
    return $connection = new mysqli('localhost', 'root', '', 'php');
  }
?>