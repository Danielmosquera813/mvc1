<?php
  	@session_start();
	function redirect($ruta){
		echo"<script type='text/javascript'>
			window.location.href='$ruta';
			</script>";
	}// obtener ruta
	function getUrl($modulo,$controlador,$funcion,$parametros=false,$ajax=false){
        $pagina = $ajax ? "ajax.php":"index.php";
		$url="$pagina?modulo=$modulo&controlador=$controlador&funcion=$funcion";
		if ($parametros){
			foreach($parametros as $ind=>$valor){
				$url.="&$ind=$valor";
			}
		}
		return $url;
	}
	function resolve(){
		$modulo=$_GET['modulo'];
		$controlador=$_GET['controlador'];
		$funcion=$_GET['funcion'];
		if (is_dir("../controller/$modulo")){
			if(file_exists("../controller/$modulo/".$controlador."Controller.php")){
				include_once "../controller/$modulo/".$controlador."Controller.php";
				$nombreClase=$controlador."Controller";
				$objClase=new $nombreClase();
				if(method_exists($objClase,$funcion)){
					$objClase->$funcion();
				}else{
					echo "La funci&oacute;n especificada no existe";
				}
			}else{
				echo "El controlador especificado no existe";
			}
		}else{
			echo "El m&oacute;dulo especificado no existe";
		}
	}
	function dd($var){
		echo "<pre>";
		die(print_r($var));
	}
?>