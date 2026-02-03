<?php
class CategorieModel{
    public $enlace;
    public function __construct() {
        
        $this->enlace=new MySqlConnect();
       
    }
    public function all(){
        try {
            //Consulta sql
			$vSql = "SELECT * FROM Categorie;";
			
            //Ejecutar la consulta
			$vResultado = $this->enlace->ExecuteSQL ( $vSql);
				
			// Retornar el objeto
			return $vResultado;
		} catch ( Exception $e ) {
			die ( $e->getMessage () );
		}
    }

    public function get($id){
        try {
            //Consulta sql
			$vSql = "SELECT * FROM Categorie where idCategorie=$id";
			
            //Ejecutar la consulta
			$vResultado = $this->enlace->ExecuteSQL ( $vSql);
			// Retornar el objeto
			return $vResultado[0];
		} catch ( Exception $e ) {
			die ( $e->getMessage () );
		}
    }
    public function getCategorieItem($idItem){
        try {
            //Consulta sql
			$vSql = "SELECT c.idCategorie,c.name
            FROM categorie c,item_categorie ic 
            where ic.idCategorie=c.idCategorie and ic.idItem=$idItem";
			
            //Ejecutar la consulta
			$vResultado = $this->enlace->ExecuteSQL ( $vSql);
			// Retornar el objeto
			return $vResultado;
		} catch ( Exception $e ) {
			die ( $e->getMessage () );
		}
    }
	public function getItembyCategorie($param){
        try {
			$vResultado =null;
			if(!empty($param )){
				$vSql="SELECT i.idItem, i.name, i.description, i.status, i.condition, i.idUser, i.CreateDate
				FROM Item_Categorie ic, item i
				where ic.idItem=i.idItem and ic.idCategorie=$param";
				$vResultado = $this->enlace->ExecuteSQL ( $vSql);
			}
			// Retornar el objeto
			return $vResultado;
		} catch ( Exception $e ) {
			die ( $e->getMessage () );
		}
    }
	public function create($objeto) {
        try {
            //Consulta sql
            //Identificador autoincrementable
            
			$vSql = "Insert into categorie (name) Values ('$objeto->name')";
			
            //Ejecutar la consulta
			$vResultado = $this->enlace->executeSQL_DML_last( $vSql);
			// Retornar el objeto creado
            return $this->get($vResultado);
		} catch (Exception $e) {
            handleException($e);
        }
    }
    public function update($objeto) {
        try {
            //Consulta sql
			$vSql = "Update genre SET name ='$objeto->name' Where idCategorie=$objeto->idCategorie";
			
            //Ejecutar la consulta
			$vResultado = $this->enlace->executeSQL_DML( $vSql);
			// Retornar el objeto actualizado
            return $this->get($objeto->id);
		} catch (Exception $e) {
            handleException($e);
        }
    }
}