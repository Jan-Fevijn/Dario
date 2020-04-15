<?php
session_start();

include_once ''
include_once ''

$clientID = '829841854512-tsj18mdpbumj9l43ng6cur9j67s16g6j.apps.googleusercontent.com';
$clientsecret = '2fJlFh2LK8qh3YH3UsHDnvwv';
$redirecturl = 'http://localhost/Dario/Web/GIPStewards_DarioDecuypere/index.php';

$gClient = new Google_Client();
$gClient->setapplicationName('Login');
$gClient->setClientID($clientID);
$gClient->setClientSecret($clientsecret);
$gClient->setRedirectUrl($redirecturl);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>