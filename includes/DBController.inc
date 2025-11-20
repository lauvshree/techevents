    <?php

class DBController {
    private $conn;
    public function __construct($host, $user, $pass, $db)
	{
        /*Ensure that the errors from mysqli function calls are reported 
        and exceptions are thrown instead of warnings*/
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        try {
			$this->conn = new mysqli(
			$host,
			$user,
			$pass,
			$db
			);
            if(!$this->conn) {
                throw new Exception("Database Connection failed!");
            }
            return $this->conn;
        } 
        catch (Throwable $e) {
            $this->logError($e);
        }
    }

    //RETRIEVE - R of the CRUD
    public function retrieveRecords(): array {
        try {
            $sql = "SELECT * FROM techevents";
    		$res = $this->conn->query($sql);
    		if (!$res) {
    		  throw new Exception("Query failed! ");
    		}
    		$rows = $res->fetch_all(MYSQLI_ASSOC); // associative rows
    		return $rows;
        } catch (Throwable $e) {
            $this->logError($e);
        }
	}

    //RETRIEVE - R of the CRUD
    public function retrieveRecord($id): array {
        try {
            $sql = "SELECT * FROM techevents WHERE id=?";            
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $res = $stmt->get_result();            
    		if (!$res) {
    		  throw new Exception("Query failed! ");
    		}
    		return $res->fetch_assoc();
        } catch (Throwable $e) {
            $this->logError($e);
        }
	}


    public function uploadImage($image, $tmp_name) : bool {
        try {
            $newname = 'images/'.$image;

            // ensure upload directory exists & is writable
            $uploadDir = __DIR__ . '/../images';
            if (is_dir($uploadDir)) {
                if (is_writable($uploadDir)) {
                	if (move_uploaded_file($tmp_name, $newname)) {
                        return true;
                	} else {
                        throw new Exception("File upload failed.");    
                    }
                } else {
                    throw new Exception("Unwritable directory.");
                }
            } else {
                throw new Exception("There is no such directory");
            }
        }  catch (Throwable $e) {
            $this->logError($e);
        }
        return false;
    }

    //This method will insert the data into the database
    //CREATE - C of the CRUD
    public function insert_event($eventname, $location, $techskill, $description, $image): bool {
        try {
    		$sql = "INSERT INTO techevents(eventname,location,description,techskill,image) VALUES (?,?,?,?,?)";
    		$stmt = $this->conn->prepare($sql);

            $stmt->bind_param("sssss", $eventname, $location, $description, $techskill, $image);
            $ok = $stmt->execute();
            if (!$ok) {
                throw new Exception("Execute failed: ". $stmt->error);
            }
            $stmt->close();
            return $ok;
        }  catch (Throwable $e) {
            $this->logError($e);
        }
    }

    //UPDATE - U of the CRUD
    public function updateRecord($id, $eventname, $location, $techskill, $description) : bool{
        try {
            $sql = "UPDATE techevents".
                    " SET eventname=?,".
                    " location=?, ".
                    " techskill=?, ".
                    " description=? WHERE id=?";

            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ssssi", $eventname, $location, $techskill, $description, $id);

            $stmt->execute();
            $res = $stmt->execute();                        
            if (!$res) {
                throw new Exception("Record not modified!");
            }
            return true;
        } catch(Throwable $e) {
            $this->logError($e);
        }
        return false;
    }

    //DELETE - D of the CRUD
    public function deleteRecord($id) : bool {
        try {
            $success = true;
            $sql = "SELECT image FROM techevents WHERE id=?";            
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $res = $stmt->get_result();            
            $queryres = $res->fetch_assoc();
            $image = 'images/'.$queryres['image'];

            $sql = "DELETE FROM techevents WHERE id=?";            
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $res = $stmt->execute();
            
            if (!$res) {
                throw new Exception("Record not deleted!");
            } else {
                unlink($image);
            }
            return $success;
        } catch(Throwable $e) {
            $this->logError($e);
        }
        return false;
    }

    //This method is for logging any errors that happens in the DBController
	private function logError($error) {
		error_log(date("Y-m-d H:i:s").'----'.$error->getCode()." "
                                            .$error->getFile()." "
                                            .$error->getLine()." "
                                            .$error->getMessage()." "
                                            .$error->getTraceAsString().
                                            PHP_EOL, 3, "logs/my-errors.log");
        echo("<p class='stylederror'>".$error->getMessage().". Contact backend support team.</p>");
	}
}
?>