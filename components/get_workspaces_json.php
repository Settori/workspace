<?php
    require_once "../class.php";    //Wczytanie pliku z klasą zawierającą wszystkie funkcjonalności
    $db = new workspaceDB;          //Zainicjowanie klasy do zmiennej
    $db->connect();                 //Nawiązanie połączenia z bazą danych

    foreach ($db->get_workspaces() as $r) {     //Wywołanie funkcji  pobierającej stanowiska
        $return[] = array(
            "id" => $r['id'],       //ID stanowiska
            "code" => $r['code'],   //Kod stanowiska
            "desc" => $r['desc'],   //Opis stanowiska
            "equipment" => $db->get_workspace_equipment($r['id'])   //Lista wyposażeń stanowiska

        );
    }

    echo json_encode($return);  //Zwrócenie danych w postaci JSON

?>