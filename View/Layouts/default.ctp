<!DOCTYPE html>
<html>
    <head>
        <title>
            DiskLibra |
            <?php echo $this->fetch('title'); ?>
        </title>
        <?php
        echo $this->Html->charset();
        echo $this->Html->meta('icon');
        echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');

        echo $this->Html->css('bootstrap.min');
        echo $this->Html->css('default');
        echo $this->Html->css('option');
        echo $this->Html->css('font-awesome.min');        
        ?>
    </head>
    <body>
        <div id="content">
            <?php echo $this->Session->flash(); ?>
            <?php echo $this->fetch('content'); ?>
        </div>
    </body>
</html>