<?php
class Project{
	public $id;
	public $title;
	public $subtitle;
	public $text;
	public $image;
	public $published;
    
	public function __construct($Pid='', $Ptitle='', $Psubtitle='', $Ptext=0, $Pimage='', $Ppublished=''){
		if( (int)$Pid == $Pid && $Pid > 0 ){
			$this->id = $Pid;
		}
		$this->title = $Ptitle;
		$this->subtitle = $Psubtitle;
		$this->text = $Ptext;
		$this->image = $Pimage;
		$this->published = $Ppublished;

		if( $this->id > 0 ){
			$this->load();
		}
    }
	private function load(){
		$sql = "SELECT `id`, `title`, `subtitle`, `text`, `image`, `published` FROM `projects` WHERE `id`=".$this->id.";";
		$con = $GLOBALS['SQL'];
		$result = mysqli_query($con, $sql);
        if( !empty($result) ){
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
			$row = $data[0];
			$this->title = $row['title'];
			$this->subtitle = $row['subtitle'];
			$this->text = $row['text'];
			$this->image = $row['image'];
			$this->published = $row['published'];
		}
	}
	public function insert(){
		$con = $GLOBALS['SQL'];
		if( empty( (int)$this->id ) ){
			$this->id = 'NULL';
		}
		$sql = "INSERT INTO `projects`(`id`, `title`, `subtitle`, `text`, `image`, `published`) VALUES ("
						.mysqli_real_escape_string($con, $this->id) .", '"
						.mysqli_real_escape_string($con, $this->title) ."', '"
						.mysqli_real_escape_string($con, $this->subtitle) ."', '"
						.mysqli_real_escape_string($con, $this->text) ."', '"
						.mysqli_real_escape_string($con, $this->image) ."', '"
						.mysqli_real_escape_string($con, $this->published)
					."');";
		$result = mysqli_query($con, $sql);
		if( !empty($result) && empty( (int)$this->id ) ){
			$this->id = $con->insert_id;
		}
	}
	public function delete(){
		$sql = "DELETE FROM `projects` WHERE id=". $this->id .";";
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