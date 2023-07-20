<?php

$todos = [];
if (file_exists('todo.json')) {
  $todos = file_get_contents('todo.json');
  $todos = json_decode($todos, true);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo Form</title>
  <!-- Add Bootstrap CSS link here -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h2 class="card-title text-center mb-4">Todo Form</h2>
            <form action="addtodo.php" method="POST">
              <div class="form-group">
                <label for="todo">Todo Item:</label>
                <input type="text" class="form-control" id="todo" name="todo" placeholder="Enter todo item">
              </div>
              <div class="form-group">
                <label for="due-date">Due Date:</label>
                <input type="date" class="form-control" id="due-date" name="due-date">
              </div>
              <button type="submit" class="btn btn-primary btn-block">Add Todo</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="col">
      <h2 class="card-title text-center mb-4">Todos</h2>
      <ul class="list-group">
        <?php foreach ($todos as $todo_name => $todo) : ?>
          <li class="list-group-item"><?php echo $todo_name ?>
          <form action="delete.php" method="POST" style="display:inline;">
            <input type="text" hidden value="<?php echo $todo_name?>" name="todo">
            <button type=submit class="btn btn-outline-danger">Delete</button>
          </form>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>