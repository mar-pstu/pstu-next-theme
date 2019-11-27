( function( blocks, editor, i18n, element, components, _ ) {
	var el = element.createElement;
	var RichText = editor.RichText;
	var MediaUpload = editor.MediaUpload;

	blocks.registerBlockType( 'pstu-next-theme/list-subpages', {

		title: i18n.__( 'Список подстраниц', 'pstu-next-theme' ),
		keywords: [
			i18n.__( 'ПГТУ', 'pstu-next-theme' ),
			i18n.__( 'список', 'pstu-next-theme' ),
			i18n.__( 'подстраницы', 'pstu-next-theme' ),
			i18n.__( 'дочерние страницы', 'pstu-next-theme' ),
		],
		icon: 'list-view',
		category: 'layout',
		attributes: {
			subpages: {
				type: 'array',
				source: 'children',
				selector: '.subpages-list',
			},
		},

		styles: [
			{
                name: 'subpages-default',
                label:i18n. __( 'Стандартный', 'pstu-next-theme' ),
                isDefault: true
            },
            {
                name: 'subpages-web',
                label:i18n. __( 'WEB', 'pstu-next-theme' ),
                isDefault: true
            },
		],

		edit: function( props ) {
			var attributes = props.attributes;
			return el( 'div', { className: props.className + ' subpages' },
				el( RichText, {
					tagName: 'ul',
					multiline: 'li',
					placeholder: i18n.__( 'Список подстраниц', 'pstu-next-theme' ),
					value: attributes.subpages,
					onChange: function( value ) {
						props.setAttributes( { subpages: value } );
					},
					className: 'subpages-list'
				} )
			);
		},

		save: function( props ) {
			var attributes = props.attributes;
			return ( attributes.subpages.length > 0 ) && el( 'div', { className: props.className + ' subpages' },
				el( RichText.Content, {
					tagName: 'ul',
					value: attributes.subpages,
					className: 'subpages-list'
				} )
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