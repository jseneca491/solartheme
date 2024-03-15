<?php
/**
 * Easy Demo Import Pro - WooCommerce Functions
 *
 * @package    jedi-master
 * @author     Jerry Simmons <jerry@ferventsolutions.com>
 * @copyright  2020 Jerry Simmons
 * @license    GPL-2.0+
 **/

if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Update WooCommerce Product Galleries With New Media IDs
 *
 * @uses JEDI Hook jedi_after_post_import
 * @param array $jedi_post_ids An array of imported Post IDs.
 **/
function jswj_update_woocommerce_galleries( $jedi_post_ids ) {

	$import_data = jswj_get_jedi_import_data();
	$postmeta = $import_data['postmeta'];
	$track_import = get_option( 'jedi_track_import' );

	# Bail If No Media Imported
	if( count( $track_import['imported_media']['ids'] ) === 0 ) { return; }

	$jedi_update_image_ids = $track_import['imported_media']['ids'];

	foreach( $jedi_post_ids as $old_id => $new_id ) {

		# Get WooCommerce Gallery Media IDs
		$meta_value = get_post_meta( $new_id, '_product_image_gallery', true );
		if( empty( $meta_value ) ) { continue; }

		# Loop Through Media IDs
		$gallery_id_array = explode( ',', $meta_value );
		foreach( $gallery_id_array as $key => $gallery_id ) {
			if( isset( $jedi_update_image_ids[ $gallery_id ] ) ) {
				$gallery_id_array[ $key ] = $jedi_update_image_ids[ $gallery_id ];
			}
		}
		$new_gallery_ids = implode( ',', $gallery_id_array );

		jswj_jedi_log( 'Updating WooCommerce Gallery For Product ID #' . $new_id, $new_gallery_ids );
		update_post_meta( $new_id, '_product_image_gallery', $new_gallery_ids );
	} # END foreach jedi_post_ids

} # END jswj_update_woocommerce_galleries()
add_action( 'jedi_after_post_import', 'jswj_update_woocommerce_galleries' );


/**
 * Restore WooCommerce Settings
 * Update Post IDs Where Applicable
 *
 * @uses JEDI Hook jedi_after_post_import
 * @param array $jedi_post_ids An array of imported Post IDs.
 **/
function jswj_update_woocommerce_settings( $jedi_post_ids ) {

	$import_data = jswj_get_jedi_import_data();
	$track_import = get_option( 'jedi_track_import' );

	if( ! isset( $import_data['woocommerce_settings'] ) ) { return; }

	$jedi_master_woocommerce_export = $import_data['woocommerce_settings'];

	foreach( $jedi_master_woocommerce_export as $key => $option ) {
		switch( $key ) {

			# Single Post ID Updates
			case 'woocommerce_shop_page_id':
			case 'woocommerce_cart_page_id':
			case 'woocommerce_checkout_page_id':
			case 'woocommerce_myaccount_page_id':
			case 'woocommerce_terms_page_id':
				if( isset( $jedi_post_ids[ $option ] ) ) { $option = $jedi_post_ids[ $option ]; }
				break;
		}
		update_option( $key, $option );
		jswj_jedi_log( 'Updating WooCommerce Setting: ' . $key, serialize( $option ) );
	}

} # END jswj_update_woocommerce_settings()
add_action( 'jedi_after_post_import', 'jswj_update_woocommerce_settings' );
