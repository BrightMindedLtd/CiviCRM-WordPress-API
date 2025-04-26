# WordPress entity support for CiviCRM API (v4)

Make WordPress entities available through the CiviCRM API4 (and therefore, SearchKit, Form Builder etc.)

## Description

When installed within WordPress, it is common for certain data to be held outside of CiviCRM. By allowing CiviCRM to read from WordPress database tables via the CiviCRM API we open up various possibilities, such as:

1. Creating SearchKit reports to show the data in WordPress
2. Using Searchkit to compare the WordPress user emails with the email addresses stored in CiviCRM, and identify any discrepancies
3. Exposing SearchKit forms to contact screens (using FormBuilder) showing posts written, WooCommerce orders created, or Gravity Forms submitted from the contact being viewed

In addition to the WordPress core tables, support for the following plugins also exists:

1. Gravity Forms
2. WooCommerce

## Getting Started

### Dependencies

This plugin requires CiviCRM 6.2, due to a requirement on https://github.com/civicrm/civicrm-core/pull/32474.

### Installing

This extension is stored as a WordPress plugin, not a CiviCRM extension. Upload the code to `wp-content/plugins`, install the plugin and you're good to go.

You may need to clear the CiviCRM cache after enabling this plugin.

## Known issues

1. This plugin supports CiviCRM installations where the WordPress and CiviCRM data are in separate databases. However, in order for this plugin to work, both databases need to be on the same server and the CiviCRM database user needs readonly access to the WordPress database.
2. Currently only readonly support for WordPress entities is supported.
3. (If using with GravityForms): Gravity Forms stores a lot of data as JSON, which makes it hard to extract with SQL alone, and therefore limits how much data can easily be extracted through the API
4. (If using with WooCommerce): Older versions of WooCommerce stored order data in the WordPress posts table. Newer installations will use [High-Performance Order Storage](https://woocommerce.com/document/high-performance-order-storage/) which stores the orders in dedicated tables. How you read WooCommerce data from the API will need to chose the appropriate API endpoint depending on if you are using High-Performance Order Storage.