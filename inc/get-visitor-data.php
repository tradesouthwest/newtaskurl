<?php 
function getUserIP()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}
$user_ip = getUserIP();
function Page_HitCounter() { 

    $counter_name = 'visitor-hit-counter.txt'; 
    $f = fopen($counter_name, 'r');
    if( filesize($counter_name) > 0 ) 
$counterVal = fread($f, filesize($counter_name));
fclose($f);
    
    // Has visitor been counted in this session?
// If not, increase counter value by one
if(!isset($_SESSION['hasVisited'])){ $_SESSION['hasVisited'] = "yes"; } 

$_SESSION['hasVisited'] = "yes";{
  $counterVal++;
  $f = fopen($counter_name, "w");
  fwrite($f, $counterVal);
  fclose($f);
}

        return $counterVal;
    
} 

$counted = Page_HitCounter();

echo '<div class="col-sm-12" id="TSWcopyright"><p><small>yer IP: ' . $user_ip . ' amoungst other things tracked for security purposes. That said: </small> <span> Cookie is only used on this website for logged in session. There are no personal cookies nor is any data saved which would be used for marketing or sharing of your information.</span> 
<em>' . $counted . '</em> | TSW-whnFDir</p></div>';
