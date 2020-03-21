$(document).ready(function(){
    getWorkspaces();    //Wywołanie funkcji wczytującej stanowiska do tabeli
    getEquipment();     //Wywołanie funkcji wczytującej wyposażenie do pola <select>

    //Obsłużenie kliknięcia w przycisk dodający wyposażenie do stanowiska
    $(".workspaceSubmit").click(function(){
        addEquipment();     //Wywołanie funkcji dodającej wyposażenie do danego stanowiska
        return false;       //Blokowanie przeładowania strony po kliknięciu
    });

    //Obsłużenie zmiany wartości w polu <select> zawierającym rodzaje wyposażenia
    $("#form-type").change(function(){
        getEquipment();     //Wywołanie funkcji wczytującej wyposażenie do pola <select>
    });

    //Obsłużenie kliknięcia w wyposażenie, aby usunąć je z danego stanowiska
    $("#workspaces-table tbody").on("click", ".equipmentButton", function(){
        removeEquipment($(this).attr("alt"));       //Wywołanie funkcji usuwającej wyposażenie ze stanowiska, na podstawie jego numeru ID
    });

});

//Funkcja dynamicznie wczytująca stanowiska do tabeli
function getWorkspaces() {
    $.ajax({
        url: "components/get_workspaces_json.php",
        method: "post",
        data: '',
        dataType: "json",
        success: function(res) {
            $("#workspaces-table tbody").html("Ładowanie");     //Zerowanie tabeli
            $.each( res, function( key, value ) {
                var content = getWorkspacesContent(res[key]['code'], res[key]['desc'], res[key]['equipment']);
                
                $("#workspaces-table tbody").html($("#workspaces-table tbody").html() + content);
            });
            
        }
    })
}

//Funkcja przerabiająca dane do odpowiedniej postaci HTML
function getWorkspacesContent(wCode, wDesc, wEquipment) {
    if (wEquipment == null) wEquipment = "";
    var content = "<tr>";
        content += "<td>" + wCode + "</td>";
        content += "<td>" + wDesc + "</td>";
        content += "<td>";
        $.each(wEquipment, function(index, value){
            content += "<span class='btn btn-sm btn-outline-secondary mr-1 equipmentButton' alt='" + value['id'] + "'>" + value['model'] + "</span>";
        });
        content += "</td>";
        content += "</tr>";
		
    return content;
}

//Funkcja dynamicznie wczytująca wyposażenie do pola <select>
function getEquipment() {
    $.ajax({
        url: "components/get_equipment_json.php",
        method: "post",
        data: {
            type : $("#form-type").val()
        },
        dataType: "json",
        success: function(res) {
            $("#form-equipment").html("");
            $.each( res, function( key, value ) {
                var content = "<option value='" + res[key]['id'] + "'>" + res[key]['model'] + "</option>";
                
                $("#form-equipment").html($("#form-equipment").html() + content);
            });
            
        }
    })
}

//Funkcja dynamicznie dodająca wyposażenie do danego stanowiska
function addEquipment() {
    $.ajax({
        url: "components/add_equipment_json.php",
        method: "post",
        data: {
            workspace_id : $("#form-workspace").val(),  //Przekazanie ID stanowiska, pobranego z pola <select>
            equipment_id : $("#form-equipment").val()   //Przekazanie ID wyposażenia, pobranego z pola <select>
        },
        dataType: "json",
        success: function(res) {
            if (res['err'] != "It's OK!") alert(res['err']);
            getWorkspaces();    //Wywołanie funkcji wczytującej stanowiska do tabeli (odświeżanie po dodaniu)
            getEquipment();     //Wywołanie funkcji wczytującej wyposażenie do pola <select>
        }
    })
}

//Funkcja dynamicznie usuwająca wyposażenie z danego stanowiska
function removeEquipment(eId) {
    $.ajax({
        url: "components/remove_workspace_equipment_json.php",
        method: "post",
        data: {
            id : eId
        },
        dataType: "json",
        success: function(res) {
            getWorkspaces();    //Wywołanie funkcji wczytującej stanowiska do tabeli (odświeżanie po usunięciu)
            getEquipment();     //Wywołanie funkcji wczytującej wyposażenie do pola <select>
        }
    })
}

