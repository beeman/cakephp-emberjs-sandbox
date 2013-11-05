<?php
App::uses('AppController', 'Controller');
/**
 * Todos Controller
 *
 * @property Todo $Todo
 * @property PaginatorComponent $Paginator
 */
class TodosController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function todomvc() {
        $this->layout = 'emberjs';
    }
    public function index() {
        header("Access-Control-Allow-Origin: *");
        $this->layout = 'ajax';
        $this->render(false);


        $result = array();
        $result['meta']['total'] = $this->Todo->find('count');

        $items = $this->Todo->find('all');

        foreach($items as $item) {
            $result['todo'][] = $item['Todo'];
        }
        echo json_encode($result);
    }

    public function view($id = null) {
        header("Access-Control-Allow-Origin: *");
        $this->layout = 'ajax';
        $this->render(false);

        if (!$this->Todo->exists($id)) {
            throw new NotFoundException(__('Invalid todo'));
        }
        $options = array('conditions' => array('Todo.' . $this->Todo->primaryKey => $id));
        $todo = $this->Todo->find('first', $options);
        echo json_encode($todo);
    }


    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->Todo->recursive = 0;
        $this->set('todos', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->Todo->exists($id)) {
            throw new NotFoundException(__('Invalid todo'));
        }
        $options = array('conditions' => array('Todo.' . $this->Todo->primaryKey => $id));
        $this->set('todo', $this->Todo->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->Todo->create();
            if ($this->Todo->save($this->request->data)) {
                $this->Session->setFlash(__('The todo has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The todo could not be saved. Please, try again.'));
            }
        }
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->Todo->exists($id)) {
            throw new NotFoundException(__('Invalid todo'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Todo->save($this->request->data)) {
                $this->Session->setFlash(__('The todo has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The todo could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Todo.' . $this->Todo->primaryKey => $id));
            $this->request->data = $this->Todo->find('first', $options);
        }
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->Todo->id = $id;
        if (!$this->Todo->exists()) {
            throw new NotFoundException(__('Invalid todo'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Todo->delete()) {
            $this->Session->setFlash(__('The todo has been deleted.'));
        } else {
            $this->Session->setFlash(__('The todo could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
}
