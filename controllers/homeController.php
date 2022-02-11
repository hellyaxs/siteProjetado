<?php

class homeController extends mainController {

  public function index(){

      $data = array(
          "css" => "home",
      );

      $this->runTemplate('home',$data);

  }

}