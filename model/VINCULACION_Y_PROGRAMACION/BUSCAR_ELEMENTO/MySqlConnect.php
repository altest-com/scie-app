<?php
header("Content-type: text/html; charset=utf8mb4");
header('Content-type:application/json');

class MySqlConnect
{
	private $dataBase;
	private $user;
	private $pass;
	private $conn;
	private $status;

	public function __construct()
	{
		$params = func_get_args();
		$num_params = func_num_args();
		$constructor = "__construct".$num_params;
		if (method_exists($this, $constructor))
		{
			call_user_func_array(array($this, $constructor), $params);
		}
	}

	public function __construct3($dataBase, $user, $pass)
	{
		$this->dataBase = $dataBase;
		$this->user = $user;
		$this->pass = $pass;
		error_reporting(0);
		// Create connection
		$this->$conn = new mysqli("localhost", $user, $pass, $dataBase);
		$this->$conn->set_charset("utf8mb4");
		// Check connection
		if ($this->$conn->connect_error) 
		{
    		die("Connection failed: " . $this->$conn->connect_error);
    		$status = FALSE;
		}
		else
		{
			//echo "Connection established";
			$status = TRUE;
		}
	}

	public function closeMySqlConnection()
	{
		if ($this->$status)
		{
			mysqli_close($this->$conn);
			$this->$status = FALSE;
		}
	}

	public function executeSelectQuery($queryStr, $isInJsonFormat)
	{
		//error_reporting(0);
		//echo "ejecutando query select";
		$resultado = $this->$conn->query($queryStr);
		if ($resultado->num_rows > 0)
		{
			//printf("rows: %d", $resultado->num_rows);
			while($row = $resultado->fetch_array(MYSQLI_ASSOC)) 
			{
				//print_r($row);
				$array[] = $row;
			}
			if ($isInJsonFormat === TRUE)
			{
				//print_r($array);
				echo json_encode($array, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
				return TRUE;
			}
			else
			{
				return $array;
			}
		}
		else
		{
			echo "No results were found";
			return NULL;
		}
	}

	public function executeInsertQuery($queryStr, $isMultipleInsert)
	{
		if ($isMultipleInsert)
		{
			if ($this->conn->multi_query($queryStr))
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
		else
		{
			if ($this->$conn->query($queryStr))
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
	}

	public function executeUpdateQuery($queryStr)
	{
		if ($this->$conn->query($queryStr))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function getValueFromQuery($queryStr, $value)
	{
		$resultado = $this->$conn->query($queryStr);
		if ($resultado->num_rows > 0)
		{
			//printf("rows: %d", $resultado->num_rows);
			$result_row = "";
			while($row = $resultado->fetch_array(MYSQLI_ASSOC)) 
			{
				//print_r($row);
				$result_row .= $row[$value];
			}
			return $result_row;
		}
		else
		{
			//echo "No results were found";
			return NULL;
		}
	}

	public function getSingleValueFromQuery($queryStr)
	{
		$resultado = $this->$conn->query($queryStr);
		if ($resultado->num_rows > 0)
		{
			//printf("rows: %d", $resultado->num_rows);
			$result_row = "";
			while($row = $resultado->fetch_array(MYSQLI_ASSOC)) 
			{
				//print_r($row);
				$result_row .= $row["ROW"];
			}
			return $result_row;
		}
		else
		{
			echo "No results were found";
			return NULL;
		}
	}
}

?>