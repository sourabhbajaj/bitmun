<?php 
/*
error_reporting(E_ALL);
date_default_timezone_set('Asia/Calcutta');
function customError($errno, $errstr, $errfile,$errline,$errcontext)
  {
  	echo "<red>".$errno."<br/>".$errstr."<br/>File : ".$errfile."<br/>Line : ".$errline."<br/>Context : ".$errcontext."</red>";
  }
set_error_handler("customError");
*/
define("DATABASE", "bitmun");
//define("DATABASE", "blinkpot");
define("HOST", "localhost");
define("USERNAME", "sourabh");
//define("USERNAME", "blinkpot");
define("PASSWORD","Bd@221993");
//define("PASSWORD","Bd@221993");

class DATABASE {
	public $sql;
	private $qry;
	public function __construct() {
		$this->sql=new mysqli(HOST,USERNAME,PASSWORD,DATABASE);
		if ($this->sql->connect_errno) {
    		echo "Connect failed: %s\n".$this->sql->connect_error;
    		exit();
		}
		$this->sql->autocommit(true);
	}
	
	public function __destruct(){
//		$this->sql->close();
	}
	
	public function error(){
		return $this->sql->error."\n".$this->qry;
	}
	
	public function insert($data,$table){
		$keys=array();
		$values=array();
		foreach ($data as $key => $value) {
			array_push($keys, $key);
			if(!is_numeric($value))  {
				$value=$this->sql->real_escape_string($value);
				array_push($values, "'$value'");
			}
			else array_push($values, $value);
		}
		$query="insert into $table (".join(", ", $keys).") values(".join(", ", $values).")";
		$this->qry=$query;
		return $this->sql->query($query);
	}
	
	public function findAll($table,$data=array(),$columns="*"){
		if(is_array($columns)){
			$columns=join(", ", $columns);
		}
		if(isset($data["where"])&&is_array($data["where"])){
			$w=array();
			foreach ($data["where"] as $key => $value) {
				$value=$this->sql->real_escape_string($value);
				if(!is_numeric($value)) array_push($w,"$key='$value'");
				else array_push($w,"$key=$value");
			}
		}
		
		if(isset($data["orderby"])&&is_array($data["orderby"])){
			$orderby=join(", ", $data["orderby"]);
		}
		
		$query="select $columns from $table ".(isset($w)?(" where ".join(" and ", $w)):"").(isset($orderby)?(" order by $orderby ".(isset($data["direction"])?$data["direction"]:"")):"").(isset($data["limit"])?(" limit ".$data["limit"]):"");
		$this->qry=$query;
		$result=$this->sql->query($query);
		if($result->num_rows<1){
			return false;
		}
		else {
			$res=array();
			while ($row=$result->fetch_assoc())
			{
				$res[]=$row;
			}
			return $res;
		}
	}
	
	public function find($table,$data=array(),$columns="*"){
		if(is_array($columns)){
			$columns=join(", ", $columns);
		}
		if(isset($data["where"])&&is_array($data["where"])){
			$w=array();
			foreach ($data["where"] as $key => $value) {
				$value=$this->sql->real_escape_string($value);
				if(!is_numeric($value)) array_push($w,"$key='$value'");
				else array_push($w,"$key=$value");
			}
		}
		
		if(isset($data["orderby"])&&is_array($data["orderby"])){
			$orderby=join(", ", $data["orderby"]);
		}
		
		$query="select $columns from $table ".(isset($w)?(" where ".join(" and ", $w)):"").(isset($orderby)?(" order by $orderby ".(isset($data["direction"])?$data["direction"]:"")):"")." limit 1";
		$this->qry=$query;
		$result=$this->sql->query($query);
		if($result->num_rows<1){
			return false;
		}
		else {
			return $result->fetch_assoc();
		}
	}
	
	public function update($table,$set,$where){
		if(isset($set)&&is_array($set)){
			$s=array();
			foreach ($set as $key => $value) {
				if(!((is_numeric($value))||(is_null($value)))) array_push($s, "$key='".$this->sql->real_escape_string($value)."'");
				elseif (is_null($value)) array_push($s, "$key=NULL");
				else array_push($s, "$key=".$this->sql->real_escape_string($value));
			}
		}
		else {
			return false;
		}
		if(isset($where)&&is_array($where)){
			$w=array();
			foreach ($where as $key => $value) {
				if(!((is_numeric($value))||(is_null($value)))) array_push($w, "$key='".$this->sql->real_escape_string($value)."'");
				elseif (is_null($value)) array_push($w, "$key=NULL");
				else array_push($w, "$key='".$this->sql->real_escape_string($value)."'");
			}
		}
		$query="UPDATE $table set ".join(", ", $s).(isset($w)?(" where ".join(" and ", $w)):"");
//		echo $query;
		$this->qry=$query;
		return $this->sql->query($query);
	}
	
	public function query($query){
		$this->qry=$query;
		return $this->sql->query($query);
	}
	
	public function fetchAssoc($o)
	{
		if($o)	return $o->fetch_assoc();
		else return null;
	}
	
	public function fetchAll($o)
	{
		$ar=array();
		while ($row=$o->fetch_assoc()) {
			$ar[]=$row;
		}
		return (sizeof($ar)<1)?false:$ar;
	}
	
	public function escape($str) {
		$str=$this->sql->real_escape_string($str);
		return $str;
	}
	
	public function insertid(){
		return $this->sql->insert_id;
	}
	
	public function multiInsert($data,$table){
		
	}
}
?>