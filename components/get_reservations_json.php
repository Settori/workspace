<?php
    require_once "../class.php";    //Wczytanie pliku z klasą zawierającą wszystkie funkcjonalności
    $db = new workspaceDB;          //Zainicjowanie klasy do zmiennej
    $db->connect();                 //Nawiązanie połączenia z bazą danych

    foreach ($db->get_reservations() as $r) {   //Wywołanie funkcji pobierającej rezerwacje
        $return[] = array(
            "id" => $r['id'],               //ID rezerwacji
            "name" => $r['name'],           //Imię osoby rezerwującej stanowisko
            "surname" => $r['surname'],     //Nazwisko osoby rezerwującej stanowisko
            "workspace" => $r['workspace'], //Kod stanowiska
            "date_from" => date("Y-m-d H:i", strtotime($r['date_from'])), //Data rozpoczęcia rejestracji
            "date_to" => date("Y-m-d H:i", strtotime($r['date_to']))      //Data zakończenia rejestracji

        );
    }

    echo json_encode($return);  //Zwrócenie danych w postaci JSON

?>