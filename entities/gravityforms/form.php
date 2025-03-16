<?php
return [
	'name' => 'GfForm',
	'table' => 'wp_gf_form',
	'class' => 'CRM_WordPress_DAO_Wp_GfForm',
	'module' => false,
	'primary_key' => ['id'],
	'searchable' => 'secondary',
    'getInfo' => fn() => [
        'title' => 'Gravity Forms Form',
        'title_plural' => 'Gravity Forms Forms',
        'description' => 'A single Gravity Forms form',
        'label_field' => 'title',
    ],
	'getFields' => fn() => [
        'id' => [
			'title' => ts('ID'),
			'sql_type' => 'int(20) unsigned',
			'input_type' => 'Number',
			'required' => TRUE,
			'description' => ts('Database ID for this row'),
			'usage' => [],
			'primary_key' => TRUE,
			'auto_increment' => TRUE,
		],
        'title' => [
            'title' => ts('Title'),
            'sql_type' => 'varchar(255)',
            'input_type' => 'Text',
            'required' => TRUE,
            'description' => ts('The title of the form'),
            'usage' => [],
        ],
        'is_active' => [
            'title' => ts('Is active'),
            'sql_type' => 'tinyint(1)',
            'input_type' => 'Checkbox',
            'description' => ts('Is the form active?'),
            'usage' => [],
        ],
        'date_created' => [
            'title' => ts('Date created'),
            'sql_type' => 'datetime',
            'input_type' => 'Select Date',
            'description' => ts('Date the form was created'),
            'usage' => [],
        ],
        'date_updated' => [
            'title' => ts('Date updated'),
            'sql_type' => 'datetime',
            'input_type' => 'Select Date',
            'description' => ts('Date the form was last updated'),
            'usage' => [],
        ],
        'is_trash' => [
            'title' => ts('Is trash'),
            'sql_type' => 'tinyint(1)',
            'input_type' => 'Checkbox',
            'description' => ts('Is the form in the trash?'),
            'usage' => [],
        ]
    ]
];