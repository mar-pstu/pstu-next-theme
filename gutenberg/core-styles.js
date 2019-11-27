( function( blocks, editor, i18n, element, components, _ ) {


	// Параграф

	wp.blocks.registerBlockStyle( "core/paragraph", {
		name: 'text-primary',
		label: i18n.__( 'Text Primary', 'pstu-next-theme' ),
	} );

	wp.blocks.registerBlockStyle( "core/paragraph", {
		name: 'text-success',
		label: i18n.__( 'Text Success', 'pstu-next-theme' ),
	} );

	wp.blocks.registerBlockStyle( "core/paragraph", {
		name: 'text-info',
		label: i18n.__( 'Text Info', 'pstu-next-theme' ),
	} );

	wp.blocks.registerBlockStyle( "core/paragraph", {
		name: 'text-warning',
		label: i18n.__( 'Text Warning', 'pstu-next-theme' ),
	} );

	wp.blocks.registerBlockStyle( "core/paragraph", {
		name: 'text-danger',
		label: i18n.__( 'Text Danger', 'pstu-next-theme' ),
	} );


	// Таблицы

	wp.blocks.registerBlockStyle( "core/table", {
		name: 'table-default',
		label: i18n.__( 'Table Default', 'pstu-next-theme' ),
	} );

	wp.blocks.registerBlockStyle( "core/table", {
		name: 'table-primary',
		label: i18n.__( 'Table Primary', 'pstu-next-theme' ),
	} );

	wp.blocks.registerBlockStyle( "core/table", {
		name: 'table-success',
		label: i18n.__( 'Table Success', 'pstu-next-theme' ),
	} );

	wp.blocks.registerBlockStyle( "core/table", {
		name: 'table-warning',
		label: i18n.__( 'Table Warning', 'pstu-next-theme' ),
	} );

	wp.blocks.registerBlockStyle( "core/table", {
		name: 'table-danger',
		label: i18n.__( 'Table Danger', 'pstu-next-theme' ),
	} );

	wp.blocks.registerBlockStyle( "core/table", {
		name: 'table-info',
		label: i18n.__( 'Table Info', 'pstu-next-theme' ),
	} );



} )(
	window.wp.blocks,
	window.wp.editor,
	window.wp.i18n,
	window.wp.element,
	window.wp.components,
	window._,
);