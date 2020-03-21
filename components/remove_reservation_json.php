<?php
    require_once "../class.php";    //Wczytanie pliku z klasą zawierającą wszystkie funkcjonalności
    $db = new workspaceDB;          //Zainicjowanie klasy do zmiennej
    $db->connect();                 //Nawiązanie połączenia z bazą danych

    $db->remove_reservation($_POST['id']);      //Funkcja usuwająca rejestrację o danym ID

    echo json_encode(true);

?>