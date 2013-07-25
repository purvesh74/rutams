<?php
class mainmodel extends CI_Model
{
	
	
	public function yearsfind()
	{
		

		$re = $this->db->query("SELECT DISTINCT YEAR( `a_datesonly` ) AS y
FROM attends
WHERE a_datesonly
GROUP BY YEAR( `a_datesonly` )
ORDER BY `a_datesonly` DESC");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return 0;
		}

	}
	public function selectdateviaatedatess($yy,$mom,$d)
	{
		$re = $this->db->query("SELECT DISTINCT a_datesonly
		FROM attends
		WHERE a_datesonly LIKE '%$yy-$mom-$d%'
		AND a_did");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return 0;
		}
	}
	
	public function selectdateviaatedatecountdr($yy,$mom,$id)
	{
		$re = $this->db->query("SELECT DISTINCT MONTHNAME( a_datesonly ) AS mon, MONTH( `a_datesonly` ) AS m, count( * ) AS c, YEAR( `a_datesonly` ) AS y
FROM attends
WHERE `a_datesonly` LIKE '%$yy-$mom%'
AND a_did = '$id'
GROUP BY YEAR( `a_datesonly` ) , MONTH( `a_datesonly` )
ORDER BY `a_datesonly` DESC");
		
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return 0;
		}
	}

	public function selectdateviaatedatecountre($yy,$mom,$id)
	{
		$re = $this->db->query("SELECT DISTINCT MONTHNAME( a_datesonly ) AS mon, MONTH( `a_datesonly` ) AS m, count( * ) AS c, YEAR( `a_datesonly` ) AS y
FROM attends
WHERE `a_datesonly` LIKE '%$yy-$mom%'
AND a_rid = '$id'
GROUP BY YEAR( `a_datesonly` ) , MONTH( `a_datesonly` )
ORDER BY `a_datesonly` DESC");
		
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return 0;
		}
	}
	public function selectdateviaatedatecount($yy,$mom,$id)
	{
		$re = $this->db->query("SELECT DISTINCT MONTHNAME( a_datesonly ) AS mon, MONTH( `a_datesonly` ) AS m, count( * ) AS c, YEAR( `a_datesonly` ) AS y
FROM attends
WHERE `a_datesonly` LIKE '%$yy-$mom%'
AND a_sid = '$id'
GROUP BY YEAR( `a_datesonly` ) , MONTH( `a_datesonly` )
ORDER BY `a_datesonly` DESC");
		
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return 0;
		}
	}
	public function selectdateviaatedate($yy,$mom)
	{
		$re = $this->db->query("SELECT DISTINCT a_datesonly
		FROM attends
		WHERE a_datesonly LIKE '%$yy-$mom%' 
		AND a_did");
		
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return 0;
		}
	}
	
	public function selectdateviaatedmothsd($da,$d,$d1)
	{
		$re = $this->db->query("
		SELECT DISTINCT MONTHNAME(a_datesonly) AS mon, MONTH( `a_datesonly` ) AS m, count( * ) AS c, YEAR( `a_datesonly` ) AS y
		FROM attends
		WHERE `a_datesonly` LIKE '%$da-$d-$d1%'
		GROUP BY YEAR( `a_datesonly` ) , MONTH( `a_datesonly` )
		ORDER BY `a_datesonly` DESC");
		
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return 0;
		}
	}
	public function selectdateviaatedmoths($da,$d)
	{
		$re = $this->db->query("
		SELECT DISTINCT MONTHNAME(a_datesonly) AS mon, MONTH( `a_datesonly` ) AS m, count( * ) AS c, YEAR( `a_datesonly` ) AS y
		FROM attends
		WHERE `a_datesonly` LIKE '%$da-$d%'
		GROUP BY YEAR( `a_datesonly` ) , MONTH( `a_datesonly` )
		ORDER BY `a_datesonly` DESC");
		
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return 0;
		}
	}
	
	
	public function selectdateviaatedmoth($da)
	{
		$re = $this->db->query("
		SELECT DISTINCT MONTHNAME(a_datesonly) AS mon, MONTH( `a_datesonly` ) AS m, count( * ) AS c, YEAR( `a_datesonly` ) AS y
		FROM attends
		WHERE `a_datesonly` LIKE '%$da%'
		GROUP BY YEAR( `a_datesonly` ) , MONTH( `a_datesonly` )
		ORDER BY `a_datesonly` DESC");
		
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return 0;
		}
	}
	
