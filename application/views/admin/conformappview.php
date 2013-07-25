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
	
window.location = "<?php echo $base?>index.php?admin/conformapp/todaydata/";

}
function allapp()
{
	alert("all");
	
window.location = "<?php echo $base?>index.php?admin/conformapp/allapp/";

}

function visit(id)
{

	alert(id);
			$.ajax({
					type:"POST",
					data: "id="+id,
					url:"<?php echo $base?>index.php?admin/conformapp/visitcheck/",
					success: function(html){
					if(html == 1)
					{
						alert("Appointment Visit Successfully. ")
					}
					else if(html == 0)
					{
							alert("Appointment Not Visit Successfully. ");	
					}
					else
					{
							alert("Try Again Same Error. ");
					}
					}
				});	
}
</script>

<div class="Center">
	<div class="Scaler">
		<div class="form">
        		
				<div class="Formtitle">View Conform Appointment <div class="ri"><form action="<?php echo $base?>index.php?admin/newappointmentcon/pdfc" method="post"> Download Data By <input name="date" id="datepick" /><input type="submit" value="Ok" name="downolad" /></form> </div> </div>
                
                <?php
				
				if(isset($nopdf))
				{
					echo '<script>alert('.$nopdf.')</script>';
				}
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
				
				if(isset($conform))
				{
					if($conform == 1)
					{
						echo '<script>alert("Appointment Conform ")</script>';
					}
					else if($conform == 0)
					{
						echo '<script>alert("Appointment Not Conform")</script>';
					}
				}
				
				echo '<table  width="100%"><tr><td><div class="FormLable"><input  type="radio" onClick="todayappointment()"  name="readio" id="today"> View all Today </div></td>
				
				<td><div class="FormLable">| <input type="radio" name="readio" onClick="allapp()" id="allapp"> View all</div></td>
				<td><div class="FormLable">  | Search By This Date  : </div><form action="'.$base.'index.php?admin/conformapp/searchbydate/" method="post"> 
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
						echo "Record Not Found";
					}else
					{
							echo '<table width="100%">';
							echo '<tr>
							
							<td><div class="FormLable">Visit</div></td>
							<td><div class="FormLable">No</div></td>
							<td><div class="FormLable">Name</div></td>
							<td><div class="FormLable">Date</div></td>
							<td><div class="FormLable">Appointment Date</div></td>
							<td><div class="FormLable">Description</div></td>
							<td><div class="FormLable">Check up</div></td>
							<td><div class="FormLable">Doctor Name</div></td>
							<td><div class="FormLable">Contact</div></td>
							<td><div class="FormLable">Action</div></td>
							
							</tr>';
							foreach($select as $row)
							{
								echo '<tr>
								<td><div class="FormLable">';
								
								if($row->visit == 1)
								{
									echo '<input type="checkbox" checked="checked">';
								}
								else
								{
									
									echo '<input type="checkbox" id="checkedvisit"  onclick="visit('.$row->id.')">';
								}
								echo '</div></td>
							
								<td><div class="FormLable">'.$row->id.'</div></td>
								<td><div class="FormLable">'.$row->pname.'</div></td>
								<td><div class="FormLable">'.$row->appreg_date.'</div></td>
							<td><div class="FormLable">'.$row->app_date.'</div></td>
							<td><div class="FormLable">'.$row->description.'</div></td>
							<td><div class="FormLable">';
								echo $row->appname;
								 echo '</div></td>
							
							<td><div class="FormLable">'.$row->fname.'</div></td>
							<td><div class="FormLable">'.$row->app_contactno .'</div></td>';
							
						if($row->conform == 1)
						{
							echo	'<td>Conform</td>';
							
						}
						else
						{
							echo	'<td><a href="'.$base.'index.php?admin/newappointmentcon/conform/'.$row->id.'">Conform</a> | <a href="'.$base.'index.php?admin/newappointmentcon/deletedata/'.$row->id.'">Cencel</a></td>';
						}
							echo '</tr>';
							
							}
							echo '</table>';
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
            
                <td><a href="'.$base.'index.php?admin/newappointment/selectdata/'.$row->id.'">Edit</a> | <a href="'.$base.'index.php?admin/newappointmentcon/deletedata/'.$row->id.'">Delete</a></td>
							
                
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
.ri
{
	float: right;
    margin-right: 361px;
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
	width: 147px;
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
