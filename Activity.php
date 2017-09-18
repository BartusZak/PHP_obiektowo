<?php

class Activity {
    var $id;
    var $subject;
    var $time;
    var $salesman;
    var $company;
    var $type;
    var $status;
    var $note;

    function __construct($id, $subject, $time, $salesman, $company, $type, $status, $note) {
        $this->id = $id;
        $this->time = $time;
        $this->subject = $subject;
        $this->salesman = $salesman;
        $this->company = $company;
        $this->type = $type;
        $this->status = $status;
        $this->note = $note;
    }
    
    function getInfo() {
        return "<strong>Activity:</strong> $this->id $this->subject {$this->time->format("Y-m-d H:m")} {$this->salesman->getInfo()} {$this->company->getInfo()} $this->type $this->status $this->note";
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


