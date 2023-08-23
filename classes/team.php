<?php
class Team{
	public $id;
	public $memberName;
	public $memberPosition;
	public $memberDescription;
	public $memberImage;
	public $published;

    
	public function __construct($Sid='', $Sname='',$Ssubname='', $Sdescription='', $Simage='', $Spublished=''){
		if( (int)$Sid == $Sid && $Sid > 0 ){
			$this->id = $Sid;
		}
		$this->memberName = $Sname;
		$this->memberPosition = $Ssubname;
		$this->memberDescription = $Sdescription;
		$this->memberImage = $Simage;
		$this->published = $Spublished;


		if( $this->id > 0 ){
			$this->load();
		}
    }
	private function load(){
		$sql = "SELECT * FROM `team` WHERE `id`=".$this->id.";";
		$con = $GLOBALS['SQL'];
		$result = mysqli_query($con, $sql);
        if( !empty($result) ){
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
			$row = $data[0];
			$this->memberName = $row['memberName'];
			$this->memberPosition = $row['memberPosition'];
			$this->memberDescription = $row['memberDescription'];
			$this->memberImage = $row['memberImage'];
			$this->published = $row['published'];

		}
	}

	public function insert(){
		$con = $GLOBALS['SQL'];
		if( empty( (int)$this->id ) ){
			$this->id = 'NULL';
		}
		$sql = "INSERT INTO `team`(`id`, `memberName`, `memberPosition`, `memberDescription`, `memberImage`, `published`) VALUES ("
						.mysqli_real_escape_string($con, $this->id) .", '"
						.mysqli_real_escape_string($con, $this->memberName) ."', '"
						.mysqli_real_escape_string($con, $this->memberPosition) ."', '"
						.mysqli_real_escape_string($con, $this->memberDescription) ."', '"
						.mysqli_real_escape_string($con, $this->memberImage) ."', '"
						.mysqli_real_escape_string($con, $this->published)
					."');"	;

		$result = mysqli_query($con, $sql);
		if( !empty($result) && empty( (int)$this->id ) ){
			$this->id = $con->insert_id;
		}
	}
	public function delete(){
		$sql = "DELETE FROM `team` WHERE id=". $this->id .";";
		$con = $GLOBALS['SQL'];
		mysqli_query($con, $sql);
	}
	public function update(){
		if( (int)$this->id == $this->id && $this->id > 0 ){
			$this->delete();
		}
		$this->insert();
	}

}