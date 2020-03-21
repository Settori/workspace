<?php
    require_once "../class.php";    //Wczytanie pliku z klasą zawierającą wszystkie funkcjonalności
    $db = new workspaceDB;          //Zainicjowanie klasy do zmiennej
    $db->connect();                 //Nawiązanie połączenia z bazą danych

    $db->add_reservation($_POST['workspace_id'], $_POST['person_id'], $_POST['date_from'], $_POST['date_to']);  //Wywołanie funkcji dodającej rezerwację
    $return = array(
        "err" => $db->err,                          //Informacje o błędach
        "workspace_id" => $_POST['workspace_id'],   //ID stanowiska
        "person_id" => $_POST['person_id'],         //ID pracownika
        "date_from" => $_POST['date_from'],         //Data rozpoczęcia rejestracji
        "date_to" => $_POST['date_to']              //Data zakończenia rejestracji
    );
    echo json_encode($return);  //Zwrócenie danych w postaci JSON

?>