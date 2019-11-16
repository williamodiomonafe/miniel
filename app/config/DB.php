<?php
  require_once 'app.php';


/**
 * Class DB
 *
 * @author William Odiomonafe
 * @url williamodiomonafe.github.io
 * @organisation Everyone
 * @contributors You & I
 */

  class DB
  {
    
    protected $db_type = DB_TYPE;
    protected $db_host = DB_HOST;
    protected $db_username = DB_USERNAME;
    protected $db_password = DB_PASSWORD;
    protected $db_name = DB_DATABASE;

    protected static $table;
    protected static $update;
    protected static $select;
    protected static $query;
    protected static $query_values = [];

      /**
       * DB constructor.
       */
    public function __construct()
    {
      try {
        if($this->db_type == "mysql") {
          $db = new PDO("mysql:host=$this->db_host;dbname=$this->db_name", $this->db_username, $this->db_password);
          
          $this->connection = $db;
        } elseif($this->db_type == "mongodb") {
          $name = $this->db_name;
          $db = (new MongoDB\Client)->$name;

          $this->connection = $db;
        }

        return $this->connection;
      } catch(PDOException $e) {
        die($e->getMessage());
      }
    }


      /**
       * @param string $name
       * @return DB
       */
    public static function table($name = "") {
      $DB = new self;
      
      if($DB->db_type == "mongodb") {
        return $DB::$table = ($DB->connection)->$name;
      }
      
      if($DB->db_type == "mysql") {
       $DB::$table = $name;
      }

      return $DB;
    }

      /**
       * INSERT A RECORD MYSQL WAY
       * @param array $values
       * @return mixed
       */

    public static function insert(array $values) {
      $DB = new self;
      
        try {
          $query = "INSERT INTO " . $DB::$table . " (";
          $query .= implode(", ", array_keys($values));
          $query .= ") VALUES (";
          $query .= ":" . implode(", :", array_keys($values));
          $query .= ")";

          $do_insert = $DB->connection->prepare($query);
          if($do_insert->execute($values)) {
            return $do_insert->rowCount();
          }
        } catch(PDOException $e) {
          echo $e->getMessge();
          exit;
        }
    }

      /**
       * Finds a database record
       * @param array $values
       * @return |null
       */
    public static function find(array $values) {
      $DB = new self;
      
        try {
          $query = "SELECT * FROM " . $DB::$table . " WHERE ";
          foreach($values AS $key => $val) {
            $query .= $key . " = :" . $key . " AND ";
          }
          $query = rtrim($query, " AND ");
          
          $do_insert = $DB->connection->prepare($query);
          $do_insert->execute($values); 
          
          if($do_insert->rowCount() < 1) {
            return NULL;
          } elseif($do_insert->rowCount() == 1) {
            return $do_insert->fetch(PDO::FETCH_OBJ);
          } else {
            return $do_insert->fetchAll(PDO::FETCH_OBJ);
          }
        } catch(PDOException $e) {
          echo $e->getMessge();
          exit;
        }
    }


      /**
       * Runs an SQL query
       * @param $statement
       * @param array|NULL $values
       * @return |null
       */
    public static function query($statement, array $values = NULL) {
      $DB = new self;
      
      try {
        $do_query = $DB->connection->prepare($statement);
        $do_query->execute($values); 
        
       return $do_query->rowCount() ?  $do_query->rowCount() :  NULL;

      } catch(PDOException $e) {
        echo $e->getMessge();
        exit;
      }
    }


      /**
       * Updates a database record
       * @param array $values
       * @return DB
       */
    public static function update(array $values) {
      $DB = new self;
        try {
          $DB::$update = "UPDATE " . $DB::$table . " SET ";
          foreach($values AS $key => $val) {
            $DB::$update .= $key . " = :" . $key . ", ";
          }
          $DB::$update = rtrim($DB::$update, ", ");
          $DB::$query_values = array_merge($DB::$query_values, $values);

          $DB::$query = $DB::$update;
          return $DB;
        } catch(PDOException $e) {
          echo $e->getMessge();
          exit;
        }
    }


      /**
       * Selects a record from database
       * @param array|NULL $columns
       * @return DB
       */
    public static function select(array $columns = NULL) {
      // INCOMPLETE METHOD
      $DB = new self;
      
        try {
          $DB::$select = "SELECT ";
          if($columns == NULL) {
            $DB::$select .= " * FROM "; 
          } else {
            foreach($columns AS $column) {
              $DB::$select .= $column . ', ';
            }
            $DB::$select = rtrim($DB::$select, ', ');
            $DB::$select .= ' FROM ';
          }
          $DB::$select .= $DB::$table;
          $DB::$query = $DB::$select;

          return $DB;
        } catch(PDOException $e) {
          echo $e->getMessge();
          exit;
        }
    }
    
    
    /**
     * @author William Odiomonafe
     * @param array $values
     * @return object Database Class
     * HOW TO USE:    Call
     *                DB::table($tablename)
     *                    ->select($columns)
     *                    ->where($array)           // METHOD USED
     *                    ->execute()
     */
    public static function where(array $values) {
      $DB = new self;
      
        try {
          $DB::$query .= !strstr($DB::$query, ' WHERE ') ? " WHERE (" : " AND ";
          
          foreach($values AS $key => $val) {
            $DB::$query .= $key . " = :" . $key . " AND ";
          }
          $DB::$query = rtrim($DB::$query, " AND ");
          $DB::$query .= ') ';
          $DB::$query_values = array_merge($DB::$query_values, $values);

          return $DB;
          // dd($DB::$query);
        } catch(PDOException $e) {
          echo $e->getMessge();
          exit;
        }
    }
    

    
    /**
     * @author William Odiomonafe
     * @param array $values
     * @return object Database Class
     * 
     * Can only be used after the where() method in order to 
     * add the OR constraints.
     * 
     * HOW TO USE:    Call
     *                DB::table($tablename)
     *                    ->select($columns)
     *                    ->where($array)           
     *                    ->orWhere($array)           // METHOD USED
     *                    ->execute()
     */
    public static function orWhere(array $values) {
      // INCOMPLETE METHOD
      $DB = new self;
      
        try {
          $DB::$query .= !strstr($DB::$query, ' WHERE ') ? " WHERE (" : " OR ";

          foreach($values AS $key => $val) {
            $DB::$query .= $key . " = :" . $key . " OR ";
          }
          $DB::$query = rtrim($DB::$query, " OR ");
          $DB::$query .= !strstr($DB::$query, ' WHERE ') ? " )" : "";
          $DB::$query_values = array_merge($DB::$query_values, $values);

          // dd($DB::$query);
          return $DB;
        } catch(PDOException $e) {
          echo $e->getMessge();
          exit;
        }
    }
    

    
    /**
     * @author William Odiomonafe
     * @return object Database Class
     * 
     * Used to perform/execute database query
     * 
     * HOW TO USE:    Call
     *                DB::table($tablename)
     *                    ->select($columns)
     *                    ->where($array)           
     *                    ->orWhere($array)           
     *                    ->execute()             // METHOD USED
     */
    public function execute() {
      $DB = new self;

      // dd($DB::$query);

      $run_query = $DB->connection->prepare($DB::$query);

      $run_query->execute($DB::$query_values); 
      
      if($run_query->rowCount() < 1) {
        return NULL;
      } elseif($run_query->rowCount() == 1) {
        if(strstr($DB::$query, "SELECT ")) {
          return $run_query->fetchAll(PDO::FETCH_OBJ);
        } else {
          return true;
        }
      } else {
        if(strstr($DB::$query, "SELECT ")) {
          return $run_query->fetchAll(PDO::FETCH_OBJ);
        } else {
          return true;
        }
      }
    }

  };

  






  /**
   * HOW TO DO BASIC SQL COMMANDS E.G select, update, delete, insert
   * 
   * INSERT
   * 
   * string $tablename = 'users'
   * array $data = array(['name' => 'John Doe']);
   * 
   * DB::table($tablename)->insert(array $data);
   * 
   * ----------------------------------
   * 
   * SELECT (Without Clauses)
   * 
   * string $tablename = 'users'
   * array $columns = array(['name']);
   * 
   * DB::table($tablename)->select($columns);
   * 
   * ----------------------------------
   * 
   * SELECT (With Clauses (WHERE... AND... & WHERE... OR...))
   * 
   * string $tablename = 'users'
   * array $columns = array(['name']);
   * array $andClause = array(['column' => 'value']);
   * array $orClause = array(['column' => 'value']);
   * 
   * @translate "SELECT 'columns' FROM $tablename WHERE id=1 OR name='John'"
   * 
   * DB::table($tablename)->select($columns)->where($andClause)->orWhere($orClause)->execute();
   * 
   * 
   */