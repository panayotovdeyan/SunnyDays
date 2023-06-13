<?php
require_once 'C:\xampp\htdocs\sunnydays\includes\functions.php';
require_once 'C:\xampp\htdocs\sunnydays\includes\db_sunnydays.php';

class Reporting{
	public $reportId;
	public $userId;
	public $Date;
	public $month_production;
	public $UoMMP;
	public $TTLproduction;
	public $UoMTP;
	public $month_consumption;
	public $UoMMC;
	public $TTLconsumption;
	public $UoMTC;
    
	public function __construct($Rid='', $RuserId='', $RDate='', $Rmonth_production='', $RUoMMP=0, $RTTLproduction='', $RUoMTP='', $month_consumption='', $UoMMC='', $TTLconsumption='', $UoMTC=''){
		if( (int)$Rid == $Rid && $Rid > 0 ){
			$this->reportId = $Rid;
		}
		$this->userId = $RuserId;
		$this->Date = $RDate;
		$this->month_production = $Rmonth_production;
		$this->UoMMP = $RUoMMP;
		$this->TTLproduction = $RTTLproduction;
		$this->UoMTP = $RUoMTP;
		$this->month_consumption = $month_consumption;
		$this->UoMMC = $UoMMC;
		$this->TTLconsumption = $TTLconsumption;
		$this->UoMTC = $UoMTC;




		if( $this->reportId > 0 ){
			$this->load();
		}
    }
	private function load(){
		$sql = "SELECT * FROM `reporting` WHERE `reportId`=".$this->reportId.";";
		$con = $GLOBALS['SQL'];
		$result = mysqli_query($con, $sql);
        if( !empty($result) ){
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
			$row = $data[0];
			$this->userId = $row['userId'];
			$this->Date = $row['Date'];
			$this->month_production = $row['month_production'];
			$this->UoMMP = $row['UoMMP'];
			$this->TTLproduction = $row['TTLproduction'];
			$this->UoMTP = $row['UoMTP'];
			$this->month_consumption = $row[`month_consumption`];
			$this->UoMMC = $row[`UoMMC`];
			$this->TTLconsumption = $row[`TTLconsumption`];
			$this->UoMTC = $row[`UoMTC`];
		}
	}
}

$report = new Reporting($id);
$report->Date = $Date;
$report->month_production = $month_production;
$report->UoMMP = $UoMMP;
$report->TTLproduction = $TTLproduction;
$report->UoMTP = $UoMTP;
$report->month_consumption = $month_consumption;
$report->UoMMC = $UoMMC;
$report->TTLconsumption = $TTLconsumption;
$report->UoMTC = $UoMTC;


// $reports = getReporting();
$reports = getReportingByUser($_SESSION['user']['userId']);