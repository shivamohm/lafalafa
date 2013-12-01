<?php 
class Task extends AppModel { 
var $name = 'Task'; 

public $validate = array(    
    'title' => array(
        'isUnique' => array(
            'rule' => 'isUnique',
            'allowEmpty'=> false,
            'required' => true,
            'message' => 'This Title already exists. Please enter a Title'
        ),
        #'name' => array(             #'rule'    => '/^[a-zA-Z]+$/',             #'message' => 'Only letters. Please enter a valid Title'             )
        ),
        'status' => array(
				'rule' => 'notEmpty',
				'message'=> 'Please enter username'
        )
    );
   
} 
?>
