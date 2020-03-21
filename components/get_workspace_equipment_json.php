<?php
    require_once "../class.php";    //Wczytanie pliku z klasą zawierającą wszystkie funkcjonalności
    $db = new workspaceDB;          //Zainicjowanie klasy do zmiennej
    $db->connect();                 //Nawiązanie połączenia z bazą danych

    foreach ($db->get_workspace_equipment($_POST['id']) as $e) {    //Wywołanie funkcji pobierającej wyposażenie danego stanowiska
        $return[] = array(
            "id" => $e['id'],       //ID wyposażenia
            "model" => $e['model']  //Model / nazwa wyposażenia
        );
    }
    echo json_encode($return);  //Zwrócenie danych w postaci JSON

?>