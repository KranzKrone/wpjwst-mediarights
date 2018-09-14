<?php
/**
 * Add MediaRight to attachment and URL fields to media uploader
 *
 * @param $form_fields array, fields to include in attachment form
 * @param $post object, attachment record in database
 * @return $form_fields, modified form fields
 *
 */

class InputRights { 
	
	public function __construct(){
		add_filter( 'attachment_fields_to_edit', array($this, 'attachment_field_credit'), 8, 2 );
		add_filter( 'attachment_fields_to_save', array($this, 'attachment_field_credit_save'), 8, 2 );
	}
	
	public function attachment_field_credit( $form_fields, $post ) {
		$form_fields['mediaright-name'] = array(
			'label' => 'MediaRight Owner Name',
			'input' => 'text',
			'value' => get_post_meta( $post->ID, 'mediaright-name', true ),
			'helps' => 'If provided, photo credit will be displayed',
		);

		$form_fields['mediaright-url'] = array(
			'label' => 'MediaRight Owner URL',
			'input' => 'text',
			'value' => get_post_meta( $post->ID, 'mediaright-url', true ),
			'helps' => 'If provided, photo credit will be displayed',
		);

		$form_fields['photographer-name'] = array(
			'label' => 'Photographer Name',
			'input' => 'text',
			'value' => get_post_meta( $post->ID, 'photographer_name', true ),
			'helps' => 'If provided, photo credit will be displayed',
		);
	 
		$form_fields['photographer-url'] = array(
			'label' => 'Photographer URL',
			'input' => 'text',
			'value' => get_post_meta( $post->ID, 'photographer_url', true ),
			'helps' => 'Add Photographer URL',
		);
	 
		return $form_fields;
	}
 
	/**
	 * Save values of field input in media uploader - save and update
	 *
	 * @param $post array, the post data for database
	 * @param $attachment array, attachment fields from $_POST form
	 * @return $post array, modified post data
	 */
	public function attachment_field_credit_save( $post, $attachment ) {
		if( isset( $attachment['mediaright-name'] ) )
			update_post_meta( $post['ID'], 'mediaright-name', $attachment['mediaright-name'] );

		if( isset( $attachment['mediaright-url'] ) )
			update_post_meta( $post['ID'], 'mediaright-url', $attachment['mediaright-url'] );

		if( isset( $attachment['photographer-name'] ) )
			update_post_meta( $post['ID'], 'photographer_name', $attachment['photographer-name'] );
	 
		if( isset( $attachment['photographer-url'] ) )
			update_post_meta( $post['ID'], 'photographer_url', esc_url( $attachment['photographer-url'] ) );
	 
		return $post;
	}
 
}
