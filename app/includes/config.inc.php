<?php

define('DBMOTOR', 'mysql');
define('DBSERVER', 'us-cdbr-east-05.cleardb.net');
define('DBNAME', 'heroku_8550a52894c6e70');
define('DBUSUARIO', 'bc895eb5c2f676');
define('DBPASSWORD', '8500d8f6');

//mysql://bc895eb5c2f676:8500d8f6@us-cdbr-east-05.cleardb.net/heroku_8550a52894c6e70?reconnect=true

// Apoyo para acceso publicos y privados

// Publica (virtual host)
// define('URLROOT', 'https://startshop.amigable.dev');
define('URLROOT', 'http://pw20213v.mx/');

// Privada
define('APPROOT', dirname(dirname(__FILE__)));

// Otros
define('TITLE', 'StartShop');

