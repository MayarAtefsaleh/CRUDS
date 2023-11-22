<?php





class Database{

    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $dbName = "softcompany";
    private $conn;


    // constructor is a magic method , here iam checking the connection of data base

    public function __construct(){
        
        $this->conn=mysqli_connect($this->server,$this->username,$this->password,$this->dbName);

        if(!$this->conn){
            die("Error Connection". mysqli_connect_error());
        }
    }



    // insert new record in data base

    public function insert($sql){
        if(mysqli_query($this->conn,$sql)){
            return "Records added successfully";
        }
        else {
            die("Error ". mysqli_error($this->conn));
        }
    }



 

    // read data from the database

    public function readData($table){
        $sql="SELECT * FROM $table";
        $results=mysqli_query($this->conn,$sql);
        $data=[];

        if($results){
            if(mysqli_num_rows($results)){
                
                while($row= mysqli_fetch_assoc($results)){
                    $data[]=$row;
                }
            }

            return $data;
        }
        else {
             die("Error".mysqli_error($this->conn));
        }
    }



    //find record data in data base


   

    public function findrecord($table,$id){
        $sql="SELECT * FROM $table WHERE `id`='$id'";
        $results=mysqli_query($this->conn,$sql);


        if($results)
        {
           
                
                if(mysqli_num_rows($results))
                {
                   
              return mysqli_fetch_assoc($results);
            
            }
             return false;
        }
        else {
             die("Error".mysqli_error($this->conn));
        }
    }


       //update data 


        public function updateData($sql){
        if(mysqli_query($this->conn,$sql)){
            return "Records Updated successfully";
        }
        else {
            die("Error ". mysqli_error($this->conn));
        }
    }


    //delete record 


    public function deleteData($table,$id)
    {
        $sql ="DELETE FROM $table WHERE `id`='$id'";
        if(mysqli_query($this->conn,$sql)){
            return "Records Deleted successfully";
        }else {
            die("Error ". mysqli_error($this->conn));
        }
    }


    //search employee 

    public function searchEmployees($query) {
    $query = mysqli_real_escape_string($this->conn, $query);
    $sql = "SELECT * FROM employees WHERE name LIKE '%$query%' OR email LIKE '%$query%' OR department LIKE '%$query%'";
    $results = mysqli_query($this->conn, $sql);
    $data = [];

    if ($results) {
        while ($row = mysqli_fetch_assoc($results)) {
            $data[] = $row;
        }
    } else {
        die("Error" . mysqli_error($this->conn));
    }

    return $data;
}

    
    // encryption the password for more secure


    public function encPassword($password){
        
        return sha1($password);
    }
}