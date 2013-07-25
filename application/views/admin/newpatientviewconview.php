<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<link rel="stylesheet" href="/resources/demos/style.css" />
<script>

$(function() {
$( "#datepick" ).datepicker();
});

$(function() {
$( "#from" ).datepicker({
defaultDate: "+1w",
changeMonth: true,
numberOfMonths: 3,
onClose: function( selectedDate ) {
$( "#to" ).datepicker( "option", "minDate", selectedDate );
}
});

$( "#to" ).datepicker({
defaultDate: "+1w",
changeMonth: true,
numberOfMonths: 3,
onClose: function( selectedDate ) {
$( "#from" ).datepicker( "option", "maxDate", selectedDate );
}
});
});
</script>
<script type="text/javascript">
function todayappointment()
{
	alert("today");
	
window.location = "<?php echo $base?>index.php?admin/newpatientviewcon/todaydata/";

}
function allapp()
{
	alert("all");
	
window.location = "<?php echo $base?>index.php?admin/newpatientviewcon/allapp/";

}

</script>
<div class="Center">
	<div class="Scaler">
		<div class="form">
        		
				<div class="Formtitle">View Patient</div>
                
                <?php
				if(isset($delete))
				{
					if($delete == 1)
					{
						echo '<script>alert("Reord Delete")</script>';
					}
					else if($delete == 0)
					{
						echo '<script>alert("Reord Not Delete")</script>';
					}
				}
					echo '<table  width="100%"><tr><td><div class="FormLable"><input  type="radio" onClick="todayappointment()"  name="readio" id="today"> View all Today </div></td>
				
				<td><div class="FormLable">| <input type="radio" name="readio" onClick="allapp()" id="allapp"> View all</div></td>
				<td><div class="FormLable">  | Search By This Date  : </div><form action="'.$base.'index.php?admin/newpatientviewcon/searchbydate/" method="post"> 
			&nbsp;	<label for="from">From</label>
<input type="text" id="from" name="from" />
<label for="to">to</label>	
<input type="text" id="to"  name="to" />
			<input type="submit" value="Submit" name="btnsubmit">
				 </form></td>
				
				
				</tr></table>';
			
				if(isset($select))
				{
					
					if($select == "")
					{
						echo "No Found Data";
					}
					else
					{
					
						echo '<table width="100%">';
						echo '<tr>
						<td><div class="FormLable">No</div></td>
						
						<td><div class="FormLable">Name</div></td>
						<td><div class="FormLable">Address</div></td>
						<td><div class="FormLable">Description</div></td>
						<td><div class="FormLable">Age</div></td>
						<td><div class="FormLable">Weight</div></td>
						<td><div class="FormLable">Mobile No</div></td>
						<td><div class="FormLable">Date</div></td>
						<td><div class="FormLable">Action</div></td>
						
						</tr>';
						foreach($select as $row)
						{
						echo '<tr>
						<td><div class="FormLable">'.$row->p_id.'</div></td>
						<td><div class="FormLable">'.$row->fname.'</div></td>
						<td><div class="FormLable">'.$row->address.'</div></td>
						<td><div class="FormLable">'.$row->description.'</div></td>
						<td><div class="FormLable">'.$row->age.'</div></td>
						<td><div class="FormLable">'.$row->weight.'</div></td>
						<td><div class="FormLable">'.$row->mobileno.'</div></td>
						<td><div class="FormLable">'.$row->date.'</div></td>
						<td><a href="'.$base.'index.php?admin/newpatient/selectdata/'.$row->p_id.'">Edit</a> | <a href="'.$base.'index.php?admin/newpatientviewcon/deletedata/'.$row->p_id.'">Delete</a> | <a href="'.$base.'index.php?admin/newpatientviewcon/detailes/'.$row->p_id.'">Detailes</a></td>
						
						</tr>';
						
						}
						echo '</table>';
					}
					}
					else if(isset($detailes))
					{
						echo '<table width="100%" border="1"><tr><td width="30%" valign="top">';
						
						echo '<table width="100%" border="1"><tr><th colspan="2"><h2>Patient Information</h2></th></tr>';
						if(isset($detailes1))
						{
							foreach($detailes1 as $row)
						{
				echo '<tr><th width="25%" height="20%"><div class="FormLable">Patient No .</div></td><td><div class="FormLable">'.$row->p_id.'</div></td></tr>
						<tr><th><div class="FormLable">Name .</div></th><td><div class="FormLable">'.$row->fname.'</div></td></tr>
						<tr><th><div class="FormLable">Address .</div></th><td><div class="FormLable">'.$row->address.'</div></td></tr>
						<tr><th><div class="FormLable">Description .</div></th><td><div class="FormLable">'.$row->description.'</div></td></tr>
						<tr><th><div class="FormLable">Age .</div></th><td><div class="FormLable">'.$row->age.'</div></td></tr>
						<tr><th><div class="FormLable">Weight .</div></th><td><div class="FormLable">'.$row->weight.'</div></td></tr>
						<tr><th><div class="FormLable">Mobile No .</div></th><td><div class="FormLable">'.$row->mobileno.'</div></td></tr>
						<tr><th><div class="FormLable">Addmit Date .</div></th><td><div class="FormLable">'.$row->date.'</div></td></tr>';
						}
						}

						echo '</table>';
						
						echo '</td><td width="50%" valign="top">';
						
						echo '<table width="100%" border="1"><tr><th colspan="7"><h2>Patient Check Up Information</h2></th></tr>';
						
				echo '<tr><th width="25%" height="20%"><div class="FormLable">Tablet </div></th><th><div class="FormLable">Dos </div></th>
				<th><div class="FormLable">Date </div></th><th><div class="FormLable">Time </div></th>
				<th><div class="FormLable">Check up Name </div></th><th><div class="FormLable">Condition </div></th><th><div class="FormLable">Amount </div></th>
				</tr>';
				
					if($detailes == "")
					{
							echo '<tr><th colspan="7">No Found</th></tr></table></td></tr></table>';
					}
					else
					{
						$total = "";
						
						foreach($detailes as $row)
						{
						
						$total = $total + $row->det_price;
						echo '
						<tr><td><div class="FormLable">'.$row->tab_name .'</div></td><td><div class="FormLable">'.$row->det_dos.'</div></td>
						<td><div class="FormLable">'.$row->det_date.'</div></td><td><div class="FormLable">'.$row->det_time.'</div></td>
						<td><div class="FormLable">'.$row->det_patient_check_name .'</div></td><td><div class="FormLable">'.$row->det_patient_condition.'</div></td>
						<td><div class="FormLable">'.$row->det_price .'</div></td></tr>';
						}
						echo '<tr><th colspan="6">Total Amount</th><th>'.$total.'</th> </tr></table></td></tr></table>';
					}
						
					}
				else
				{
					echo "No Recored";
				}
				?>
               <!-- <div class="FormLable">First Name :</div><input class="FormText"   id="FisrtName" />
                <div class="FormLable">Address :</div><input class="FormText"   id="Address" />
                <div class="FormLable">Description :</div><input class="FormText"   id="Description" />
                <div class="FormLable">Age :</div><input class="FormText"   id="Age" />
                <div class="FormLable">Weight :</div><input class="FormText"   id="Weight" />
                <div class="FormLable">Mobile No :</div><input class="FormText"    id="Mobile"/>
                
                
                <div class="FormBtm">
                	<div class="FormBtn"> Submit </div>
                </div>
