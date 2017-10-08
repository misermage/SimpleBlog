<?




class Users{

	
	public function getUserDataById($userid){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT * FROM users 
		WHERE id = ".$userid;
	
		$st = $conn->prepare( $sql );
		$st ->execute();
		
		$row = $st->fetch();
		
		return $row;
	}
	
	
	public function changeData($id){
		$email = $_POST['email'];
		$realname = $_POST['realname'];
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
		$image = 'http://alt.bz.ua/avatar/'.$_FILES['image']['name'];
		if($image = 'http://alt.bz.ua/avatar/'){
			$image = "https://pp.vk.me/c629310/v629310599/10bda/i6fq9drmWn0.jpg";
		}
		$sql = "UPDATE users SET email = '".$email."',realName = '".$realname."', userImg='".$image."' WHERE id='".$id."'";
		
		$st = $conn->prepare( $sql );
		$st ->execute();
		
		header('Refresh:0');
	}
	
	
	private function generateCode($length=6) {
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
	
	$code = "";
	
	$clen = strlen($chars) - 1;  
	
	while (strlen($code) < $length) {
			$code .= $chars[mt_rand(0,$clen)];  
	}
	
	return $code;
    
	}
	
	public function check(){		
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		
		if(isset($_COOKIE['id'])){
		$sql = "SELECT id, username, password, hash, realName, type, userImg  FROM `users` WHERE id = '".intval($_COOKIE['id'])."' LIMIT 1";
		$st = $conn->prepare( $sql );
		$st ->execute();
		$userdata = $st->fetch();
	
		if(($userdata['hash'] !== $_COOKIE['hash']) or ($userdata['id'] !== $_COOKIE['id']) or ( $_COOKIE['hash']=='' ) or ($_COOKIE['id'] == '')){
			return 'unloginned';
		}
		else{
			return $userdata;
		}
		}else{
			return 'unloginned';
		}
	}
	
	public function login(){
		$username = $_POST['username'];
		$password = $_POST['pass'];
		
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT id, password,type FROM `users` WHERE username='".$username."' LIMIT 1";
		$st = $conn->prepare( $sql );
		$st->execute();
		$data = $st->fetch();
		echo $data['password'];
		if($data['password'] == md5($password)){
			
			$hash = md5($this->generateCode(10));
			$sql1 = "UPDATE `users` SET hash='".$hash."' WHERE username='".$username."'";
			$st1 = $conn->prepare( $sql1 );
			$st1->execute();
			
			setcookie("id", $data['id'], time()+60*60*24*30);
        
			setcookie("hash", $hash, time()+60*60*24*30);
			if($data['type']==1){
				header("Location: admin/index.php"); exit();
			}else{
				header("Location: index.php"); exit();
			}
		}
		else{
			echo 'Wrong password!';
			
		}
	
	}
	
	public function logout(){
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "UPDATE `users` SET hash='' WHERE id='".$_COOKIE['id']."'";
		$st = $conn->prepare( $sql );
		$st ->execute();
		
		header('Location:index.php');
	}
	
	public function register(){
		$username = $_POST['username'];
		$password = $_POST['pass'];
		$password1 = $_POST['pass1'];
		$mail = $_POST['mail'];
		$realname = $_POST['realname'];
		$uploaddir = './avatar/';
		$uploadfile = $uploaddir . basename($_FILES['image']['name']);
	
		move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
		$image = 'http://alt.bz.ua/avatar/'.$_FILES['image']['name'];
		if($image = 'http://alt.bz.ua/avatar/'){
			$image = "https://pp.vk.me/c629310/v629310599/10bda/i6fq9drmWn0.jpg";
		}
		if($password1 == $password){
			$hash = md5($this->generateCode(10));
			$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
			$sql = "INSERT INTO users(username,password,hash,realName,type,email,userImg) VALUES ('".$username."','".md5($password)."','".$hash."','".$realname."',3,'".$mail."','".$image."')";
			$st = $conn->prepare( $sql );
			$st ->execute();
			setcookie("id", $data['id'], time()+60*60*24*30);
			
			setcookie("hash", $hash, time()+60*60*24*30);
			header("Location: index.php"); exit();
		}else{
			echo 'Check your password!';
		}
	
	}
	
	
}





?>