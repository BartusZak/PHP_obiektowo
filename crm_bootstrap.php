<h1>Aktywności</h1>
<?php
include_once 'model/Activity.php';
include_once 'model/Company.php';
include_once 'model/Salesman.php';
include_once 'logic/HtmlActivityGenerator.php';
include_once 'logic/XmlActivityGenerator.php';

//tworzenie obiektu bez konstruktora
//$activity = new Activity();
//$activity->id = 1;
//$activity->subject = "Nawiązanie kontaktu";
//$activity->type = ActivityType::PHONE;
//$activity->status = ActivityStatus::CLOSED;

$firstsalesman = new Salesman(1, "Jan Kowalski");
$secoundsalesman = new Salesman(2, "Adam Nowak");

$firstcompany = new Company(1, "Acme XXX");
$firstcompany->add(
        new Activity(1, "Temat1", new DateTime("2012-10-02 10:30"), $firstsalesman, ActivityType::EMAIL, ActivityStatus::CLOSED, "Notatka1"));      
        
$secoundcompany = new Company(2, "Acme YYY");
$secoundcompany->add(
        new Activity(2, "Temat2", new DateTime("2014-02-21 20:12"), $secoundsalesman, ActivityType::MEETING, ActivityStatus::IN_PROGRESS, "Notka2"));

$thirdcompany = new Company(3, "Acme ZZZ");
$thirdcompany->add(
        new Activity(3, "Temat3", new DateTime("2022-01-11 02:30"), $firstsalesman, ActivityType::PHONE, ActivityStatus::OPEN, "Notatka3"));

$activities = new AppendIterator();
$activities->append($firstcompany->findActivities());
$activities->append($secoundcompany->findActivities());
$activities->append($thirdcompany->findActivities());

//brak metody getCompany();
//function sortActivitiesByCompanyNameReversed($activity1, $activity2){
//    return -strcmp($activity1->getCompany()->name, $activity2->getCompany()->name);
//}

$activities_sorted = new ArrayObject(iterator_to_array($activities, FALSE));
//$activities_sorted->uasort("sortActivitiesByCompanyNameReversed");

$activityGenerator = new HtmlActivityGenerator();
echo $activityGenerator->generate($activities_sorted);

//$activities = array (
//    new Activity(1, "Temat1", new DateTime("2012-10-02 10:30"), $firstsalesman, $firstcompany, ActivityType::EMAIL, ActivityStatus::CLOSED, "Notatka1"),
//    new Activity(2, "Temat2", new DateTime("2014-02-21 20:12"), $secoundsalesman, $secoundcompany, ActivityType::MEETING, ActivityStatus::IN_PROGRESS, "Notka2"),
//    new Activity(3, "Temat3", new DateTime("2022-01-11 02:30"), $firstsalesman, $thirdcompany, ActivityType::PHONE, ActivityStatus::OPEN, "Notatka3")
//);

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
//echo "$firstsalesman == $secoundsalesman";

//wyświetlenie wszystkich zawartości w sformatowanej tabeli -- przeniesione do logic/ActivityGenerator.php
//echo "<table><tr><td>Data</td><td>Temat</td><td>Nazwa firmy</td><td>Typ</td><td>Status</td><td>Sprzedawca</td></tr>";
//foreach($activities as $activity){
//    echo $activity->asHtmlTableRow();
//}
//echo "</table>";

//$activityGenerator = new HtmlActivityGenerator();
//echo $activityGenerator->generate($activities);

echo "<pre>";
//var_dump($activities[0]);
//
//$activity = clone $activities[0];
//
//var_dump($activity);

//
//$serializedActivity = serialize($activities[0]);
//
//var_dump(unserialize($serializedActivity));
//
//$myActivity = $activities[0];
//
//echo "{$myActivity->getStatus()}";
echo "</pre>";
?>
