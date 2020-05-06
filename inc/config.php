<?php

function mk_file( $filename ) {

    if( ! is_file( $filename ) ) {
        fclose( fopen( $filename, 'x' ) );
        return true;
    }

    return false;

}

function can_edit() {
    $what = isset( $_GET[ 'what' ] ) ? $_GET[ 'what' ] : false;
    
    
    return $what === 'greasy';
}