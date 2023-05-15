<?php
abstract class Recipe{
    private $id_recipe;

    private $FK_id_user;

    private $name_recipe;

    private $slug_recipe;

    private $difficulty_recipe;

    private $preparation_time_recipe;

    private $step_recipe;

    private $picture_recipe;


     //fonction d'hydratation


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



    //GETTERS

    public function getIdRecipe(){
        return $this->id_recipe;
    }
    
    public function getFKIdUser(){
        return $this->FK_id_user;
    }
    
    public function getNameRecipe(){
        return $this->name_recipe;
    }
    
    public function getSlugRecipe(){
        return $this->slug_recipe;
    }

    public function getDifficultyRecipe(){
        return $this->difficulty_recipe;
    }

    public function getPreparationTimeRecipe(){
        return $this->preparation_time_recipe;
    }

    public function getStepRecipe(){
        return $this->step_recipe;
    }

    public function getPictureRecipe(){
        return $this->picture_recipe;
    }

    //SETTERS

    
    public function setIdRecipe(Int $id_recipe){
        $this->id_recipe = $id_recipe;
        
    }

    public function setFKIdUser(Int $FK_id_user){
        $this->FK_id_user = $FK_id_user;
        
    }

    public function setNameRecipe(String $name_recipe){
        $this->name_recipe = $name_recipe;
        
    }

    public function setSlugRecipe(String $slug_recipe){
        $this->slug_recipe = $slug_recipe;
        
    }

    public function setDifficultyRecipe(String $difficulty_recipe){
        $this->difficulty_recipe = $difficulty_recipe;
        
    }

    public function setPreparationTimeRecipe(String $preparation_time_recipe){
        $this->preparation_time_recipe = $preparation_time_recipe;
        
    }

    public function setStepRecipe(String $step_recipe){
        $this->step_recipe = $step_recipe;
        
    }

    public function setPictureRecipe(String $picture_recipe){
        $this->picture_recipe = $picture_recipe;
        
    }


}