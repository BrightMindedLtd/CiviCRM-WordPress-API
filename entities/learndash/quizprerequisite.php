<?php
return [
	'name' => 'LearndashQuizPrerequisite',
	'table' => 'wp_learndash_pro_quiz_prerequisite',
	'class' => 'CRM_WordPress_DAO_Learndash_QuizPrerequisite',
	'module' => false,
	'primary_key' => ['prerequisite_quiz_id'],
	'searchable' => 'secondary',
	'getInfo' => fn() => [
        'title' => 'Learndash Quiz Prerequisite',
        'title_plural' => 'Learndash Quiz Prerequisites',
        'description' => 'Learndash Quiz Prerequisite',
    ],
	'getFields' => fn() => [
        'prerequisite_quiz_id' => [
            'title' => ts('Prerequisite Quiz ID'),
            'sql_type' => 'int unsigned',
            'input_type' => 'Select',
            'required' => TRUE,
            'description' => ts('The ID of the prerequisite quiz this activity is associated with'),
            'usage' => [],
            'entity_reference' => [
                'entity' => 'LearndashQuizMaster',
                'key' => 'id',
            ],
        ],
        'quiz_id' => [
            'title' => ts('Quiz ID'),
            'sql_type' => 'int unsigned',
            'input_type' => 'Select',
            'required' => TRUE,
            'description' => ts('The ID of the quiz this activity is associated with'),
            'usage' => [],
            'entity_reference' => [
                'entity' => 'LearndashQuizMaster',
                'key' => 'id',
            ],
        ],
    ],
];