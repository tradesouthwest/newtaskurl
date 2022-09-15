<?php  
/**
 * SnippWiki app
 * LICENSE: Apache
 * @author  Larry Judd & Tradesouthwest
 * @link    https://tradesouthwest.com
 */
@ini_set('display_errors', 1);
//@ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
 
if( !defined('SNIPP_BASE') ): 
    $absolute_url = defined_absolute_url();
    define( 'SNIPP_BASE', $absolute_url );
endif;
function url_origin( $s, $use_forwarded_host = false )
{
    $ssl      = ( ! empty( $s['HTTPS'] ) && $s['HTTPS'] == 'on' );
    $sp       = strtolower( $s['SERVER_PROTOCOL'] );
    $protocol = substr( $sp, 0, strpos( $sp, '/' ) ) . ( ( $ssl ) ? 's' : '' );
    $port     = $s['SERVER_PORT'];
    $port     = ( ( ! $ssl && $port=='80' ) || ( $ssl && $port=='443' ) ) ? '' : ':'.$port;
    $host     = ( $use_forwarded_host && isset( $s['HTTP_X_FORWARDED_HOST'] ) ) ? $s['HTTP_X_FORWARDED_HOST'] : ( isset( $s['HTTP_HOST'] ) ? $s['HTTP_HOST'] : null );
    $host     = isset( $host ) ? $host : $s['SERVER_NAME'] . $port;
    return $protocol . '://' . $host;
}

function full_url( $s, $use_forwarded_host = false )
{
    return url_origin( $s, $use_forwarded_host ) . $s['REQUEST_URI'];
}

function defined_absolute_url(){
    ob_start();
    echo full_url( $_SERVER );
    ob_get_clean();
}

function clean_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function clean_ascii($data) {
  $data = trim($data);
  $data = stripslashes($data);
  return $data;
}

function clean_data($data) {
    /* trim whitespace */
    $data = trim($data);
    $data = htmlspecialchars($data);

        return $data;
}

function tsw_nonce($nonce_name)
{
return true;
}  

function tsw_clean_url($str)
{
return htmlspecialchars( SNIPP_BASE . $str );
}

// settings - functions - filter
function esc($s){
//$escaped = SQLite3::escapeString($sql);
    echo htmlspecialchars_decode($s, ENT_HTML5);
}

function alpha_only( $string )
    {
        return preg_replace('/[^a-zA-Z0-9\s]/', '', $string);
    }

function tsw_selected( $opt, $val )
{
    $sel = '';
    $opt = ('' != $opt ) ? $opt : 'OTHER';
    if( $opt == $val ) $sel = true;
    if ( $sel ) {
    return 'selected="selected"'; } else { return ''; }
} 
// safe redirect
function redirect($url)
{
    if (!headers_sent())
    {    
        header('Location: '.$url);
        exit;
        }
    else
        {  
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}

// display sessions (for debug)
function display_sessions() {
$html= '';
$html .= '<pre>';
$html = print_r($_SESSION);
$html .= '<pre>';
return $html;
} 
