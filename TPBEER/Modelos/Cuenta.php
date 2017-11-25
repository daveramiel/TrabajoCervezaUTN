<?php namespace Modelos;


	class Cuenta{
		
		private $email;
		private $id;
		private $password;
		private $tipoCuenta;// aca va un cliente o un escalvo entero


		function __construct($ema,$pass,$tipoCuenta)
		{		
			$this->setPassword($pass);
			$this->setEmail($ema);
			$this->setTipoCuenta($tipoCuenta);
		}

    public function getPassword(){
        return $this->password;
    }

    public function getTipoCuenta(){
    	return $this->tipoCuenta;
    }

    public function getid(){
    	return $this->id;
    }

    public function setid($id){
    	$this->id=$id;
    }

    public function setTipoCuenta($tipito){
    	$this->tipoCuenta=$tipito;
    }

    public function setPassword($password){
        $this->password = $password;

        return $this;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;

        return $this;
    }
}