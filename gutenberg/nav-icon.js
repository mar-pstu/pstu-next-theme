( function( blocks, editor, i18n, element, components, _ ) {
	var el = element.createElement;
	var RichText = editor.RichText;
	var MediaUpload = editor.MediaUpload;
	var TextControl = wp.components.TextControl;

	blocks.registerBlockType( 'pstu-next-theme/nav-icon', {
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
		parent: [ 'pstu-next-theme/nav-icons-container' ],
		supports: {
			customClassName: false,
		},
		attributes: {
			title: {
				type: 'array',
				source: 'children',
				selector: '.title',
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
				selector: '.icon',
				attribute: 'data-src',
			},
			link: {
				type: 'string',
				source: 'attribute',
				selector: '.item',
				attribute: 'href',
				default: '',
			},
		},
		edit: function( props ) {
			var attributes = props.attributes;
			var onSelectIcon = function( media ) {
				return props.setAttributes( {
					mediaURL: ( typeof media.sizes.thumbnail == "undefined" ) ? media.url : media.sizes.thumbnail.url,
					mediaID: media.id,
					mediaAlt: media.alt,
				} );
			};
			return el( 'div', { className: 'navicons__item item', 'role': 'listitem' },
				el( MediaUpload, {
					onSelect: onSelectIcon,
					allowedTypes: 'image',
					value: attributes.mediaID,
					render: function( obj ) {
						return el( components.Button, {
								className: attributes.mediaID ? 'icon' : 'add-icon-button',
								onClick: obj.open
							},
							! attributes.mediaID ? '' : el( 'img', { src: attributes.mediaURL } )
						);
					}
				} ),
				el( RichText, {
					tagName: 'div',
					className: 'title',
					inline: true,
					placeholder: i18n.__( 'Заголовок', 'pstu-next-theme' ),
					value: attributes.title,
					formattingControls: [ 'bold', 'italic', 'strikethrough' ],
					onChange: function( value ) {
						props.setAttributes( { title: value } );
					},
				} ),
				el( wp.editor.URLInputButton, {
					url: props.attributes.link,
					onChange: function( url, post ) {
						props.setAttributes( { link: url, text: ( post && post.title ) || 'Click here' } );
					}
				} ),
			);
		},
		save: function( props ) {
			var tagName = 'div';
			var elProps = {
				className: 'navicons__item item',
				'role': 'listitem',
			};
			if ( typeof props.attributes.link != 'undefined' && props.attributes.link.length > 0 ) {
				tagName = 'a';
				elProps.href = props.attributes.link;
			}
			return el( tagName, elProps,
				props.attributes.mediaURL && el( 'img', {
					className: 'icon lazy',
					'data-src': props.attributes.mediaURL,
					'src': '#',
					'alt': props.attributes.mediaAlt,
				} ),
				( props.attributes.title.length > 0 ) && el( RichText.Content, {
					tagName: 'div',
					value: props.attributes.title,
					className: 'title'
				} ),
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