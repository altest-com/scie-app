<?php
//header("Content-type: text/html; charset=utf8mb4");
//header('Content-type: application/json');

class MySqlConnection
{
	private $dataBase;
	private $user;
	private $pass;
	private $conn;
	private $status;
	private $affectedRows;

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
		//error_reporting(0);
		// Create connection
		$this->conn = new mysqli("localhost", $user, $pass, $dataBase);
		$this->conn->set_charset("utf8mb4");
		$this->conn->autocommit(FALSE);
		// Check connection
		if ($this->conn->connect_error)
		{
			$this->status = false;
    		die("Connection failed: " . $this->conn->connect_error);
		}
		else
		{
			//echo "Connection established ";
			$this->status = TRUE;
		}
	}

	public function closeMySqlConnection()
	{
		if ($this->status)
		{
			mysqli_close($this->conn);
			$this->status = FALSE;
		}
	}

	public function executeSelectQuery($queryStr, $isInJsonFormat)
	{
		//error_reporting(0);
		//echo "ejecutando query select";
		if ($this->status)
		{
			$resultado = $this->conn->query($queryStr);
			$array = array();
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
					return json_encode($array, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
					return TRUE;
				}
				else
				{
					return $array;
				}
			}
			else
			{
				//echo "No results were found";
				echo json_encode($array, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
				return NULL;
			}
		}
		else
		{
			echo "Sin conexión";
		}
	}

	public function getStatus ()
	{
		return $this->status;
	}

	public function executeInsertQuery($queryStr, $numOfInsertQuerys = 1)
	{
		//error_reporting(0);
		$numberOfQuery = 0;
		$message = "";
		if ($numOfInsertQuerys > 1)
		{
			$str = $queryStr;
			$startIndex = 0;
			$lastIndex = strlen($str) - 1;

			for ($i = 0; $i < $numOfInsertQuerys; $i++)
			{
				$strLen = strlen($str);
				$firstSemiColonIndex = strpos($str, ";");
				$firstSubStr = substr($str, $startIndex, $firstSemiColonIndex + 1);
				$str = substr($str, $firstSemiColonIndex + 1, $strLen - $firstSemiColonIndex);
				echo $firstSubStr."<br />";
				if ($this->insertQuery($firstSubStr, $numberOfQuery))
				{
					$message .= $numberOfQuery."-true/";
					//echo "--true--";
				}
				else
				{
					$message .= $numberOfQuery."-false/";
					//echo "--false--";
				}
			}
		}
		else
		{
			if ($this->insertQuery($queryStr))
			{
				$message .= $numberOfQuery."-true/";
			}
			else
			{
				$message .= $numberOfQuery."-false/";
			}
		}
		$affectedRows = mysqli_affected_rows($this->conn);
		if (strpos($message, "false") === false)
		{
			$this->commit();
			echo "true";
			return TRUE;
		}
		else
		{
			$this->rollback();
			echo "false";
			return FALSE;
		}
		//echo $message;
	}

	public function executeUpdateQuery($queryStr)
	{
		if ($this->conn->query($queryStr))
		{
			$this->commit();
			//echo "true";
			return "true";
		}
		else
		{
			$this->rollback();
			//echo "false";
			return "false";
		}
	}

	public function getValueFromQuery($queryStr, $value)
	{
		$resultado = $this->conn->query($queryStr);
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

	public function getRowFromQuery($queryStr)
	{
		$resultado = $this->conn->query($queryStr);
		if ($resultado->num_rows > 0)
		{
			//printf("rows: %d", $resultado->num_rows);
			$row = $resultado->fetch_array(MYSQLI_ASSOC);
			return $row;
		}
		else
		{
			//echo "No results were found";
			return NULL;
		}
	}

	public function getSingleValueFromQuery($queryStr)
	{
		$resultado = $this->conn->query($queryStr);
		if ($resultado->num_rows > 0)
		{
			//printf("rows: %d", $resultado->num_rows);
			$result_row = "";
			while($row = $resultado->fetch_array(MYSQLI_ASSOC))
			{
				//print_r($row);
				$result_row .= $row["ROW"];
			}
			//echo "Resultado: ".$result_row;
			return $result_row;
		}
		else
		{
			echo "No results were found";
			return NULL;
		}
	}

	private function insertQuery($queryStr, &$numberOfQuery = 0)
	{
		$numberOfQuery++;
		if ($this->conn->query($queryStr))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function getAffectedRows()
	{
		return $this->affectedRows;
	}

	private function rollback()
	{
		$this->conn->rollback();
	}

	private function commit()
	{
		$this->conn->commit();
	}
}

?>
