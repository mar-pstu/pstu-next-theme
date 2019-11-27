( function( blocks, editor, i18n, element, components, _ ) {
	var el = element.createElement;
	var RichText = editor.RichText;
	var MediaUpload = editor.MediaUpload;
	var SelectControl = wp.components.SelectControl;

	blocks.registerBlockType( 'pstu-next-theme/heading', {
		title: i18n.__( 'Заголовок с иконкой', 'pstu-next-theme' ),
		description: i18n.__( 'При использовании внутри списка аккордеона добавляет иконку в панель списка', 'pstu-next-theme' ),
		keywords: [
			i18n.__( 'ПГТУ', 'pstu-next-theme' ),
			i18n.__( 'аккордеон', 'pstu-next-theme' ),
			i18n.__( 'список', 'pstu-next-theme' ),
			i18n.__( 'заголовок', 'pstu-next-theme' ),
			i18n.__( 'иконка', 'pstu-next-theme' ),
		],
		// icon: 'heading',
		icon: el( 'svg', { 'width': 24, 'height': 24, 'viewBox': '0 0 24 24', 'role': 'img', 'aria-hidden': 'true', 'focusable': 'false' },
			el( 'path', { 'd': 'M5 4v3h5.5v12h3V7H19V4z' } ),
			el( 'path', { 'fill': 'none', 'd': 'M0 0h24v24H0V0z' } )
		),
		category: 'layout',
		supports: {
			customClassName: false,
		},
		attributes: {
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
				selector: 'img.thumbnail',
				attribute: 'data-src',
			},
			level: {
				type: 'string',
				default: 'h2'
			},
			title: {
                type: 'array',
                source: 'children',
                selector: '.title',
            },
		},
		edit: function( props ) {
			function onChangeContent( newTitle ) {
				props.setAttributes( { title: newTitle } );
			}
			function onChangeLevel( newLevel ) {
				console.log( newLevel );
				props.setAttributes( { level: newLevel } );
			}
			var onSelectIcon = function( media ) {
				return props.setAttributes( {
					mediaURL: ( typeof media.sizes.thumbnail == "undefined" ) ? media.url : media.sizes.thumbnail.url,
					mediaID: media.id,
					mediaAlt: media.alt,
				} );
			};
			return el( 'div', { className: 'heading ' + props.className },
				el( 'div', { className: 'heading__thumbnail thumbnail' },
					el( MediaUpload, {
						onSelect: onSelectIcon,
						allowedTypes: 'image',
						value: props.attributes.mediaID,
						render: function( obj ) {
							return el( components.Button, {
									className: props.attributes.mediaID ? 'thumbnail' : 'add-thumbnail-button',
									onClick: obj.open
								},
								! props.attributes.mediaID ? '' : el( 'img', { src: props.attributes.mediaURL } )
							);
						}
					} ),
				),
				el( 'div', { className: 'heading__title title' },
					el( wp.editor.BlockControls, 
						{ 
							key: 'controls',
							controls: [
								{
									icon: 'heading',
									title: 'h2',
									isActive: props.attributes.level === 'h2',
									onClick: function() { onChangeLevel( 'h2' ) },
									subscript: '2',
								},
								{
									icon: 'heading',
									title: 'h3',
									isActive: props.attributes.level === 'h3',
									onClick: function() { onChangeLevel( 'h3' ) },
									subscript: '3',
								},
								{
									icon: 'heading',
									title: 'h4',
									isActive: props.attributes.level === 'h4',
									onClick: function() { onChangeLevel( 'h4' ) },
									subscript: '4',
								},
							]
						}
					),
					el( RichText, {
						tagName: props.attributes.level,
						onChange: onChangeContent,
						value: props.attributes.title,
						formattingControls: [ 'bold', 'italic', 'strikethrough' ],
					} )
				),
			);
		},

		save: function( props ) {
			return el( 'div', { className: 'heading heading--icon' },
				props.attributes.mediaURL && el( 'img', {
					className: 'heading__thumbnail thumbnail lazy',
					'data-src': props.attributes.mediaURL,
					'src': '#',
					'alt': props.attributes.mediaAlt,
				} ),
				el( RichText.Content, {
	                tagName: props.attributes.level,
	                className: 'heading__title title',
	                value: props.attributes.title
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
