<?php
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
switch ($lang){
    case "en":
        //echo "PAGE EN";
        header("location: http://en.firassleibi.com");//include check session EN
        break;
    case "ar":
        //echo "PAGE AR";
        header("location: http://ar.firassleibi.com");//include check session ar
        break; 
    default:
        //echo "PAGE EN - Setting Default";
        header("location: http://en.firassleibi.com");//include check session EN
        break;
}
?>