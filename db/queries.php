<?php 

function select_from($content, $table){
  return "SELECT $content FROM $table";
}

function post_to($content, $table, $values){
  return "INSERT INTO $table($content[0], $content[1]) VALUES ('$values[0]', '$values[1]')";
}

?>