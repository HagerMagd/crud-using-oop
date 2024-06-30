<?php
class database 
{
private $servername='localhost';
private $username='root';
private $password='';
private $dbname='company';
private $conn;

private function connect_error(){
    return die("error : ".mysqli_error($this->conn));
}
public function __construct(){
    $this->conn = mysqli_connect($this->servername,$this->username,$this->
    password,$this->dbname);
    if(!$this->conn){
       die("error connact : ".mysqli_connect_error());
    }
}

//insert data 
public function insert($sql){
    if(mysqli_query($this->conn,$sql)){
        return"added success";
    }else{
       $this-> connect_error();
    }
}
// function for hashing password
public function hashing_password($password){
    return sha1($password);
}

// read data
public function read($tabel){
    $sql="SELECT * FROM $tabel" ;
    $result=mysqli_query($this->conn,$sql);
    $data=[];
    if($result){
        if(mysqli_num_rows($result)){
            while($row=mysqli_fetch_assoc($result)){
                $data[]=$row;
            }
            return $data; 
        }
    }else{
        $this-> connect_error();
    }
}
//find record in database 
public function find($tabel,$id){
    $sql="SELECT * FROM `$tabel` WHERE `id`='$id'" ;
    $result=mysqli_query($this->conn,$sql);
  
    if($result){
        if(mysqli_num_rows($result)){
            return mysqli_fetch_assoc($result);
            
        }else{
            return false;
        }
    }else{
        $this-> connect_error();
    }
}
//update data 

public function update($sql){
    if(mysqli_query($this->conn,$sql)){
        return"update success";
    }else{
        $this-> connect_error();
    }
}
//delete data
 public function delete($tabel,$id){
    $sql="DELETE FROM `$tabel` WHERE `id`='$id' ";
    if(mysqli_query($this->conn,$sql)){
        echo"delete success";
    }else{
        $this-> connect_error();
    }
 }



}

