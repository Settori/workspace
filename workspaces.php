<?php
	require_once "class.php";	//Wczytanie pliku z klasą zawierającą wszystkie funkcjonalności
	$db = new workspaceDB;		//Zainicjowanie klasy do zmiennej
	$db->connect();				//Nawiązanie połączenia z bazą danych
?>

<!DOCTYPE html>
<html>
	<?php 
		include "components/head.php"; 		//Wczytanie pliku z nagłówkiem strony
	?>

<body>
	<?php
		include "components/navbar.php";	//Wczytanie pliku z górnym panelem
	?>
	<section class="container">
	<form class="mb-5 mt-4">
            <div class="row mb-2">

				<div class="col-2">
					<label for="form-workspace" class="col-form-label">Stanowisko</label>
					<select class="form-control" name="workspace" id="form-workspace">
						<?php
							//Pętla wczytująca stanowiska do pola "<select>"
							foreach ($db->get_workspaces() as $w) echo "<option value='".$w['id']."'>".$w['code']."</option>";
						?>
					</select>
				</div>

				<div class="col">
					<label for="form-type" class="col-form-label">Typ</label>
					<select class="form-control" name="type" id="form-type">
						<?php
							//Pętla wczytująca rodzaje wyposażenia do pola "<select>"
							foreach ($db->get_equipment_types() as $t) echo "<option value='".$t['id']."'>".$t['value']."</option>";
						?>
					</select>
				</div>

				<div class="col">
					<label for="form-equipment" class="col-form-label">Wyposażenie</label>
					<!--- Zawartość pola select wczytywana jest dynamicznie skryptem JS, na podstawie wybranego rodzaju wyposażenia --->
					<select class="form-control" name="equipment" id="form-equipment">
					</select>
				</div>

				<div class="col-2">
					<label for="" class="col-form-label"> </label>
					<button class="btn btn-primary btn-block workspaceSubmit">Dodaj</button>
				</div>
			</div>
        </form>
		<table class='table table-sm' id="workspaces-table">
			<thead>
				<tr>
					<th>Kod stanowiska</th>
					<th>Opis</th>
					<th>Wyposażenie</th>
				</tr>
			</thead>

			<!--- Zawartość tbody tabeli wczytywana jest dynamicznie skryptem JS --->
			<tbody>
			</tbody>

		</table>
	</section>
	<?php
		include "components/footer.php";	//Wczytanie pliku ze stopką strony
	?>
	<!--- Wczytanie pliku JS z funkcjami dynamicznie wczytującymi dane --->
	<script src="js/workspaces.js"></script>
</body>

</html>