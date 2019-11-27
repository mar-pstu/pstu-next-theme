( function( blocks, editor, i18n, element, components, _ ) {
    var el = element.createElement,
        RichText = editor.RichText;

    blocks.registerBlockType( 'pstu-next-theme/well', {
        title: i18n.__( 'Выделение', 'pstu-next-theme' ),
        description: i18n.__( 'PSTU Текстовый блок аналог Boootstrap блока "well".', 'pstu-next-theme' ),
        keywords: [
            i18n.__( 'ПГТУ', 'pstu-next-theme' ),
            i18n.__( 'выделение', 'pstu-next-theme' ),
            i18n.__( 'youtube', 'pstu-next-theme' ),
        ],
        icon: el(
            'img', {
                'src': "data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgdmlld0JveD0iMCAwIDYxMiA2MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDYxMiA2MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIj48Zz48Zz4KCTxnIGlkPSJSZWN0YW5nbGVfNF9jb3B5XzQiPgoJCTxnPgoJCQk8cGF0aCBkPSJNNTYuNjY3LDI4My4zMzNoNDk4LjY2N3YtMjIuNjY3SDU2LjY2N1YyODMuMzMzeiBNNTYuNjY3LDM1MS4zMzNoNDk4LjY2N3YtMjIuNjY2SDU2LjY2N1YzNTEuMzMzeiBNNTYuNjY3LDIxNS4zMzMgICAgIGg0OTguNjY3di0yMi42NjdINTYuNjY3VjIxNS4zMzN6IE01NjYuNjY3LDc5LjMzM0g0NS4zMzNDMjAuMjk4LDc5LjMzMywwLDk5LjYzMSwwLDEyNC42NjZ2MzYyLjY2NyAgICAgYzAsMjUuMDM1LDIwLjI5OCw0NS4zMzQsNDUuMzMzLDQ1LjMzNGg1MjEuMzMzYzI1LjAzNSwwLDQ1LjMzMy0yMC4yOTksNDUuMzMzLTQ1LjMzNFYxMjQuNjY2ICAgICBDNjEyLDk5LjYzMSw1OTEuNzAyLDc5LjMzMyw1NjYuNjY3LDc5LjMzM3ogTTU4OS4zMzMsNDY0LjY2N2MwLDI1LjAzNS0yMC4yOTgsNDUuMzMyLTQ1LjMzMyw0NS4zMzJINjggICAgIGMtMjUuMDM1LDAtNDUuMzMzLTIwLjI5Ny00NS4zMzMtNDUuMzMyVjE0Ny4zMzNDMjIuNjY3LDEyMi4yOTcsNDIuOTY1LDEwMiw2OCwxMDJoNDc2YzI1LjAzNSwwLDQ1LjMzMywyMC4yOTgsNDUuMzMzLDQ1LjMzMyAgICAgVjQ2NC42Njd6IE01Ni42NjcsNDE5LjMzM2g0OTguNjY3di0yMi42NjZINTYuNjY3VjQxOS4zMzN6IiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBjbGFzcz0iYWN0aXZlLXBhdGgiIHN0eWxlPSJmaWxsOiM1NTVENjYiIGRhdGEtb2xkX2NvbG9yPSIjMDAwMDAwIj48L3BhdGg+CgkJPC9nPgoJPC9nPgo8L2c+PC9nPiA8L3N2Zz4=",
            }
        ),
        category: 'layout',
        
        attributes: {
            content: {
                type: 'array',
                source: 'children',
                selector: 'p',
            },
        },

        styles: [
            {
                name: 'well-default',
                label:i18n. __( 'Стандартный', 'pstu-next-theme' ),
                isDefault: true
            },
            {
                name: 'well-sm',
                label: i18n.__( 'Мини', 'pstu-next-theme' ),
                isDefault: false
            },
            {
                name: 'well-primary',
                label: i18n.__( 'Primary', 'pstu-next-theme' ),
                isDefault: false
            },
            {
                name: 'well-success',
                label: i18n.__( 'Success', 'pstu-next-theme' ),
                isDefault: false
            },
            {
                name: 'well-warning',
                label: i18n.__( 'Warning', 'pstu-next-theme' ),
                isDefault: false
            },
            {
                name: 'well-danger',
                label: i18n.__( 'Danger', 'pstu-next-theme' ),
                isDefault: false
            },
            {
                name: 'well-info',
                label: i18n.__( 'Info', 'pstu-next-theme' ),
                isDefault: false
            },
        ],

        edit: function( props ) {
            var content = props.attributes.content;
            function onChangeContent( newContent ) {
                props.setAttributes( { content: newContent } );
            }
            return el( RichText, {
                    tagName: 'p',
                    className: 'well ' + props.className,
                    onChange: onChangeContent,
                    value: content,
                }
            );
        },

        save: function( props ) {
            var content = props.attributes.content;
            return el( RichText.Content, {
                tagName: 'p',
                className: 'well ' + props.className,
                value: content
            } );
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