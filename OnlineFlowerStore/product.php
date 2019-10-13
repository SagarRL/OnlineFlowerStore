<?php
include_once 'dbconnection.php';
class Product {
	private $conn;
	
	
	public $id;
	public $name;
	public $description;
	public $price;
	
	public function __construct($db)
	{
		$this->conn=$db;
	}
	


function read($from_record_num,$records_per_page){
	
	$query="SELECT * FROM products order by id ASC LIMIT ?,?";
	 
	$stmt =$this->conn->prepare($query);
	
	$stmt->bindParam(1,$from_record_num,PDO::PARAM_INT);
	$stmt->bindParam(2,$records_per_page,PDO::PARAM_INT);
	
	$stmt->execute();
	return $stmt;
}
public function count() {
	
	$query ="SELECT count(*) FROM products";
	$stmt=$this->conn->prepare($query);
	$stmt->execute();
	$rows=$stmt->fetch(PDO::FETCH_NUM);
	
	return $rows[0];
	
}
 
 public function readByIds($ids){
	 $ids_arr=str_repeat('?,',count($ids)-1).'?';
	 
	 $query = "SELECT id,name,price FROM products WHERE id IN ({$ids_arr}) ORDER BY name";
	 
	 $stmt=$this->conn->prepare($query);
	 
	 $stmt->execute($ids);
	 
	 return $stmt;
	 
 }

 function readOne()
 {
	 $query="SELECT name,description,price FROM products WHERE id=? LIMIT 0,1";
	  $stmt=$this->conn->prepare($query);
	$this->id=htmlspecialchars(strip_tags($this->id));
	$stmt->bindParam(1,$this->id);
	
	$stmt->execute();
	
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	
	$this->name=$row['name'];
	$this->description=$row['description'];
	$this->price=$row['price'];
	
 }
 }

?>
