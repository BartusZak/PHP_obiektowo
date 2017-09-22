<?php
include_once 'logic/Calculator.php';

function exceptionHandler ($exception){
    ob_end_clean();
    header("Location: error.php");
    exit;
}
set_exception_handler("exceptionHandler");
$calculator = new Calculator();


   // echo $calculator->divide(10, 2);
    echo $calculator->divide(10, 0);
    echo "inde";

//defaultowy exception
//} catch (Exception $e){
//    echo $e->getMessage();
//}

//Sprecyzowany exception
//} catch (CalculatorException $e){
//    echo $e->getMessage();
//} catch (Exception $generalException){
//    echo "Ogólny błąd!";
//}
    
    
    /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

