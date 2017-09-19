<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of XmlActivityGenerator
 *
 * @author kamil
 */
include_once 'logic/ActivityGenerator.php';

class XmlActivityGenerator implements ActivityGenerator {
    function generate($activities) {
        $xml = "<ativities>";
        
        foreach ($activities as $activity){
            $xml .= $activity -> asXml();
        }
        $xml.= "</activities>";
        return $xml;
    }
    
    function getType() {
        return "xml";
    }
}
