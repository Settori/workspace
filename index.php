<?php
	require_once "class.php";	//Wczytanie pliku z klasą zawierającą wszystkie funkcjonalności
	$db = new workspaceDB;		//Zainicjowanie klasy do zmiennej
	$db->connect();				//Nawiązanie połączenia z bazą danych
?>

<!DOCTYPE html>
<html>
	<?php
		include "components/head.php";	//Wczytanie pliku z nagłówkiem strony
	?>
<body>
	<?php
		include "components/navbar.php";	//Wczytanie pliku z górnym panelem
	?>
	<div class="bg-light pt-4">
	<section class="container">
		<form class="pb-4">
            <div class="row mb-2">

				<div class="col">
					<label for="form-person" class="col-form-label">Pracownik</label>
					<select class="form-control" name="person" id="form-person">
						<?php
							//Pętla wczytująca pracowników do pola "<select>"
							foreach ($db->get_people() as $p) echo "<option value='".$p['id']."'>".$p['name']." ".$p['surname']."</option>";
						?>
					</select>
				</div>

				<div class="col">
					<label for="form-workspace" class="col-form-label">Stanowisko</label>
					<select class="form-control" name="workspace" id="form-workspace">
						<?php
							//Pętla wczytująca stanowiska do pola "<select>"
							foreach ($db->get_workspaces() as $w) echo "<option value='".$w['id']."'>".$w['code']."</option>";
						?>
					</select>
				</div>

			</div>

			<div class="row">

				<div class="col">
					<label for="form-date-from" class="col-form-label">Data rozpoczęcia</label>
					<input type="date" class="form-control" name="date-from" id="form-date-from" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d"); ?>" required>
				</div>

				<div class="col">
					<label for="form-time-from" class="col-form-label">Godzina</label>
					<input type="time" class="form-control" name="time-from" id="form-time-from" value="<?php echo date("H:i"); ?>" required>
				</div>

				<div class="col-6">
					<label class="col-form-label">Wyposażenie</label>
					<div id="form-equipment"></div>
				</div>
			
				

			</div>
			
			<div class="row mt-1">
				<div class="col">
					<label for="form-date-to" class="col-form-label">Data zakończenia</label>
					<input type="date" class="form-control" name="date-to" id="form-date-to" value="" min="<?php echo date("Y-m-d"); ?>" required>
				</div>

				<div class="col">
					<label for="form-time-to" class="col-form-label">Godzina</label>
					<input type="time" class="form-control" name="time-to" id="form-time-to" value="" required>
				</div>
				<div class="col-3"></div>
				<div class="col-3 float-right">
					<label class="col-form-label"> </label>
					<button class="btn btn-primary btn-block reservationSubmit">Zarezerwuj</button>
				</div>
			</div>
		</form>
	</section>
	</div>
	<section class="container">
		<table class='table table-md mt-2' id='reservations-table'>
			<thead class="thead-light">
				<tr>
					<th>Imię</th>
					<th>Nazwisko</th>
					<th>Stanowisko</th>
					<th>Od</th>
					<th>Do</th>
					<th></th>
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
	<script src="js/reservations.js"></script>
</body>

</html>