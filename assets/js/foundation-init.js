jQuery( function( $ ) {

    $( document ).foundation();

    // Equalizer doesn't play nicely with Tabs...
    var ctaHeight = 0;



    $( '#home-cta .content' ).each( function() {
        if ( $( this ).actual( 'height' ) > ctaHeight ) {
            ctaHeight = $( this ).actual( 'height' );
        }
    } );

    $( '#home-cta .content' ).each( function() {
        $( this ).css( 'height', ctaHeight + 'px' );
    } );

    $( '#home-cta .tabs' ).on( 'toggled', function ( event, tab ) {

        tab = tab[0];
        
        if ( $( tab ).attr( 'id' ) == 'schedule_service_call' ) {
            
            $( '#home-cta' ).css( 'background-image', 'url( ' + mullins_theme_data.serviceCallImage + ')' );
            $( '#home-cta' ).css( 'background-position', '-150px -150px' );
            
        }
        else {
            
            $( '#home-cta' ).css( 'background-image', 'url( ' + mullins_theme_data.dependabilityPromiseImage + ')' );
            $( '#home-cta' ).css( 'background-position', '-450px -150px' );
            
        }
        
    } );

} );
