<?php

class CategoriesController extends AppController {

    public $uses = ['Category', 'Disk'];

    public $components = [
        'Paginator' => [
            'limit' => 10,
            'order' => ['id' => 'desc']
        ]
    ];

    public function index() {
        $this->set('categories', $this->Paginator->paginate('Category'));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Category->create();
            if ($this->Category->save($this->request->data)) {
                $this->Flash->success('登録しました');
                return $this->redirect(['action' => 'index']);
            }
        }
    }

    public function edit($id =null) {
        if (!$this->Category->exists($id)) {
            throw new NotFoundException('見つかりません');
        }
        if ($this->request->is(['post', 'put'])) {
            if ($this->Category->save($this->request->data)) {
                $this->Flash->success('更新しました');
                return $this->redirect(['action' => 'index']);
            }
        } else {
            $this->request->data = $this->Category->findById($id);
        }
    }

    public function delete($id = null) {
        if (!$this->Category->exists($id)) {
            throw new NotFoundException('見つかりません');
        }
        
        $this->request->allowMethod('post','delete');
        
        if ($this->Category->delete($id)) {
            $this->Flash->success('削除しました');
        } else {
            $this->Flash->error('削除できませんでした');
        }
        return $this->redirect(['action' => 'index']);
    }
}