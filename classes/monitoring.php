<?php
require_once 'C:\xampp\htdocs\sunnydays\includes\functions.php';
require_once 'C:\xampp\htdocs\sunnydays\includes\db_sunnydays.php';

class Monitoring{
	public $reportId;
	public $userId;
	public $Date;
	public $time_production;
	public $TTLproduction;
	public $time_consumption;
	public $TTLconsumption;
	public $UoM_online;
    
	public function __construct($Rid='', $RuserId='', $RDate='', $Rtime_production='', $RTTLproduction='', $time_consumption='', $TTLconsumption='', $UoM_online=''){
		if( (int)$Rid == $Rid && $Rid > 0 ){
			$this->reportId = $Rid;
		}
		$this->userId = $RuserId;
		$this->Date = $RDate;
		$this->time_production = $Rtime_production;
		$this->TTLproduction = $RTTLproduction;
		$this->time_consumption = $time_consumption;
		$this->TTLconsumption = $TTLconsumption;
		$this->UoM_online = $UoM_online;


		if( $this->reportId > 0 ){
			$this->load();
		}
    }
	private function load(){
		$sql = "SELECT * FROM `daymonitoring` WHERE `reportId`=".$this->reportId.";";
		$con = $GLOBALS['SQL'];
		$result = mysqli_query($con, $sql);
        if( !empty($result) ){
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
			$row = $data[0];
			$this->userId = $row['userId'];
			$this->Date = $row['Date'];
			$this->time_production = $row['time_production'];
			$this->TTLproduction = $row['TTLproduction'];
			$this->time_consumption = $row[`time_consumption`];
			$this->TTLconsumption = $row[`TTLconsumption`];
			$this->UoM_online = $row[`UoM_online`];
		}
	}
}

$monitoring = new Monitoring($id);
$monitoring->Date = $Date;
$monitoring->time_production = $time_production;
$monitoring->TTLproduction = $TTLproduction;
$monitoring->time_consumption = $time_consumption;
$monitoring->TTLconsumption = $TTLconsumption;
$monitoring->UoM_online = $UoM_online;


$monitoring = getMonitoring();