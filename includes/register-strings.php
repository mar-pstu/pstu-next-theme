<?php




// блок ссылок на контакты и социальные сети ( part-social.php )
foreach ( get_theme_mod( 'socials', array( '' ) ) as $slug => $value ) {
	if ( empty( $value ) ) continue;
	pll_register_string( 'social_' . $slug, $value, 'pstu-next-theme', false );
}



$pstu_next_address = get_theme_mod( 'pstu_next_address', array() );
if ( isset( $pstu_next_address[ 'title' ] ) && ! empty( trim( $pstu_next_address[ 'title' ] ) ) ) {
	pll_register_string( 'pstu_next_address_title', $pstu_next_address[ 'title' ], 'pstu-next-theme', false );
}



// 
foreach ( array(
	'action_section_title',
	'action_section_subtitle',
	'error404_title',
	'error404_subtitle',
	'similar_heading_title',
	'news_section_badge',
	'sticky_badge_text'
) as $slug ) {
	$value = wp_strip_all_tags( get_theme_mod( $slug, '' ) );
	if ( empty( $value ) ) continue;
	pll_register_string( $slug, $value, 'pstu-next-theme', false );
}  