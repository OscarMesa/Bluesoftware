<?php

	/**
	* 
	*/
	class Modelo
	{
		protected $servidor;
		protected $basedatos;
		protected $usuario;
		protected $password;

		protected $type_fech;
		function __construct()
		{
			$this->servidor="localhost";
			$this->basedatos="capa1";
			$this->usuario="root";
			$this->password="";
			$this->type_fech = MYSQL_ASSOC;
			$this->conectar();			
		}

		public function conectar()
		{
			$this->conectBD =mysql_connect ($this->servidor,$this->usuario,$this->password) or trigger_error ( mysql_error(), E_USER_error);
			mysql_select_db($this->basedatos, $this->conectBD);
		}

		public function getConexion()
		{
			return $this->conectBD;
		}

		/**
		*
		*/
		public function consultar($query){
	    	$resultado = mysql_query($query, $this->conectBD) or die (mysql_error());
	    	$data = array();	
	    	while($arreglo=mysql_fetch_array($resultado, $this->type_fech))
	    	{
	    		$data[] = $arreglo;
	    	}	
	    	return $data;
		}

		public function cerrarConexion()
		{
			mysql_close($this->conectBD);
		}

		public static function model($className)
		{
			try{
				$reflection = new ReflectionClass($className);
				return $reflection->newInstance();
			}catch(Exception $e){
				throw new Exception($e);
			}
		}
	}

