<?php
return [
	'name' => 'WpOptions',
	'table' => 'wp_options',
	'class' => 'CRM_WordPress_DAO_Wp_Options',
	'module' => false,
	'primary_key' => ['id'],
	'searchable' => 'secondary',
	'getInfo' => fn() => [
        'title' => 'WordPress Options',
        'title_plural' => 'WordPress Options',
        'description' => 'WordPress Options',
    ],
	'getFields' => fn() => [
		'option_id' => [
            'title' => ts('Option ID'),
            'sql_type' => 'int(20) unsigned',
            'input_type' => 'Number',
            'required' => TRUE,
            'description' => ts('Database ID for this row'),
            'usage' => [],
            'primary_key' => TRUE,
            'auto_increment' => TRUE,
        ],
        'option_name' => [
            'title' => ts('Option name'),
            'sql_type' => 'varchar(191)',
            'input_type' => 'Text',
            'required' => TRUE,
            'description' => ts('The name of the option'),
            'usage' => [],
        ],
        'option_value' => [
            'title' => ts('Option value'),
            'sql_type' => 'longtext',
            'input_type' => 'TextArea',
            'description' => ts('The value of the option'),
            'usage' => [],
        ],
        'autoload' => [
            'title' => ts('Autoload'),
            'sql_type' => 'varchar(20)',
            'input_type' => 'Select',
            'description' => ts('Whether the option is autoloaded'),
            'usage' => [],
        ],
	]
];
