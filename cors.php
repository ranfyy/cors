<?php

$url = "https://duckduckgo.com/i/9f8c158c.png";
# $url = "https://upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Queen_logo.svg/225px-Queen_logo.svg.png";

###
$s = curl_head( $url, true );
print $s .PHP_EOL;
exit(123);

$a = explode( "\r\n\r\n", $s );
# print $s .PHP_EOL;
print $a[0] .PHP_EOL;



function curl_head(
  $url
, $ldebug = true
) {

$aOpt = array(
    CURLOPT_URL             =>  $url,

    CURLOPT_RETURNTRANSFER  =>  true,
    CURLOPT_HEADER          =>  true,
    CURLINFO_HEADER_OUT     =>  true,
    CURLOPT_HTTPHEADER      =>  array( "Origin: a.bee.cc"),
    CURLOPT_CUSTOMREQUEST   =>  "HEAD",
);

$ch = curl_init();
curl_setopt_array( $ch, $aOpt );


$output = curl_exec(    $ch);
$info   = curl_getinfo( $ch);
$err    = curl_error(   $ch);
if( ! empty( $err)) {
    print "[-] error: " .$err .PHP_EOL;
}
curl_close($ch);
if( $ldebug ) {
    print "curl_head() Debug info:" . PHP_EOL;
    print_r( $info );
}

return $output;
} // func
