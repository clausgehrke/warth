<?php
/*
 * docs
 */

add_filter( 'docs_content', 'add_docs_content' );
function add_docs_content() {
	$docs_content = __('Custom Docs Content', 'warth');
	return $docs_content;
}

add_filter( 'docs_nav', 'add_docs_nav' );
function add_docs_nav() {
	$docs_nav = array(
		// slug => name
		'#list-item1' => __('Custom List Item1', 'warth')
	);
	return $docs_nav;
}