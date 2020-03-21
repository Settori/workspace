<?php
    require_once "../class.php";    //Wczytanie pliku z klasą zawierającą wszystkie funkcjonalności
    $db = new workspaceDB;          //Zainicjowanie klasy do zmiennej
    $db->connect();                 //Nawiązanie połączenia z bazą danych

    $db->add_equipment_to_workspace($_POST['workspace_id'], $_POST['equipment_id']);    //Wywołanie funkcji dodającej wyposażenie do stanowiska
    $return = array(
        "err" => $db->err,                          //Informacje o błędach
        "workspace_id" => $_POST['workspace_id'],   //ID stanowiska
        "equipment_id" => $_POST['equipment_id']    //ID wyposażenia
    );
    echo json_encode($return);  //Zwrócenie danych w postaci JSON

?>