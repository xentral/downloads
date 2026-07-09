<?php

ini_set('display_errors', true);
ini_set('display_startup_errors', true);
ini_set('error_reporting', E_ALL ^ E_NOTICE);

if (empty($_SERVER['HTTP_AUTHORIZATION'])) {
    $nonce = md5(uniqid('', true));
    $opaque = md5(uniqid('', true));
    header(sprintf('WWW-Authenticate: Digest realm="Test",qop="auth",nonce="%s",opaque="%s"', $nonce, $opaque));
}

if (empty($_SERVER['HTTP_AUTHORIZATION'])) {
  echo '<h1 style="color:red;">Authorisation-Header fehlt</h1>';
} else {
  echo '<h1 style="color:green;">Authorisation-Header ist vorhanden</h1>';
}

echo '<h2>HTTP_AUTHORIZATION = <code>' . htmlspecialchars($_SERVER['HTTP_AUTHORIZATION'], ENT_QUOTES) . '</code></h2>';
echo '<h3>PHP_AUTH_DIGEST = <code>' . htmlspecialchars($_SERVER['PHP_AUTH_DIGEST'], ENT_QUOTES) . '</code></h3>';
echo "<pre>";
var_dump($_SERVER);
echo "</pre>";
