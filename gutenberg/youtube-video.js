( function( blocks, editor, i18n, element, components, _ ) {
	var el = element.createElement;
	var MediaUpload = editor.MediaUpload;
	var TextControl = wp.components.TextControl;

	blocks.registerBlockType( 'pstu-next-theme/youtube-video', {
		title: i18n.__( 'YouTube видео', 'pstu-next-theme' ),
		description: i18n.__( 'Youtube видео в модальном окне', 'pstu-next-theme' ),
		keywords: [
			i18n.__( 'ПГТУ', 'pstu-next-theme' ),
			i18n.__( 'иконка', 'pstu-next-theme' ),
			i18n.__( 'youtube', 'pstu-next-theme' ),
			i18n.__( 'видео', 'pstu-next-theme' ),
			i18n.__( 'модальное окно', 'pstu-next-theme' ),
			i18n.__( 'миниатюра', 'pstu-next-theme' ),
		],
		icon: el( 'img', { 'src': 'data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIC02MiA1MTIuMDAxOTkgNTEyIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI1MTIiIGhlaWdodD0iNTEyIj48Zz48cGF0aCBkPSJtMzM0LjgwODU5NCAxNzAuOTkyMTg4LTExMy4xMTMyODItNjEuODkwNjI2Yy02LjUwMzkwNi0zLjU1ODU5My0xNC4xOTE0MDYtMy40MjU3ODEtMjAuNTY2NDA2LjM1MTU2My02LjM3ODkwNiAzLjc4MTI1LTEwLjE4MzU5NCAxMC40NjA5MzctMTAuMTgzNTk0IDE3Ljg3NXYxMjIuNzE4NzVjMCA3LjM3ODkwNiAzLjc4MTI1IDE0LjA0Njg3NSAxMC4xMTcxODggMTcuODMyMDMxIDMuMzA4NTk0IDEuOTc2NTYzIDYuOTc2NTYyIDIuOTY4NzUgMTAuNjUyMzQ0IDIuOTY4NzUgMy4zNjcxODcgMCA2Ljc0MjE4Ny0uODMyMDMxIDkuODQ3NjU2LTIuNTAzOTA2bDExMy4xMTcxODgtNjAuODI0MjE5YzYuNzE0ODQzLTMuNjEzMjgxIDEwLjkwNjI1LTEwLjU5Mzc1IDEwLjkzNzUtMTguMjIyNjU2LjAyNzM0My03LjYyODkwNi00LjExMzI4Mi0xNC42NDA2MjUtMTAuODA4NTk0LTE4LjMwNDY4N3ptLTExMy44NTkzNzUgNjMuNjE3MTg3di05MS43MTg3NWw4NC41MzkwNjIgNDYuMjU3ODEzem0wIDAiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIGNsYXNzPSJhY3RpdmUtcGF0aCIgc3R5bGU9ImZpbGw6IzU1NUQ2NiIgZGF0YS1vbGRfY29sb3I9IiMwMDAwMDAiPjwvcGF0aD48cGF0aCBkPSJtNTA4LjIzNDM3NSA5MS41MjczNDQtLjAyMzQzNy0uMjM0Mzc1Yy0uNDMzNTk0LTQuMTIxMDk0LTQuNzUtNDAuNzc3MzQ0LTIyLjU3MDMxMy01OS40MjE4NzUtMjAuNTk3NjU2LTIxLjkyOTY4OC00My45NDkyMTktMjQuNTkzNzUtNTUuMTc5Njg3LTI1Ljg3MTA5NC0uOTI5Njg4LS4xMDU0NjktMS43ODEyNS0uMjAzMTI1LTIuNTQyOTY5LS4zMDQ2ODhsLS44OTQ1MzEtLjA5Mzc1Yy02Ny42ODc1LTQuOTIxODc0LTE2OS45MTAxNTctNS41OTM3NDk1LTE3MC45MzM1OTQtNS41OTc2NTU3NWwtLjA4OTg0NC0uMDAzOTA2MjUtLjA4OTg0NC4wMDM5MDYyNWMtMS4wMjM0MzcuMDAzOTA2MjUtMTAzLjI0NjA5NC42NzU3ODE3NS0xNzEuNTQyOTY4IDUuNTk3NjU1NzVsLS45MDIzNDQuMDkzNzVjLS43MjY1NjMuMDk3NjU3LTEuNTI3MzQ0LjE4NzUtMi4zOTg0MzguMjg5MDYzLTExLjEwMTU2MiAxLjI4MTI1LTM0LjIwMzEyNSAzLjk0OTIxOS01NC44NTkzNzUgMjYuNjcxODc1LTE2Ljk3MjY1NiAxOC40NDUzMTItMjEuODc4OTA2IDU0LjMxNjQwNi0yMi4zODI4MTIgNTguMzQ3NjU2bC0uMDU4NTk0LjUyMzQzOGMtLjE1MjM0NCAxLjcxNDg0NC0zLjc2NTYyNSA0Mi41MzkwNjItMy43NjU2MjUgODMuNTIzNDM3djM4LjMxMjVjMCA0MC45ODQzNzUgMy42MTMyODEgODEuODA4NTk0IDMuNzY1NjI1IDgzLjUyNzM0NGwuMDI3MzQ0LjI1NzgxM2MuNDMzNTkzIDQuMDU0Njg3IDQuNzQ2MDkzIDQwLjAzOTA2MiAyMi40ODQzNzUgNTguNjkxNDA2IDE5LjM2NzE4NyAyMS4xOTUzMTIgNDMuODU1NDY4IDI0IDU3LjAyNzM0NCAyNS41MDc4MTIgMi4wODIwMzEuMjM4MjgyIDMuODc1LjQ0MTQwNiA1LjA5NzY1Ni42NTYyNWwxLjE4MzU5NC4xNjQwNjNjMzkuMDgyMDMxIDMuNzE4NzUgMTYxLjYxNzE4NyA1LjU1MDc4MSAxNjYuODEyNSA1LjYyNWwuMTU2MjUuMDAzOTA2LjE1NjI1LS4wMDM5MDZjMS4wMjM0MzctLjAwMzkwNyAxMDMuMjQyMTg3LS42NzU3ODEgMTcwLjkyOTY4Ny01LjU5NzY1N2wuODk0NTMxLS4wOTM3NWMuODU1NDY5LS4xMTMyODEgMS44MTY0MDYtLjIxNDg0MyAyLjg3MTA5NC0uMzI0MjE4IDExLjAzOTA2Mi0xLjE3MTg3NSAzNC4wMTU2MjUtMy42MDU0NjkgNTQuMzg2NzE5LTI2LjAxOTUzMiAxNi45NzI2NTYtMTguNDQ5MjE4IDIxLjg4MjgxMi01NC4zMjAzMTIgMjIuMzgyODEyLTU4LjM0NzY1NmwuMDU4NTk0LS41MjM0MzdjLjE1MjM0NC0xLjcxODc1IDMuNzY5NTMxLTQyLjUzOTA2MyAzLjc2OTUzMS04My41MjM0Mzh2LTM4LjMxMjVjLS4wMDM5MDYtNDAuOTg0Mzc1LTMuNjE3MTg3LTgxLjgwNDY4Ny0zLjc2OTUzMS04My41MjM0Mzd6bS0yNi4yMzgyODEgMTIxLjgzNTkzN2MwIDM3LjkzMzU5NC0zLjMxMjUgNzctMy42MjUgODAuNTg1OTM4LTEuMjczNDM4IDkuODc4OTA2LTYuNDQ5MjE5IDMyLjU3NDIxOS0xNC43MTg3NSA0MS41NjI1LTEyLjc1IDE0LjAyNzM0My0yNS44NDc2NTYgMTUuNDE3OTY5LTM1LjQxMDE1NiAxNi40Mjk2ODctMS4xNTYyNS4xMjEwOTQtMi4yMjY1NjMuMjM4MjgyLTMuMTk1MzEzLjM1OTM3NS02NS40Njg3NSA0LjczNDM3NS0xNjMuODMyMDMxIDUuNDYwOTM4LTE2OC4zNjMyODEgNS40ODgyODEtNS4wODIwMzItLjA3NDIxOC0xMjUuODI0MjE5LTEuOTIxODc0LTE2My43MTQ4NDQtNS40NDE0MDYtMS45NDE0MDYtLjMxNjQwNi00LjAzOTA2Mi0uNTU4NTk0LTYuMjUtLjgwODU5NC0xMS4yMTQ4NDQtMS4yODUxNTYtMjYuNTY2NDA2LTMuMDQyOTY4LTM4LjM3MTA5NC0xNi4wMjczNDNsLS4yNzczNDQtLjI5Njg3NWMtOC4xMjUtOC40NjQ4NDQtMTMuMTUyMzQzLTI5LjY4NzUtMTQuNDI5Njg3LTQxLjE0ODQzOC0uMjM4MjgxLTIuNzEwOTM3LTMuNjM2NzE5LTQyLjIzODI4MS0zLjYzNjcxOS04MC43MDMxMjV2LTM4LjMxMjVjMC0zNy44OTA2MjUgMy4zMDQ2ODgtNzYuOTE0MDYyIDMuNjI1LTgwLjU3NDIxOSAxLjUxOTUzMi0xMS42MzY3MTggNi43OTI5NjktMzIuOTU3MDMxIDE0LjcxODc1LTQxLjU3NDIxOCAxMy4xNDA2MjUtMTQuNDUzMTI1IDI2Ljk5NjA5NC0xNi4wNTQ2ODggMzYuMTYwMTU2LTE3LjExMzI4Mi44NzUtLjEwMTU2MiAxLjY5MTQwNy0uMTk1MzEyIDIuNDQ1MzEzLS4yOTI5NjggNjYuNDIxODc1LTQuNzU3ODEzIDE2NS40OTIxODctNS40NjQ4NDQgMTY5LjA0Njg3NS01LjQ5MjE4OCAzLjU1NDY4OC4wMjM0MzggMTAyLjU4OTg0NC43MzQzNzUgMTY4LjQyMTg3NSA1LjQ5MjE4OC44MDg1OTQuMTAxNTYyIDEuNjkxNDA2LjIwMzEyNSAyLjY0MDYyNS4zMTI1IDkuNDI1NzgxIDEuMDc0MjE4IDIzLjY3MTg3NSAyLjY5OTIxOCAzNi43NDYwOTQgMTYuNjQ0NTMxbC4xMjEwOTQuMTI4OTA2YzguMTI1IDguNDY0ODQ0IDEzLjE1MjM0MyAzMC4wNTg1OTQgMTQuNDI5Njg3IDQxLjc1LjIyNjU2MyAyLjU1ODU5NCAzLjYzNjcxOSA0Mi4xNzE4NzUgMy42MzY3MTkgODAuNzE4NzV6bTAgMCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojNTU1RDY2IiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPjwvZz4gPC9zdmc+' } ),
		category: 'layout',
		supports: {
			customClassName: false,
			align: true,
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
				selector: 'img',
				attribute: 'data-src',
			},
			link: {
				type: 'string',
				source: 'attribute',
				selector: '.video-thumbnail-container',
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
			return el( 'div', { className: 'video-thumbnail-container' },
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
				el( wp.editor.InspectorControls, null,
					el( wp.components.PanelBody,
						{
							title: i18n.__( 'Ссылка на YouTube видео', 'pstu-next-theme' ),
							initialOpen: true
						},
						el( TextControl, {
							value: props.attributes.link,
							placeholder: i18n.__( 'URL', 'pstu-next-theme' ),
							onChange: function( value ) {
								props.setAttributes( { link: value } );
							},
						} ),
					),
				),
			);
		},
		save: function( props ) {
			if ( typeof props.attributes.link != 'undefined' && props.attributes.link.length > 0 ) {
				var containerProps = {
					className: 'fancybox-media video-thumbnail-container',
					'href': props.attributes.link
				};
				if ( typeof props.attributes.mediaURL == "undefined" ) containerProps.className += ' empty-thumbnail';
				return el( 'a', containerProps,
					props.attributes.mediaURL && el( 'img', {
						className: 'lazy',
						'data-src': props.attributes.mediaURL,
						'src': '#',
						'alt': props.attributes.mediaAlt,
					} ),
				);
			}
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



// https://youtu.be/rgrwi_jFzig