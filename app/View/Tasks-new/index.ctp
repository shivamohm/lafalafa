<style>
	tr.yellow td {
		background: #FFC;
	}
</style>
<?php //echo $group;?>

<div class="actions">
	<h3><?php echo __('Actions');?></h3>
	<ul>
		<li>
			<?php echo $this -> Html -> link(__('Published Deals'), array('controller' => 'deals', 'action' => 'index'));?>
		</li>
		<li>
			<?php echo $this -> Html -> link(__('New Deal'), array('controller' => 'deals', 'action' => 'add'));?>
		</li>
	</ul>
</div>
<div class="tasks index">
	<h2><?php echo __('In Process Deals');?></h2>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<!--<th><?php //echo $this->Paginator->sort('id');?></th>-->
			<th><?php echo $this -> Paginator -> sort('deal_id');?></th>
                        <th><?php echo $this -> Paginator -> sort('Category');?></th>
			<th><?php echo $this -> Paginator -> sort('price');?></th>
			<th><?php echo $this -> Paginator -> sort('vendor');?></th>
			<th><?php echo $this -> Paginator -> sort('assigned');?></th>
			<!--			<th><?php //echo $this->Paginator->sort('assigned_to');?></th>-->
			<th><?php echo $this -> Paginator -> sort('status');?></th>
			<!--                        <th><?php echo $this->Paginator->sort('vendorstatus');?></th>-->
			<th class="actions"><?php echo __('Actions');?></th>
		</tr>
                
                
                  <?php echo $this->Form->create('Task', array('url' => array_merge(array('action' => 'index'), $this->params['pass']), 'name'=>'Task')); ?>
        
        <tr class="filters">
			<td><?php echo $this->Form->input('shorttitle', array('type'=>'text','div' => false,'label'=>'','size'=>'10'));?></td>
                        <td><?php echo $this->Form->input('categories', array('label'=>'','div' => false,'empty'=>'-- Select --'));?></td>
                        <td><?php echo $this->Form->input('price', array('type'=>'text','div' => false,'label'=>'','size'=>'10'));?></td>
                          <td><?php echo $this -> Form -> input('vendor', array('label' => '', 'div' => false ,'empty'=>'-- Select --'));?></td>
                          <td><?php //echo $this->Form->input('assigned', array('type'=>'text','div' => false,'label'=>'','size'=>'10'));?></td>
			  <td><?php echo $this->Form->input('status', array('label'=>'', 'div' => false, 'type' => 'select', 'options' => array('Work in progress'=>'Work in progress','Pending'=>'Pending','Rework'=>'Rework','Review'=>'Review','Approved'=>'Approved','Reject'=>'Reject'),'empty'=>'All'));?></td>
 
                        <td class="actions">
                            <?php 
                           echo $this -> Html -> link(__('Search'), 'javascript:void(0)', array("onclick" => "Task.submit();", "class" => "search-action"));
                            echo $this->Form->end();
                            ?></td>
        </tr>
                
                
                
		<?php
//pr($tasks);
foreach ($tasks as $task):
//pr($task['Deal']['Category']);
echo $uid = $this->UserAuth->getUserId();
echo $groupid = $this->UserAuth->getGroupId();

