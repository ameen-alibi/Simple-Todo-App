<?php

$todo = trim(htmlspecialchars($_POST['todo']));

if ($todo) {
  if (file_exists('todo.json')) {
    $todos = file_get_contents('todo.json');
    $todos = json_decode($todos, true);
  } else {
    $todos = [];
  }
  $todos[$_POST['todo']] = ['completed' => false];
  file_put_contents('todo.json', json_encode($todos, JSON_PRETTY_PRINT));
}
header("Location:index.php");
