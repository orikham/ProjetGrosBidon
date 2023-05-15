<?php

abstract class Ingredient{

    private $id_ingredient;

    private $name_ingredient;

    private $type_ingredient;


    public function __construct(array $datas){
        $this->hydrate($datas);
        
    }

    private function hydrate(array $datas){
        foreach($datas as $key => $value){
            $method = 'set' . ucfirst($key);             
            if(method_exists($this, $method)){
               $this->$method($value);
            }
        }
                
    }


//getters
    public function getIdIngredient(){
        return $this->id_ingredient;
    }

    public function getNameIngredient(){
        return $this->name_ingredient;
    }

    public function getTypeIngredient(){
        return $this->type_ingredient;
    }

//setters

    public function setIdIngredient(Int $id_ingredient){
        $this->id_ingredient = $id_ingredient;
        
    }

    public function setNameIngredient(String $name_ingredient){
        $this->name_ingredient = $name_ingredient;
        
    }

    public function setTypeIngredient(String $type_ingredient){
        $this->type_ingredient = $type_ingredient;
        
    }

}