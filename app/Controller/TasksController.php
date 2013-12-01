<?php 
class TasksController extends AppController {
	var $name = 'Tasks';
	var $helpers = array('Html', 'Form');
	
	public function index(){
		$this->set('tasks', $this->Task->find('all',  array('order' => array('id DESC') ))); 
	}
		
	public function add() {
        if ($this->request->is('POST')) {
            $this->Task->create();
            if ($this->Task->save($this->request->data)) {
				#$log = $this->Tasks->getDataSource()->getLog(false, false);
				#debug($log);
			
                $this->Session->setFlash('Your Tasks has been saved.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add your post.');
            }
        }
    }
    
    public function edit($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid Task'));
		}
		
		$Tasks = $this->Task->findById($id);
                
		if (!$Tasks) {
			throw new NotFoundException(__('Invalid post'));
		}
		
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->Task->id = $id;
			
			if ($this->Task->save($this->request->data, array('validate'=>false))) {
				#$log = $this->Task->getDataSource()->getLog(false, false);
				#debug($log);
			   $this->Session->setFlash('Your Tasks has been saved.');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash('Unable to add your post.');
            }
		}

		if (!$this->request->data) {
			$this->request->data = $Tasks;
		}
         $this->set(compact('Tasks'));
	}
	public function delete($id) {
		
		if (!$id) {
			throw new NotFoundException(__('Invalid Task'));
		}
		if ($this->Task->delete($id)) {
			
			$this->Session->setFlash('The Task with id: ' . $id . ' has been deleted.');
			$this->redirect(array('action' => 'index'));
		} else {
                $this->Session->setFlash('Unable to Delete your Task.');
            }
	}
    
    
}
?>
