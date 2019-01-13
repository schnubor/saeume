<?php define( 'INCLUDE_DIR', dirname( __FILE__ ) . '/inc/' );
require_once( INCLUDE_DIR . 'helper.php' );

$rules = array( 
    'project'   => "/project/(?'slug'[^/]+)",    // '/project/some-project-slug'
    'home'      => "/"                           // '/'
);

$uri = rtrim( dirname($_SERVER["SCRIPT_NAME"]), '/' );
$uri = '/' . trim( str_replace( $uri, '', $_SERVER['REQUEST_URI'] ), '/' );
$uri = urldecode( $uri );

foreach ( $rules as $action => $rule ) {
    // echo $action . '-' . $rule;

    if ( preg_match( '~^'.$rule.'$~i', $uri, $params ) ) {
        /* now you know the action and parameters so you can 
         * include appropriate template file ( or proceed in some other way )
         */
        include( INCLUDE_DIR . $action . '.php' );

        // exit to avoid the 404 message 
        exit();
    }
}

// nothing is found so handle the 404 error
include( INCLUDE_DIR . '404.php' );
?>