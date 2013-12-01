<?php echo $this -> Html -> script('jquery.validate.min').$this -> Html -> script('jquery.metadata'); ?>
<div class="tasks form">
	<div class="form-validations">
		<ol></ol>
	</div>
	<?php echo $this -> Form -> create('Task', array('name' => 'task'));?>
	<fieldset>
		<?php
		//pr($sel);
		//echo $this->Form->input('id');
		?>
<!--		<div class="input text required">
			<label for="VendorName">Send To</label>
			<?php
			//echo $this -> Ajax -> autoComplete_ui('Task.username', array('source' => $temp, 'select' => '$("[name=\'data[Task][username_h]\']").val(ui.item.id);', 'readonly' => 'readonly'));
                        
			
                        ?>
		</div>-->
		<div class="btnsColl">
			<?php
//                        if($this->request->params['pass']['2']=='Review'){
//                         echo $this -> Form -> input("secondEmail", array("type" => "text"));  
//                        }
                        echo $this->Form->input('id');
			echo $this -> Form -> input('comments', array("class"=>"editorNotRequired {validate:{required : true, messages:{required:'Please enter comments.'}}}"));
			echo $this -> Form -> input("action", array("type" => "hidden"));
                        echo $this -> Form -> input("actiontype", array("type" => "hidden"));
			echo '<div class="send-to">';
			echo $this -> Form -> button("Send", array("type" => "button", "onclick" => "newaction('noaction')"));
			echo '</div>';
			?>
		</div>
	</fieldset>
	<script>
		function newaction(val) {
			//alert(val);
			//        if(val=='noaction'){
			//            $("#TaskAction").val('');
			//        }else
			//            {
			//                $("#TaskAction").val(val);
			//            }
			//
			//alert();
			//return;
			if($("#TaskEditForm").valid()){
				document.task.submit();
				//parent.window.location.href = parent.window.location.href;
				//parent.window.document.getElementById("cboxClose").click();
			}
		}

		$(function() {
			var frmValidator = jQuery("form#TaskEditForm").validate({
				errorContainer : jQuery(".form-validations"),
				errorLabelContainer : jQuery(".form-validations ol"),
				wrapper : 'li',
				meta : 'validate',
				rules : {

				},
				messages : {

				}
			});
		});

	</script>
	
	<?php echo $this -> Form -> end();?>

	
</div>
