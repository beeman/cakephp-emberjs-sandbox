<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $this->Html->charset(); ?>
    <title><?php echo $title_for_layout; ?></title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    echo $this->Html->meta('icon');
    echo $this->Html->css(array('bootstrap.min.css', 'app.css'));
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">
    <?php echo $this->Element('Navigation'); ?>

    <?php echo $this->Session->flash(); ?>
    <?php echo $this->fetch('content'); ?>

</div>
<?php
echo $this->element('sql_dump');

echo $this->Html->script(array(
    "libs/jquery-1.10.2.min.js",
    "libs/bootstrap.min.js",
));
?>
</body>
</html>
