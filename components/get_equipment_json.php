<?php
    require_once "../class.php";    //Wczytanie pliku z klasą zawierającą wszystkie funkcjonalności
    $db = new workspaceDB;          //Zainicjowanie klasy do zmiennej
    $db->connect();                 //Nawiązanie połączenia z bazą danych

    foreach ($db->get_equipments($_POST['type']) as $e) {   //Wywołanie funkcji pobierającej wyposażenie danego rodzaju
        $return[] = array(
            "id" => $e['id'],       //ID wyposażenia
            "code" => $e['code'],   //Kod wyposażenia
            "model" => $e['model']  //Model / nazwa wyposażenia

        );
    }

    echo json_encode($return);  //Zwrócenie danych w postaci JSON

?>