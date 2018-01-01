<?php
/**
 * Created by PhpStorm.
 * User: thomasbuatois
 * Date: 19/12/2017
 * Time: 19:29
 */

class helper
{
    public static function checkPost($Post_Array){

        foreach ($Post_Array as $key){
            if(!isset($_POST[$key]) && empty($_POST[$key])){
                return False;
            }
        }
        return True;
    }

    public static function checkSession($Session_array){
        foreach ($Session_array as $key){
            if(!isset($_SESSION[$key]) && empty($_SESSION[$key])){
                return False;
            }
        }
        return True;
    }

    public static function checkGet($Get_Array){

        foreach ($Get_Array as $key){
            if(!isset($_GET[$key]) && empty($_GET[$key])){
                return False;
            }
        }
        return True;
    }
}