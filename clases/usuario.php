<?php
class Usuario{
    protected $name;
    protected $lastname;
    protected $email;
    protected $password;
    protected $avatar;
    protected $type;
    protected $nroDoc;
    protected $phone;
    protected $address;
    protected $role_id;
   

    public function __construct($name, $lastname, $email, $password, $avatar, $type, $nroDoc, $phone, $address){
      
        $this->name = $name;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        /*$this->avatar = $avatar;*/
        $this->type = $type;
        $this->nroDoc = $nroDoc;
        $this->phone= $phone;
        $this->address = $address;
       /* $this->role_id = $role_id;*/
    }

    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }

    public function getLastname(){
        return $this->lastname;
    }
    public function setLastname($lastname){
        $this->lastname = $lastname;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getAvatar(){
        return $this->avatar;
    }

    public function setAvatar($avatar){
        $this->avatar = $avatar;
    }
    public function getType(){
        return $this->type;
    }

    public function setType($type){
        $this->type = $type;
    }

    public function getNroDoc(){
        return $this->nroDoc;
    }

    public function setNroDoc($nroDoc){
        $this->nroDoc = $nroDoc;
    }

    public function getPhone(){
        return $this->phone;
    }

    public function setPhone($nroDoc){
        $this->phone = $phone;
    }

    public function getAddress(){
        return $this->address;
    }

    public function setAddress($address){
        $this->address = $address;
    }

    public function getRole_id(){
        return $this->role_id;
    }

    public function setRole_id($role_id){
        $this->role_id = $role_id;
    }


}