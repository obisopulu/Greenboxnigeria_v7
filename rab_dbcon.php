<?php
$dbroot = 'root';
$dbpsw = '';
$dbname = 'greenbox_q316';

error_reporting(E_NOTICE); 
set_error_handler('pc_error_handler');
function pc_error_handler($errno, $error, $file, $line, $context) 
{ $message = "";    
print "$message";}

$cxn = mysqli_connect("localhost", $dbroot, $dbpsw, $dbname);
if (!$cxn)
{
	header("Location:http://www.google.com");
	exit;
}
	include 'Mobile_Detect.php';
	

function get_ip_address() {
    $ip_keys = array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR');
    foreach ($ip_keys as $key) {
        if (array_key_exists($key, $_SERVER) === true) {
            foreach (explode(',', $_SERVER[$key]) as $ip) {
                // trim for safety measures
                $ip = trim($ip);
                // attempt to validate IP
                if (validate_ip($ip)) {
                    return $ip;
                }
            }
        }
    }
    return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : false;
}
/**
 * Ensures an ip address is both a valid IP and does not fall within
 * a private network range.
 */
function validate_ip($ip)
{
    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
        return false;
    }
    return true;
}

$userIP=get_ip_address();

$detect = new Mobile_Detect();
if ($detect->isMobile()){
$anonymousPlatform='mobile ';
}
else{
$anonymousPlatform='desktop ';
}
$anonymousDevice=php_uname();
session_start(); 
extract($_SESSION);
if(!$anonymousName){$anonymous=$anonymousName=gethostbyaddr($_SERVER['REMOTE_ADDR']);}
$anonymousFrom= $_SERVER['HTTP_REFERER'];
?>