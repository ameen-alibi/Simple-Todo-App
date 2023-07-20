<?php 

$todos = file_get_contents('todo.json');

$todos = json_decode($todos,true);

if (array_key_exists(htmlspecialchars($_POST['todo']),$todos)){
  unset($todos[htmlspecialchars($_POST['todo'])]);
}


file_put_contents('todo.json',json_encode($todos,JSON_PRETTY_PRINT));

header('Location:index.php');