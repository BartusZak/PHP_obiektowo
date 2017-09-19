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
interface ActivityGenerator {
    
    function generate($activities);
    function getType();
}
