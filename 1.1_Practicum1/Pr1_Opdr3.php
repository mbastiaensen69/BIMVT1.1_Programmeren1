<?php
/**
 * Created by PhpStorm.
 * User: Marice
 * Date: 26-09-17
 * Time: 11:10
 */

$slim = TRUE;
$grappig = FALSE;

if ($slim && !$grappig) {
    // slim en niet grappig
    echo "Je moet meer feesten en minder studeren!<BR />";
} elseif (!$slim && $grappig) {
    // niet slim maar wel grappig
    echo "Je moet minder feesten en meer studeren!<BR />";
} elseif ($slim && $grappig) {
    // slim en grappig: ideale combinatie
    echo "Lucky you !!!!!<BR />";
} else {
    // niet grappig en niet slim
    echo "Bad Luck!<BR />";
}

?>