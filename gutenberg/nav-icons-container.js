( function( blocks, editor, i18n, element, components, _ ) {
	var el = element.createElement;
	var RichText = editor.RichText;
	var MediaUpload = editor.MediaUpload;
	var TextControl = wp.components.TextControl;
	var InnerBlocks = editor.InnerBlocks;

	blocks.registerBlockType( 'pstu-next-theme/nav-icons-container', {
		title: i18n.__( 'Иконочное меню', 'pstu-next-theme' ),
		description: i18n.__( 'PSTU Контейнер иконок', 'pstu-next-theme' ),
		keywords: [
			i18n.__( 'ПГТУ', 'pstu-next-theme' ),
			i18n.__( 'иконка', 'pstu-next-theme' ),
			i18n.__( 'список', 'pstu-next-theme' ),
			i18n.__( 'меню', 'pstu-next-theme' ),
			i18n.__( 'пункт меню', 'pstu-next-theme' ),
			i18n.__( 'контейнер', 'pstu-next-theme' ),
		],
		icon: 'screenoptions',
		category: 'layout',
		supports: {
			customClassName: false,
			html: false,
		},
		edit: function( props ) {
			return el( 'div', { className: 'navicons' },
				el( editor.InnerBlocks, {
					allowedBlocks: [ 'pstu-next-theme/nav-icon' ],
                	template: [ [ 'pstu-next-theme/nav-icon', { 'placeholder':'Пункт меню' } ] ],
				} ),
			);
		},
		save: function( props ) {
			return el( 'div', { className: props.className + ' navicons' }, el( InnerBlocks.Content, null ) );
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