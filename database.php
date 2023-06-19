<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpcrud";

$conn = new mysqli($servername, $username, $password, $dbname);
// Vérifier la connexion
if ($conn->connect_error) {
  die("Connexion a échouée: " . $conn->connect_error);
}