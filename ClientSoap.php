<?php
if (!ini_get('php_soap')) {
    ini_set('php_soap', '1');
}

use SoapClient;
$clientSoap = new SoapClient("https://etrs804-distance-constann.herokuapp.com/services/LaDistance?wsdl");
$clientSoap->retourneDistance($a, $b, $c, $d);

$lattitude_a = $_POST['lattitude_a'];
$longitude_a = $_POST['longitude_a'];
$lattitude_b = $_POST['lattitude_b'];
$longitude_b = $_POST['longitude_b'];

$distance = $clientSoap->__soapCall("retourneDistance", array($lattitude_a,$longitude_a,$lattitude_b,$longitude_b));

?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Calcul de la distance</title>
    </head>
    <body>
        <h2>Reponse du service Soap:</h2>
        <p> La distance entre les deux villes est de <?php //echo $distance; ?> Kilomètre<p>
    </body>
</html>

<?php
    phpinfo();
?>
