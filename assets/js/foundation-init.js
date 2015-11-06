jQuery( function( $ ) {

    $( document ).foundation();

    $( '#home-cta .tabs' ).on( 'toggled', function ( event, tab ) {
        
        tab = tab[0];
        
        if ( $( tab ).attr( 'id' ) == 'schedule_service_call' ) {
            
            $( '#home-cta' ).css( 'background-image', 'url( ' + mullins_theme_data.serviceCallImage + ')' );
            $( '#home-cta .overlay:after' ).addRule( {
                'background-color': mullins_theme_data.serviceCall + ' !important',
            } );
            
        }
        else {
            
            $( '#home-cta' ).css( 'background-image', 'url( ' + mullins_theme_data.dependabilityPromiseImage + ')' );
            $( '#home-cta .overlay:after' ).addRule( {
                'background-color': mullins_theme_data.dependabilityPromise + ' !important',
            } );
            
        }
        
    } );

} );
