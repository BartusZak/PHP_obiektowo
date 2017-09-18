<h1>Aktywności</h1>
<?php
include_once 'model/Activity.php';
include_once 'model/Company.php';
include_once 'model/Salesman.php';

//tworzenie obiektu bez konstruktora
//$activity = new Activity();
//$activity->id = 1;
//$activity->subject = "Nawiązanie kontaktu";
//$activity->type = ActivityType::PHONE;
//$activity->status = ActivityStatus::CLOSED;

$firstsalesman = new Salesman(1, "Jan Kowalski");
$secoundsalesman = new Salesman(2, "Adam Nowak");

$firstcompany = new Company(1, "Acme XXX");
$secoundcompany = new Company(2, "Acme YYY");
$thirdcompany = new Company(3, "Acme ZZZ");

$activities = array (
    new Activity(1, "Temat1", new DateTime("2012-10-02 10:30"), $firstsalesman, $firstcompany, ActivityType::EMAIL, ActivityStatus::CLOSED, "Notatka1"),
    new Activity(2, "Temat2", new DateTime("2014-02-21 20:12"), $secoundsalesman, $secoundcompany, ActivityType::MEETING, ActivityStatus::IN_PROGRESS, "Notka2"),
    new Activity(3, "Temat3", new DateTime("2022-01-11 02:30"), $firstsalesman, $thirdcompany, ActivityType::PHONE, ActivityStatus::OPEN, "Notatka3")
);
//tworzenie obiektu z konstruktorem
//$activity = new Activity(1, "Nawiązanie kontaktu", new DateTime("2012-02-12"), $salesman, $company, ActivityType::PHONE, ActivityStatus::CLOSED, "Klient poprosił o ofertę");

//wypisanie elementów bez metody getInfo()
//echo "$activity->id $activity->subject $activity->type $activity->status";

//wypisanie elementow z metoda getInfo()
//echo $activity->getInfo();

//wyswietlenie wszystkich zawartosci
//foreach($activities as $activity){
//    echo "<p>{$activity->getInfo()}</p>";
//}

echo "<table><tr><td>Data</td><td>Temat</td><td>Nazwa firmy</td><td>Typ</td><td>Status</td><td>Sprzedawca</td></tr>";
foreach($activities as $activity){
    echo $activity->asHtmlTableRow();
}
echo "</table>";
?>
