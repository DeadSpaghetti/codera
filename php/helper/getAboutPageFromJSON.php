<?php
if(!isset($_SESSION['loggedIn']))
    session_start();
$aboutFileLocation = "../../config/about.json";

if(file_exists($aboutFileLocation))
{
    $aboutArray = json_decode(file_get_contents($aboutFileLocation));
    $aboutIcon = $aboutArray->{'aboutIcon'};
    $aboutText = $aboutArray->{'aboutText'};
}