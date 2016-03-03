<?php
/*
    Plugin Name: MyBillCOM Script
    Plugin URI: http://mybillcom.com
    Author: Wassem Masnour
    Version: 0.1
    Author URI: http://razztech.net
*/

/**
 * @since 0.1
 */
class MyBillCom_Script {

    /**
     * @return void
     * @since 0.1
     */
    public function __construct() {

	foreach( $this->get_compaines() as $company ) {

	    if ( ! is_array( $company ) ) {
		continue;
	    }

	    $biller_query = new WP_Query( array(
		'name'	    => sanitize_title( $company['name'] ),
		'post_type' => 'biller',
	    ) );

	    if ( $biller_query->have_posts() ) {
		continue;
	    }

	    unset( $company['posts'] ); // Not-needed data.

	    $this->insert_biller( array(
		'biller_name'		=> $company['name'],
		'biller_phone_number'	=> $company['phone_number'],
		'biller_zip_code'	=> $company['zip_code'],
		'biller_website'	=> $company['website'],
		'biller_website_link'	=> $company['website_link'],
		'biller_address'	=> $company['address'],
		'biller_state'		=> $company['state'],
	    ) );

	}

    }

    /**
     * @return array
     * @since 0.1
     */
    public function get_compaines( array $args = array() ) {

	global $wpdb;

	$compaines = array();

	$args = array_merge( array(
	    'initial'    => '',
	    'order'      => 'DESC',
	), (array) $args );

	$sql = "SELECT post_id, meta_value FROM $wpdb->postmeta WHERE meta_key = 'company_name'";

	if ( ! empty( $args['initial'] ) ) {
	    $args['initial'] = strtoupper( substr( $args['initial'], 0, 1 ) );
	    $sql .= $wpdb->prepare( " AND UPPER( SUBSTR(meta_value,1,1) ) = '%s'", $args['initial'] );
	}

	$results = $wpdb->get_results( $sql, OBJECT );

	if ( is_array( $results ) && ! empty( $results ) ) {

	    foreach( $results as $result ) {

		$post_id = (int) $result->post_id;

		$post_type = get_post_type( $post_id );

		if ( 'post' !== $post_type ) {
		    continue;
		}

		$post_status = get_post_status( $post_id );

		if ( 'publish' !== $post_status ) {
		    continue;
		}

		$company_name = trim( strip_tags( $result->meta_value ) );

		if ( empty( $company_name ) ) {
		    continue;
		}

		if ( ! isset( $compaines[ $company_name ] ) ) {

		    $compaines[ $company_name ] = array(
			'name'  => $company_name,
			'posts' => array(),
		    );

		}

		$compaines[ $company_name ]['posts'][] = $post_id;

		foreach( array( 'phone_number', 'zip_code', 'website', 'website_link', 'address', 'state' ) as $meta_key ) {

		    if ( ! isset( $compaines[ $company_name ][ $meta_key ] ) ) {

			if ( ( $meta_value = get_post_meta( $post_id, $meta_key, TRUE ) ) ) {
			    $compaines[ $company_name ][ $meta_key ] = $meta_value;
			}

		    }

		}

	    }

	}

	if ( 'ASC' === $args ) {
	    krsort( $compaines );
	} else {
	    ksort( $compaines );
	}

	return $compaines;

    }

    /**
     * @return bool
     * @since 0.1
     */
    public function insert_biller( array $data ) {

	$data = array_merge( array(
	    'biller_name'		=> NULL,
	    'biller_phone_number'	=> NULL,
	    'biller_zip_code'		=> NULL,
	    'biller_website'		=> NULL,
	    'biller_website_link'	=> NULL,
	    'biller_address'		=> NULL,
	    'biller_state'		=> NULL,
	), $data );

	if ( empty( $data['biller_name'] ) ) {
	    return false;
	}

	$post_id = wp_insert_post( array(
	    'post_title'    => $data['biller_name'],
	    'post_status'   => 'pending',
	    'post_type'	    => 'biller',
	), TRUE );

	if ( empty( $post_id ) || is_wp_error( $post_id ) ) {
	    return false;
	}

	foreach( $data as $key => $value ) {

	    if ( is_null( $value ) ) {
		continue;
	    }

	    add_post_meta( $post_id, $key, $value );

	}

	return $post_id;

    }

}

/**
 * @return void
 * @since 0.1
 */
function MyBillCom_Script() {
    new MyBillCom_Script();
}

if ( is_admin() && isset( $_GET['MBC_script'] ) && '1' === $_GET['MBC_script'] ) {
    add_action( 'init', 'MyBillCom_Script', 100 );
}