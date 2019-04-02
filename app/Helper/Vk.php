<?php

class Vk {

    public static function title() {
        return 'VBlog';
    }
    public static function getSUrl($files=array(),$name="") {
        return view('default',['files' => $files,'name' => $name]);
    }

}
