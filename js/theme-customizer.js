(function( $ ) {

    wp.customize( 'saw_logo', function( value ) {
        value.bind( function( to ) {
            $(' .logo img ').attr( 'src', to );
        } );
    });  

    wp.customize( 'saw_h_color', function( value ) {
        value.bind( function( to ) {
            $( 'h1 a' ).css( 'color', to );
            $( 'h1' ).css( 'color', to );
            $( 'h2' ).css( 'color', to );
            $( 'h3' ).css( 'color', to );
            $( 'h4' ).css( 'color', to );
            $( 'h5' ).css( 'color', to );
            $( 'h6' ).css( 'color', to );
            $( 'h2 a' ).css( 'color', to );
            $( 'h3 a' ).css( 'color', to );
            $( 'h4 a' ).css( 'color', to );
            $( 'h5 a' ).css( 'color', to );
            $( 'h6 a' ).css( 'color', to );
        } );
    });

    wp.customize( 'saw_h_font_type', function( value ) {
        value.bind( function( to ) {            
            $( 'h1' ).css( 'font-family', to );  
            $( 'h2' ).css( 'font-family', to ); 
            $( 'h3' ).css( 'font-family', to ); 
            $( 'h4' ).css( 'font-family', to ); 
            $( 'h5' ).css( 'font-family', to ); 
            $( 'h6' ).css( 'font-family', to );
            $( 'h1 a' ).css( 'font-family', to );  
            $( 'h2 a' ).css( 'font-family', to ); 
            $( 'h3 a' ).css( 'font-family', to ); 
            $( 'h4 a' ).css( 'font-family', to ); 
            $( 'h5 a' ).css( 'font-family', to ); 
            $( 'h6 a' ).css( 'font-family', to );
        } );
    }); 

    wp.customize( 'saw_nav_font_type', function( value ) {
        value.bind( function( to ) {            
            $( '.main-navigation' ).css( 'font-family', to );
            $( '.main-navigation ul' ).css( 'font-family', to );
            $( '.main-navigation li' ).css( 'font-family', to );
            $( '.main-navigation ul ul li' ).css( 'font-family', to );
            $( '.main-navigation ul ul a' ).css( 'font-family', to );
            $( '.main-navigation a' ).css( 'font-family', to );
        } );
    });  

    wp.customize( 'saw_nav_font_size', function( value ) {
        value.bind( function( to ) {            
            $( '.main-navigation' ).css( 'font-size', to + 'px' );
            $( '.main-navigation ul' ).css( 'font-size', to + 'px' );
            $( '.main-navigation li' ).css( 'font-size', to + 'px' );
            $( '.main-navigation ul ul li' ).css( 'font-size', to + 'px' );
            $( '.main-navigation ul ul a' ).css( 'font-size', to + 'px' );
            $( '.main-navigation a' ).css( 'font-size', to + 'px' );
        } );
    });   

    wp.customize( 'saw_p_color', function( value ) {
        value.bind( function( to ) {
            $( 'p' ).css( 'color', to );
            $( '.main-navigation' ).css( 'color', to );
            $( '.main-navigation ul' ).css( 'color', to );
            $( '.main-navigation li' ).css( 'color', to );
            $( '.main-navigation ul ul li' ).css( 'color', to );
            $( '.main-navigation ul ul a' ).css( 'color', to );
            $( '.main-navigation a' ).css( 'color', to );
            $( '.main-navigation a:visited' ).css( 'color', to );
            $( 'li' ).css( 'color', to );
        } );
    });

    wp.customize( 'saw_p_font_size', function( value ) {
        value.bind( function( to ) {            
            $( 'p' ).css( 'font-size', to + 'px' ); 
            $( 'a' ).css( 'font-size', to + 'px' );
            $( 'li' ).css( 'font-size', to + 'px' );         
        } );
    }); 

    wp.customize( 'saw_p_font_type', function( value ) {
        value.bind( function( to ) {            
            $( 'p' ).css( 'font-family', to ); 
            $( 'li' ).css( 'font-family', to );           
        } );
    });

    wp.customize( 'saw_button_color', function( value ) {
        value.bind( function( to ) {
            $( 'button' ).css( 'color', to );
        } );
    });

    wp.customize( 'saw_accent_color', function( value ) {
        value.bind( function( to ) {
            $( 'button' ).css( 'background-color', to );
            $( 'input[type=submit]' ).css( 'background-color', to );
            $( 'a' ).css( 'color', to );
            $( 'a:visited' ).css( 'color', to );
            $( '.main-navigation li:hover > a' ).css( 'color', to );
            $( '.main-navigation li.current_page_item a' ).css( 'color', to );
            $( '.main-navigation li.current-menu-item a' ).css( 'color', to );
            $( '.main-navigation ul ul a:hover' ).css( 'color', to );
            $( '.main-navigation ul ul :hover > a' ).css( 'color', to );
            $( '.fa:hover' ).css( 'color', to );
        } );
    });

    wp.customize( 'saw_button_font_size', function( value ) {
        value.bind( function( to ) {            
            $( 'button' ).css( 'font-size', to + 'px' );            
        } );
    });

})( jQuery );