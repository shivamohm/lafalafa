<?php #echo $form->create('Task');?>
<?php echo $this->Form->create('Tasks'); ?>
<fieldset>
<legend>Add New Task</legend>
<?php
echo $this->Form->input('title');

echo $this->Form->input('desc',array('id'=>'desc','label'=>array('id'=>'desc','text'=>'Details'),'type'=>'text'));
?>
</fieldset>
<?php echo $this->Form->end('Add Task');?>
<?php #echo $html->link('List All Tasks', array('action'=>'index')); ?>
