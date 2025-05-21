<?php
return [
	'name' => 'WcOrderItems',
	'table' => 'wp_woocommerce_order_items',
	'class' => 'CRM_WordPress_DAO_Wp_WcOrderItems',
	'module' => false,
	'primary_key' => ['order_item_id'],
	'searchable' => 'secondary',
    'getInfo' => fn() => [
		'title' => 'WooCommerce order item',
		'title_plural' => 'WooCommerce order items',
		'description' => 'Line items from a WooCommerce order',
	],
	'getFields' => fn() => [
		'order_item_id' => [
            'title' => ts('ID'),
            'sql_type' => 'int(20) unsigned',
            'input_type' => 'Number',
            'required' => TRUE,
            'description' => ts('Database ID for this row'),
            'usage' => [],
            'primary_key' => TRUE,
            'auto_increment' => TRUE,
        ],
        'order_item_name' => [
            'title' => ts('Name'),
            'sql_type' => 'varchar(255)',
            'input_type' => 'Text',
            'description' => ts('The name of the order item'),
            'usage' => [],
        ],
        'order_item_type' => [
            'title' => ts('Type'),
            'sql_type' => 'varchar(20)',
            'input_type' => 'Select',
            'description' => ts('The type of the order item'),
            'usage' => [],
        ],
        'order_id' => [
            'title' => ts('Order ID'),
            'sql_type' => 'int(20) unsigned',
            'input_type' => 'Number',
            'description' => ts('The ID of the order this item belongs to'),
            'usage' => [],
            'entity_reference' => [
                'entity' => 'WcOrders',
                'key' => 'id'
            ],
        ],
	]
];
