<?php
return [
	'name' => 'GfFormMeta',
	'table' => 'wp_gf_form',
	'class' => 'CRM_WordPress_DAO_Wp_GfFormMeta',
	'module' => false,
	'primary_key' => ['form_id'],
	'searchable' => 'secondary',
  'getInfo' => fn() => [
      'title' => 'Gravity Forms Formmeta',
      'title_plural' => 'Gravity Forms Formmeta',
      'description' => 'Meta data related to Gravity Forms forms',
  ],
	'getFields' => fn() => [
        'form_id' => [
			'title' => ts('ID'),
			'sql_type' => 'int(20) unsigned',
			'input_type' => 'Number',
			'required' => TRUE,
			'description' => ts('The form ID that the metadata is associated with'),
			'usage' => [],
			'primary_key' => TRUE,
			'auto_increment' => TRUE,
            'reference' => [
                'entity' => 'GfForms',
                'key' => 'id'
            ],
		],
        'display_meta' => [
          'title' => ts('Display meta'),
          'sql_type' => 'longtext',
          'input_type' => 'TextArea',
          'description' => ts('Meta related to how the form and fields are configured'),
          'serialize' => CRM_Core_DAO::SERIALIZE_JSON,
        ],
        'entries_grid_meta' => [
          'title' => ts('Entries grid meta'),
          'sql_type' => 'longtext',
          'input_type' => 'TextArea',
          'description' => ts('Additional meta related to entries and how they will be displayed'),
          'serialize' => CRM_Core_DAO::SERIALIZE_JSON,
        ],
        'confirmations' => [
          'title' => ts('Confirmation configuration.'),
          'sql_type' => 'longtext',
          'input_type' => 'TextArea',
          'description' => ts('Confirmation configuration.'),
          'serialize' => CRM_Core_DAO::SERIALIZE_JSON,
        ],
        'notifications' => [
          'title' => ts('Notification configuration'),
          'sql_type' => 'longtext',
          'input_type' => 'TextArea',
          'description' => ts('Notification configuration'),
          'serialize' => CRM_Core_DAO::SERIALIZE_JSON,
        ],
    ]
];