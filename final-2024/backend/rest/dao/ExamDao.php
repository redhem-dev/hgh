<?php

class ExamDao {

    private $conn;

    /**
     * constructor of dao class
     */
    public function __construct(){
        try {
          /** TODO
           * List parameters such as servername, username, password, schema. Make sure to use appropriate port
           */

           $servername = "db1.ibu.edu.ba";
          $username = "webfinal_24";
          $password = "web24finPWD";
          $schema = "webfinal";
          $port = 3306;


          /** TODO
           * Create new connection
           */

           $this->conn = new PDO(
            "mysql:host=" . $servername . ";dbname=" . $schema . ";port=" . $port, $username, $password
          );

          echo "Connected successfully";
        } catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
        }
    }

    /** TODO
     * Implement DAO method used to get customer information
     */
    public function get_customers(){
      $sql = "SELECT * FROM customers";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;

    }

    /** TODO
     * Implement DAO method used to get customer meals
     */
    public function get_customer_meals($customer_id) {

      
      
      $sql = "SELECT * FROM meals WHERE customer_id = :$customer_id";
      $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;
      
    }

    /** TODO
     * Implement DAO method used to save customer data
     */
    public function add_customer($data){

      $sql = "INSERT INTO customers (first_name, last_name, birth_date)
      VALUES(:first_name, :last_name, :birth_date)";

      $stmt = $this->conn->prepare($sql);
      $stmt->execute($data);
      $customer['id'] = $this->conn->lastInsertId();

      return $customer;



      // return $this->insert("customers", $customer);
      

    }

    /** TODO
     * Implement DAO method used to get foods report
     */
    public function get_foods_report(){


      //nisam uspio uraditi kveri
      $sql = "SELECT * FROM foods;";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;

    }

  
}
?>
