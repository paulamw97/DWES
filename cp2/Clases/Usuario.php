<?php

 class Usuario {

   private $id;
   private $usuario;
   private $nombre;
   private $apellidos;
   private $email;
   private $rol;
   private $pass;

   public function getId(){
     return $this->id;
   }

   public function setId($id){
     $this->id = $id;
   }

   public function getUsuario(){
     return $this->usuario;
   }

   public function setUsuario($usuario){
     $this->usuario = $usuario;
   }

   public function getNombre(){
     return $this->nombre;
   }

   public function setNombre($nombre){
     $this->nombre = $nombre;
   }

   public function getApellidos(){
     return $this->apellidos;
   }

   public function setApellidos($apellidos){
     $this->apellidos = $apellidos;
   }

   public function getEmail(){
     return $this->email;
   }

   public function setEmail($email){
     $this->email = $email;
   }

   public function getRol(){
     return $this->rol;
   }

   public function setRol($rol){
     $this->rol = $rol;
   }

   public function getPassword(){
     return $this->pass;
   }

   public function setPassword($pass){
     $this->pass = $pass;
   }
 }
?>
