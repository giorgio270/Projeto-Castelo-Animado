<?php 

class db {
    
    private $conn;

    public function db($host, $user, $pass, $data) {
		
        $connectInfo = array(
            "Database"  => $data,
            "UID"       => $user,
            "PWD"       => $pass
        );
        
		$conn = sqlsrv_connect($host, $connectInfo);

		if( $conn ) {
			$this->conn = $conn;
			$this->query = false;
		}else{
			 die( print_r( sqlsrv_errors(), true));
			 //exit;
		}
        
    }
    
    public function query($sql) {
		
        $query = sqlsrv_query($this->conn, $sql);
        
        if($query){
            $this->query = $query;
            return true;
        }else{
            return false;
        }    
    }
    
    public function fetch_array() {
        $return = NULL;
		if($this->query != false){    
            while( $row = sqlsrv_fetch_array($this->query, SQLSRV_FETCH_ASSOC) ) {
                  $return[] = $row;
            }        
            return $return;
        }else{
            return false;
        }
    }
   
    public function num_rows() {
        $row_count = sqlsrv_num_rows( $this->query );
   
        if ($row_count === false)
           return false;
        else
           return $row_count;
           
    }

}

?>