<?php 
/**
 * universal functions for certain pages
 */
function tsw_nonce($nonce_name)
{
return true;

}  

function tsw_clean_url($str)
{

return htmlspecialchars( SNIPP_BASE . $str );
}

function clean_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}