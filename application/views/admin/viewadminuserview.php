<script type="text/javascript">
</script>
<div class="Center">
	<div class="Scaler">
		<div class="form">
        		
				<div class="Formtitle">View Admin User</div>
                
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
				
				if(isset($select))
				{
					echo '<table width="100%" border="1">';
					echo '<tr>
					<td><div class="FormLable">No</div></td>
					
					<td><div class="FormLable">Username</div></td>
					<td><div class="FormLable">Password</div></td>
					<td><div class="FormLable">Action</div></td>
					
					</tr>';
					foreach($select as $row)
					{
					echo '<tr>
					<td><div class="FormLable">'.$row->id.'</div></td>
					<td><div class="FormLable">'.$row->email.'</div></td>
					<td><div class="FormLable">'.$row->password.'</div></td>
					<td><a href="'.$base.'index.php?admin/newstaf/selectdata/'.$row->id.'">Edit</a> | <a href="'.$base.'index.php?admin/viewadminuser/deletedata/'.$row->id.'">Delete</a></td>
					</tr>';
					
					}
					echo '</table>';
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
    float: left;
    line-height: 18px;
    margin-bottom: 10px;
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
