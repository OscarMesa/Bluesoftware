<?php

include_once dirname(__FILE__).'/../funciones/funciones_generales.php';
include_once dirname(__FILE__).'/Modelo.php';
/**
* 
*/
class Contactos extends Modelo
{
	
	function __construct()
	{
		parent::__construct();
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}