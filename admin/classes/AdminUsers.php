<?

include('../classes/Users.php');

class AdminUsers extends Users{
	
	public function getUserList() {
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT users.*,userTypes.typeName FROM users
		INNER JOIN userTypes ON users.type = userTypes.id
		ORDER BY users.id";
	
		$st = $conn->prepare( $sql );
		$st ->execute();
		$i = 0;
		
		while ( $row = $st->fetch() ) {
			$nrow[$i]['id'] = $row['id'];
			$nrow[$i]['username'] = $row['username'];
			$nrow[$i]['email'] = $row['email'];
			$nrow[$i]['realName'] = $row['realName'];
			$nrow[$i]['userImg'] = $row['userImg'];
			$nrow[$i]['typeName'] = $row['typeName'];
			$nrow[$i]['type'] = $row['type'];
			
			$i++;
		}
		
		$nrow['count'] = $i;
		return $nrow;
	}
	
	public function upgradeUser($id) {
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "UPDATE users SET type=type-1 WHERE id=".$id;
	
		$st = $conn->prepare( $sql );
		$st ->execute();
		
		header("Location:users.php");
	}
	
	public function getUsersCount(){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT COUNT(*) FROM users";
	
		$st = $conn->prepare( $sql );
		$st ->execute();
		$row = $st->fetch();
		return($row['COUNT(*)']);
	}
}

?>