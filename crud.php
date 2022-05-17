<?php  
class Crud  {  
    //crud class  
    public $connect;  
    private $host = "localhost";  
    private $username = 'root';  
    private $password = '';  
    private $database = 'crud';  
    function __construct()  {  
        $this->database_connect();  
    }  
    
    
    public function database_connect(){
        try {
            $this->connect = new PDO("mysql:host=".$this->host.";  dbname=".$this->database, $this->username, $this->password);
            // set the PDO error mode to exception
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    
    public function execute_query($query)  {
        try{
            return $this->connect->query($query);
        } catch (PDOException $e){
            echo  "Query failed: " .$e->getMessage();
        }  
    }

    public function put_data_in_table($firstname,$lastname,$email){
        $stmt = $this->connect->prepare("INSERT INTO users (first_name, last_name, email) VALUES (:first_name, :last_name, :email)");
        $stmt->bindParam('first_name', $firstname);
        $stmt->bindParam('last_name', $lastname);
        $stmt->bindParam('email', $email);
        $stmt->execute();
        echo "New records created successfully";
    }

    public function delete_data_by_id($id){
        $query = "DELETE FROM users WHERE id=$id";
        $this->execute_query($query);
    }

    public function get_data_in_table()  { 
        $output = '';  
        $result = $this->execute_query("SELECT * FROM users ORDER BY id DESC");  
        $output .= '  
        <table class="table table-bordered table-striped">  
            <tr>  
                    <th width="10%">email</th>  
                    <th width="20%">First Name</th>  
                    <th width="20%">Last Name</th>  
                    <th width="1%">Delete</th>  
            </tr>  
        ';  

        while($row = $result->fetch(PDO::FETCH_OBJ)) {
            $output .= '  
            <tr> 
            
                <td>'.$row->email.'</td>       
                <td>'.$row->first_name.'</td>  
                <td>'.$row->last_name.'</td>
                <td><button type="button" name="delete"  id="'.$row->id.'"  class="btn btn-danger btn-xs delete">Delete</button></td>
                
            </tr>  
            ';
        }  
        $output .= '</table>';  
        return $output;  
    }       
}  
?>  