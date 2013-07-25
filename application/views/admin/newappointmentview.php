<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

<script>
$(function() {
$("#datepick" ).datepicker();
});
</script>
<script type="text/javascript">
	$(document).ready(function() { 

		var Ar = ['Enter The Full  name','Select Date','Select Date','Select Date','Enter Description','Enter The Contact No'];
		
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
						Msg +=  'Enter Full name. \n';
						$('.Er').eq(Num).css('visibility','visible').text('Enter Full name. \n');
						rt = false;  
						
					}  else {
						rt = true;
$('.Er').eq(Num).css('visibility','hidden');  
					}  
				}
				
				 else if(Num == 1)
				{
					if (Val == Ar[(Pr.index($(Obj))/2)-1])  
					{  
						Msg +=  'Select Date. \n';
						$('.Er').eq(Num).css('visibility','visible').text('Select Date. \n');
						rt = false;  
						
					}  else {
						rt = true;
$('.Er').eq(Num).css('visibility','hidden');  
					}  
				}
				
				 else if(Num == 2)
				{
					var re  = /^(\+91-|\+91|0)?\d{10}$/;
					if(Val == 'Select'){
						Msg += 'Plz Select any one... \n';
						$('.Er').eq(Num).css('visibility','visible').text('Plz Select any one... \n');
						rt = false;
					}
					else
					{
						rt = true;
$('.Er').eq(Num).css('visibility','hidden');
					}
			
				}
				 else if(Num == 3)
				{
					var re  = /^(\+91-|\+91|0)?\d{10}$/;
					if(Val == 'Select'){
						Msg += 'Plz Select any one... \n';
						$('.Er').eq(Num).css('visibility','visible').text('Plz Select any one... \n');
						rt = false;
					}
					else
					{
						rt = true;
$('.Er').eq(Num).css('visibility','hidden');
					}
			
				}
				 else if(Num == 4)
				{
					if (Val == Ar[(Pr.index($(Obj))/2)-1])  
					{  
						Msg +=  'Enter Weight. \n';
						$('.Er').eq(Num).css('visibility','visible').text('Enter Description. \n');
						rt = false;  
						
					}  else {
						rt = true;
$('.Er').eq(Num).css('visibility','hidden');  
					}  
				}
				else if(Num == 5)
				{
					var re  = /^(\+91-|\+91|0)?\d{10}$/;
					if(!re.test(Val)){
						Msg += 'invalid mobile no. \n';
						$('.Er').eq(Num).css('visibility','visible').text('invalid mobile no. \n');
						rt = false;
					}
					else
					{
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
			
		var Blank = 0;
		Msg = "";
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
			var datep = document.getElementById("datepick").value;
			var dsc = document.getElementById("dsc").value;
			var pname = document.getElementById("pname").value;
			var dname = document.getElementById("Doctorename").value;
			var stype = document.getElementById("stype").value;
			var Contact = document.getElementById("Contact").value;
			
			//alert(fname+lname+pass+email+contact+mobile);
			
				$.ajax({
					
					type:"POST",
					data: "pname="+pname+"&dsc="+dsc+"&datep="+datep+"&dname="+dname+"&stype="+stype+"&Contact="+Contact,
					url:"<?php echo $base?>index.php?admin/newappointment/insertdata/",
					success: function(html){
					if(html == 1)
					{
						alert("Appointment Save Successfully. ");
			 
			 document.getElementById("datepick").value = "";
			 document.getElementById("datepick").focus();
			 
			 document.getElementById("dsc").value = "";
			 document.getElementById("dsc").focus();
			 document.getElementById("pname").value = "";
			 document.getElementById("pname").focus();
			 document.getElementById("Doctorename").value = "";
			 document.getElementById("Doctorename").focus();
			 document.getElementById("stype").value = "";
			 document.getElementById("stype").focus();
			 document.getElementById("Contact").value = "";
			 document.getElementById("Contact").focus();
			
					}
					else if(html == 0)
					{
							alert("Appointment not Save Successfully. ");	
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
			var datep = document.getElementById("datepick").value;
			var dsc = document.getElementById("dsc").value;
			var pname = document.getElementById("pname").value;
			var dname = document.getElementById("Doctorename").value;
			var id = document.getElementById("id").value;
			var Contact = document.getElementById("Contact").value;
		
				$.ajax({
					
					type:"POST",
					data: "pname="+pname+"&dsc="+dsc+"&datep="+datep+"&dname="+dname+"&id="+id+"&Contact="+Contact,
					url:"<?php echo $base?>index.php?admin/newappointment/updatedata/",
					success: function(html){
					if(html == 1)
					{
						alert("Appointment Update Successfully. ");
						
			 document.getElementById("datepick").value = "";
			 document.getElementById("datepick").focus();
			 
			 document.getElementById("dsc").value = "";
			 document.getElementById("dsc").focus();
			 document.getElementById("pname").value = "";
			 document.getElementById("pname").focus();
			 document.getElementById("Doctorename").value = "";
			 document.getElementById("Doctorename").focus();
			 document.getElementById("stype").value = "";
			 document.getElementById("stype").focus();
			 document.getElementById("Contact").value = "";
			 document.getElementById("Contact").focus();
			
					}
					else if(html == 0)
					{
							alert("Appointment Update Successfully. ");	
					}
					else
					{
							alert("Try Again Same Error. ");
					}
					}
				});	
		
		});




				 function split( val ) {
                return val.split( /,\s*/ );
        }
                function extractLast( term ) {
                 return split( term ).pop();
        }

        $("#pname").bind( "keydown", function( event ) {
                if ( event.keyCode === $.ui.keyCode.TAB &&
                        $( this ).data("autocomplete" ).menu.active ) {
                    event.preventDefault();
                }
            })
        
		    .autocomplete({
                source: function( request, response ) {
					
				$.ajax({ url: "<?php echo $base; ?>index.php?admin/newappointment/autosearc",
				data: { term: $("#pname").val()},
				dataType: "json",
				type: "POST",
				success: function(data){
					response(data);
					
				}
				
				});
                },
        
		        search: function() {
                    var term = extractLast( this.value );
                    if ( term.length < 1 ) {
                        return false;
                    }
                },
        
		        focus: function() {
        
		            return false;
                },
        
		        select: function( event, ui ) {
                    var terms = split( this.value );
                    terms.pop();
                    terms.push( ui.item.value );
					
                    terms.push("");
                    this.value = terms.join("");
                    return false;
                }
            });
		


		
    });

function nokey(evt)
{
	var cno = (evt.which) ? evt.which : event.keycode;
	if(cno != 46 && cno  > 31 && (cno < 48 || cno >57))
	return false;
}

</script>
<div class="Center">
	<div class="Scaler">
		<div class="form">
        	<?php
            if(isset($select))
            {
				
				foreach($select as $r)
				{
					echo '<input type="hidden" id="id" value="'.$r->id.'">';
				echo '<div class="Formtitle">Update Appointment</div>
                <div class="FormLable1">Patient Name :</div><input class="FormText1" value="'.$r->pname.'"  id="pname" />
                <div class="FormLable1">Appointment Date :</div><input class="FormText1"  value="'.$r->app_date.'" id="datepick" />
                <div class="FormLable1">Doctor Id:</div><input class="FormText1"  value="'.$r->dr_id.'" id="Doctorename" />
                <div class="FormLable1">Description :</div><input class="FormText1" value="'.$r->description.'" id="dsc" />
               	<div class="FormLable1">Contact :</div><input class="FormText1" value="'.$r->app_contactno.'" id="Contact" />
               	
				<div class="FormBtm">
                	<div class="FormBtn1"> Submit </div>
                </div>';
	
				}
			}
			else
			{
			
			?>
				<div class="Formtitle">New Appointment</div>
                <div class="FormLable">Patient Name :</div><input class="FormText"    id="pname" />
                <div class="FormLable">Appointment Date :</div><input class="FormText"   id="datepick" />
                <div class="FormLable">Select Doctor :</div><Select class="FormText"  id="Doctorename">
                <option value="Select">Select doctore....</option>
                <?php
				if(isset($selectdoctor))
				{
					foreach($selectdoctor as $r)
					{
					echo '<option value="'.$r->d_id.'">'.$r->fname.'</option>';						
					}
				}
				else
				{
					echo '<option value="Select">No Found</option>';	
				}
				?>
				 </Select>
                <div class="FormLable">Select Type :</div><Select class="FormText"  id="stype">
                <option value="Select">Select Type....</option>
                <?php
				if(isset($selectservice))
				{
					foreach($selectservice as $r)
					{
						echo '<option value="'.$r->at_id.'">'.$r->appname.'</option>';						
					}
				
				}
				else
				{
					echo '<option value="Select">No Found</option>';	
				}
				?>
				 </Select>
                 
                <div class="FormLable">Description :</div><input class="FormText"    id="dsc" />
               	<div class="FormLable">Contact No :</div><input class="FormText" onkeypress="return nokey(event)"   id="Contact" />
                
                <div class="FormBtm">
                	<div class="FormBtn"> Submit </div>
                
                </div><?php
    					}            
	                ?>
		</div>
        <div class="Error">
        		<div class="Er"></div>
                <div class="Er"></div>
                <div class="Er"></div>
                <div class="Er"></div>
                <div class="Er"></div>
                <div class="Er"></div>
                <div class="Er"></div>
                <div class="Er"></div>
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
    height: 100px;
    margin-left: -100px;
    margin-top: 56px;
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
