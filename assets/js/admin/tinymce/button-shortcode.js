jQuery( function( $ ) {

    $( document ).ready( function() {

        var good = '';

        $( document ).on( 'keyup', '.mce-numbers-only', function( event ) {

            var input = $( this );

            if ( event.which !== 8 ) { // If not backspace
                var matchedPosition = input.val().search( /[a-z@#!$%,-^&*()_+|~=`{}\[\]:";'<>?.\/\\]/i );
                if( matchedPosition === -1 ) {
                    input.val( good );
                }
                else{
                    good = input.val();
                }

            }

            if ( input.val() === '0' ) {
                input.val( '' );
            }

        } );

        $( document ).on( 'keyup', '.mce-letters-only', function( event ) {
            var input = $( this );
            var matchedPosition;

            if ( event.which !== 8 ) { // If not backspace

                if ( input.hasClass( 'mce-no-spaces' ) ) {
                    matchedPosition = input.val().search( /^[a-z]*$/i );
                }
                else{
                    matchedPosition = input.val().search( /^[a-z ]*$/i );
                }

                if( matchedPosition === -1 ) {
                    input.val( good );
                }
                else{
                    good = input.val();
                }

            }

        });

        tinymce.PluginManager.add( 'mullins_button_shortcode_script', function( editor, url ) {
            editor.addButton( 'mullins_button_shortcode', {
                text: 'Add Button',
                icon: false,
                onclick: function() {
                    editor.windowManager.open( {
                        title: 'Add Button',
                        body: [
                            {
                                type: 'textbox',
                                name: 'text',
                                label: 'Button Text'
                            },
                            {
                                type: 'textbox',
                                name: 'url',
                                label: 'Button Link URL'
                            },
                            {
                                type: 'listbox',
                                name: 'color',
                                label: 'Color',
                                values: [
                                    { text: 'Primary Color', value: 'primary' },
                                    { text: 'Secondary Color', value: 'secondary' },
                                    { text: 'Accent 1', value: 'accent-1' },
                                    { text: 'Accent 2', value: 'accent-2' },
                                ]
                            },
                            {
                                type: 'listbox',
                                name: 'style',
                                label: 'Style',
                                values: [
                                    { text: 'Solid', value: 'fill' },
                                    { text: 'No fill, just borders', value: 'ghost' },
                                ],
                                value: 'ghost',
                            },
                            {
                                type: 'checkbox',
                                name: 'new_tab',
                                label: 'Open Link in a New Tab',
                            },
                        ],
                        onsubmit: function( e ) {
                            editor.insertContent( '[button' + 
                                                     ( e.data.url !== undefined ? ' url="' + e.data.url + '"' : '' ) + 
                                                     ( e.data.color !== undefined ? ' color="' + e.data.color + '"' : '' ) + 
                                                     ( e.data.style !== undefined ? ' style="' + e.data.style + '"' : '' ) + 
                                                     ( e.data.new_tab !== undefined ? ' new_tab="' + e.data.new_tab + '"' : '' ) + 
                                                 ']' + 
                                                     ( e.data.text !== undefined ? e.data.text : '' ) + 
                                                 '[/button]' );
                        }

                    } ); // Editor

                } // onclick

            } ); // addButton

        } ); // Plugin Manager

    } ); // Document Ready

} );