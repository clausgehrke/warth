<?php
/*
 * docs
 */

add_filter( 'docs_content', 'add_docs_content' );
function add_docs_content() {

	$docs_content = '<img src="' . IMG . '/warthlogo.png" width="256" height="84" /><br />';

	// latest news
	$docs_content .= '<h2 id="latest">' . __('Aktuelles', 'warth') . '</h2>';
	$docs_content .= '<p class="info">' . __('Neuigkeiten können unter <a href="edit.php" title="Aktuelles">Aktuelles</a> geändert und ergänzt werden.', 'warth') . '</p>';

	// forms
	$docs_content .= '<h2 id="forms">' . __('Formulare', 'warth') . '</h2>';
	$docs_content .= '<p>' . __('Jeder Seite kann über eine Metabox ein Formular zugewiesen werden.', 'warth') . '</p>';
	$docs_content .= '<p class="info">' . __('Die Inhalte der Formulare können unter <a href="admin.php?page=ninja-forms" title="Formulare »&nbsp;Alle Formulare">Formulare</a> geändert und ergänzt werden.', 'warth') . '</p>';

	// video
	$docs_content .= '<h2 id="video">' . __('Videos', 'warth') . '</h2>';
	$docs_content .= '<p>' . __('Videos können in Beiträge und Seiten per YouTube-Link eingebunden werden.', 'warth') . '</p>';
	$docs_content .= '<div class="border"><img src="' . IMG . '/docs/video-embed.png" width="614" height="199" /></div>';
	$docs_content .= '<p class="description">' . __('Wird der Link in den Editor kopiert erscheint automatisch das eingebettete Video auf der Seite.', 'warth') . '</p>';

	// gallery
	$docs_content .= '<h2 id="gallery">' . __('Galerien', 'warth') . '</h2>';
	$docs_content .= '<p>' . __('Alle Werke müssen mit einer Kategorie versehen werden, um in der jeweiligen Galerie angezeigt zu werden.', 'warth') . '</p>';
	$docs_content .= '<p class="info">' . __('Kategorie-Beschreibungen können unter <a href="edit-tags.php?taxonomy=bilder&post_type=werk" title="Werke »&nbsp;Kategorien">Kategorien</a> geändert und ergänzt werden.', 'warth') . '</p>';

	// server
	$docs_content .= '<h2 id="server">' . __('Server-Struktur', 'warth') . '</h2>';
	$docs_content .= '<div class="infobox quicktipp">';
	$docs_content .= '<h2>' . __('Verzeichnisse', 'warth') . '</h2>';
 	$docs_content .= '<p class="quicktipp-desc">' . __('Theme', 'warth') . ':</p>';
	$docs_content .= '<p class="quicktipp-code"><code>/warth-wp/wp-content/themes/warth/</code></p>';
	$docs_content .= '<div class="clear"></div>';
	$docs_content .= '<p class="quicktipp-desc">' . __('Übersetzungen', 'warth') . ':</p>';
	$docs_content .= '<p class="quicktipp-code"><code>/warth-wp/wp-content/themes/warth/languages/</code></p>';
	$docs_content .= '<div class="clear"></div>';
	$docs_content .= '<p class="quicktipp-desc">' . __('Plugins', 'warth') . ':</p>';
 	$docs_content .= '<p class="quicktipp-code"><code>/warth-wp/wp-content/plugins/</code></p>';
	$docs_content .= '<div class="clear"></div>';
	$docs_content .= '<p class="quicktipp-desc">' . __('WordPress-Backend', 'warth') . ':</p>';
	$docs_content .= '<p class="quicktipp-code"><code>/warth-wp/wp-admin/</code> ' . __('und', 'warth') . ' <code>/warth-wp/wp-includes/</code></p>';
	$docs_content .= '<div class="clear"></div>';
	$docs_content .= '</div>';

	return $docs_content;
}

add_filter( 'docs_nav', 'add_docs_nav' );
function add_docs_nav() {
	$docs_nav = array(
		// slug => name
		'#latest' => __('Aktuelles', 'warth'),
		'#forms' => __('Formulare', 'warth'),
		'#video' => __('Videos', 'warth'),
		'#gallery' => __('Galerien', 'warth'),
		'#server' => __('Server-Struktur', 'warth')
	);
	return $docs_nav;
}