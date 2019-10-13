<?php
include_once 'dbconnection.php';
class ProductImage {
	private $conn;
	
 
   
    public $id;
    public $pid;
    public $name;
   
 
    
    public function __construct($db){
        $this->conn = $db;
    }
	
	function readFirst(){
		$query=" SELECT id,pid,name FROM p_images where pid=? ORDER BY name DESC LIMIT 0,1";
		
		$stmt=$this->conn->prepare($query);
	
$this->id=htmlspecialchars(strip_tags($this->id));

$stmt->bindParam(1,$this->pid);

$stmt->execute();

return $stmt;

	}
	function readByProductId()
	{
		$query="SELECT id,pid,name FROM p_images WHERE pid=? ORDER BY name ASC";
		$stmt=$this->conn->prepare($query);
		$this->pid=htmlspecialchars(strip_tags($this->pid));
		  $stmt->bindParam(1, $this->pid);
		  
		  $stmt->execute();
		  return $stmt;
	}
	
	
}
?>