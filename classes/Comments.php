<?

class Comments{
	
	public function getByArticleId($id){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT comments.*, users.realName, users.userImg, users.username FROM comments 
		INNER JOIN users ON comments.authorId=users.id
		WHERE comments.articleId = ".$id."
		ORDER BY comments.id DESC";
	
		$st = $conn->prepare( $sql );
		$st ->execute();
		$i = 0;
		
		while($row = $st->fetch()){
			$nrow[$i]['id'] = $row['id'];
			$nrow[$i]['datetime'] = $row['datetime'];
			$nrow[$i]['content'] = $row['content'];
			$nrow[$i]['username'] = $row['username'];
			$nrow[$i]['realName'] = $row['realName'];
			$nrow[$i]['userImg'] = $row['userImg'];
			$i++;
		}
		$nrow['count'] = $i;
		return $nrow;
	}
	
	public function addByArticleId($id,$userid){
		$message = $_POST['message'];

		
		if($message != ''){
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "INSERT INTO comments(authorId,content,datetime,articleId) VALUES ('".$userid."','".$message."','".date("Y-m-d H:i:s")."','".$id."')";
			$st = $conn->prepare( $sql );
			$st ->execute();
			
			header("Refresh:0"); exit();
		}else{
			echo 'Your comment is empty!';
		}
	}
	
	public function deleteComm($articleId,$commId){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "DELETE FROM comments
		WHERE id='".$commId."' AND articleId='".$articleId."'";
		$st = $conn->prepare( $sql );
		$st ->execute();
		header("Location:post.php?id=".$articleId); exit();
	}

	
}


?>