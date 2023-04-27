<?php
class Service{
	public $id;
	public $service_name;
	public $service_subname;
	public $service_description;
	public $service_image;
	public $published;

    
	public function __construct($Sid='', $Sname='',$Ssubname='', $Sdescription='', $Simage='', $Spublished=''){
		if( (int)$Sid == $Sid && $Sid > 0 ){
			$this->id = $Sid;
		}
		$this->service_name = $Sname;
		$this->service_subname = $Ssubname;
		$this->service_description = $Sdescription;
		$this->service_image = $Simage;
		$this->published = $Spublished;


		if( $this->id > 0 ){
			$this->load();
		}
    }
	private function load(){
		$sql = "SELECT * FROM `services` WHERE `id`=".$this->id.";";
		$con = $GLOBALS['SQL'];
		$result = mysqli_query($con, $sql);
        if( !empty($result) ){
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
			$row = $data[0];
			$this->service_name = $row['service_name'];
			$this->service_subname = $row['service_subname'];
			$this->service_description = $row['service_description'];
			$this->service_image = $row['service_image'];
			$this->published = $row['published'];
		}
	}

	public function insert(){
		$con = $GLOBALS['SQL'];
		if( empty( (int)$this->id ) ){
			$this->id = 'NULL';
		}
		$sql = "INSERT INTO `services`(`id`, `service_name`, `service_subname`, `service_description`, `service_image`, `published`) VALUES ("
						.mysqli_real_escape_string($con, $this->id) .", '"
						.mysqli_real_escape_string($con, $this->service_name) ."', '"
						.mysqli_real_escape_string($con, $this->service_subname) ."', '"
						.mysqli_real_escape_string($con, $this->service_description) ."', '"
						.mysqli_real_escape_string($con, $this->service_image) ."', '"
						.mysqli_real_escape_string($con, $this->published)
					."');"	;

		$result = mysqli_query($con, $sql);
		if( !empty($result) && empty( (int)$this->id ) ){
			$this->id = $con->insert_id;
		}
	}
	public function delete(){
		$sql = "DELETE FROM `services` WHERE id=". $this->id .";";
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