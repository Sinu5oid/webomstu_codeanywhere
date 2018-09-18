<?php
 abstract class Model
 {
   protected $config = null;
   protected $db = null;
   
   public function __construct()
   {
     $this->config = Configuration::getConfiguration();
     $this->db = DB::getInstance(); 
   }
 }