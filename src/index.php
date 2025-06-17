<?php

$host = 'mysql';
$user = 'root';
$password = 'secret';
$database = 'testdb';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB-Verbindung fehlgeschlagen: " . $e->getMessage());
}
// $name="Rashed";
// $email="Rashed@example.com";

// $stmt= $mysqli->prepare("INSERT INTO users (name,email) VALUES (?,?)");
// $stmt->bind_param("ss",$name,$email);
// $stmt->execute();
// $result= $mysqli->query("SELECT id, name, email FROM users");

// if($result->num_rows >0){
//     while($row =$result->fetch_assoc()){
//          echo "ID: " . $row['id'] . " - Name: " . $row['name'] . " - Email: " . $row['email'] . "<br>";
//     }
// }else{
//     echo "keine Benutzer";
// }
// // echo 'Erfolgreich mit der Datenbank verbunden!';
// $mysqli->close();
// 2. User-Klasse einbinden

require_once 'User.php';
// 3. User-Objekte erstellen
$users = [
    new User("Max Mustermann", "max@example.com"),
    new User("Erika Musterfrau", "erika@example.com"),
];

// 4. User speichern
foreach ($users as $user) {
    if ($user->save($pdo)) {
        echo "User " . $user->getName() . " erfolgreich gespeichert.<br>";
    } else {
        echo "Fehler beim Speichern von " . $user->getName() . "<br>";
    }
}
?>
