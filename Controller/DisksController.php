<?php

class DisksController extends AppController {

    public $uses = ['Disk', 'Category'];

    public $components = [
        'Session',
        'Paginator' => [
            'limit' => 10,
            'order' => ['id' => 'desc']
        ]
    ];
    
    public $disk_standards = [
        'BD-R' => 'BD-R',
        'BD-RE' => 'BD-RE',
        'BD-RE XL' => 'BD-RE XL',
    ];

    public function index() {
        $this->set('disks', $this->Disk->find('all'));
//        $this->set('disks', $this->Paginator->paginate('Disk'));

        $keyword = isset($this->request->query['keyword']) ? trim($this->request->query['keyword']) : '';
        $conditions = [];

        if (!empty($keyword)){
            $conditions = [
                'OR' => [
                    'Disk.title LIKE' => '%'. $keyword. '%',
                    'Disk.disk_standard' => $keyword,
                    'Disk.description LIKE' => '%'. $keyword. '%',
                    'Category.name LIKE' => '%'. $keyword. '%',
                ],
            ];
        }
        // pagenate を call
        $data = $this->Paginator->paginate('Disk', $conditions);

        $this->set('keyword', $keyword);  // 「◯◯の検索結果です」の表示制御の為ビューに渡す
        $this->set('disks', $data);
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Disk->create();

            if ($this->Disk->save($this->request->data)) {
                $this->Flash->success('登録しました');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error('失敗しました。もう一度トライしてください。');
            }
        }
        $this->set('category_list', $this->getCategoryList());
        $this->set('disk_standards', $this->disk_standards);
    }

    public function edit($id = null) {
        if (!$this->Disk->exists($id)) {
            throw new NotFoundException('見つかりません');
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Disk->save($this->request->data)) {
                $this->Flash->success('更新できました');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error('もう一度お願いします');
            }
        } else {
            $options = array('conditions' => array('Disk.' . $this->Disk->primaryKey => $id));
            $this->request->data = $this->Disk->find('first', $options);
        }
        $this->set('category_list', $this->getCategoryList());
        $this->set('disk_standards', $this->disk_standards);
    }

//    シリアル通し番号のため、基本的に削除はしない。
//    public function delete($id = null) {
//        $this->Disk->id = $id;
//        if (!$this->Disk->exists()) {
//            throw new NotFoundException('ありません');
//        }
//        $this->request->allowMethod('post', 'delete');
//        if ($this->Disk->delete()) {
//            $this->Flash->success('削除しました');
//        } else {
//            $this->Flash->error('削除できませんでした、もう一度トライしてください');
//        }
//        return $this->redirect(array('action' => 'index'));
//    }

//    --------------------------------
    
    private function getCategoryList() {
        return $this->Category->find('list', array(
            'fields' => array(
                'id', 'name'
        )));
    }
}
