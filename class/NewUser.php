<?php
 class NewUser{

    private $id;

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

    public function getId(){
        return $this->id;
    }

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

    public function setId(Int $id){
        $this->id = $id;
        
    }
    
    public function setPseudo(String $pseudo){
        $this->pseudo = $pseudo;
        
    }

    public function setPassword(String $password){
        $this->password = $password;
        
    }

    public function setMail(String $mail){
        $this->mail = $mail;
        
    }

    public function setBirthdate(String $birthdate){
        $this->birthdate = $birthdate;
        
    }


}