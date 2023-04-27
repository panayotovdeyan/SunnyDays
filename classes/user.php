<?php
class User{
	public 		$userId;
	public 		$admin;
	public 		$name;
	public 		$family;
	protected 	$email;
	protected 	$password;
	public		$city;
	public		$avatar;
    
	public function __construct(
		$Uid='',
		$Uadmin=0,
		$Uname='',
		$Ufamily='',
		$Uemail='',
		$Upass='',
		$Ucity='',
		$Uavatar=''
		)
	{
		if( (int)$Uid === $Uid && $Uid > 0 )
		{
			$this->userId = $Uid;
		}
		$this->name = $Uname;
		$this->admin = $Uadmin;
		$this->family = $Ufamily;
		$this->email = $Uemail;
		$this->password = $Upass;
		$this->city = $Ucity;
		$this->avatar = $Uavatar;
		if( $this->userId > 0 )
		{
			$this->load();
		}
    }
	private function load()
	{
		$sql = "SELECT * FROM `users` WHERE `userId`=".$this->userId.";";
		$con = $GLOBALS['SQL'];
		$result = mysqli_query($con, $sql);
        if( !empty($result) )
		{
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
			$row = $data[0];
			$this->admin = $row['admin'];
			$this->name = $row['name'];
			$this->family = $row['family'];
			$this->email = $row['email'];
			$this->password = $row['password'];
			$this->city = $row['city'];
			$this->avatar = $row['avatar'];
		}

	}
	public function insert()
	{
		$con = $GLOBALS['SQL'];
		if( empty( (int)$this->userId ) ){
			$this->userId = 'NULL';
		}
		$sql = "INSERT INTO `users`(`userId`, `admin`, `name`, `family`, `email`, `password`, `city`, `avatar`) VALUES ("
						.mysqli_real_escape_string($con, $this->userId) .", "
						.mysqli_real_escape_string($con, $this->admin) .", '"
						.mysqli_real_escape_string($con, $this->name) ."', '"
						.mysqli_real_escape_string($con, $this->family) ."', '"
						.mysqli_real_escape_string($con, $this->email) ."', '"
						.mysqli_real_escape_string($con, $this->password)."', '"
						.mysqli_real_escape_string($con, $this->city)."', '"
						.mysqli_real_escape_string($con, $this->avatar)
					."');";
		$result = mysqli_query($con, $sql);
		if( !empty($result) && empty( (int)$this->userId ) ){
			$this->userId = $con->insert_userId;
		}
	}
	public function delete(){
		$sql = "DELETE FROM `users` WHERE userId=". $this->userId .";";
		$con = $GLOBALS['SQL'];
		mysqli_query($con, $sql);
	}
	public function update(){
		if( (int)$this->userId === $this->userId && $this->userId > 0 ){
			$this->delete();
		}
		$this->insert();
	}

    public function getEmail(){
        return $this->email;
    }
    public function setEmail($Uemail){
        $this->email = $Uemail;
    }
	public function getPassword(){
        return $this->password;
    }
    public function setPassword($Upassword){
        $this->password = $Upassword;
    }
}