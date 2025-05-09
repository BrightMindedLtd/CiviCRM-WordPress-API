<?php
return [
	'name' => 'WpComments',
	'table' => 'wp_comments',
	'class' => 'CRM_WordPress_DAO_Wp_Comments',
	'module' => false,
	'primary_key' => ['comment_id'],
	'searchable' => 'secondary',
	'getInfo' => fn() => [
        'title' => 'WordPress Comments',
        'title_plural' => 'WordPress Comments',
        'description' => 'WordPress Comments',
    ],
	'getFields' => fn() => [
        'comment_id' => [
            'title' => ts('Comment ID'),
            'sql_type' => 'int(20) unsigned',
            'input_type' => 'Number',
            'required' => TRUE,
            'description' => ts('Database ID for this row'),
            'usage' => [],
            'primary_key' => TRUE,
            'auto_increment' => TRUE,
        ],
        'comment_post_ID' => [
            'title' => ts('Post ID'),
            'sql_type' => 'int(20) unsigned',
            'input_type' => 'Select',
            'required' => TRUE,
            'description' => ts('The ID of the post this comment is attached to'),
            'usage' => [],
            'entity_reference' => [
                'entity' => 'WpPosts',
                'key' => 'id'
            ],
        ],
        'comment_author' => [
            'title' => ts('Comment author'),
            'sql_type' => 'varchar(255)',
            'input_type' => 'Text',
            'description' => ts('The name of the comment author'),
            'usage' => [],
        ],
        'comment_author_email' => [
            'title' => ts('Comment author email'),
            'sql_type' => 'varchar(100)',
            'input_type' => 'Text',
            'description' => ts('The email address of the comment author'),
            'usage' => [],
        ],
        'comment_author_IP' => [
            'title' => ts('Comment author IP'),
            'sql_type' => 'varchar(100)',
            'input_type' => 'Text',
            'description' => ts('The IP address of the comment author'),
            'usage' => [],
        ],
        'comment_date' => [
            'title' => ts('Comment date'),
            'sql_type' => 'datetime',
            'input_type' => 'Select Date',
            'description' => ts('Date the comment was created'),
            'usage' => [],
        ],
        'comment_date_gmt' => [
            'title' => ts('Comment date GMT'),
            'sql_type' => 'datetime',
            'input_type' => 'Select Date',
            'description' => ts('Date the comment was created in GMT'),
            'usage' => [],
        ],
        'comment_content' => [
            'title' => ts('Comment content'),
            'sql_type' => 'text',
            'input_type' => 'TextArea',
            'description' => ts('The content of the comment'),
            'usage' => [],
        ],
        'comment_karma' => [
            'title' => ts('Comment karma'),
            'sql_type' => 'int(11)',
            'input_type' => 'Number',
            'description' => ts('The karma of the comment'),
            'usage' => [],
        ],
        'comment_approved' => [
            'title' => ts('Comment approved'),
            'sql_type' => 'varchar(20)',
            'input_type' => 'Select',
            'description' => ts('Whether the comment is approved'),
            'usage' => [],
        ],
        'comment_agent' => [
            'title' => ts('Comment agent'),
            'sql_type' => 'varchar(255)',
            'input_type' => 'Text',
            'description' => ts('The user agent of the comment author'),
            'usage' => [],
        ],
        'comment_type' => [
            'title' => ts('Comment type'),
            'sql_type' => 'varchar(20)',
            'input_type' => 'Text',
            'description' => ts('The type of the comment'),
            'usage' => [],
        ],
        'comment_parent' => [
            'title' => ts('Comment parent'),
            'sql_type' => 'int(20) unsigned',
            'input_type' => 'Select',
            'description' => ts('The ID of the comment this comment is a reply to'),
            'usage' => [],
            'entity_reference' => [
                'entity' => 'WpComments',
                'key' => 'id'
            ],
        ],
        'user_id' => [
            'title' => ts('User ID'),
            'sql_type' => 'int(20) unsigned',
            'input_type' => 'Select',
            'description' => ts('The ID of the user who made the comment'),
            'usage' => [],
            'entity_reference' => [
                'entity' => 'WpUsers',
                'key' => 'id'
            ],
        ],
	]
];
