$(document).ready(function(){
    getReservations();      //Wywołanie funkcji wczytującej rezerwacje do tabeli
    getEquipment();         //Wywołanie funkcji wczytującej wyposażenie do kontenera

    //Obsłużenie kliknięcia w przycisk rezerwacji
    $(".reservationSubmit").click(function(){
        if (        //Sprawdzenie czy żadne pole z datą i godziną nie jest puste
            $("#form-date-from").val() == '' ||
            $("#form-date-to").val() == '' ||
            $("#form-time-from").val() == '' ||
            $("#form-time-to").val() == ''
        ) {
            alert("Żadne pole nie może być puste");
            return false;   //Blokowanie przeładowania strony po kliknięciu
        }
        addReservation();   //Wywołanie funkcji dodającej rezerwację do bazy danych
        return false;       //Blokowanie przeładowania strony po kliknięciu
    });

    //Obsłużenie zmiany wartości w polu <select> zawierającym stanowiska
    $("#form-workspace").change(function(){
        getEquipment();     //Wywołanie funkcji wczytującej wyposażenie do kontenera
    });

    //Obsłużenie zmiany wartości w polu <input> zawierającym datę początku rezerwacji
    $("#form-date-from").change(function(){
        $("#form-date-to").attr("min", $(this).val()); //Ustawienie pola "min" w polu z datą końca rejestracji, tak aby nie mogło być mniejsze od pola początku rejestracji 
    });

    //Wyświetlanie przycisku do usuwania rezerwacji stanowiska po najechaniu
    $("#reservations-table tbody").on("mouseover", "tr", function(){
        $(this).find('button').show();
    });

    //Ukrywanie przycisku do usuwania rezerwacji stanowiska po opuszczeniu kursora
    $("#reservations-table tbody").on("mouseout", "tr", function(){
        $(this).find('button').hide();
    });

    //Usunięcie rezerwacji stanowiska po kliknięciu w przycisk "usuń"
    $("#reservations-table tbody").on("click", "button", function(){
        removeReservation($(this).attr('alt'));
    });

    
});

//Funkcja dynamicznie wczytująca rezerwacje do tabeli
function getReservations() {
    $.ajax({
        url: "components/get_reservations_json.php",    //Plik zwracający dane z rezerwacjami w postaci JSON
        method: "post",
        data: '',
        dataType: "json",
        success: function(res) {
            $("#reservations-table tbody").html("");    //Zerowanie tabeli
            $.each( res, function( key, value ) {
                var content = getReservationsContent(res[key]['id'], res[key]['name'], res[key]['surname'], res[key]['workspace'], res[key]['date_from'], res[key]['date_to']);
                
                $("#reservations-table tbody").html($("#reservations-table tbody").html() + content);   //Dodawanie rezerwacji do tabeli
            });
            
        }
    })
}

//Funkcja dynamicznie dodająca rezerwacje do bazy danych
function addReservation() {
    $.ajax({
        url: "components/add_reservation_json.php",
        method: "post",
        data: {     //Dane przekazywane do pliku metodą POST
            workspace_id : $("#form-workspace").val(),
            person_id : $("#form-person").val(),
            date_from : $("#form-date-from").val() + " " + $("#form-time-from").val() + ":00",
            date_to : $("#form-date-to").val() + " " + $("#form-time-to").val() + ":00"
        },
        dataType: "json",
        success: function(res) {
            if (res['err'] != "It's OK!") alert(res['err']);    //Wypisanie błędu, jeśli takowy nastąpił
            getReservations();  //Odświeżenie tabeli z rezerwacjami
        }
    })
}

//Funkcja dynamicznie usuwająca rezerwacje z bazy danych
function removeReservation(rId) {
    $.ajax({
        url: "components/remove_reservation_json.php",
        method: "post",
        data: {     //Dane przekazywane do pliku metodą POST
            id : rId
        },
        dataType: "json",
        success: function(res) {
            getReservations();
        }
    })
}


//Funkcja przerabiająca dane do odpowiedniej postaci HTML
function getReservationsContent(rId, rName, rSurname, rWorkspace, rDateFrom, rDateTo) {
    var content = "<tr>";
        content += "<td>" + rName + "</td>";
        content += "<td>" + rSurname + "</td>";
        content += "<td>" + rWorkspace + "</td>";
        content += "<td>" + rDateFrom + "</td>";
        content += "<td>" + rDateTo + "</td>";
        content += "<td class='colRemove'><button class='btn btn-sm btn-outline-danger py-0 my-0' alt='" + rId + "'>Usuń</button></td>";
        content += "</tr>";
		
    return content;
}


//Funkcja dynamicznie wczytująca wyposażenie danego stanowiska
function getEquipment() {
    $.ajax({
        url: "components/get_workspace_equipment_json.php",
        method: "post",
        data: {
            id : $("#form-workspace").val()     //Przekazanie ID stanowiska wybranego w polu <select>
        },
        dataType: "json",
        success: function(res) {
            $("#form-equipment").html("");      //Zerowanie kontenera z wyposażeniem
            $.each( res, function( key, value ) {
                //Tworzenie wyposażenia w formie przycisków
                var content = "<button class='btn btn-sm btn-outline-dark mr-1 mb-1 equipmentButton' disabled>" + res[key]['model'] + "</button>";
                $("#form-equipment").html($("#form-equipment").html() + content);       //Dodawanie wyposażenia do kontenera
            });
            
        }
    })
}