<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $title_for_layout; ?></title>
    <?php

    echo $this->Html->css(array(
        "bootstrap.min.css",
        "app.css",
        "todomvc.css",
    ));

    echo $this->Html->script(array(
        "libs/jquery-1.10.2.min.js",
        "libs/handlebars-1.0.0.js",
        "libs/ember.js",
        "libs/ember-data.js",
        "libs/localstorage_adapter.js",
        "application.js",
        "router.js",
        "models/todo.js",
        "controllers/todos_controller.js",
        "controllers/todo_controller.js",
        "views/edit_todo_view.js",
    ));
    ?>
</head>
<body>

<?php echo $this->Element('Navigation'); ?>

<?php echo $this->fetch('content'); ?>
</body>
</html>