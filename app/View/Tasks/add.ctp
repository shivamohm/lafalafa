<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Tasks'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link('Add Task',   array('controller' => 'Tasks', 'action' => 'add')); ?></li>
		
	</ul>
</div>
<div class="tasks form">
<?php echo $this->Form->create('Task');?>
<?php 
$options = array(""=>"--Select--","Y"=>"Active", "N"=>"In-Active");
?>
<?php #echo $this->Form->create('User', array('action' => 'login')); ?>
	<fieldset>
		<legend><?php echo __('Add Task'); ?></legend>
	<?php
		echo $this->Form->input('user_id', array('type' => 'hidden', 'value'=>$this->UserAuth->getGroupId()));
		echo $this->Form->input('user_name', array('type' => 'hidden', 'value'=>$this->UserAuth->getGroupName()));
		echo $this->Form->input('title');
		echo $this->Form->input('desc');
	echo $this->Form->input('status', array('options' => $options, 'default' => '--Select--'));
		
	
		#echo $this->Form->input('comments');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
