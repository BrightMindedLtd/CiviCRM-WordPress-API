<?php
return [
	'name' => 'LearndashUserActivityMeta',
	'table' => 'wp_learndash_user_activity_meta',
	'class' => 'CRM_WordPress_DAO_Learndash_UserActivityMeta',
	'module' => false,
	'primary_key' => ['activity_meta_id'],
	'searchable' => 'secondary',
	'getInfo' => fn() => [
        'title' => 'Learndash User Activity Meta',
        'title_plural' => 'Learndash User Activity Meta',
        'description' => 'Learndash User Activity Meta',
    ],
	'getFields' => fn() => [
        'activity_meta_id' => [
            'title' => ts('Activity Meta ID'),
            'sql_type' => 'bigint unsigned',
            'input_type' => 'Number',
            'required' => TRUE,
            'description' => ts('Database ID for this row'),
            'usage' => [],
            'primary_key' => TRUE,
            'auto_increment' => TRUE,
        ],
        'activity_id' => [
            'title' => ts('Activity ID'),
            'sql_type' => 'bigint unsigned',
            'input_type' => 'Select',
            'required' => TRUE,
            'description' => ts('The ID of the activity this meta is associated with'),
            'usage' => [],
            'entity_reference' => [
                'entity' => 'LearndashUserActivity',
                'key' => 'activity_id'
            ],
        ],
        'activity_meta_key' => [
            'title' => ts('Meta Key'),
            'sql_type' => 'varchar(255)',
            'input_type' => 'Text',
            'required' => TRUE,
            'description' => ts('The key for this meta data'),
        ],
        'activity_meta_value' => [
            'title' => ts('Meta Value'),
            'sql_type' => 'text',
            'input_type' => 'TextArea',
            'required' => FALSE,
            'description' => ts('The value for this meta data'),
        ],
    ],
];