-->		</div>
	</div>
</div>
<style>
form
{
  margin-top: 6px;	
}
.Er
{
	background-color: #CCCCCC;
    border: 1px solid #FFFFFF;
    border-radius: 5px 5px 5px 5px;
    color: #FF0000;
    float: left;
    height: 30px;
    line-height: 30px;
    margin-bottom: 11px;
    margin-left: 6px;
    margin-top: 2px;
    min-width: 200px;
    padding-left: 10px;
    padding-right: 10px;
    width: 200px;
	visibility:hidden;
	
}
.Error{
	
    float: left;
    height: 300px;
    margin-left: -100px;
    margin-top: 56px;

}
.FormBtn
{
	   background-color: #FFFFFF;
		border: 1px solid #000000;
		border-radius: 5px 5px 5px 5px;
		box-shadow: 0 0 3px 0 #000000;
		cursor: pointer;
		float: right;
		font-family: Cuprumffu;
		height: 26px;
		line-height: 26px;
		margin-right: 21px;
		margin-top: 10px;
		text-align: center;
		width: 100px;
}
	.FormText{
		background-color: #CCCCCC;
		border: 0 none;
		border-radius: 5px 5px 5px 5px;
		box-shadow: 0 0 3px 0 #333333 inset;
		color: #333333;
		float: left;
		height: 35px;
		line-height: 35px;
		margin-bottom: 10px;
		margin-left: 9px;
		padding-left: 10px;
		padding-right: 10px;
		width: 358px;
	}
	.FormLable{
		color: #333333;
		height: 35px;
		line-height: 35px;
		text-align: center;
	
		float:left;
		margin-bottom:10px;
	}
	.Formtitle
	{
		margin-bottom:20px;
		border-bottom: 1px solid #CCCCCC;
		float: left;
		font-size: 19px;
		height: 35px;
		line-height: 35px;
		padding-left: 14px;
		width: 100%;
	}
	.FormBtm
	{
		border-top: 1px solid #CCCCCC;
    float: left;
    font-size: 19px;
    height: 45px;
    line-height: 35px;
    margin-top: 10px;
    padding-left: 14px;
    width: 636px;
	}
    .form{
		background: none repeat scroll 0 0 #FFFFFF;
		border: 1px solid #CCCCCC;
		border-radius: 5px 5px 5px 5px;
		float: left;
		height: auto;
		margin-bottom: 10px;
		margin-left: 0px;
		width: 100%;
		border:1px solid #CCC;
	}
    
</style>
