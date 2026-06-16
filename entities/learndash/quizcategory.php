<?php
return [
	'name' => 'LearndashQuizCategory',
	'table' => 'wp_learndash_pro_quiz_category',
	'class' => 'CRM_WordPress_DAO_Learndash_QuizCategory',
	'module' => false,
	'primary_key' => ['category_id'],
	'searchable' => 'secondary',
	'getInfo' => fn() => [
        'title' => 'Learndash Quiz Category',
        'title_plural' => 'Learndash Quiz Categories',
        'description' => 'Learndash Quiz Category',
    ],
	'getFields' => fn() => [
        'category_id' => [
            'title' => ts('Category ID'),
            'sql_type' => 'int unsigned',
            'input_type' => 'Number',
            'required' => TRUE,
            'description' => ts('The ID of the category this activity is associated with'),
            'usage' => [],
        ],
        'category_name' => [
            'title' => ts('Category Name'),
            'sql_type' => 'varchar(200)',
            'input_type' => 'Text',
            'required' => TRUE,
            'description' => ts('The name of the category this activity is associated with'),
            'usage' => [],
        ],
    ],
];