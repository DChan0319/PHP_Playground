<?php 

function select_from_where($content, $table, $values){
  return "SELECT $content FROM $table WHERE name='$values[0]' and password='$values[1]'";
}

function post_to($content, $table, $values){
  return "INSERT INTO $table($content[0], $content[1]) VALUES ('$values[0]', '$values[1]')";
}

?>