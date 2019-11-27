( function( blocks, editor, i18n, element, components, _ ) {
	var el = element.createElement;
	var RichText = editor.RichText;
	var MediaUpload = editor.MediaUpload;
	var TextControl = wp.components.TextControl;
	var InnerBlocks = editor.InnerBlocks;

	blocks.registerBlockType( 'pstu-next-theme/nav-flat-container', {
		title: i18n.__( '"Флат" меню', 'pstu-next-theme' ),
		description: i18n.__( 'PSTU Контейнер для меню в виде блоков 2*3', 'pstu-next-theme' ),
		keywords: [
			i18n.__( 'ПГТУ', 'pstu-next-theme' ),
			i18n.__( 'иконка', 'pstu-next-theme' ),
			i18n.__( 'список', 'pstu-next-theme' ),
			i18n.__( 'меню', 'pstu-next-theme' ),
			i18n.__( 'пункт меню', 'pstu-next-theme' ),
			i18n.__( 'контейнер', 'pstu-next-theme' ),
			i18n.__( 'флат', 'pstu-next-theme' ),
		],
		icon: 'screenoptions',
		category: 'layout',
		supports: {
			customClassName: false,
			html: false,
		},
		edit: function( props ) {
			return el( 'div', { className: 'flat' },
				el( editor.InnerBlocks, {
					allowedBlocks: [ 'pstu-next-theme/nav-flat' ],
                	template: [ [ 'pstu-next-theme/nav-flat', { 'placeholder':'Пункт меню' } ] ],
				} ),
			);
		},
		save: function( props ) {
			return el( 'div', { className: props.className + ' flat' },
				el( 'div', { className: 'row' }, el( InnerBlocks.Content, null ) )
			);
		},
	} );

} )(
	window.wp.blocks,
	window.wp.editor,
	window.wp.i18n,
	window.wp.element,
	window.wp.components,
	window._,
);