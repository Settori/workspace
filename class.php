<?php


//Główna klasa zawierająca funkcje niezbędne do działania strony
class workspaceDB {
        private $db_host = "127.0.0.1";     //Adres bazy danych MySQL
        private $db_user = "work";          //Nazwa użytkownika MySQL
        private $db_pass = "123456";        //Hasło użytkownika MySQL
        private $db_name = "work";          //Nazwa bazy danych
        public $con;                        //Zmienna przechowująca połączenie z bazą danych
        public $err = "It's OK!";           //Zmienna przechowująca informacje o błędach
        public $siteName = "Workspace project";     //Nazwa witryny internetowej
        

        //Funkcja służąca do nawiązania połączenia z bazą danych
        public function connect() {
			if ($connect = mysqli_connect($this->db_host, $this->db_user, $this->db_pass)) {
				if (mysqli_select_db($connect, $this->db_name)) {
					$this->con = $connect;      //Przypisanie połączenia do zmiennej
					mysqli_query($this->con, "SET NAMES 'utf8'");
					return true;
				} else {
					$this->err = 'Nie udało się  wybrać bazy danych';
					return false;
				}
			} else {
				$this->err = 'Nie udało się połączyć z bazą danych';
				return false;
			}
		}




        /*********************** People *************************/

        //Pobieranie listy pracowników
        public function get_people() {
            if ($this->con) {       //Sprawdzenie czy połączenie zostało nawiązane
                $query = "SELECT * from people ORDER BY id";        //Zapytanie SQL pobierające dane pracowników
                if ($result = mysqli_query($this->con, $query)) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $return[] = array (
                            "id" => $row['id'],
                            "name" => $row['name'],
                            "surname" => $row['surname'],
                            "tel" => $row['tel'],
                            "email" => $row['email'],
                            "desc" => $row['description']
                            
                        );
                    }
                    
                    return $return; //Zwrócenie tablicy zawierającej pobraną listę pracowników
                } else {
                    $this->err = 'Nie udało się pobrać danych';
                    return false;
                }
            } else {
                $this->err = 'Nie połączono z bazą danych';
                return false;
            }
        }

        //Funkcja dodająca pracowników do bazy danych
        //Używana tylko podczas tworzenia przykładowych danych, stąd brak sprawdzania powtórzeń
        public function add_person($name, $surname, $tel, $email, $desc) {
            if ($this->con) {       //Sprawdzenie czy połączenie zostało nawiązane
                if (mysqli_query($this->con, "INSERT INTO people (name, surname, tel, email, description) VALUES ('$name', '$surname', $tel, '$email', '$desc')")) return true;
                else {
                    $this->err = "Nie da sie dodać osoby";
                    return false;
                }
            } else {
                $this->err = 'Nie połączono z bazą danych';
                return false;
            }

        }





        /*********************** Workspaces *************************/

        //Funkcja zwracająca listę stanowisk
        public function get_workspaces() {
            if ($this->con) {       //Sprawdzenie czy połączenie zostało nawiązane
                $query = "SELECT * from workspaces ORDER BY id";        //Zapytanie SQL pobierające dane stanowisk
                if ($result = mysqli_query($this->con, $query)) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $return[] = array (
                            "id" => $row['id'],
                            "code" => $row['code'],
                            "desc" => $row['description']
                            
                        );
                    }
                    
                    return $return;     //Zwracanie listy stanowisk
                } else {
                    $this->err = 'Nie udało się pobrać danych';
                    return false;
                }
            } else {
                $this->err = 'Nie połączono z bazą danych';
                return false;
            }
        }

        //Funkcja dodająca nowe stanowiska pracy do bazy danych
        //Używana tylko podczas tworzenia przykładowych danych, stąd brak sprawdzania powtórzeń
        public function add_workspace($code, $desc) {
            if ($this->con) {       //Sprawdzenie czy połączenie zostało nawiązane
                if (mysqli_query($this->con, "INSERT INTO workspaces (code, description) VALUES ('$code', '$desc')")) return true;
                else {
                    $this->err = "Nie da sie dodać stanowiska";
                    return false;
                }
            } else {
                $this->err = 'Nie połączono z bazą danych';
                return false;
            }

        }





        /*********************** Equipment *************************/

        //Funkcja zwracająca rodzaje wyposażenia
        public function get_equipment_types() {
            if ($this->con) {       //Sprawdzenie czy połączenie zostało nawiązane
                $query = "SELECT * from equipment_types ORDER BY id";
                if ($result = mysqli_query($this->con, $query)) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $return[] = array (
                            "id" => $row['id'],
                            "value" => $row['value']
                            
                        );
                    }
                    
                    return $return;
                } else {
                    $this->err = 'Nie udało się pobrać danych';
                    return false;
                }
            } else {
                $this->err = 'Nie połączono z bazą danych';
                return false;
            }
        }


        //Funkcja zwracająca wyposażenia konkretnego rodzaju
        public function get_equipments($type) {
            if ($this->con) {       //Sprawdzenie czy połączenie zostało nawiązane
                $query = "SELECT equipment_data.id as eid, code, model FROM equipment_data LEFT JOIN workspaces_equipment ON equipment_id = equipment_data.id WHERE type = $type AND workspaces_equipment.id IS NULL";
                if ($result = mysqli_query($this->con, $query)) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $return[] = array (
                            "id" => $row['eid'],
                            "code" => $row['code'],
                            "model" => $row['model']
                            
                        );
                    }
                    
                    return $return;
                } else {
                    $this->err = 'Nie udało się pobrać danych';
                    return false;
                }
            } else {
                $this->err = 'Nie połączono z bazą danych';
                return false;
            }
        }

        //Funkcja zwracająca wyposażenie konkretnego stanowiska
        public function get_workspace_equipment($id) {
            if ($this->con) {       //Sprawdzenie czy połączenie zostało nawiązane
                $query = "
                SELECT workspaces_equipment.id as wid, model from workspaces_equipment 
                LEFT JOIN equipment_data ON equipment_data.id = equipment_id 
                WHERE workspace_id = $id
                ";
                if ($result = mysqli_query($this->con, $query)) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $return[] = array (
                            "id" => $row['wid'],
                            "model" => $row['model']
                            
                        );
                    }
                    
                    return $return;
                } else {
                    $this->err = 'Nie udało się pobrać danych';
                    return false;
                }
            } else {
                $this->err = 'Nie połączono z bazą danych';
                return false;
            }
        }

        //Funkcja usuwająca wyposażenie z konkretnego stanowiska
        public function remove_workspace_equipment($id) {
            if ($this->con) {       //Sprawdzenie czy połączenie zostało nawiązane
                $query = "DELETE FROM workspaces_equipment WHERE id = $id";
                if ($result = mysqli_query($this->con, $query)) return true;
                else {
                    $this->err = 'Nie udało się usunąć wyposażenia';
                    return false;
                }
            } else {
                $this->err = 'Nie połączono z bazą danych';
                return false;
            }
        }

        //Funkcja dodająca nowe wyposażenie do bazy danych
        //Używana tylko podczas tworzenia przykładowych danych, stąd brak sprawdzania powtórzeń
        public function add_equipment($type, $model, $code, $date, $value, $desc) {
            if ($this->con) {       //Sprawdzenie czy połączenie zostało nawiązane
                if (mysqli_query($this->con, "INSERT INTO equipment_data (type, model, code, purchase_date, value, description) VALUES ($type, '$model', '$code', '$date', $value, '$desc')")) return true;
                else {
                    $this->err = "Nie da sie dodać wyposażenia";
                    return false;
                }
            } else {
                $this->err = 'Nie połączono z bazą danych';
                return false;
            }

        }

        //Funkcja przypisująca wyposażenie do konkretnego stanowiska
        public function add_equipment_to_workspace($workspace_id, $equipment_id) {
            if ($this->con) {       //Sprawdzenie czy połączenie zostało nawiązane
                if (mysqli_query($this->con, "INSERT INTO workspaces_equipment (workspace_id, equipment_id) VALUES ($workspace_id, $equipment_id)")) return true;
                else {
                    $this->err = "Nie da sie dodać wyposażenia";
                    return false;
                }
            } else {
                $this->err = 'Nie połączono z bazą danych';
                return false;
            }

        }


        /*********************** Reservations *************************/

        //Funkcja zwracająca rezerwacje stanowisk
        public function get_reservations() {
            if ($this->con) {       //Sprawdzenie czy połączenie zostało nawiązane
                $query = "
                SELECT reservations.id as rid, name, surname, code, registration_date, expiration_date FROM reservations 
                LEFT JOIN people ON people.id = person_id 
                LEFT JOIN workspaces ON workspaces.id = workspace_id 
                ORDER BY expiration_date DESC
                ;";
                if ($result = mysqli_query($this->con, $query)) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $return[] = array (
                            "id" => $row['rid'],
                            "name" => $row['name'],
                            "surname" => $row['surname'],
                            "workspace" => $row['code'],
                            "date_from" => $row['registration_date'],
                            "date_to" => $row['expiration_date']
                            
                        );
                    }
                    
                    return $return;
                } else {
                    $this->err = 'Nie udało się pobrać danych';
                    return false;
                }
            } else {
                $this->err = 'Nie połączono z bazą danych';
                return false;
            }
        }

        //Funkcja służąca do rezerwacji stanowisk
        public function add_reservation($workspace_id, $person_id, $date_from, $date_to) {
            if ($this->con) {       //Sprawdzenie czy połączenie zostało nawiązane

                //Funkcja sprawdzająca czy rezerwacja nie koliduje z inną
                if (mysqli_num_rows(mysqli_query($this->con, "SELECT id FROM reservations WHERE workspace_id = $workspace_id AND ((registration_date >= '$date_from' AND registration_date < '$date_to') OR (expiration_date > '$date_from' AND expiration_date <= '$date_to'))")) > 0) {
                    $this->err = 'Termin zajęty!';
                    return false;
                }

                //Jeśli nie koliduje, dodaje nową rezerwację
                if (mysqli_query($this->con, "INSERT INTO reservations (workspace_id, person_id, registration_date, expiration_date) VALUES ($workspace_id, $person_id, '$date_from', '$date_to')")) return true;
                else {
                    $this->err = "Nie da sie dodać rezerwacji";
                    return false;
                }
            } else {
                $this->err = 'Nie połączono z bazą danych';
                return false;
            }

        }

        //Funkcja służąca do usuwania rezerwacji stanowisk
        public function remove_reservation($id) {
            if ($this->con) {       //Sprawdzenie czy połączenie zostało nawiązane
                //Usuwanie rejesteracji o danym ID
                if (mysqli_query($this->con, "DELETE FROM reservations WHERE id = $id")) return true;
                else {
                    $this->err = "Nie da sie usunąć rezerwacji";
                    return false;
                }
            } else {
                $this->err = 'Nie połączono z bazą danych';
                return false;
            }

        }

        
	}

?>