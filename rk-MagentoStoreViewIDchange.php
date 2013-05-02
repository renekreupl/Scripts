<?php
	/*
	Magento 1.7.0.2 Store View ID Change - Version 0.3
	(c) Rene Kreupl - www.renekreupl.de
	*/
	
	// Config
	$mySQL_settings['host'] 	= 'localhost';
	$mySQL_settings['user'] 	= 'USER';
	$mySQL_settings['pswd'] 	= 'PASSWORD';
	$mySQL_settings['dbname'] 	= 'DATABASE';

	ini_set('max_execution_time', 120);

	
	// Store ID´s
	$webid = array(
					"2" => "1",
					"3" => "2"
				);
	
	// Tables in relation with core_store (store_id)
	$core_store = array('catalogsearch_query',
						'catalog_category_entity_datetime',
						'catalog_category_entity_decimal',
						'catalog_category_entity_int',
						'catalog_category_entity_text',
						'catalog_category_entity_varchar',
						'catalog_category_product_index',
						'catalog_compare_item',
						'catalog_product_enabled_index',
						'catalog_product_entity_datetime',
						'catalog_product_entity_decimal',
						'catalog_product_entity_gallery',
						'catalog_product_entity_int',
						'catalog_product_entity_media_gallery_value',
						'catalog_product_entity_text',
						'catalog_product_entity_varchar',
						'catalog_product_index_eav',
						'catalog_product_index_eav_decimal',
						'catalog_product_option_price',
						'catalog_product_option_title',
						'catalog_product_option_type_price',
						'catalog_product_option_type_title',
						'catalog_product_super_attribute_label',
						'checkout_agreement_store',
						'cms_block_store',
						'cms_page_store',
						'core_layout_link',
						'core_translate',
						'core_url_rewrite',
						'core_variable_value',
						'coupon_aggregated',
						'coupon_aggregated_order',
						'coupon_aggregated_updated',
						'customer_entity',
						'dataflow_batch',
						'design_change',
						'downloadable_link_title',
						'downloadable_sample_title',
						'eav_attribute_label',
						'eav_attribute_option_value',
						'eav_entity',
						'eav_entity_datetime',
						'eav_entity_decimal',
						'eav_entity_int',
						'eav_entity_store',
						'eav_entity_text',
						'eav_entity_varchar',
						'eav_form_fieldset_label',
						'eav_form_type',
						'newsletter_queue_store_link',
						'newsletter_subscriber',
						'poll',
						'poll_store',
						'rating_option_vote_aggregated',
						'rating_store',
						'rating_title',
						'report_compared_product_index',
						'report_event',
						'report_viewed_product_aggregated_daily',
						'report_viewed_product_aggregated_monthly',
						'report_viewed_product_aggregated_yearly',
						'report_viewed_product_index',
						'review_detail',
						'review_entity_summary',
						'review_store',
						'salesrule_label',
						'sales_bestsellers_aggregated_daily',
						'sales_bestsellers_aggregated_monthly',
						'sales_bestsellers_aggregated_yearly',
						'sales_billing_agreement',
						'sales_flat_creditmemo',
						'sales_flat_creditmemo_grid',
						'sales_flat_invoice',
						'sales_flat_invoice_grid',
						'sales_flat_order',
						'sales_flat_order_grid',
						'sales_flat_order_item',
						'sales_flat_quote',
						'sales_flat_quote_item',
						'sales_flat_shipment',
						'sales_flat_shipment_grid',
						'sales_invoiced_aggregated',
						'sales_invoiced_aggregated_order',
						'sales_order_aggregated_created',
						'sales_order_aggregated_updated',
						'sales_order_status_label',
						'sales_recurring_profile',
						'sales_refunded_aggregated',
						'sales_refunded_aggregated_order',
						'sales_shipping_aggregated',
						'sales_shipping_aggregated_order',
						'sitemap',
						#'tag',
						'tag_properties',
						'tag_relation',
						'tag_summary',
						'tax_calculation_rate_title',
						'tax_order_aggregated_created',
						'tax_order_aggregated_updated',
						'wishlist_item',
						'xmlconnect_application'
					);
	
	// Tables in relation with core_website (website_id)
	$core_website = array('cataloginventory_stock_status',
							'catalogrule_group_website',
							'catalogrule_product',
							'catalogrule_product_price',
							'catalogrule_website',
							'catalog_product_bundle_price_index',
							'catalog_product_bundle_selection_price',
							'catalog_product_entity_group_price',
							'catalog_product_entity_tier_price',
							'catalog_product_index_group_price',
							'catalog_product_index_price',
							'catalog_product_index_tier_price',
							'catalog_product_index_website',
							'catalog_product_super_attribute_pricing',
							'catalog_product_website',
							'customer_eav_attribute_website',
							'customer_entity',
							'downloadable_link_price',
							'paypal_cert',
							'persistent_session',
							'product_alert_price',
							'product_alert_stock',
							'salesrule_product_attribute',
							'salesrule_website',
							'weee_discount',
							'weee_tax'
						);
	
	// MySQL Connect
	function  mysql_con() {
		global $mySQL_settings;
		$con = @mysql_connect($mySQL_settings['host'], $mySQL_settings['user'], $mySQL_settings['pswd']);
		if ($con === FALSE) {
			$error("CONN.OPEN");
		}
		if (@mysql_select_db($mySQL_settings['dbname'], $con) === FALSE) {
			$error("DB.SELECT");
		} else {
			$connected = TRUE;
		}
	}
	mysql_con();
	mysql_query("SET NAMES 'utf8'");
	mysql_query("SET FOREIGN_KEY_CHECKS=0");
	
	// core ID´s anpassen
	// Manual in 'core_store', 'core_store_group', 'core_website',

	// Magento Store View Change
	
	foreach($core_store as $sid) {
		
		mysql_query("UPDATE ".$sid." SET store_id = '3' where store_id = '1'");
		mysql_query("UPDATE ".$sid." SET store_id = '1' where store_id = '2'");
		mysql_query("UPDATE ".$sid." SET store_id = '2' where store_id = '3'");
		
	}
	
	foreach($core_website as $wid) {
		
		mysql_query("UPDATE ".$wid." SET website_id = '3' where website_id = '1'");
		mysql_query("UPDATE ".$wid." SET website_id = '1' where website_id = '2'");
		mysql_query("UPDATE ".$wid." SET website_id = '2' where website_id = '3'");
				
	}
	
	mysql_query("SET FOREIGN_KEY_CHECKS=1");
	
?>