<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ActivityGenerator
 *
 * @author kamil
 */
include_once 'logic/ActivityGenerator.php';

class HtmlActivityGenerator implements ActivityGenerator {
    function generate ($activities){
        echo "<table><tr><td>Data</td><td>Temat</td><td>Nazwa firmy</td><td>Typ</td><td>Status</td><td>Sprzedawca</td></tr>";
        foreach($activities as $activity){
            echo $activity->asHtmlTableRow();
        }
        echo "</table>";
    }
    function getType (){
        return "html";
    }
}
