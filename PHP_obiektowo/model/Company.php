<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Company
 *
 * @author kamil
 */
class Company {
    var $id;
    var $name;
    
    function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }
    
    function getInfo() {
        return "<strong>Company:</strong> $this->id $this->name";
    }
    
    function asXml(){
        return "<company><id>$this->id</id><name>$this->name</name></company>";
    }
}
