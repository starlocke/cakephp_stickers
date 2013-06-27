<?php
App::uses('AppController', 'Controller');
/**
 * Stickers Controller
 *
 * @property Sticker $Sticker
 */
class StickersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Sticker->recursive = 0;
		$this->set('stickers', $this->paginate());
		$this->set('_serialize', array('stickers'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Sticker->exists($id)) {
			throw new NotFoundException(__('Invalid sticker'));
		}
		$options = array('conditions' => array('Sticker.' . $this->Sticker->primaryKey => $id));
		$this->set('sticker', $this->Sticker->find('first', $options));
		$this->set('_serialize', array('sticker'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Sticker->create();
			if ($this->Sticker->save($this->request->data)) {
				$this->flash(__('Sticker saved.'), array('action' => 'index'));
			} else {
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Sticker->exists($id)) {
			throw new NotFoundException(__('Invalid sticker'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Sticker->save($this->request->data)) {
				$this->flash(__('The sticker has been saved.'), array('action' => 'index'));
			} else {
			}
		} else {
			$options = array('conditions' => array('Sticker.' . $this->Sticker->primaryKey => $id));
			$this->request->data = $this->Sticker->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Sticker->id = $id;
		if (!$this->Sticker->exists()) {
			throw new NotFoundException(__('Invalid sticker'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Sticker->delete()) {
			$this->flash(__('Sticker deleted'), array('action' => 'index'));
		}
		$this->flash(__('Sticker was not deleted'), array('action' => 'index'));
		$this->redirect(array('action' => 'index'));
	}
}
