# CupidDB
Moduł projektu Cupid zawierający wszystkie potrzebne informacje dotyczące serwera, bazy danych oraz aplikacji webowej w programie.

## Baza Danych
Plik _cupid.sql_ zawiera kod SQL generujący pustą bazę danych, wykorzystywaną w projekcie.

## Serwer
Baza danych wygenerowana z pliku _cupid.sql_ znalazła się na serwerze XAMPP, który pozwala na lokalne połączenie z bazą poprzez pliki _.php_ 
zawarte w folderze _cupid_.

#### Pliki _.php_ do komunikacji bazy danych z aplikacją mobilną
Do komunikacji aplikacji mobilnej z serwerem wykorzystywane są następnujące pliki:
- _upload.php_ - służy do przesyłania zdjęć na serwer (do folderu _media_)
- _DataBaseConfig.php_ - przechowuje jako zmienne nazwę serwera, nazwę użytkownika bazy danych wraz z hasłem oraz nazwę bazy danych
- _DataBase.php_ - plik, który pobiera zawarte w wyżej wymienionym pliku dane i na ich podstawie tworzy połączenie z bazą danych, ponadto
zawiera funkcje działające na bazie danych, wywoływane przez poniżej wymienione pliki
- _getEventID.php_ - plik pobierający nazwę wydarzenia w bazie i zwracający jego id z bazy
- _getPhotoID.php_ - plik pobierający nazwę zdjęcia w bazie i zwracający jego id z bazy
- _getUserID.php_ - plik pobierający nazwę użytkownika w bazie i zwracający jego id z bazy
- _insert.php_ - plik dodający do bazy dane nowego zdjęcia
- _insertUserPhoto.php_ - plik dodający informację o id dodanego zdjęcia oraz id użytkownika, który je dodał
- _joinEvent.php_ - plik pobierający wprowadzone w aplikacji nazwę i hasło wydarzenia, sprawdzający, czy zgadzają się z danymi w bazie
- _login.php_ - plik pobierający wprowadzone w aplikacji login i hasło użytkownika, sprawdzający, czy zgadzają się z danymi w bazie
- _newEvent.php_ - plit pobierający wprowadzone w aplikacji dane dotyczące nowego wydarzenia i dodający je do bazy, jeżeli jeszcze w niej nie istnieje
- _signup.php_ - plik pobierający wprowadzone w aplikacji dane dotyczące nowego użytkownika i dodający go do bazy, jeżeli jeszcze w niej nie istnieje

#### Pliki _.php_ do komunikacji bazy danych z aplikacją webową
- _login.php_ - plik pobierający nazwę i hasło wydarzenia lub użytkownika, sprawdzający, czy zgadzają się z danymi w bazie
- _manage_ / _index.php_ - plik pobierający nazwy wydarzeń z bazy i tworzący prosty interfejs pozwalający wyświetlić ich albumy
- _album_ / _index.php_ - plik pobierający zdjęcia przypisane do konkretnego wydarzenia oraz id użytkowników i wyświetlający 
album wraz ze zdjęciami i loginami użytkowników z możliwością pobrania zdjęć w formacie PDF lub html

#### Pliki aplikacji webowej niezwiązane z bazą danych
- _logout.php_ - plik służący do wylogowania użytkownika lub z wydarzenia
- _album_ / _back.jpg_ - zdjęcie będące tłem strony w albumie
- _album_ / _draggable.js_ - skrypt JavaScript pozwalający na przesuwanie zdjęć w obrębie albumu w celu zmiany ich kolejności
- _album_ / _pdfExport.js_ - skrypt zawierający funkcję tworzącą plik PDF z utworzonego albumu
- _album_ / _toHTML.js_ - skrypt tworzący stronę html z utworzonym albumem
- _album_ / _toPDF.js_ - skrypt zawierający funkcję zapisującą album jako plik PDF

#### Pliki bibliotek zewnętrznych
Pliki _blobstream.js_ oraz _pdfKit.js_ to zewnętrzne pliki, które zostały wykorzystane w celu prawidłowego działania projektu.
