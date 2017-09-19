<?php

class Activity {
    var $id;
    var $subject;
    var $time;
    var $salesman;
    var $company;
    var $type;
    private $status;
    var $note;

    function __construct($id, $subject, $time, $salesman, $company, $type, $status, $note) {
        $this->id = $id;
        $this->time = $time;
        $this->subject = $subject;
        $this->salesman = $salesman;
        $this->company = $company;
        $this->type = $type;
        $this->status = $this->setStatus($status);
        $this->note = $note;
    }
    
    //tworze głęboką kopię tj. klonują sie elementy danej klasy (nowe indexy)
    function __clone() {
        $this->time = clone $this->time;
        $this->salesman = clone $this->salesman;
        $this->company = clone $this->company;
    }
    
    //metoda magiczna wykorzysytwna przy serializacji danych - wybierasz jakie pola poddac serializacji
    function __sleep() {
        return array("id","status");
    }
    
    //metoda magiczna wykorzysytwana przy deserializacji - podczas deserializacji możesz wykonać dodatkowa operację
    function __wakeup() {
        echo "Metoda magiczna wakeupp<br>";
    }
    
    function getStatus(){
        if ($this->status == 1){ return ActivityStatus::OPEN; }
        if ($this->status == 2){ return ActivityStatus::IN_PROGRESS; }
        if ($this->status == 3){ return ActivityStatus::CLOSED; }
    }
    
    function setStatus($newStatus){
        if ($newStatus == ActivityStatus::OPEN){ $this->status = 1 ;}
        if ($newStatus == ActivityStatus::IN_PROGRESS){ $this->status = 2 ;}
        if ($newStatus == ActivityStatus::CLOSED){ $this->status = 3 ;}
    }
            
    function getInfo() {
        return "<strong>Activity:</strong> $this->id $this->subject {$this->time->format("Y-m-d H:m")} {$this->salesman->getInfo()} {$this->company->getInfo()} $this->type $this->status $this->note";
    }
    
    function asXml(){
        return "<activity><id>$this->id</id><subject>$this->subject</subject><time>{$this->time->format("Y-m-d H:m")}</time>{$this->salesman->asXml()}{$this->company->asXml()}<type>$this->type</type><status>{$this->getStatus()}</status><note>$this->note</note></activity>";
    }
    
    function asHtmlTableRow() {
        $html = "<tr>";
        $html .= "<td>{$this->time->format("Y-m-d H:m")}</td>";
        $html .= "<td>$this->subject</td>";
        $html .= "<td>{$this->company->name}</td>";
        $html .= "<td>$this->type</td>";
        $html .= "<td>$this->status</td>";
        $html .= "<td>{$this->salesman->name}</td>";
        $html .= "</tr>";
        return $html;
    }
}

class ActivityType {
    const PHONE = "telefon";
    const MEETING = "spotkanie";
    const EMAIL = "email";
}

class ActivityStatus {
    const OPEN = "zaplanowane";
    const IN_PROGRESS = "w trakcie";
    const CLOSED = "zakończone";
}


