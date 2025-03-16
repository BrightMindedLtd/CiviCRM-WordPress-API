<?php
return [
	'name' => 'WpUsermeta',
	'table' => 'wp_usermeta',
	'class' => 'CRM_WordPress_DAO_Wp_Usermeta',
	'module' => false,
	'primary_key' => ['umeta_id'],
	'searchable' => 'secondary',
    'getInfo' => fn() => [
		'title' => 'WordPress Usermeta',
		'title_plural' => 'WordPress Usermeta',
		'description' => 'User metadata from the WordPress database',
	],
	'getFields' => fn() => [
		'umeta_id' => [
			'title' => ts('Usermeta ID'),
			'sql_type' => 'int(20) unsigned',
			'input_type' => 'Number',
			'required' => TRUE,
			'description' => ts('Database ID for this row'),
			'usage' => [],
			'primary_key' => TRUE,
			'auto_increment' => TRUE,
		],
		'user_id' => [
			'title' => ts('User'),
			'sql_type' => 'int(20) unsigned',
			'input_type' => 'Select',
			'required' => TRUE,
			'description' => ts('Reference to the user this meta is attached to'),
			'usage' => [],
            'entity_reference' => [
                'entity' => 'WpUsers',
                'key' => 'id'
            ],
		],
		'meta_key' => [
			'title' => ts('Meta key'),
			'sql_type' => 'varchar(255)',
			'input_type' => 'Text',
			'required' => TRUE,
			'description' => ts('The reference for the data being stored'),
			'usage' => [],
		],
		'meta_value' => [
			'title' => ts('Meta value'),
			'sql_type' => 'longtext',
			'input_type' => 'Text',
			'description' => ts('The value for this metakey'),
			'usage' => [],
		],
	]
];
