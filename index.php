<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
require_once("Controlleur/controlleur.php");
$unControler = new Controleur ("localhost", "ProjetSio", "root", "");
?>
</body>
</html>