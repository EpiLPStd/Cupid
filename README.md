# CupidDB
Moduł projektu Cupid zawierający wszystkie potrzebne informacje dotyczące bazy danych w programie.

## Baza Danych
Plik _cupid.sql_ zawiera kod SQL generujący pustą bazę danych, wykorzystywaną w projekcie.

## Serwer
Baza danych wygenerowana z pliku _cupid.sql_ znalazła się na serwerze XAMPP, który pozwala na lokalne połączenie z bazą poprzez pliki _.php_ 
zawarte w folderze _cupid-project_.

#### Pliki _.php_
Do komunikacji aplikacji mobilnej z serwerem wykorzystywane są następnujące pliki:
- _upload.php_ - służy do przesyłania zdjęć na serwer (do folderu _media_)
- _DataBaseConfig.php_ - przechowuje jako zmienne nazwę serwera, nazwę użytkownika bazy danych wraz z hasłem oraz nazwę bazy danych
- _DataBase.php_ - plik, który pobiera zawarte w wyżej wymienionym pliku dane i na ich podstawie tworzy połączenie z bazą danych, ponadto
zawiera funkcje działające na bazie danych, wywoływane przez poniżej wymienione pliki
- _getPhotoID.php_ - plik pobierający nazwę zdjęcia w bazie i zwracający jego id z bazy
- _getUserID.php_ - plik pobierający nazwę użytkownika w bazie i zwracający jego id z bazy
- _insert.php_ - plik dodający do bazy dane nowego zdjęcia
- _insertUserPhoto.php_ - plik dodający informację o id dodanego zdjęcia oraz id użytkownika, który je dodał
- _login.php_ - plik pobierający wprowadzone w aplikacji login i hasło, sprawdzający, czy zgadzają się z danymi w bazie
- _signup.php_ - plik pobierający wprowadzone w aplikacji dane dotyczące nowego użytkownika i dodający go do bazy, jeżeli jeszcze w niej nie istnieje
