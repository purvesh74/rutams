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
function selectdr(id)
{
	$.ajax({
		type:"POST",
		data:"id="+id,
		url:"<?php echo $base ?>index.php?admin/atendance/selectdead/",
		success: function(html)
		{
			if(html == 1)
			{
				alert("Yes");
			}
			else if(html = 0)
			{
				alert("No");
			}
			else
			{
				alert("Error");
			}
		}
		
		});
}
function selectre(id)
{
	$.ajax({
		type:"POST",
		data:"id="+id,
		url:"<?php echo $base ?>index.php?admin/atendance/selectread/",
		success: function(html)
		{
			if(html == 1)
			{
				alert("Yes");
			}
			else if(html = 0)
			{
				alert("No");
			}
			else
			{
				alert("Error");
			}
		}
		
		});
}
function selectst(id)
{
	$.ajax({
		type:"POST",
		data:"id="+id,
		url:"<?php echo $base ?>index.php?admin/atendance/selectstad/",
		success: function(html)
		{
			if(html == 1)
			{
				alert("Yes");
			}
			else if(html = 0)
			{
				alert("No");
			}
			else
			{
				alert("Error");
			}
		}
		
		});
}


function doctorattendance()
{
	window.location = "<?php echo $base ?>index.php?admin/viewatendancecon/doctorattendance/"
}

function reattendance()
{
		window.location = "<?php echo $base ?>index.php?admin/viewatendancecon/reattendance/"
}
function stafattendance()
{
		window.location = "<?php echo $base ?>index.php?admin/viewatendancecon/stafattendance/"
}

</script>
<div class="Center">
	<div class="Scaler">
		<div class="form">
        		
		<div class="Formtitle">View Atendance <?php 
		
			if(isset($select))
				{
					if($select == "")
					{
						echo " No Found Your Select Date Data.";
					}
					else
					{
						$i = "";
					foreach($select as $r)
					{
						$i=  $r->a_datesonly;
					}
					echo " Date is  ".$i;
					}
				}
		 ?> </div>
        
       	<?php 
		echo '<table  width="100%"><tr>
		<td><div class="FormLable"> Search By This Date  : </div><form action="'.$base.'index.php?admin/viewatendancecon/searchbydate/" method="post"> 
			&nbsp;	<label for="from">From</label>
<input type="text" id="from" name="from" />
<label for="to">to</label>	
<input type="text" id="to"  name="to" />
			<input type="submit" value="Submit" name="btnsubmit">
				 </form></td>
				</tr>
		<tr><td> Doctor <input type="radio" name="attend" onclick="doctorattendance()"; >  |  Reception <input type="radio" name="attend" onclick="reattendance()"; >  |  Staf  <input type="radio" name="attend" onclick="stafattendance()"; > </td></tr>		
				
				</table>';
				
				
			//	if(isset($onlydr))
//				{
//					echo '<table border="1" width="100%">
//						<tr><th colspan="2">Doctor Attendence</th></tr>';
//					
//					if($selectdr)
//					{
//						foreach($selectdr  as $r)
//						{
//						
//						echo '<tr><td>'.$r->fname.'</td>';
//						
//						echo '<td></td>';		
//						echo '</tr>';	
//						
//						}
//						
//					}
//					
//					echo '</table>';
//					
//				}
		
		if(isset($select))
		{
			
		echo '<table border="1" width="100%">';
		echo '<tr>';
		
		echo '<th width="33%">Doctor Attendance</th>';
		echo '<th width="33%">Reception Attendance </th>';
		echo '<th width="33%">Staf Attendance</th>';
		
		echo '</tr>';
		echo '<tr>';
		
		echo '<td valign="top">';
		if(isset($selectdr))
		{
			echo '<table width="100%" border="1">';
			foreach($selectdr as $r)
			{
				echo '<tr><td>'.$r->fname.'</td><td align="right">';
				
				if(isset($select))
				{
					
					if($select == "")
					{
							echo '<input type="checkbox" disabled="disabled" onclick="selectdr('.$r->d_id.');" value="'.$r->d_id.'" >';
					
					}
					else
					{
					$i = "";
					foreach($select as $r1)
					{
						if($r1->a_did == $r->d_id)
						{
							$i = 1;
						}
						else
						{
						}
					}		
					
					if($i == 1)
					{
						echo '<input type="checkbox"  disabled="disabled" checked="checked" >';
					}
					else
					{
						echo '<input type="checkbox" disabled="disabled" onclick="selectdr('.$r->d_id.');" value="'.$r->d_id.'" >';
					}
					}
				}
				
				echo ' </td></tr> </tr>';
			}
			echo '</table>';
		}
		echo '</td>';
		echo '<td valign="top">';
		if(isset($selectre))
		{
			echo '<table  width="100%" border="1">';
			foreach($selectre as $r)
			{
				echo '<tr><td>'.$r->fname.'</td><td>';
				
				
				if(isset($select))
				{
					
					if($select == "")
					{
							echo '<input type="checkbox" disabled="disabled" onclick="selectre('.$r->r_id.');" value="'.$r->r_id.'" >';
					
					}
					else
					{
					$i = "";
					foreach($select as $r1)
					{
						if($r1->a_rid == $r->r_id)
						{
							$i = 1;
							
						}
					}		
					
					if($i == 1)
					{
						echo '<input type="checkbox" disabled="disabled" checked="checked" >';
					}
					else
					{
						echo '<input type="checkbox" onclick="selectre('.$r->r_id.');" disabled="disabled" value="'.$r->r_id.'" >';
					}
					}
				}
				
				
				echo '</td></tr> </tr>';
			}
			echo '</table>';
	
		}
		echo '</td>';
		echo '<td valign="top">';
		if(isset($selectst))
		{
			echo '<table width="100%" border="1">';
			foreach($selectst as $r)
			{
				echo '<tr><td>'.$r->name.'</td><td>';
				if(isset($select))
				{
					if($select == "")
					{
							echo '<input type="checkbox" disabled="disabled" onclick="selectst('.$r->sd_id.');" value="'.$r->sd_id.'" >';

					}
					else
					{
					$i = "";
					foreach($select as $r1)
					{
						if($r1->a_sid == $r->sd_id)
						{
							$i = 1;
						}
					}		
					
					if($i == 1)
					{
						echo '<input type="checkbox"  checked="checked" disabled="disabled">';
					}
					else
					{
						echo '<input type="checkbox" disabled="disabled" onclick="selectst('.$r->sd_id.');" value="'.$r->sd_id.'" >';
					}
					}
				}
				
				echo '</td> </tr>';
			}
			echo '</table>';
	
		}
		echo '</td>';
		
		
		echo '</tr>';
		
		
		echo '</table>';
		}
		
		if(isset($select3))
		{
			echo $select3;
		}
		?>
    	</div>
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
