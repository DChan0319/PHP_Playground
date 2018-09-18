<?php 
  function connect_to_db(){
    return new mysqli('localhost', 'root', '', 'php');
  }
?>