<?php
return [
	'name' => 'LearndashUserActivity',
	'table' => 'wp_learndash_user_activity',
	'class' => 'CRM_WordPress_DAO_Learndash_UserActivity',
	'module' => false,
	'primary_key' => ['activity_id'],
	'searchable' => 'secondary',
	'getInfo' => fn() => [
        'title' => 'Learndash User Activity',
        'title_plural' => 'Learndash User Activities',
        'description' => 'Learndash User Activity',
    ],
	'getFields' => fn() => [
        'activity_id' => [
            'title' => ts('Activity ID'),
            'sql_type' => 'bigint unsigned',
            'input_type' => 'Number',
            'required' => TRUE,
            'description' => ts('Database ID for this row'),
            'usage' => [],
            'primary_key' => TRUE,
            'auto_increment' => TRUE,
        ],
        'user_id' => [
            'title' => ts('User ID'),
            'sql_type' => 'bigint unsigned',
            'input_type' => 'Select',
            'required' => TRUE,
            'description' => ts('The ID of the user this activity is associated with'),
            'usage' => [],
            'entity_reference' => [
                'entity' => 'WpUsers',
                'key' => 'id'
            ],
        ],
        'post_id' => [
            'title' => ts('Post ID'),
            'sql_type' => 'bigint unsigned',
            'input_type' => 'Select',
            'required' => TRUE,
            'description' => ts('The ID of the post this activity is associated with'),
            'usage' => [],
            'entity_reference' => [
                'entity' => 'WpPosts',
                'key' => 'id'
            ],
        ],
        'course_id' => [
            'title' => ts('Course ID'),
            'sql_type' => 'bigint unsigned',
            'input_type' => 'Select',
            'required' => TRUE,
            'description' => ts('The ID of the course this activity is associated with'),
            'usage' => [],
            'entity_reference' => [
                'entity' => 'WpPosts',
                'key' => 'id'
            ],
        ],
        'activity_type' => [
            'title' => ts('Activity Type'),
            'sql_type' => 'varchar(50)',
            'input_type' => 'Text',
            'required' => TRUE,
            'description' => ts('The type of activity (e.g., quiz, lesson, topic)'),
            'usage' => [],
        ],
        'activity_status' => [
            'title' => ts('Activity Status'),
            'sql_type' => 'tinyint(1) unsigned',
            'input_type' => 'Text',
            'required' => TRUE,
            'description' => ts('The status of the activity (e.g., completed, in progress)'),
            'usage' => [],
        ],
        'activity_started' => [
            'title' => ts('Activity Started'),
            'sql_type' => 'int unsigned',
            'input_type' => 'Number',
            'required' => TRUE,
            'description' => ts('The timestamp when the activity started'),
            'usage' => [],
        ],
        'activity_completed' => [
            'title' => ts('Activity Completed'),
            'sql_type' => 'int unsigned',
            'input_type' => 'Number',
            'required' => FALSE,
            'description' => ts('The timestamp when the activity was completed'),
            'usage' => [],
        ],
        'activity_updated' => [
            'title' => ts('Activity Updated'),
            'sql_type' => 'int unsigned',
            'input_type' => 'Number',
            'required' => FALSE,
            'description' => ts('The timestamp when the activity was last updated'),
            'usage' => [],
        ],
    ],
];