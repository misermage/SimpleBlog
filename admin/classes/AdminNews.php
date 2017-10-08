<?

include('../classes/News.php');

class AdminNews extends News{
	
	public function addCategory(){
		$name = $_POST['name'];
		if($name != ''){
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "INSERT INTO categories(name) VALUES ('".$name."')";
			$st = $conn->prepare( $sql );
			$st ->execute();
			
			header("Location: news.php"); exit();
		}else{
			echo 'Your comment is empty!';
		}
	}
	
	public function getAllList() {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT news.*, categories.name, users.username, users.realName FROM news
	INNER JOIN categories ON news.category=categories.id
	INNER JOIN users ON news.author=users.id
	ORDER BY publicationDate DESC";

    $st = $conn->prepare( $sql );
    $st ->execute();
	$i = 0;
	
    while ( $row = $st->fetch() ) {
		$nrow[$i]['id'] = $row['id'];
		$nrow[$i]['publicationDate'] = $row['publicationDate'];
		$nrow[$i]['title'] = $row['title'];
		$nrow[$i]['summary'] = $row['summary'];
		$nrow[$i]['name'] = $row['name'];
		$nrow[$i]['username'] = $row['username'];
		$nrow[$i]['realName'] = $row['realName'];
		$nrow[$i]['imageUrl'] = $row['imageUrl'];
		$nrow[$i]['status'] = $row['status'];
		$i++;
    }
	
	$nrow['count'] = $i;
    return $nrow;
  }
	
  public function getNewsCount() {
	$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT COUNT(*) FROM news";

    $st = $conn->prepare( $sql );
    $st ->execute();
	$row = $st->fetch();
	return($row['COUNT(*)']);
  }
  
  public function deleteById($id) {
	$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	$sql = "DELETE FROM news
	WHERE id='".$id."'";
	$st = $conn->prepare( $sql );
	$st ->execute();
	header("Location:news.php"); exit();
  }
  
}

?>