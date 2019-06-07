<?php

class Vk {

    public static function title() {
        return 'VBlog';
    }
    public static function getSUrl($files=array(),$name="") {
        return view('default',['files' => $files,'name' => $name]);
    }
    public static function dformat($date){
       return date('d-m-Y H:i A', strtotime($date));
    }

}
