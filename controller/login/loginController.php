<?php
	include_once '../model/login/LoginModel.php';
	class LoginController{
		private $objModel;
		function __construct(){
			$this->objModel = new LoginModel();
		}
		function ingresar(){
			extract($_POST);
            if (!isset($email)) {
                redirect("login.php");
            }
            if (!isset($password)) {
                redirect("login.php");
            }
			//Generar el SQL de consulta del usuario
			$usuario=$this->objModel->consultar("u.*, r.rol_descripcion", "usuario u, rol r", "u.rol_id=r.rol_id and u.usu_correo='$email' and u.usu_clave='$password'");

			foreach($usuario as $usu){
				$_SESSION['usuario']=$usu['usu_nombre'];
				$_SESSION['apellido']=$usu['usu_apellido'];
				$_SESSION['acceso']="Autorizado";
				$_SESSION['rol']=$usu['rol_id'];
				$_SESSION['rol_descripcion']=$usu['rol_descripcion'];
			}
			if(isset($_SESSION['usuario'])){
				redirect("index.php");
			}
			redirect("login.php");
		}
		public function logout(){
			unset($SESSION);
			session_destroy();
			redirect("login.php");
		}
	}
?>