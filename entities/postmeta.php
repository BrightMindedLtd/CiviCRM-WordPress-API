<?php
return [
	'name' => 'WpPostmeta',
	'table' => 'wp_postmeta',
	'class' => 'CRM_WordPress_DAO_Wp_Postmeta',
	'module' => false,
	'primary_key' => ['meta_id'],
	'searchable' => 'secondary',
	'getInfo' => fn() => [
        'title' => 'WordPress Postmeta',
        'title_plural' => 'WordPress Postmeta',
        'description' => 'WordPress Postmeta',
    ],
	'getFields' => fn() => [
        'meta_id' => [
            'title' => ts('Meta ID'),
            'sql_type' => 'int(20) unsigned',
            'input_type' => 'Number',
            'required' => TRUE,
            'description' => ts('Database ID for this row'),
            'usage' => [],
            'primary_key' => TRUE,
            'auto_increment' => TRUE,
        ],
        'post_id' => [
            'title' => ts('Post ID'),
            'sql_type' => 'int(20) unsigned',
            'input_type' => 'Select',
            'required' => TRUE,
            'description' => ts('The ID of the post this meta is attached to'),
            'usage' => [],
            'entity_reference' => [
                'entity' => 'WpPosts',
                'key' => 'id'
            ],
        ],
        'meta_key' => [
            'title' => ts('Meta key'),
            'sql_type' => 'varchar(191)',
            'input_type' => 'Text',
            'description' => ts('The name of the meta key'),
            'usage' => [],
        ],
        'meta_value' => [
            'title' => ts('Meta value'),
            'sql_type' => 'longtext',
            'input_type' => 'TextArea',
            'description' => ts('The value of the meta key'),
            'usage' => [],
        ],
	]
];
