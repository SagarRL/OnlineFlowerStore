<?php

include_once 'dbconnection.php';

class CartItem{
 
    
    private $conn;
   
 
  
    public $id;
    public $pid;
    public $quantity;
    public $u_id;
    public $created;
   
 
    
    public function __construct($db){
        $this->conn = $db;
		
    }
	
	public function exists()
	{
		$query="SELECT count(*) FROM cart WHERE pid=:pid AND u_id=:u_id";
		
		$stmt=$this->conn->prepare($query);
		
		 $this->pid=htmlspecialchars(strip_tags($this->pid));
    $this->u_id=htmlspecialchars(strip_tags($this->u_id));
 
   
    $stmt->bindParam(":pid", $this->pid);
    $stmt->bindParam(":u_id", $this->u_id);
 
    
    $stmt->execute();
 
   
    $rows = $stmt->fetch(PDO::FETCH_NUM);
 
  
    if($rows[0]>0){
        return true;
    }
 
    return false;
}
public function count()
{
	$query="SELECT count(*) FROM cart WHERE u_id=:u_id";
	
	$stmt=$this->conn->prepare($query);
	
	$this->u_id=htmlspecialchars(strip_tags($this->u_id));
	
	$stmt->bindParam(":u_id",$this->u_id);
	
	$stmt->execute();
	
	$rows=$stmt->fetch(PDO::FETCH_NUM);
	
	return $rows[0];
}

function create()
{
	$this->created=date('Y-m-d ');
	
	$query="INSERT INTO cart SET pid=:pid,quantity=:quantity,u_id=:u_id,created=:created";
	
	 $stmt = $this->conn->prepare($query);
 
    
    $this->pid=htmlspecialchars(strip_tags($this->pid));
    $this->quantity=htmlspecialchars(strip_tags($this->quantity));
    $this->u_id=htmlspecialchars(strip_tags($this->u_id));
 

    $stmt->bindParam(":pid", $this->pid);
    $stmt->bindParam(":quantity", $this->quantity);
    $stmt->bindParam(":u_id", $this->u_id);
    $stmt->bindParam(":created", $this->created);
 
 if($stmt->execute()){
	 return true;
 }
 return false;
 }
									
public function read()
{
	 
	$query="SELECT p.id,p.name,p.price,c.quantity, c.quantity * p.price AS subtotal FROM products p,cart c WHERE   p.id=c.pid ";
	
	$stmt =$this->conn->prepare($query);
	
	$this->u_id=htmlspecialchars(strip_tags($this->u_id));
	
	$stmt->bindParam(":u_id",$this->u_id,PDO::PARAM_INT);
	$stmt->execute();
	
	return $stmt;
 
}

function update(){
	
	$query="UPDATE cart SET quantity=:quantity WHERE pid=:pid AND u_id=:u_id";
	
	$stmt=$this->conn->prepare($query);
	
	 $this->quantity=htmlspecialchars(strip_tags($this->quantity));
    $this->pid=htmlspecialchars(strip_tags($this->pid));
    $this->u_id=htmlspecialchars(strip_tags($this->u_id));
 

    $stmt->bindParam(":quantity", $this->quantity);
    $stmt->bindParam(":pid", $this->pid);
    $stmt->bindParam(":u_id", $this->u_id);
 

    if($stmt->execute()){
        return true;
    }
 
    return false;
	}

public function delete(){
	
	$query="DELETE FROM cart WHERE pid=:pid AND u_id=:u_id";
	$stmt=$this->conn->prepare($query);
	$this->pid=htmlspecialchars(strip_tags($this->pid));
    $this->u_id=htmlspecialchars(strip_tags($this->u_id));
 
    
    $stmt->bindParam(":pid", $this->pid);
    $stmt->bindParam(":u_id", $this->u_id);
 
    if($stmt->execute()){
        return true;
    }
 
    return false;
}

public function deleteByUser(){
 
    $query = "DELETE FROM cart WHERE u_id=:u_id";
    $stmt = $this->conn->prepare($query);
 

    $this->u_id=htmlspecialchars(strip_tags($this->u_id));
 
  
    $stmt->bindParam(":u_id", $this->u_id);
 
    if($stmt->execute()){
        return true;
    }
 
    return false;
}
	
}
?>


