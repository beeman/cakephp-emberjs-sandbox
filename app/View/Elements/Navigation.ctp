<div class="navbar navbar-default">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <?php echo $this->Html->link('CakePHP & EmberJS Sandbox', '/', array('class' => 'navbar-brand')); ?>
    </div>
    <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
            <li><?php echo $this->Html->link('TodoMVC', array('controller' => 'todos', 'action' => 'todomvc', 'admin' => false)); ?></li>
            <li><?php echo $this->Html->link('Admin', array('controller' => 'todos', 'action' => 'index', 'admin' => true)); ?></li>
        </ul>
    </div>
</div>