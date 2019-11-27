( function ( richText, element, editor, i18n, _ ) {
    var el = element.createElement,
        fragment = element.Fragment;
    var registerFormatType = richText.registerFormatType,
        unregisterFormatType = richText.unregisterFormatType,
        toggleFormat = richText.toggleFormat;

    var richTextToolbarButton = editor.RichTextToolbarButton,
        richTextShortcut = editor.RichTextShortcut;

    var buttons = [
        {
            name: 'small',
            character: '',
            title: i18n.__( 'Уменьшенный размер шрифта', 'pstu-next-theme' ),
            icon: 'arrow-down-alt2',
            tagName: 'small',
            className: 'small',
        },
        {
            name: 'lead',
            character: '',
            title: i18n.__( 'Увеличеный размер шрифта', 'pstu-next-theme' ),
            icon: 'arrow-up-alt2',
            tagName: 'span',
            className: 'lead',
        }
    ];

    buttons.forEach( function ( button ) {
        var type = "pstu-next-theme/" + button.name;
        registerFormatType( type, {
            title:      button.title,
            tagName:    button.tagName,
            className:  button.className,
            edit: function edit( props ) {
                var isActive = props.isActive,
                    value = props.value,
                    onChange = props.onChange;
                var onToggle = function() {
                    return onChange( toggleFormat( value, { type: type } ) );
                };
                return el( fragment, null,
                    el( richTextShortcut, {
                        type: "access",
                        character: button.character,
                        onUse: onToggle
                    } ),
                    el( richTextToolbarButton, {
                        icon: button.icon,
                        title: button.title,
                        onClick: onToggle,
                        isActive: isActive,
                        shortcutType: "access",
                        shortcutCharacter: button.character
                    } )
                );
            }
        } );
    } );

} (
    window.wp.richText,
    window.wp.element,
    window.wp.editor,
    window.wp.i18n,
    window._,
) );