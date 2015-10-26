jQuery( function( $ ) {
    
    if ( $( '#testimonial' ).length > 0 ) {
        
        $.ajax( {
			
            type : 'POST',
            url : mullins_theme_data.ajaxUrl,  
            data : {

                action: 'get_testimonial' // The name of the action hook. It uses the function named "get_mullins_testimonial_callback"

            },

            success: function( response ) {

                var options = jQuery.parseJSON( response ); // Parses JSON from the AJAX response
                
                options = options[ Math.floor( Math.random() * options.length ) ]; // Choose One at Random

                if ( options.name !== '' && options.body !== '' ) {

                    $( '#testimonial .testimonial-content h4' ).html( '&mdash; ' + options.name + ' &mdash;' );
                    $( '#testimonial .testimonial-content .testimonial-copy' ).html( options.body );
                    
                    $( '#testimonial .testimonial-loading' ).hide();
                    $( '#testimonial .testimonial-content' ).show();

                }

            }

        } );
    
    }
    
} );