<?php

class Producto{
	private $nidproducto;
	private $snombre;
	private $ntotalusd;
	private $nano;
	private $querysel;
        private $queryadd;
	function __construct($nid=NULL,$snom=NULL,$ntot=NULL,$nano=NULL){
		$this->nidproducto=$nid;
		$this->snombre=$snom;
		$this->ntotalusd=$ntot;
		$this->nano=$nano;
		
	}
	
	function IdProducto(){
		return $this->nidproducto;
	}
	
	function Nombre(){
		return $this->snombre;
	}
	
	function TotalUSD(){
		return $this->ntotalusd;
	}
	function Ano(){
		return $this->nano;
	}
	
	
	function Selecciona(){
		
		if (!$this->querysel){
		$db=dbconnect();
		/*Definici�n del query que permitira ingresar un nuevo registro*/
		
			$sqlsel="select idproducto,nombre,totalusd,ano from productos order by nombre";
		
			/*Preparaci�n SQL*/
			$this->querysel=$db->prepare($sqlsel);
		
			$this->querysel->execute();
		}
		
		$registro = $this->querysel->fetch();
		if ($registro){
			return new self($registro['idproducto'], $registro['nombre'], $registro['totalusd'], $registro['ano']);			
		}
		else {
			return false;
			
		}
	}
	
	function Elimina($id){
	
		$db=dbconnect();
		
			/*Definici�n del query que permitira eliminar un registro*/
			$sqldel="delete from productos where idproducto=:id";
	
			/*Preparaci�n SQL*/
			$querydel=$db->prepare($sqldel);
			
			$querydel->bindParam(':id',$id);
			
			$valaux=$querydel->execute();
	
		return $valaux;
	}
		
        
        function Ingresa($nombre,$total,$ano){
	
		$db=dbconnect();
		
			/*Definici�n del query que permitira ingrar un registro*/
			$sqladd="INSERT INTO PRODUCTOS(NOMBRE,TOTALUSD,ANO) 
                               VALUES('Industria',24878,2012)";
	
			/*Preparaci�n SQL*/
			$queryadd=$db->prepare($sqladd);
			
			$queryadd->bindParam('',$nombre);
			$queryadd->bindParam('',$total);
                        $queryadd->bindParam('',$ano);
                        
                        
			$valaux=$queryadd->execute();
	
		return $valaux;
	}
}
?>