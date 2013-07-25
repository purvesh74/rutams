
<script type="text/javascript">
	$(document).ready(function(e) {
		//var Ar = ['User Name','123123'];
		var Ar = ['Enter The Name'];
		
		var Pr = $('.form').children();
		
		$('.FormText').focusin(function(){
			if($(this).val() == Ar[(Pr.index($(this))/2)-1])
			{
				$(this).val(Ar[""]);
			}
		});
		
		$('.FormText').focusout(function(){
			Valid((Pr.index($(this))/2)-1,$(this).val(),$(this))
		});
		var Msg = "";
		function Valid(Num,Val,Obj)
		{
			var rt = false;
			if(Val == "" )
			{
				Obj.val(Ar[(Pr.index($(Obj))/2)-1]);
				Obj.css('border','#f00 solid 1px');
				$('.Er').eq(Num).css('visibility','visible').text('Fill blank..');
				return (false);
			}
			else
			{
			
			if(Num == 0)
				{
					if ( Val == Ar[(Pr.index($(Obj))/2)-1])  
					{  
						Msg +=  'Enter Category. \n';
						$('.Er').eq(Num).css('visibility','visible').text('Enter The Category. \n');
						rt = false;  
						
					}  else {
						rt = true;
$('.Er').eq(Num).css('visibility','hidden');  
					}
				}
			
				
				if(rt == false)
				{
					Obj.css('border','#f00 solid 1px');
					return false;
				}
				else
				{
					Obj.css('border','none');
					return true;
				}
				}
		}
		
		$('.FormText').keypress(function(Key) {
			  if(Key.keyCode == 13){
				  onCheck();
			  }
		});
		
		$('.FormBtn').click(onCheck);
			
		function onCheck()
		{
			Blank = 0;
			Msg = "";
			$('.FormText').each(function(index) {
				if(!Valid(index,$(this).val(),$(this)))
				{
					Blank  += 1;
				}
       		});  
			if(Blank == 0)
			  {
			var name = document.getElementById("name").value;
			alert(name);
			
				$.ajax({
					
					type:"POST",
					data: "name="+name,
					url:"<?php echo $base ?>index.php?admin/newdoctorcat/insertdata/",
					success: function(html){
					if(html == 1)
					{
						alert("Doctor Category Save Successfully. ");
						document.getElementById("name").value = "";
						document.getElementById("name").focus();
					}
					else if(html == 0)
					{
							alert("Doctor Category Not Save Successfully. ");	
					}
					else
					{
							alert("Try Again Same Error. ");
					}
					}
				});	
			  
			  }
		}
				
		

$('.FormBtn1').click(function (){
			var name = document.getElementById("name").value;
			var id = document.getElementById("id").value;
			
			//alert(fname+lname+pass+email+contact+mobile);
			
				$.ajax({
					
					type:"POST",
					data: "name="+name+"&id="+id,
					url:"<?php echo $base?>index.php?admin/newdoctorcat/updatedata/",
					success: function(html){
					if(html == 1)
					{
						alert("Doctor Category Update Successfully. ")
						//document.getElementById("Contact").value = "";
//						document.getElementById("Contact").focus();
//						document.getElementById("Email").value = "";
//						document.getElementById("Email").focus();
//						document.getElementById("FisrtName").value = "";
//						document.getElementById("FisrtName").focus();
//						document.getElementById("LastName").value = "";
//						document.getElementById("Mobile").focus();
//						document.getElementById("Mobile").value = "";
//						document.getElementById("LastName").focus();
//						document.getElementById("Password").value = "";
//						document.getElementById("Password").focus();
					}
					else if(html == 0)
					{
							alert("Doctor Category Not Update Successfully. ");	
					}
					else
					{
							alert("Try Again Same Error. ");
					}
					}
				});	
		
		});


		var Dr = ['prashant','Bhagat','123123123','123123123','Prashnt@gmail.com','+918866857118','+918866857118'];
		$('.FormText').each(function(index) {
				$(this).val(Ar[index]);
       	});
    });
</script>
<div class="Center">
	<div class="Scaler">
		<div class="form">
        	<?php
            if(isset($select))
            {
				foreach($select as $r)
				{
					echo '<input type="hidden" id="id" value="'.$r->drc_id.'">';
				echo '<div class="Formtitle">Update Doctor Category</div>
                <div class="FormLable1">Category Name :</div><input class="FormText1" value="'.$r->drcatname.'"  id="name" />
                <div class="FormBtm">
                	<div class="FormBtn1"> Submit </div>
                </div>';
	
				}
			}
			else
			{
			
			?>
				<div class="Formtitle">Add Doctor Category</div>
                <div class="FormLable">Category Name :</div><input class="FormText"    id="name" />
                <div class="FormBtm">
                	<div class="FormBtn"> Submit </div>
                </div>
                <?php
    					}            
	                ?>
		
        </div>
        <div class="Error">
                <div class="Er"></div>
        </div>
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
    height: 50px;
    margin-left: -100px;
    margin-top: 54px;
    width: 100px;
  
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
		text-align: right;
		width: 169px;
		float:left;
		margin-bottom:10px;
	}
	
	.FormBtn1
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
	.FormText1{
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
	.FormLable1{
		color: #333333;
		height: 35px;
		line-height: 35px;
		text-align: right;
		width: 169px;
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