if($uid!=$task['Task']['assigned_to']){
    
    pr($task);

$act= "TO : ". $task['AsignTo']['username'].'<strong>('.$this->Common->getrolename($task['Task']['assigned_to']).')</strong>';
}elseif($uid!=$task['Task']['assigned_from']){
$act= "From : ". $task['AsignFrom']['username'].'<strong>('.$this->Common->getrolename($task['Task']['assigned_from']).')</strong>';
}else{
$act="";
}

		?>
		<tr class="yellow">
			<td><?php if($groupid!='2'){echo $this -> Html -> link($task['Deal']['shorttitle'], array('controller' => 'deals', 'action' => 'edit', $task['Task']['deal_id']));}else{ echo $task['Deal']['shorttitle'];}?></td>
                        <td><?php echo h($task['Deal']['Category']['0']['name']);?></td>
			<td><?php echo h($task['Deal']['price']);?></td>
			<td><?php
			//echo $act;
			//pr($task['Deal']['Vendor']);
			if (count($task['Deal']['Vendor']) == '1') {
				$temp_val = h($task['Deal']['Vendor']['0']['name']);
				echo '<span title="' . $temp_val . '" class="tiptip">' . $temp_val . '</span>';
				$temp_val = null;
			} else {
				foreach ($task['Deal']['Vendor'] as $vendor) {

					$names = $names . ' ' . $vendor['name'];

				}

				echo '<span title="' . $names . '" class="tiptip">Multi Vendors</span>';
				$names = null;
			}
			?></td>
			<td><?php
			echo $act;
			?></td>
			<!--                <td>
			<?php //echo h($task['AsignFrom']['username']); ?>
			<?php //echo  '<strong>('.$this->Common->getrolename($task['Task']['assigned_from']).')</strong>';?>

			</td>
			<td>
			<?php //echo h($task['AsignTo']['username']); ?>
			<?php //echo  '<strong>('.$this->Common->getrolename($task['Task']['assigned_to']).')</strong>';?>

			</td>-->
			<td><?php echo h($task['Task']['status']);?>&nbsp;</td>
			<!--                <td><?php //echo h($task['Task']['vendorstatus']); ?>&nbsp;</td>-->
			<td class="actions"><?php
                        //echo $this->Html->link($this->Html->image("stp.png", array('border'=>'0px','title'=>'View page')),array('controller' => 'tasks', 'action' => 'edit'),array('escape'=> false));
                        
                        echo $this -> Html -> link($this->Html->image("preview.png", array('border'=>'0px','title'=>'Preview Deal')), array('controller' => 'deals', 'action' => 'preview', $task['Task']['deal_id']),array('escape'=> false));
                        
                        
                        if($groupid!='2'){
                            echo $this -> Html -> link($this->Html->image("view.png", array('border'=>'0px','title'=>'View Deal')), array('controller' => 'deals', 'action' => 'view', $task['Task']['deal_id']),array('escape'=> false));  
                            echo $this -> Html -> link($this->Html->image("edit.png", array('border'=>'0px','title'=>'Edit Deal')), array('controller' => 'deals', 'action' => 'edit', $task['Task']['deal_id']),array('escape'=> false));}
                        
			if ($group == '5') {
                                echo $this -> Html -> link($this->Html->image("copy.png", array('border'=>'0px','title'=>'Copy Deal')), array('controller'=>'deals','action' => 'copydeal', $task['Task']['deal_id']),array('escape'=> false));
				if ($task['Task']['assigned_to'] == $uid) {
					echo $this -> Html -> link($this->Html->image("stp.png", array('border'=>'0px','title'=>'Send To Production')), array('controller' => 'tasks', 'action' => 'edit', $task['Task']['id'], 'P', 'pending'), array('escape'=> false,'class' => 'cb_popup', 'title' => 'Send To Production'));
                                        
					echo $this -> Html -> link($this->Html->image("stcm.png", array('border'=>'0px','title'=>'Send To Regional Head')), array('controller' => 'tasks', 'action' => 'edit', $task['Task']['id'], 'RH', 'pending'), array('escape'=> false,'class' => 'cb_popup', 'title' => 'Send To Regional Head'));

				}
			} elseif ($group == '4') {

				echo $this -> Html -> link($this->Html->image("publish.png", array('border'=>'0px','title'=>'Publish')), array('controller' => 'tasks', 'action' => 'edit', $task['Task']['id'], 'PB', 'Published'), array('escape'=> false,'class' => 'cb_popup', 'title' => 'Publish'));
if ($task['Task']['assigned_to'] == $uid) {
				if (count($task['Deal']['Vendor']) == '1') {
					echo $this -> Html -> link($this->Html->image("review.png", array('border'=>'0px','title'=>'Review To Vendor')),  array('controller' => 'tasks', 'action' => 'edit', $task['Task']['id'], 'V', 'Review'), array('escape'=> false,'class' => 'cb_popup', 'title' => 'Review To Vendor'));
				}
				echo $this -> Html -> link($this->Html->image("rtp.png", array('border'=>'0px','title'=>'Rework To Production')), array('controller' => 'tasks', 'action' => 'edit', $task['Task']['id'], 'P', 'Rework'), array('escape'=> false,'class' => 'cb_popup', 'title' => 'Rework To Production'));
				echo $this -> Html -> link($this->Html->image("rts.png", array('border'=>'0px','title'=>'Rework To Sales')),array('controller' => 'tasks', 'action' => 'edit', $task['Task']['id'], 'S', 'Rework'), array('escape'=> false,'class' => 'cb_popup', 'title' => 'Rework To Sales'));
			} }elseif ($group == '3') {

				echo $this -> Html -> link($this->Html->image("publish.png", array('border'=>'0px','title'=>'Publish')), array('controller' => 'tasks', 'action' => 'edit', $task['Task']['id'], 'PB', 'Published'), array('escape'=> false,'class' => 'cb_popup', 'title' => 'Publish'));
                                if ($task['Task']['assigned_to'] == $uid) {
				if (count($task['Deal']['Vendor']) == '1') {
					echo $this -> Html -> link($this->Html->image("review.png", array('border'=>'0px','title'=>'Review To Vendor')), array('controller' => 'tasks', 'action' => 'edit', $task['Task']['id'], 'V', 'Review'), array('escape'=> false,'class' => 'cb_popup', 'title' => 'Review To Vendor'));
				}
				echo $this -> Html -> link($this->Html->image("rtc.png", array('border'=>'0px','title'=>'Rework To Category Manager')), array('controller' => 'tasks', 'action' => 'edit', $task['Task']['id'], 'CM', 'Rework'), array('escape'=> false,'class' => 'cb_popup', 'title' => 'Rework To Category Manager'));
				echo $this -> Html -> link($this->Html->image("rts.png", array('border'=>'0px','title'=>'Rework To Sales')), array('controller' => 'tasks', 'action' => 'edit', $task['Task']['id'], 'S', 'Rework'), array('escape'=> false,'class' => 'cb_popup', 'title' => 'Rework To Sales'));

			}} elseif ($group == '2') {
                              
if ($task['Task']['assigned_to'] == $uid) {
				echo $this -> Html -> link($this->Html->image("reject.png", array('border'=>'0px','title'=>'Reject')), array('controller' => 'tasks', 'action' => 'edit', $task['Task']['id'], 'V', 'Reject'), array('escape'=> false,'class' => 'cb_popup', 'title' => 'Reject'));
				echo $this -> Html -> link($this->Html->image("approved.png", array('border'=>'0px','title'=>'Approved')), array('controller' => 'tasks', 'action' => 'edit', $task['Task']['id'], 'V', 'Approved'), array('escape'=> false,'class' => 'cb_popup', 'title' => 'Approved'));

}}
			?>
			&nbsp;</td>
		</tr>
		<?php endforeach;?>
	</table>
	<p>
		<?php
		echo $this -> Paginator -> counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));
		?>
	</p>
	<div class="paging">
		<?php
		echo $this -> Paginator -> prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this -> Paginator -> numbers(array('separator' => ''));
		echo $this -> Paginator -> next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		?>
	</div>
</div>
<script type="text/javascript">
	$(function() {
		$("a.cb_popup").colorbox({
			width : "550px",
			height : "500px",
			iframe : true,
			fastIframe : false,
			opacity : 0.8,
			onClosed : function() {
				//alert(window.location.href);
				//window.location.href = window.location.href;
			}
		});
	});

</script>