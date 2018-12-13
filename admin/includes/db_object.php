<?php 

	/**
	 * summary
	 */
	class Db_object {
	    /**
	     * summary
	     */
	    protected static $db_table = "users";

	    public function __construct()
	    {

	    }

	    public static function find_all(){

	    	return static::find_by_query("SELECT * FROM ". static::$db_table ." ");
	    }

	    public static function find_by_id($id){

	    	global $database;
	    	$the_result_array = static::find_by_query("select * from ". static::$db_table ." where id= $id");
				// $found_user = mysqli_fetch_array($result_set);
	    	return !empty($the_result_array) ? array_shift($the_result_array): false;
	    }

	    public static function find_by_query($sql){

	    	global $database;
	    	$result_set = $database->query($sql);
	    	$the_object_array = array();
	    	while ($row = mysqli_fetch_array($result_set)) {
	    		$the_object_array[] = static::instantiation($row);
	    	}
	    	return $the_object_array;			
	    }

	    public static function instantiation($the_record)
	    {
	    	$calling_class = get_called_class();

	    	$user_obj = new $calling_class;
				// $user = new User();
	            // $user_obj->id = $found_user['id'];
	            // $user_obj->username = $found_user['username'];
	            // $user_obj->password = $found_user['password'];
	            // $user_obj->first_name = $found_user['first_name'];
	            // $user_obj->last_name = $found_user['last_name'];
	    	foreach ($the_record as $key => $value) {
	    		if ($user_obj->has_the_attribute($key)) {
	    			$user_obj->$key = $value;
	    		}
	    	}
	    	return $user_obj;
	    }
	    private function has_the_attribute($key){
	    	$object_properties = get_object_vars($this);
	    	return array_key_exists($key, $object_properties);
	    }

	    public function save()
	    {
	    	return isset($this->id) ? $this->update() : $this->create();
	    }

	    public function create()
	    {
	    	global $database;
	    	$properties = $this->clean_properties();
		// echo '<pre>';
		// var_dump($properties);exit;
	    	$sql = "INSERT INTO ". static::$db_table ."(". implode(",", array_keys($properties)) .")";
	    	$sql .= "VALUES('". implode("','", array_values($properties)) ."')";
	    	if($database->query($sql))
	    	{
	    		$this->id = $database->the_insert_id();
	    		return true;
	    	}else {
	    		return false;
	    	}

	    }

	    protected function properties()
	    {
		// return get_object_vars($this);
	    	$properties = array();
	    	foreach (static::$db_table_fields as $db_field) {
	    		if (property_exists($this, $db_field)) {
	    			$properties[$db_field] = $this->$db_field;
	    		}
	    	}
	    	return $properties;
	    }

	    protected function clean_properties()
	    {
	    	global $database;
	    	$clean_properties = array();
	    	foreach ($this->properties() as $key => $value) {
	    		$clean_properties[$key] = $database->escape_string($value);
	    	}
	    	return $clean_properties;
	    }

	    public function update()
	    {
	    	global $database;
	    	$properties = $this->clean_properties();
	    	$property_pairs = array();
	    	foreach ($properties as $key => $value) {
	    		$properties_pairs[] = "{$key}='{$value}'";
	    	}
	    	$sql = "UPDATE ". static::$db_table ." SET ";
	    	$sql .= implode(", ", $properties_pairs);
		// $sql .= "username= '" . $database->escape_string($this->username)."',"; 
		// $sql .= "password= '" . $database->escape_string($this->password)."',"; 
		// $sql .= "first_name= '" . $database->escape_string($this->first_name)."',"; 
		// $sql .= "last_name= '" . $database->escape_string($this->last_name)."'"; 
	    	$sql .= " WHERE id= " . $database->escape_string($this->id);
	    	$database->query($sql);
	    	return (mysqli_affected_rows($database->connection) == 1) ? true : false ; 
	    }

	    public function delete()
	    {
	    	global $database;
	    	$sql = "DELETE FROM ". static::$db_table ." ";
	    	$sql .= "WHERE id=" . $database->escape_string($this->id);
	    	$sql .= " LIMIT 1"; 
	    	$database->query($sql);
	    	return (mysqli_affected_rows($database->connection) == 1) ? true : false ; 
	    }

	    public static function count_all()
	    {
	    	global $database;
	    	$sql = "SELECT COUNT(*) FROM ". static::$db_table;
	    	$result_set = $database->query($sql);
	    	$row = mysqli_fetch_array($result_set);
	    	return array_shift($row);
	    }


	}


	?>