	public function showyear($year)
	{
		$re = $this->db->query("SELECT * from  attends where a_datesonly like '%$year%'");
	//	echo "SELECT * from  attends where a_datesonly like '%$year%'";
		
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return 0;
		}
	}
	
	public function selectdays($da)
	{
		$re = $this->db->query(" SELECT DAY( LAST_DAY( '$da' ) ) as day");
		
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return 0;
		}
	}
	public function selectdrattendid($id)
	{
		$re = $this->db->query("select * from  rh_doctor  where d_id = '$id'");
		
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return 0;
		}
	}
	
	public function selectrecedataselectid($id)
	{
		$re = $this->db->query("select * from  rh_receptionist  where r_id = '$id'");
		
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return 0;
		}
	}
	public function selectstafdataselectid($catid)
	{
		$re = $this->db->query("select * from  stafdetails  where sd_id = '$catid'");
		
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return 0;
		}
	}
	
	public function onlydrs()
	{
		$re = $this->db->query("select DISTINCT a_datesonly from  attends where a_did order by a_id desc ");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return  0;
		}
	}

	public function onlydrssss($year,$month,$d)
	{
		$re = $this->db->query("select DISTINCT a_datesonly from  attends where a_did and a_datesonly like '%$year-$month-$d%' order by a_id desc ");
		
		//echo "select DISTINCT a_datesonly from  attends where a_did and a_datesonly like '%$year-$month-$d%' order by a_id desc ";
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return  0;
		}
	}
	
	public function onlydrsss($year,$month)
	{
		$re = $this->db->query("select DISTINCT a_datesonly from  attends where a_did and a_datesonly like '%$year-$month%' order by a_id desc ");
		
		//echo "select DISTINCT a_datesonly from  attends where a_did and a_datesonly like '%$year-$month%' order by a_id desc ";
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return  0;
		}
	}
	
	public function onlydrss($year)
	{
		$re = $this->db->query("select DISTINCT a_datesonly from  attends where a_did and a_datesonly like '%$year%' order by a_id desc ");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return  0;
		}
	}
	
	
	public function onlystafsss($year,$month,$d)
	{
		$re = $this->db->query("select DISTINCT a_datesonly from  attends where a_sid and a_datesonly like '%$year-$month-$d%' order by a_id desc ");
		
		//echo "select DISTINCT a_datesonly from  attends where a_did and a_datesonly like '%$year-$month-$d%' order by a_id desc ";
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return  0;
		}
	}
	
	public function onlystafss($year,$month)
	{
		$re = $this->db->query("select DISTINCT a_datesonly from  attends where a_sid and a_datesonly like '%$year-$month%' order by a_id desc ");
		
		//echo "select DISTINCT a_datesonly from  attends where a_did and a_datesonly like '%$year-$month%' order by a_id desc ";
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return  0;
		}
	}
	
	public function onlystafs($year)
	{
		$re = $this->db->query("select DISTINCT a_datesonly from  attends where a_sid and a_datesonly like '%$year%' order by a_id desc ");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return  0;
		}
	}
	
	public function onlystaf()
	{
		$re = $this->db->query("select DISTINCT  a_datesonly from  attends where a_sid order by a_id desc ");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return  0;
		}
	}
	
	public function onlyresss($year,$month,$d)
	{
		$re = $this->db->query("select DISTINCT a_datesonly from  attends where a_rid and a_datesonly like '%$year-$month-$d%' order by a_id desc ");
		
		//echo "select DISTINCT a_datesonly from  attends where a_did and a_datesonly like '%$year-$month-$d%' order by a_id desc ";
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return  0;
		}
	}
	
	public function onlyress($year,$month)
	{
		$re = $this->db->query("select DISTINCT a_datesonly from  attends where a_rid and a_datesonly like '%$year-$month%' order by a_id desc ");
		
		//echo "select DISTINCT a_datesonly from  attends where a_did and a_datesonly like '%$year-$month%' order by a_id desc ";
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return  0;
		}
	}
		
	public function onlyres($year)
	{
		$re = $this->db->query("select DISTINCT a_datesonly from  attends where a_rid and a_datesonly like '%$year%' order by a_id desc ");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return  0;
		}
	}
	
	public function onlyre()
	{
		$re = $this->db->query("select DISTINCT a_datesonly from  attends where a_rid order by a_id desc ");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return  0;
		}
	}
	
	
	public function visiters()
	{
		$re = $this->db->query("SELECT * FROM websitevisit order by w_id  desc");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
	}
	
	public function selectdoctoridated($id)
	{
		
		$this->db->query("insert into  attends(a_did,a_datesonly,a_date,visit) value('$id',NOW(),NOW(),1)");
		
		if($this->db->affected_rows() == 1)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}	
			
	}

