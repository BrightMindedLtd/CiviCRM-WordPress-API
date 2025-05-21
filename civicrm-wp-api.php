<?php
/**
 * Plugin Name:  CiviCRM WP API
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Civicrm_WP_API {

  protected $entities = [];

  public function __construct() {
    add_action('civicrm_entityTypes', [$this, 'register_entity_types']);
    add_action('civicrm_entityTypes', [$this, 'modify_entity_references']);
    add_action('civicrm_config', [ $this, 'init' ]);
  }

  public function init() {
    $this->load_dependencies();
    $this->register_civi_events();
  }

  public function load_dependencies() {
    require_once __DIR__ . '/includes/class-wp-api-entity.php';

    require_once __DIR__ . '/includes/dao/class-dao-wp-comments.php';
    require_once __DIR__ . '/includes/dao/class-dao-wp-users.php';
    require_once __DIR__ . '/includes/dao/class-dao-wp-usermeta.php';
    require_once __DIR__ . '/includes/dao/class-dao-wp-options.php';
    require_once __DIR__ . '/includes/dao/class-dao-wp-posts.php';
    require_once __DIR__ . '/includes/dao/class-dao-wp-postmeta.php';
    require_once __DIR__ . '/includes/dao/gravityforms/class-dao-wp-gfform.php';
    require_once __DIR__ . '/includes/dao/gravityforms/class-dao-wp-gfformmeta.php';
    require_once __DIR__ . '/includes/dao/gravityforms/class-dao-wp-gfentry.php';
    require_once __DIR__ . '/includes/dao/woocommerce/class-dao-wc-orders.php';
    require_once __DIR__ . '/includes/dao/woocommerce/class-dao-wc-orderitems.php';
  }

  public function loadEntities() {
    $this->entities['WpComments'] = require('entities/comments.php');
    $this->entities['WpUsers'] = require('entities/users.php');
    $this->entities['WpUsermeta'] = require('entities/usermeta.php');
    $this->entities['WpOptions'] = require('entities/options.php');
    $this->entities['WpPosts'] = require('entities/posts.php');
    $this->entities['WpPostmeta'] = require('entities/postmeta.php');

    if (is_plugin_active('gravityforms/gravityforms.php')) {
      $this->entities['GfForm'] = require('entities/gravityforms/form.php');
      $this->entities['GfFormMeta'] = require('entities/gravityforms/formmeta.php');
      $this->entities['GfEntry'] = require('entities/gravityforms/entry.php');
    }

    if (is_plugin_active('woocommerce/woocommerce.php')) {
      $this->entities['WcOrders'] = require('entities/woocommerce/orders.php');
      $this->entities['WcOrderItems'] = require('entities/woocommerce/orderitems.php');
    }
  }

  public function register_civi_events() {
    Civi::dispatcher()->addListener('civi.api4.entityTypes', [$this, 'register_api4_entity_types']);
  }

  public function register_entity_types(&$entities) {
    $this->loadEntities();

    foreach ($this->entities as $entityName => $entity) {
      $entities[$entityName] = $entity;
    }
  }

  public function modify_entity_references(&$entities) {
    // Todo, check entities registered

    $getFields = $entities['UFMatch']['getFields'];
    $entities['UFMatch']['getFields'] = function() use ($getFields) {
      $fields = $getFields();
      $fields['uf_id']['input_type'] = 'EntityRef';
      $fields['uf_id']['entity_reference'] = [
          'entity' => 'WpUsers',
          'key' => 'id'
      ];
      return $fields;
    };
  }

  public function register_api4_entity_types($event) {
    global $wpdb;
    $dbname = $wpdb->dbname;
    $entities = $event->entities;

    foreach ($this->entities as $entityName => $entity) {
      $info = isset($entity['getInfo']) ? $entity['getInfo']() : null;
      
      $entities[$entityName] = [
        ...$info,
        'searchable' => $entity['searchable'] ?? '',
        'name' => $entityName,
        'primary_key' => $entity['primary_key'] ?? '',
        'table_name' => str_replace('wp_', $wpdb->prefix, $entity['table'] ?? ''),
        'database_name' => $dbname,
        'dao' => $entity['class'] ?? '',
        'class' => 'CRM_WordPress_Api_Entity',
        'class_args' => [$entity['name']],
        'type' => [
          'DAOEntity'
        ]
      ];
    }
    $event->entities = $entities;
  }
}
new Civicrm_WP_API();