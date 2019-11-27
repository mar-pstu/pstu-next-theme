( function( blocks, editor, i18n, element, components, _ ) {
	var el = element.createElement;
	var RichText = editor.RichText;
	var MediaUpload = editor.MediaUpload;
	var TextControl = wp.components.TextControl;

	blocks.registerBlockType( 'pstu-next-theme/nav-flat', {
		title: i18n.__( 'Пункт меню', 'pstu-next-theme' ),
		description: i18n.__( 'Пункт иконочного меню', 'pstu-next-theme' ),
		keywords: [
			i18n.__( 'ПГТУ', 'pstu-next-theme' ),
			i18n.__( 'иконка', 'pstu-next-theme' ),
			i18n.__( 'список', 'pstu-next-theme' ),
			i18n.__( 'меню', 'pstu-next-theme' ),
			i18n.__( 'пункт меню', 'pstu-next-theme' ),
		],
		icon: 'screenoptions',
		category: 'layout',
		parent: [ 'pstu-next-theme/nav-flat-container' ],
		supports: {
			customClassName: false,
		},
		attributes: {
			title: {
				type: 'array',
				source: 'children',
				selector: '.title',
			},
			excerpt: {
				type: 'array',
				source: 'children',
				selector: '.excerpt',
			},
			mediaID: {
				type: 'number',
			},
			mediaAlt: {
				type: 'string',
				default: '',
			},
			mediaURL: {
				type: 'string',
				source: 'attribute',
				selector: '.wp-post-image',
				attribute: 'data-src',
			},
			link: {
				type: 'string',
				source: 'attribute',
				selector: '.entry',
				attribute: 'href',
				default: '',
			},
		},
		edit: function( props ) {
			var attributes = props.attributes;
			var onSelectIcon = function( media ) {
				return props.setAttributes( {
					mediaURL: ( typeof media.sizes[ 'thumbnail-3x2' ] == "undefined" ) ? media.url : media.sizes[ 'thumbnail-3x2' ].url,
					mediaID: media.id,
					mediaAlt: media.alt,
				} );
			};
			return el( 'div', { className: 'flat__entry entry' },
				el( MediaUpload, {
					onSelect: onSelectIcon,
					allowedTypes: 'image',
					value: attributes.mediaID,
					render: function( obj ) {
						return el( components.Button, {
								className: attributes.mediaID ? 'thumbnail' : 'add-thumbnail-button',
								onClick: obj.open
							},
							! attributes.mediaID ? '' : el( 'img', { src: attributes.mediaURL } )
						);
					}
				} ),
				el( RichText, {
					tagName: 'h3',
					className: 'title',
					inline: true,
					placeholder: i18n.__( 'Заголовок', 'pstu-next-theme' ),
					value: attributes.title,
					formattingControls: [ 'bold', 'italic', 'strikethrough' ],
					onChange: function( value ) {
						props.setAttributes( { title: value } );
					},
				} ),
				el( RichText, {
					tagName: 'div',
					className: 'excerpt',
					inline: true,
					placeholder: i18n.__( 'Описание', 'pstu-next-theme' ),
					value: attributes.excerpt,
					formattingControls: [ 'bold', 'italic', 'strikethrough' ],
					onChange: function( value ) {
						props.setAttributes( { excerpt: value } );
					},
				} ),
				el( wp.editor.URLInputButton, {
					url: props.attributes.link,
					onChange: function( url, post ) {
						props.setAttributes( { link: url, text: ( post && post.title ) || 'Click here' } );
					}
				} ),
				// el( TextControl, {
				// 	value: props.attributes.link,
				// 	placeholder: i18n.__( 'Ссылка / URL', 'pstu-next-theme' ),
				// 	onChange: function( value ) {
				// 		props.setAttributes( { link: value } );
				// 	},
				// } ),
			);
		},
		save: function( props ) {
			var tagName = 'div';
			var elProps = {
				className: 'flat__entry entry',
				'role': 'listitem',
			};
			if ( typeof props.attributes.link != 'undefined' && props.attributes.link.length > 0 ) {
				tagName = 'a';
				elProps.href = props.attributes.link;
			}
			return el( 'div', { className: 'col-xs-12 col-sm-6 col-md-6 col-lg-6' },
				el( tagName, elProps,
					props.attributes.mediaURL && el( 'img', {
						className: 'wp-post-image lazy',
						'data-src': props.attributes.mediaURL,
						'src': '#',
						'alt': props.attributes.mediaAlt,
					} ),
					( props.attributes.title.length > 0 ) && el( RichText.Content, {
						tagName: 'h3',
						value: props.attributes.title,
						className: 'title'
					} ),
					( props.attributes.excerpt.length > 0 ) && el( RichText.Content, {
						tagName: 'div',
						value: props.attributes.excerpt,
						className: 'excerpt'
					} ),
				)
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