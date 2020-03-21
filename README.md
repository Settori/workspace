# Workspace

Projekt systemu rezerwacji miejsc pracy w biurze.

## Wymagania

- Serwer WWW np. Nginx, Apache
- PHP 7.x
- Serwer MySQL

## Instalacja
Należy zaimportować dane z pliku **workspace.sql** do bazy MySQL

Następnie w pliku **class.php** zmienić następujące dane tak, aby nawiązać połączenie z własną bazą danych MySQL

```php
private $db_host = "";     //Adres bazy danych MySQL
private $db_user = "";     //Nazwa użytkownika MySQL
private $db_pass = "";     //Hasło użytkownika MySQL
private $db_name = "";     //Nazwa bazy danych
```

## Opis

Wyposażenie wyświetlane jest pod listą wyboru stanowiska
![stanowiska](https://raw.githubusercontent.com/Settori/images/master/stanowiska.png)

W sekcji zarządzania wyposażeniem, aby usunąć wybrane wyposażenie należy na nie kliknąć. Tabela automatycznie się odświeży, razem z listą wyboru wyposażenia. Usunięty element będzie znowu widoczny w liście wyboru.
![wyposażenie](https://raw.githubusercontent.com/Settori/images/master/Screenshot_20200321_142212.png)

Usuwanie rezerwacji stanowiska odbywa się poprzez kliknięcie w przycisk **usuń**, widoczny po najechaniu na dany wiersz w tabeli
![usuwanie](https://raw.githubusercontent.com/Settori/images/master/Screenshot_20200321_145949.png)

Wyświetlanie, dodawanie i usuwanie elementów odbywa się dynamicznie.
