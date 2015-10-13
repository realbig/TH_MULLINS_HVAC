jQuery( function( $ ) {

    $( document ).foundation();

    $( '#home-cta .tabs' ).on( 'toggled', function ( event, tab ) {
        
        tab = tab[0];
        
        if ( $( tab ).attr( 'id' ) == 'schedule_service_call' ) {
            
            $( tab ).parent().parent().parent().parent().css( 'background-color', cta_colors.serviceCall );
            
        }
        else {
            
            $( tab ).parent().parent().parent().parent().css( 'background-color', cta_colors.dependabilityPromise );
            
        }
        
    } );

} );