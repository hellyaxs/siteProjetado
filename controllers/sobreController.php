<?php


class sobreController extends mainController
{

    public function index(){

        $data =array(
            "css" => "sobre-escola"
        );

        $this->runTemplate("quemSomos",$data);
    }

}