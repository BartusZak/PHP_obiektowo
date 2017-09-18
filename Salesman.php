<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Salesman
 *
 * @author kamil
 */
class Salesman {
    var $id;
    var $name;
    
    function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }
    
    function getInfo() {
        return "<strong>Salesman:</strong> $this->id $this->name";
    }
}
