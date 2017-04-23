<?php

class Disk extends AppModel {
    public $belongsTo = array(
        'Category' => array(
            'className'     => 'Category',
        )  
    );
    
    public $validate = array(
        'title' => array(
            'notBlank' => array(
                'rule' => array('notBlank'),
                'message' => '※ 未入力です。',
                'required' => true,
            ),
        ),
    );    
}