public function searbytwodateadtall($d,$d1)
	{
		$re = $this->db->query("SELECT DISTINCT a_datesonly  FROM attends WHERE a_datesonly >= '$d' AND a_datesonly <='$d1' ");
	//	echo "SELECT DISTINCT a_datesonly  FROM attends WHERE a_datesonly >= '$d' AND a_datesonly <='$d1' ";
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
	}
	
public function selectdateviaated($d)
{
		$re = $this->db->query("select * from  attends where 	a_datesonly = '$d' order by  a_id desc ");
		//echo "select * from  attends where 	a_datesonly = '$d' order by  a_id desc";
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return  0;
		}
}
public function selectstafidated($id)
	{
		
		$this->db->query("insert into  attends(a_sid,a_datesonly,a_date,visit) value('$id',NOW(),NOW(),1)");
		
		if($this->db->affected_rows() == 1)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}	
			
	}
public function selectreceidated($id)
	{
		
		$this->db->query("insert into  attends(a_rid,a_datesonly,a_date,visit) value('$id',NOW(),NOW(),1)");
		
		if($this->db->affected_rows() == 1)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}	
			
	}

	public function selectad($date)
	{
		$re = $this->db->query("select * from  attends where 	a_datesonly = '$date' ");

		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return  0;
		}
	}

	public function selectstafdataselect($catid)
	{
		$re = $this->db->query("select * from  stafdetails as s join rh_cat as c on s.catid=c.c_id where catid = '$catid'");
		
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return 0;
		}
	}
	
	public function sw_search($keyword)
	{
		$query = $this->db->query("select * from   appointment  where pname like '%$keyword%'");
		return $query->result();
	}
	
	public function adminuserview()
	{
		$re = $this->db->query("select * from  rh_admin");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return 0;
		}
	}
	public function deleteadminuser($id)
	{
		$this->db->query("delete  from rh_admin where id = '$id'");
		
		if($this->db->affected_rows() == 1)
		{
			return 1;
		}
		else
		{
			return 0;
		}	
	}
	public function insertadmindata($uname,$pass)
	{
		$this->db->query("insert into rh_admin(password,email) 
		values('$pass','$uname')");
		
		if($this->db->affected_rows() == 1)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
	public function petientidcheck($id)
	{
		$re = $this->db->query("select * from  rh_patient where p_id = '$id'");
		if($re->num_rows() > 0)
		{
			return 1;
		}
		else
		{
			return 0;
		}

	}
	
	public function showtablet()
	{
		$re = $this->db->query("select * from  tablets");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return 0;
		}

	}
	public function insertpatientdetailes($pno,$tab,$dos,$timep,$cname,$pcon,$price)
	{
		$this->db->query("insert into patientdetailes(det_patient_id,det_tab_id,det_dos,det_date,det_time,det_patient_check_name,det_patient_condition,det_price) 
		values('$pno','$tab','$dos',NOW(),'$timep','$cname','$pcon','$price')");
		
		if($this->db->affected_rows() == 1)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
	public function patientdetails($id)
	{
		$re = $this->db->query("select * from  patientdetailes as p join tablets as t on t.tab_id = p.det_tab_id   where  p.det_patient_id = '$id'");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return 0;
		}

	}
	
	public function conformapp($id)
	{
		$this->db->query("update appointment set conform='1' where id ='$id'");
		
		if($this->db->affected_rows() == 1)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	public function usercheck($name)
	{
		$re = $this->db->query("select * from  patientreg where  pr_email = '$name'");
		
		
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return 0;
		}

	}
	
	public function changepass($email,$p)
	{
		$this->db->query("update patientreg set pr_pass='$p' where pr_email ='$email'");
		
		if($this->db->affected_rows() == 1)
		{
			return 1;
		}
		else
		{
			return 0;
		}	
	}
	public function usersecurity($ans,$email,$q)
	{
		$re = $this->db->query("select * from  patientreg where  pr_email = '$email' and pr_qu = '$q' and pr_ans = '$ans'");
		
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return 0;
		}

	}
	public function updateservicecat($id,$name)
	{
		$this->db->query("update apptype set appname='$name' where at_id ='$id'");
		if($this->db->affected_rows() == 1)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
	
	public function deleteservicecat($id)
	{
		
		$this->db->query("delete from apptype where at_id = '$id'");
		if($this->db->affected_rows() == 1)
		{
			return 1;
		}
		
			
	}
	public function selectservicecatdata()
	{
		$re = $this->db->query("select * from  apptype");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return 0;
		}
	}
	public function selectservicecatdatas($id)
	{
		$re = $this->db->query("select * from  apptype where at_id='$id'");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return 0;
		}
	}
	
	public function insertservicecat($name)
	{
		$this->db->query("insert into  apptype(appname) values('$name')");
		if($this->db->affected_rows() == 1)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}		
	}
	public function todatappointmentvisit($d)
	{
		$re = $this->db->query("select * from  appointment AS a JOIN rh_doctor AS rd  ON a.dr_id = rd.d_id where a.app_date = '$d' and a.visit='1'");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return 0;
		}
	}
	public function visit($id)
	{
		$this->db->query("update appointment set visit='1' where id ='$id'");
		
		if($this->db->affected_rows() == 1)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}	
	}
	public function showtemp()
	{
	
		$re = $this->db->query("select * from  admintemplate");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}	
	}
	
	public function insertsitetitle($name,$id)
	{
		$this->db->query("update admintemplate set sitetitle='$name' where id ='$id'");
		if($this->db->affected_rows() == 1)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
	public function contact($name,$id)
	{
	
		$this->db->query("update admintemplate set Contact='$name' where id ='$id'");
		if($this->db->affected_rows() == 1)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}	
	}
	public function fcontant($name,$id)
	{
		$this->db->query("update admintemplate set footer='$name' where id ='$id'");
		if($this->db->affected_rows() == 1)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
	public function headercolor($name,$id)
	{
		$this->db->query("update admintemplate set headerlinecolor='$name' where id ='$id'");
		if($this->db->affected_rows() == 1)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
	public function updatelogo($id,$file)
	{
		$this->db->query("update admintemplate set logo='$file' where id ='$id'");
		//echo "update admintemplate set logo='$file' where id ='$id'";
		if($this->db->affected_rows() == 1)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
	public function footercolor($name,$id)
	{
		$this->db->query("update admintemplate set footerlinecolor='$name' where id ='$id'");
		if($this->db->affected_rows() == 1)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
	
	public function searbytwodate($d,$d1)
	{
		$re = $this->db->query("SELECT * FROM appointment AS a JOIN rh_doctor AS rd JOIN apptype as at ON a.dr_id = rd.d_id and a.ctype=at.at_id WHERE a.appreg_date >= '$d' AND a.appreg_date <='$d1' order by a.id desc");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
	}
	public function searbytwodateconform($d,$d1)
	{
		$re = $this->db->query("SELECT * FROM appointment AS a JOIN rh_doctor AS rd JOIN apptype as at ON a.dr_id = rd.d_id and a.ctype=at.at_id WHERE a.app_date >= '$d' AND a.app_date <='$d1' and a.conform='1' order by a.id desc");
		echo "SELECT * FROM appointment AS a JOIN rh_doctor AS rd JOIN apptype as at ON a.dr_id = rd.d_id and a.ctype=at.at_id WHERE a.app_date >= '$d' AND a.app_date <='$d1' and a.conform='1' order by a.id desc";
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
	}
	
	public function searchdoctor($name)
	{
		$re = $this->db->query("select * from  rh_doctor as rd join  rh_drcat as rdc on rdc.drc_id=rd.drcat where fname like '%$name%' ");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
	}
	public function searbytwodatep($d,$d1)
	{
		$re = $this->db->query("select * from  rh_patient where date >= '$d' AND date <='$d1' ");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
	}
	public function searbytwodatedr($d,$d1,$id)
	{
		$re = $this->db->query("SELECT * FROM appointment AS a JOIN rh_doctor AS rd JOIN apptype as at ON a.dr_id = rd.d_id and a.ctype=at.at_id
 WHERE a.app_date >= '$d' AND a.app_date <='$d1' AND a.dr_id='$id' order by a.id desc");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
	}
	
	public function searbytwodatepa($d,$d1,$id)
	{
		$re = $this->db->query("SELECT * FROM appointment AS a JOIN rh_doctor AS rd JOIN apptype as at ON a.dr_id = rd.d_id 		and a.ctype=at.at_id
 WHERE a.app_date >= '$d' AND a.app_date <='$d1' AND a.email='$id' order by a.id desc");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
	}
	
	public function todayconformappointment($d)
	{
		$re = $this->db->query("SELECT *
							FROM appointment AS a
							JOIN rh_doctor AS rd JOIN apptype as at ON a.dr_id = rd.d_id 
							and a.ctype=at.at_id
							WHERE a.app_date = '$d' and a.conform='1' order by a.id desc");
							
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return 0;
		}
	}
	public function todatappointment($d)
	{
		$re = $this->db->query("SELECT *
							FROM appointment AS a
							JOIN rh_doctor AS rd JOIN apptype as at ON a.dr_id = rd.d_id 
							and a.ctype=at.at_id
							WHERE a.appreg_date = '$d' order by a.id desc");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return 0;
		}
	}
	
	public function nextdatappointment($d)
	{
		$re = $this->db->query("SELECT *
							FROM appointment AS a
							JOIN rh_doctor AS rd JOIN apptype as at ON a.dr_id = rd.d_id 
							and a.ctype=at.at_id
							WHERE a.app_date = '$d' order by a.id desc");
							
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return 0;
		}
	}
	
	public function todatpateint($date)
	{
		$re = $this->db->query("select * from  rh_patient where date = '$date'");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return 0;
		}
	}
	
	public function todatappointmentdr($date,$id)
	{
		$re = $this->db->query("SELECT *
FROM appointment AS a
JOIN rh_doctor AS rd ON a.dr_id = rd.d_id
WHERE a.appreg_date = '$date' and a.dr_id = '$id' order by a.id desc");


		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		
	}
	
	
	public function todatappointmentpa($date,$id)
	{
		$re = $this->db->query("SELECT *
FROM appointment AS a
JOIN rh_doctor AS rd ON a.dr_id = rd.d_id
WHERE a.appreg_date = '$date' and a.email = '$id' order by a.id desc");

		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		
	}
	public function selectappointmentdr($id)
	{
		$re = $this->db->query("SELECT * FROM appointment AS a JOIN rh_doctor AS rd ON a.dr_id = rd.d_id WHERE a.dr_id = '$id' order by a.id desc");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
	
	}
	public function selectappointmentpa($id)
	{
		$re = $this->db->query("SELECT * FROM appointment AS a JOIN rh_doctor AS rd ON a.dr_id = rd.d_id WHERE a.email = '$id' order by a.id desc");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
	
	}
	
	public function selectappointmentconform()
	{
		$re = $this->db->query("SELECT * FROM appointment AS a JOIN rh_doctor AS rd JOIN apptype as at  ON a.dr_id = rd.d_id and a.ctype=at.at_id where a.conform='1' order by a.id desc");
		//echo "select * from rh_admin where email='$username' and password='$password'";
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return "Not Found Username Or Password";
		}
	}
	public function selectappointment()
	{
		$re = $this->db->query("SELECT * FROM appointment AS a JOIN rh_doctor AS rd JOIN apptype as at  ON a.dr_id = rd.d_id and a.ctype=at.at_id order by a.id desc");
		//echo "select * from rh_admin where email='$username' and password='$password'";
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return "Not Found Username Or Password";
		}
	}
	public function insertdrcat($name)
	{
		$this->db->query("insert into rh_drcat(drcatname) values('$name')");
		if($this->db->affected_rows() == 1)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
	public function deletedrcat($id)
	{
		$this->db->query("delete from rh_drcat where drc_id = '$id'");
		if($this->db->affected_rows() == 1)
		{
			return 1;
		}
		
	}
	
	public function updatedrcat($id,$name)
	{
		$this->db->query("update  rh_drcat set drcatname='$name' where drc_id = '$id'");
		if($this->db->affected_rows() == 1)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
	
	public function selectdrcat($id)
	{
		$re = $this->db->query("select * from rh_drcat where drc_id = '$id' ");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		
	}
	
	
	public function selectdrcatdata()
	{
		$re = $this->db->query("select * from rh_drcat");
		if($re->num_rows() >0)
		{
			return $re->result();
		}
	}
	
	
	public function insertstaf($catname,$name,$add,$email,$age,$gender,$exprience,$bgroup,$cno)
	{
		$this->db->query("insert into stafdetails(catid, name, adds, email, age, gender, exprience, bloodgroup, contact, registerdate) 
								values('$catname','$name','$add','$email','$age','$gender','$exprience','$bgroup','$cno',NOW()) ");
								
							
		if($this->db->affected_rows() == 1)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
	
	public function selectstafdata()
	{
	
		$re = $this->db->query("select * from  stafdetails as s join rh_cat as c on s.catid=c.c_id");
		//echo "select * from rh_admin where email='$username' and password='$password'";
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return "Not Found Username Or Password";
		}
		
	
	}
	
	public function selectstafdataid($id)
	{
	
		$re = $this->db->query("select * from  stafdetails  as s join rh_cat as c on s.catid=c.c_id where sd_id= '$id'");
		//echo "select * from rh_admin where email='$username' and password='$password'";
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return "Not Found Username Or Password";
		}
		
	
	}
	public function daletestafdata($id)
	{
	
		$re = $this->db->query("delete from  stafdetails where sd_id ='$id'");
		//echo "select * from rh_admin where email='$username' and password='$password'";
		if($this->db->affected_rows() == 1)
		{
			return 1;
		}
		else
		{
			return 0;
		}
		
	
	}
	public function updatestafdata($id,$catname,$name,$add,$email,$age,$gender,$exprience,$bgroup,$cno)
	{
	
		$re = $this->db->query("update stafdetails  set catid='$catname', name='$name', adds='$add', email='$email', age='$age', gender='$gender', exprience='$exprience', bloodgroup='$bgroup', contact='$cno' where sd_id ='$id'");
		//echo "select * from rh_admin where email='$username' and password='$password'";
		if($this->db->affected_rows() == 1)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
		
	
	}
	
	
	
	
	public function showsitetitle()
	{
		$re = $this->db->query("select * from  admintemplate");
		//echo "select * from rh_admin where email='$username' and password='$password'";
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return "Not Found Username Or Password";
		}
		
	}
	public function selectdr()
	{
		$re = $this->db->query("select * from  rh_doctor");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return "Not Found Username Or Password";
		}
	}
	
	public function loginCheakdatadr($username,$password)
	{
		$re = $this->db->query("select * from  rh_doctor where email='$username' and password='$password'");
		//echo "select * from rh_admin where email='$username' and password='$password'";
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return "Not Found Username Or Password";
		}
	}
	public function loginCheakdata($username,$password)
	{
		$re = $this->db->query("select * from rh_admin where email='$username' and password='$password'");
		//echo "select * from rh_admin where email='$username' and password='$password'";
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return "Not Found Username Or Password";
		}
	}
	
	public function insertdatamodel($fname,$lname,$pass,$email,$mobile,$contact)
	{
		$this->db->query("insert into rh_admin( fname, lname, password, email, mobileno, contactno, block, registerdate, activation) 
								values('$fname','$lname','$pass','$email','$mobile','$contact',1,NOW(),true) ");
		if($this->db->affected_rows() == 1)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
	
	
	
	public function insertdatareceptionmodel($pass,$pa,$fname,$address,$email,$mobile,$contact)
	{
			$this->db->query("insert into rh_receptionist( fname, address, password, pass,email, mobileno, contactno, registerdate) 
								values('$fname','$address','$pass','$pa','$email','$mobile','$contact',NOW())");
		if($this->db->affected_rows() == 1)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
		
	}
	
	public function updatedatareceptionmodel($id,$fname,$address,$email,$mobile,$contact)
	{
		
			$this->db->query("update rh_receptionist set  fname='$fname', address='$address',email='$email', mobileno='$mobile', contactno='$contact'
			                    where r_id = '$id' ");
		if($this->db->affected_rows() == 1)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
	
	
	public function selectdatareceptionmodel($id)
	{
		$re = $this->db->query("select * from rh_receptionist where r_id = '$id' ");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return  0;
		}
	}
	
	public function selectdatadoctormodel($id)
	{
		$re = $this->db->query("select * from  rh_doctor as rd join  rh_drcat as rdc on rdc.drc_id=rd.drcat where d_id = '$id' ");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return  0;
		}
	}
	
	
	public function deletedatareceptionmodel($id)
	{
		$re = $this->db->query("delete from rh_receptionist where r_id = '$id' ");
		
		if($this->db->affected_rows() == 1)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	public function searchreception($id)
	{
		$re = $this->db->query("select * from rh_receptionist where fname like '%$id%' ");

		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		
	}
	public function selectdatareception()
	{
		$re = $this->db->query("select * from rh_receptionist");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			return  0;
		}
	}
	
	
	public function insertdatadoctormodel($drcat,$pass,$pa,$fname,$address,$email,$degree,$cufp,$mobile,$contact)
	{
			$this->db->query("insert into rh_doctor(drcat,password, pass,fname, address, email,degree,checkup_for_patient,date, mobileno, contactno) 
							  values('$drcat','$pass','$pa','$fname','$address','$email','$degree','$cufp',NOW(),'$mobile','$contact') ");
		if($this->db->affected_rows() == 1)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
		
	}
	
	public function insertappointment($datep,$dsc,$pname,$dname,$stype,$c)
	{
			$this->db->query("insert into  appointment(pname, appreg_date, app_date, description,ctype,dr_id,app_contactno) 
							  values('$pname',NOW(),'$datep','$dsc','$stype','$dname','$c')");
		if($this->db->affected_rows() == 1)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
		
	}
	
	public function insertappointmentpa($datep,$dsc,$pname,$dname,$stype,$email,$c)
	{
			$this->db->query("insert into  appointment(pname, appreg_date, app_date, description,ctype,dr_id,email,app_contactno) 
							  values('$pname',NOW(),'$datep','$dsc','$stype','$dname','$email','$c')");
		if($this->db->affected_rows() == 1)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
		
	}
	public function updateappointment($id,$datep,$dsc,$pname,$dname)
	{
		$this->db->query("update appointment set pname='$pname', app_date='$datep', description='$dsc',dr_id='$dname' where id = '$id'");
		if($this->db->affected_rows() == 1)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
	
	public function insertstafcat($name)
	{
		$this->db->query("insert into rh_cat(cat) values('$name')");
		if($this->db->affected_rows() == 1)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
	public function deletestafcat($id)
	{
		$this->db->query("delete from rh_cat where c_id = '$id'");
		if($this->db->affected_rows() == 1)
		{
			return 1;
		}
		else
		{
			return "0";
		}
	}
	
	public function updatestafcat($id,$name)
	{
		$this->db->query("update  rh_cat set cat='$name' where c_id = '$id'");
		if($this->db->affected_rows() == 1)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
	
	public function selectstafcat($id)
	{
		$re = $this->db->query("select * from rh_cat where c_id = '$id' ");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		else
		{
			echo "0";
		}
	}
	
	
	public function selectstafcatdata()
	{
		$re = $this->db->query("select * from rh_cat");
		if($re->num_rows() >0)
		{
			return $re->result();
		}
		else
		{
			echo "0";
		}
	}
	
	public function insertdatapetientmodel($fname,$add,$age,$des,$mobile,$weight)
	{
			$this->db->query("insert into rh_patient(fname, address, description, age, weight, mobileno,date) 
							  values('$fname','$add','$des','$age','$weight','$mobile',NOW()) ");
		if($this->db->affected_rows() == 1)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
		
	}
	public function selectpetient()
	{
		$re = $this->db->query("select * from  rh_patient ");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
	}
	
	
	
	public function selectdoctor()
	{
		$re = $this->db->query("select * from  rh_doctor as rd join  rh_drcat as rdc on rdc.drc_id=rd.drcat order by rd.d_id ");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}
	}
	public function selectdoctorrow()
	{
		$re = $this->db->query("select * from  rh_doctor as rd join  rh_drcat as rdc on rdc.drc_id=rd.drcat order by rd.d_id ");
		if($re->num_rows() > 0)
		{
			$row = $re->row_array();
			return $row;
		}
	}
	
	public function deletedoctor($id)
	{
		$this->db->query("delete from rh_doctor where d_id = '$id'");
		if($this->db->affected_rows() == 1)
		{
			return 1;
		}
		else
		{
			return  0;
		}
		
	}
	public function deleteappointment($id)
	{
		$this->db->query("delete from appointment where id = '$id'");
		if($this->db->affected_rows() == 1)
		{
			return 1;
		}
		else
		{
			return  0;
		}
		
	}
	public function selectdataappointmentmodel($id)
	{
		$re = $this->db->query("select * from appointment where id = '$id'");
		if($re->num_rows() > 0)
		{
			return  $re->result();
		}
		
	}
	public function deletepatient($id)
	{
		
		$this->db->query("delete from rh_patient where p_id = '$id'");
		if($this->db->affected_rows() == 1)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	public function loginCheakdatare($username,$password)
	{
		$re = $this->db->query("select * from  rh_receptionist where email='$username' and password= '$password' ");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}

	}
	public function loginCheakdatapre($username,$password)
	{
		$re = $this->db->query("select * from  persysttemp where per_username='$username' and per_password= '$password' ");
		if($re->num_rows() > 0)
		{
			return $re->result();
		}

	}
	
	public function updatedrlogindatare($id,$name,$add,$cno,$mno)
	{
		$this->db->query("update rh_receptionist set fname='$name', address='$add', mobileno='$mno', contactno='$cno' where r_id = '$id'");
		if($this->db->affected_rows() == 1)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	public function updatedrlogindata($id,$name,$add,$bdate,$cfg,$cno,$degree,$mno)
	{
		$this->db->query("update rh_doctor set fname='$name', address='$add',bdate='$bdate',degree='$degree',checkup_for_patient='$cfg', mobileno='$mno', contactno='$cno' where d_id = '$id'");
		if($this->db->affected_rows() == 1)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	public function updateprofileimg($id,$file)
	{
		$this->db->query("update rh_doctor set img='$file' where d_id = '$id'");
		if($this->db->affected_rows() == 1)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	
	public function updateprofileimgre($id,$file)
	{
		$this->db->query("update rh_receptionist set img='$file' where r_id = '$id'");
		if($this->db->affected_rows() == 1)
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
	public function updatedatadoctormodel($drcat,$id,$fname,$address,$email,$degree,$cufp,$mobile,$contact)
	{
		$this->db->query("update rh_doctor set drcat='$drcat',fname='$fname', address='$address', email='$email',degree='$degree',checkup_for_patient='$cufp', mobileno='$mobile', contactno='$contact' where d_id = '$id'");
		if($this->db->affected_rows() == 1)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
	
	public function updatedatapetientmodel($id,$fname,$add,$age,$des,$mobile,$weight)
	{
		$this->db->query("update rh_patient set fname='$fname', address='$add', description ='$des', age='$age', weight='$weight', mobileno='$mobile' where p_id = '$id'");
		
		if($this->db->affected_rows() == 1)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
	public function passchangepa($pass,$uname)
	{
		$this->db->query("update patientreg set pr_pass='$pass' where pr_email = '$uname'");
		
		if($this->db->affected_rows() == 1)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
	public function passchangeper($pass,$uname)
	{
		$this->db->query("update persysttemp set per_password='$pass' where per_username = '$uname'");
		
		if($this->db->affected_rows() == 1)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
	
	public function passchange($pass,$uname)
	{
		$this->db->query("update rh_admin set password='$pass' where email = '$uname'");
		
		if($this->db->affected_rows() == 1)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
	public function passchangedr($pass,$uname)
	{
		$this->db->query("update rh_doctor set password='$pass' where email = '$uname'");
		
		if($this->db->affected_rows() == 1)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}

	}
	public function passchangere($pass,$uname)
	{
		$this->db->query("update rh_receptionist set password='$pass' where email = '$uname'");
		
		if($this->db->affected_rows() == 1)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}

	}
	public function loginCheakdatapa($username,$password)
	{
		
		$re = $this->db->query("select * from  patientreg where pr_email='$username' and pr_pass= '$password' ");

		if($re->num_rows() > 0)
		{
			return $re->result();
		}
		
	}
	
	public function usercheckdata($uname)
	{
		$re = $this->db->query("select * from  rh_admin where email  = '$uname'");
		if($re->num_rows() > 0)
		{
			return  $re->result();
		}
		
	}
	
	public function usercheckdataper($uname)
	{
		$re = $this->db->query("select * from  persysttemp where per_username  = '$uname'");
		if($re->num_rows() > 0)
		{
			return  $re->result();
		}
		
	}
	public function usercheckdatapa($uname)
	{
		$re = $this->db->query("select * from  patientreg where pr_email  = '$uname'");
		if($re->num_rows() > 0)
		{
			return  $re->result();
		}
		
	}
	
	public function usercheckdatadr($uname)
	{
		$re = $this->db->query("select * from   rh_doctor where email  = '$uname'");
		if($re->num_rows() > 0)
		{
			return  $re->result();
		}
		
	}
	public function usercheckdatare($uname)
	{
		$re = $this->db->query("select * from   rh_receptionist where email  = '$uname'");
		if($re->num_rows() > 0)
		{
			return  $re->result();
		}
		
	}
	
	public function selectdatapatientmodel($id)
	{
		$re = $this->db->query("select * from rh_patient where p_id = '$id'");
		if($re->num_rows() > 0)
		{
			return  $re->result();
		}
	}
	
	public function regdatain($username,$password,$email,$contact,$qu,$ans)
	{
	
		$this->db->query("insert into patientreg(pr_name, pr_pass, pr_email, pr_date, pr_contact, pr_qu,pr_ans) 
							  values('$username','$password','$email',NOW(),'$contact','$qu','$ans' )");
		if($this->db->affected_rows() == 1)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}	
	}

}

?>