<?php
abstract class NewUser{
    private $pseudo;

    private $password;

    private $mail;

    private $birthdate;


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

    public function getPseudo(){
        return $this->pseudo;
    }
    
    public function getPassword(){
        return $this->password;
    }
    
    public function getMail(){
        return $this->mail;
    }
    
    public function getBirthdate(){
        return $this->birthdate;
    }

    //SETTERS

    
    public function setPseudo(String $pseudo){
        $this->pseudo = $pseudo;
        
    }

    public function setTitle(String $password){
        $this->password = $password;
        
    }

    public function setExtract(String $mail){
        $this->mail = $mail;
        
    }

    public function setThumbnail(String $birthdate){
        $this->birthdate = $birthdate;
        
    }


}