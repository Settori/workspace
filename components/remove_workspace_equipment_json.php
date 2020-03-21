<?php
    require_once "../class.php";    //Wczytanie pliku z klasą zawierającą wszystkie funkcjonalności
    $db = new workspaceDB;          //Zainicjowanie klasy do zmiennej
    $db->connect();                 //Nawiązanie połączenia z bazą danych

    $db->remove_workspace_equipment($_POST['id']);      //Wywołanie funkcji usuwającej wyposażenie z danego stanowiska

    echo json_encode(true);

?>