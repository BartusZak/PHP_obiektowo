<?php

HtmlBuilder::begin()
        ->p("Nowy paragraf!")
        ->hr()->pre("class HtmlBuilder")
        ->p("Kolejny paragraf!")
    ->end();

class HtmlBuilder {
    private function __construct($html) {
        $this->html = $html;
    }
    
    private $html;
    
    static function begin(){
        $builder = new HtmlBuilder("<html><head></head><body>");
        return $builder;
    }
    
    function p($paragraph){
        $this->html .= "<p>$paragraph</p>";
        return $this;
    }
    
    function hr(){
        $this->html .= "<hr/>";
        return $this;
    }
    
    function pre($contents){
        $safeContents = htmlspecialchars($contents);
        $this->html .= "<pre>$safeContents</pre>";
        return $this;
    }
    
    function end(){
        $this->html .= "</body></html>";
        return $this->html;
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>