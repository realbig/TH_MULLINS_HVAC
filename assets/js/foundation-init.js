jQuery( function( $ ) {

    $( document ).foundation();

    $( '#home-cta .tabs' ).on( 'toggled', function ( event, tab ) {
        
        tab = tab[0];
        
        if ( $( tab ).attr( 'id' ) == 'schedule_service_call' ) {
            
            $( '#home-cta' ).css( 'background-color', mullins_theme_data.serviceCall );
            
        }
        else {
            
            $( '#home-cta' ).css( 'background-color', mullins_theme_data.dependabilityPromise );
            
        }
        
    } );

} );
