<?php

class News
{
  public function addOne($userid){
	$title = $_POST['title'];
	$summary = $_POST['summary'];
	$content = $_POST['content'];
	$categ = $_POST['category'];
	
	$uploaddir = './uploads/';
	$uploadfile = $uploaddir . basename($_FILES['image']['name']);

	move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
	
	$image = 'http://alt.bz.ua/uploads/'.$_FILES['image']['name'];
	if($content != ''){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "INSERT INTO news(publicationDate,title,summary,content,category,author,imageUrl) VALUES ('".date("Y-m-d H:i:s")."','".$title."','".$summary."','".$content."','".$categ."','".$userid."','".$image."')";
		$st = $conn->prepare( $sql );
		$st ->execute();
		
		header("Location: index.php"); exit();
	}else{
		echo 'Your comment is empty!';
	}
  }

  public function getById( $id ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT news.*, categories.name, users.username FROM news 
	INNER JOIN categories ON news.category=categories.id
	INNER JOIN users ON news.author=users.id
	WHERE news.id = ".$id;

    $st = $conn->prepare( $sql );
    $st ->execute();
	$i = 0;
	
    $row = $st->fetch();
	
    return $row;
  }

  public function getList( $numRows ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT news.*, categories.name, users.username, users.realName FROM news
	INNER JOIN categories ON news.category=categories.id
	INNER JOIN users ON news.author=users.id
	WHERE news.status = 1
	ORDER BY publicationDate DESC LIMIT ".$numRows;

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
  
  public function getListByUser( $numRows ,$author ) {
	  echo $author.' articles:';
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT news.*, categories.name, users.username, users.realName FROM news 
	INNER JOIN categories ON news.category=categories.id
	INNER JOIN users ON news.author=users.id
	WHERE news.status = 1 AND news.author = (SELECT users.id FROM users WHERE users.username = '".$author."')
	ORDER BY publicationDate DESC LIMIT ".$numRows;

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
		$i++;
    }
	
	$nrow['count'] = $i;
    return $nrow;
  }
  
  public function getMyList( $numRows , $author) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT news.*, categories.name, users.username, users.realName FROM news 
	INNER JOIN categories ON news.category=categories.id
	INNER JOIN users ON news.author=users.id
	WHERE news.author = (SELECT users.id FROM users WHERE users.username = '".$author."')
	ORDER BY publicationDate DESC LIMIT ".$numRows;

    $st = $conn->prepare( $sql );
    $st ->execute();
	$i = 0;
	
    while ( $row = $st->fetch() ) {
		$nrow[$i]['id'] = $row['id'];
		$nrow[$i]['publicationDate'] = $row['publicationDate'];
		$nrow[$i]['title'] = $row['title'];
		$nrow[$i]['summary'] = $row['summary'];
		$nrow[$i]['name'] = $row['name'];
		$nrow[$i]['status'] = $row['status'];
		$nrow[$i]['username'] = $row['username'];
		$nrow[$i]['realName'] = $row['realName'];
		$nrow[$i]['imageUrl'] = $row['imageUrl'];
		$i++;
    }
	
	$nrow['count'] = $i;
    return $nrow;
  }
  
  
  public function getListByCat( $numRows , $category) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT news.*, categories.name, users.username, users.realName FROM news 
	INNER JOIN categories ON news.category=categories.id
	INNER JOIN users ON news.author=users.id
	WHERE news.category = ".$category." AND news.status = 1
	ORDER BY publicationDate DESC LIMIT ".$numRows;

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
		$i++;
    }
	
	$nrow['count'] = $i;
    return $nrow;
  }
  
  	
	public function getCategoryList(){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT * FROM categories";
	
		$st = $conn->prepare( $sql );
		$st ->execute();
		$i = 0;
		
		while($row = $st->fetch()){
			$nrow[$i]['id'] = $row['id'];
			$nrow[$i]['name'] = $row['name'];
			$i++;
		}
		$nrow['count'] = $i;
		return $nrow;
	}

	public function editById($id){
		$title = $_POST['title'];
		$summary = $_POST['summary'];
		$content = $_POST['content'];
		$categ = $_POST['category'];
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		if(isset($_POST['status'])){
			$sql = "UPDATE news SET title = '".$title."',summary = '".$summary."', content = '".$content."', category = '".$categ."', status ='".$_POST['status']."' WHERE id='".$id."'";
		}else{
			$sql = "UPDATE news SET title = '".$title."',summary = '".$summary."', content = '".$content."', category = '".$categ."', status = 0 WHERE id='".$id."'";	
		}
		$st = $conn->prepare( $sql );
		$st ->execute();
	}
	
	public function confirmById($id){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "UPDATE news SET status = 1 WHERE id='".$id."'";
	
		$st = $conn->prepare( $sql );
		$st ->execute();
		header("Location: confirm.php");
		
	}
	
	public function getCountToConfirm(){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT COUNT(*) FROM news WHERE status=0";
		$st = $conn->prepare( $sql );
		$st ->execute();
		$row = $st->fetch();
		return $row['COUNT(*)'];
	}
	
	public function getUnconfirmed(){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT news.*, categories.name, users.username, users.realName FROM news
		INNER JOIN categories ON news.category=categories.id
		INNER JOIN users ON news.author=users.id
		WHERE news.status = 0
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
			$nrow[$i]['status'] = $row['status'];
			$nrow[$i]['realName'] = $row['realName'];
			$nrow[$i]['imageUrl'] = $row['imageUrl'];
			$i++;
		}
		
		$nrow['count'] = $i;
		return $nrow;
	}
}

?>
