<script>
	$(document).ready(function() {
		
		$(".FormBtn").click(function(){
			
			if(document.getElementById("User").value == "")
			{
				alert("Enter The Username");
			}
			else if(document.getElementById("Pass").value == "")
			{
				alert("Enter The Password");
			}
			
			else
			{
				
				var username = document.getElementById("User").value;
				var password = document.getElementById("Pass").value;
				var name = document.getElementById("name").value;
				
				alert(username+password+name);
				
				$.ajax({
				type:"POST",
				data:"username="+username+"&password="+password+"&name="+name,
				url:"<?php echo $base ?>index.php?admin/adminindexcon/logincheak/",
				success: function(html)
				{
					if(html == 1)
					{
						window.location = "<?php echo $base ?>index.php?admin/newdoctorcat/";
					}
					else if(html == 2)
					{
						window.location = "<?php echo $base ?>index.php?admin/viewdrappintmentcon/";
					}
					else if(html == 3)
					{
						window.location = "<?php echo $base ?>index.php?admin/adminhometemp/";
					}
					else if(html == 4)
					{
						window.location = "<?php echo $base ?>index.php?admin/adminhomereception/";
					}
					else if(html == 0)
					{
						
					}
					else
					{
						alert("Invalid Username Or Password");
					}
				}
				
				})
				
			}
			
			
			
			});
        
    });
</script>

<div class="Center">

	<div class="Scaler">
		<div class="form">
				<div class="Formtitle"><center>Admin Administrator</center></div>
                
                <input type="hidden" value="1"  id="name">
                <div class="FormLable">User Name :</div><input class="FormText" id="User"  />
                <div class="FormLable">Password :</div><input class="FormText" id="Pass" type="password"  />
                <div class="FormBtm">
                	<div class="FormBtn"> Submit </div>
                </div>
		</div>
	</div>
</div>
<style>
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
		text-align: right;
		width: 178px;
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
		width: 636px;
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
		margin-left: 174px;
		width: 650px;
		border:1px solid #CCC;
	}
    
</style>
