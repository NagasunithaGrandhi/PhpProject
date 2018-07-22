<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 
    function textWrap($text) { 
        $new_text = ''; 
        $text_1 = explode('>',$text); 
        $sizeof = sizeof($text_1); 
        for ($i=0; $i<$sizeof; ++$i) { 
            $text_2 = explode('<',$text_1[$i]); 
            if (!empty($text_2[0])) { 
                $new_text .= preg_replace('#([^\n\r .]{25})#i', '\\1  ', $text_2[0]); 
            } 
            if (!empty($text_2[1])) { 
                $new_text .= '<' . $text_2[1] . '>';    
            } 
        } 
        return $new_text; 
    } 
?>