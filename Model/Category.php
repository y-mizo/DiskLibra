<?php
App::uses('AppModel', 'Model');

class Category extends AppModel {
    
    public $validate = array(
        'name' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => '未入力です。',
                'required' => true,
            ),
        )
    );
}