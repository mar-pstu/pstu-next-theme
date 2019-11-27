( function( blocks, editor, i18n, element, components, _ ) {
	var el = element.createElement;
	var RichText = editor.RichText;
	var MediaUpload = editor.MediaUpload;

	blocks.registerBlockType( 'pstu-next-theme/media-object', {
		title: i18n.__( 'Медиа объект', 'pstu-next-theme' ),
	description: i18n.__( 'PSTU Текстовый блок аналог Boootstrap блока "media". Можно использовать для формирования иерархии страниц. Для автоматического вывода аналогичного списка можно использовать шорткод [SUBPAGES_MEDIA][/SUBPAGES_MEDIA]', 'pstu-next-theme' ),
		icon: 'index-card',
		category: 'layout',
		keywords: [
			i18n.__( 'ПГТУ', 'pstu-next-theme' ),
			i18n.__( 'медиа', 'pstu-next-theme' ),
			i18n.__( 'иконка', 'pstu-next-theme' ),
			i18n.__( 'список', 'pstu-next-theme' ),
		],
		attributes: {
			title: {
				type: 'array',
				source: 'children',
				selector: '.media-heading',
			},
			mediaID: {
				type: 'number',
			},
			mediaURL: {
				type: 'string',
				source: 'attribute',
				selector: '.media-object',
				attribute: 'data-src',
			},
			mediaAlt: {
				type: 'string',
				default: '',
			},
			items: {
				type: 'array',
				source: 'children',
				selector: '.media-body-list'
			},
			excerpt: {
				type: 'array',
				source: 'children',
				selector: '.excerpt',
			},
			position: {
				type: 'string',
				source: 'attribute',
				default: 'media-left',
				attribute: 'data-media-position',
				selector: '.media'
			},
			level: {
				type: 'string',
				default: 'h3'
			},
		},
		edit: function( props ) {
			var attributes = props.attributes;
			var onSelectImage = function( media ) {
				return props.setAttributes( {
					mediaURL: ( typeof media.sizes.thumbnail == "undefined" ) ? media.url : media.sizes.thumbnail.url,
					mediaID: media.id,
					mediaAlt: media.alt,
				} );
			};
			function onChangeLevel( newLevel ) {
				console.log( newLevel );
				props.setAttributes( { level: newLevel } );
			}
			return el( 'div', {
					className: props.className + ' media clearfix',
					'data-media-position': attributes.position
				},
				el( 'div', { className: attributes.position },
					el( MediaUpload, {
						onSelect: onSelectImage,
						allowedTypes: 'image',
						value: attributes.mediaID,
						render: function( obj ) {
							return el( components.Button, {
									className: attributes.mediaID ? 'media-object' : 'add-thumbnail',
									onClick: obj.open
								},
								! attributes.mediaID ? '' : el( 'img', { src: attributes.mediaURL } )
							);
						}
					} )
				),
				el( 'div', { className: 'media-body' },
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
						className: 'media-heading',
						inline: true,
						placeholder: i18n.__( 'Заголовок', 'pstu-next-theme' ),
						value: attributes.title,
						onChange: function( value ) {
							props.setAttributes( { title: value } );
						},
					} ),
					el( RichText, {
						tagName: 'p',
						inline: false,
						placeholder: i18n.__( 'Описание', 'pstu-next-theme' ),
						value: attributes.excerpt,
						className: 'excerpt',
						onChange: function( value ) {
							props.setAttributes( { excerpt: value } );
						},
					} ),
					el( RichText, {
						tagName: 'ul',
						multiline: 'li',
						placeholder: i18n.__( 'Список', 'pstu-next-theme' ),
						value: attributes.items,
						className: 'media-body-list',
						onChange: function( value ) {
							props.setAttributes( { items: value } );
						},
					} ),
				),
				//
				el( wp.editor.InspectorControls, null,
					el( wp.components.PanelBody,
						{
							title: i18n.__( 'Выравнивание', 'pstu-next-theme' ),
							initialOpen: true
						},
						el( wp.components.SelectControl, {
							value: props.attributes.position,
							options: [
								{ value: 'media-left', label: i18n.__( 'миниатюра слева', 'pstu-next-theme' ) },
								{ value: 'media-right', label: i18n.__( 'миниатюра справа', 'pstu-next-theme' ) },
							],
							onChange: function( value ) {
								props.setAttributes( { position: value } );
							}
						} ),
					),
				),
			);
		},
		save: function( props ) {
			return el( 'div', {
					className: 'media clearfix',
					'data-media-position': props.attributes.position,
				},
				props.attributes.mediaURL && el( 'div', { className: props.attributes.position },
					el( 'img', {
						className: 'media-object lazy',
						'data-src': props.attributes.mediaURL,
						'alt': props.attributes.mediaAlt,
					} ),
				),
				el( 'div', {
						className: 'media-body'
					},
					( props.attributes.title.length > 0 ) && el( RichText.Content, {
						tagName: props.attributes.level,
						value: props.attributes.title,
						className: 'media-heading'
					} ),
					( props.attributes.excerpt.length > 0 ) && el( RichText.Content, {
						tagName: 'p',
						className: 'excerpt',
						value: props.attributes.excerpt
					} ),
					( props.attributes.items.length > 0 ) && el( RichText.Content, {
						tagName: 'ul',
						className: 'media-body-list',
						value: props.attributes.items
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