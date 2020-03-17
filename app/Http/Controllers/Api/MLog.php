<?php

namespace App\Http\Controllers\Api;

class MLog {

    function __construct( $name ) {
        $this->filename = _K_DIR_LOG . 'mlog_'.$name.'.log';
    }

    function MLog( $name ) {
        $this->__construct( $name );
    }

    function save( $msg ) {
        if(isset($_SERVER['REMOTE_ADDR'])) {
            $rem_ip = $_SERVER['REMOTE_ADDR'];
        }
        else {
            $rem_ip = '127.0.0.1';
        }

        $f = fopen( $this->filename, 'a' );
        $text = date( 'r' )."\t".$rem_ip."\t".$msg."\n";
        fwrite( $f, $text );
        fclose( $f );
    }

}

?>
