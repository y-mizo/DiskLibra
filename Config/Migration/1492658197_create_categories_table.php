<?php

class CreateCategoriesTable extends CakeMigration {

    /**
     * Migration description
     *
     * @var string
     */
    public $description = 'create_categories_table';

    /**
     * Actions to be performed
     *
     * @var array $migration
     */
    public $migration = [
        'up' => [
            'create_table' => [
                'categories' => [
                    'id' => [
                        'type' => 'integer',
                        'null' => false,
                        'default' => null,
                        'length' => 10,
                        'key' => 'primary',
                    ],
                    'name' => [
                        'type' => 'string',
                        'null' => false,
                        'default' => null,
                        'length' => 255,
                    ],
                    'created' => [
                        'type' => 'datetime'
                    ],
                    'modified' => [
                        'type' => 'datetime'
                    ],
                ],
            ],
        ],
        'down' => [
            'drop_table' => [
                'categories'
            ]
        ],
    ];

    /**
     * Before migration callback
     *
     * @param string $direction Direction of migration process (up or down)
     * @return bool Should process continue
     */
    public function before($direction) {
        return true;
    }

    /**
     * After migration callback
     *
     * @param string $direction Direction of migration process (up or down)
     * @return bool Should process continue
     */
    public function after($direction) {
        return true;
    }

}
