<?php

namespace App\Http\Controllers\Api;

abstract class Module {
    protected $_get_vars = array();             //Local vars initialize from $_GET
    protected $_post_vars = array();            //Local vars initialize from $_POST
    var $_sess_vars = array();                //Local vars initialize from KSession
    var $_loc_vars = array();                //Local vars initialize from self module
    var $_env_vars = array();            //Local vars initialize from $_ENV

    function __construct()
    {
        $this->_initVars();
    }

    function _initVars()
    {
        global $sess, $mess;
        if( isset( $sess ) ) {
            $sess->get( get_class( $this ), $this );
        }

        foreach( $this->_get_vars as $val ) {
            if( isset( $_GET[$val] ) ) {
                $this->$val = $_GET[$val];
                if( ini_get( 'magic_quotes_gpc' ) == 0 ) {
                    a_addslashes( $this->$val );
                }
            }
        }

        foreach( $this->_post_vars as $val ) {
            if( isset( $_POST[$val] ) ) {
                $this->$val = $_POST[$val];
                if( ini_get( 'magic_quotes_gpc' ) == 0 ) {
                    a_addslashes( $this->$val );
                }
            }
        }

        foreach( $this->_env_vars as $name ) {
            $this->$name = $mess->get( $name );   // global vals
            $value = $mess->get( $name, get_class( $this ) );
            if( isset( $value ) )
                $this->$name = $value;   //target vals for $this
        }
    }

    function halt( $msg )
    {
        if( _K_SHOW_ERRORS == 'yes' )
            echo '<font color="red"><b>' . get_class( $this ) . ' error: </b></font>' . $msg . "<br>\n";
        if( _K_DIE_ON_ERROR == 'yes' ) die;
    }

    function _initTempl( $blocks )
    {
        global $t;

        $numargs = func_num_args();
        if( $numargs >= 2 ) {
            $blocks = array();
            $arg_list = func_get_args();
            for ($i = 0; $i < $numargs; $i++) {
               $blocks[] =  $arg_list[$i];
            }
        }

        $t->file( $this->templName, $this->templName );
        $t->block( $this->templName, $blocks );
    }

    function _OnResetVals()
    {
    }

    function createCacheKey( $placeName )
    {
        $key = array();
        $this->_cacheKey( $key, $this->_get_vars );
        $this->_cacheKey( $key, $this->_sess_vars );
        $this->_cacheKey( $key, $this->_loc_vars );
        return $placeName.';'.implode( ';', $key );
    }

    function _cacheKey( &$key, &$arrIn )
    {
        if( is_array( $arrIn ) )
            foreach( $arrIn as $val )
                $key[] = $this->$val;
    }

}

?>
