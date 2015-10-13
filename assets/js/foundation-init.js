jQuery( function( $ ) {

    $( document ).foundation();

    $( '#home-cta .tabs' ).on( 'toggled', function ( event, tab ) {
        
        tab = tab[0];
        
        if ( $( tab ).attr( 'id' ) == 'schedule_service_call' ) {
            
            $( '#home-cta' ).css( 'background-color', cta_colors.serviceCall );
            
        }
        else {
            
            $( '#home-cta' ).css( 'background-color', cta_colors.dependabilityPromise );
            
        }
        
    } );

} );
