<script>
	$(document).ready(function() {
		
		$(".FormBtn").click(function(){
			
			if(document.getElementById("titel").value == "")
			{
				alert("Enter The Site Title");
			}
			else
			{
				
				var name = document.getElementById("titel").value;
				var id = document.getElementById("id").value;
				
				alert(name);
				
				$.ajax({
				type:"POST",
				data:"name="+name+"&id="+id,
				url:"<?php echo $base ?>index.php?admin/adminhometemp/insertsitetitle/",
				success: function(html)
				{
					if(html == 1)
					{
						alert("Change Site Title");
					}
					else if(html == 0)
					{
						alert("No Change Site Title");
						
					}
					else
					{
						alert("Same Error. Try Again");
					}
				}
				
				})
				
			}
			
			
			
			});
        
		
		
		$(".FormBtn2").click(function(){
			
			if(document.getElementById("hcolor").value == "")
			{
				alert("Enter The Color Code");
			}
			else
			{
				
				var name = document.getElementById("hcolor").value;
				var id = document.getElementById("id").value;
				
				alert(name);
				
				$.ajax({
				type:"POST",
				data:"name="+name+"&id="+id,
				url:"<?php echo $base ?>index.php?admin/adminhometemp/headercolor/",
				success: function(html)
				{
					if(html == 1)
					{
						alert("Change Header Color");
					}
					else if(html == 0)
					{
						alert("No Change Header Color ");
						
					}
					else
					{
						alert("Same Error. Try Again");
					}
				}
				
				})
				
			}
			
			
			
			});
			
			
		$(".FormBtn3").click(function(){
			
			if(document.getElementById("fcolor").value == "")
			{
				alert("Enter The Color Code");
			}
			else
			{
				
				var name = document.getElementById("fcolor").value;
				var id = document.getElementById("id").value;
				
				alert(name);
				
				$.ajax({
				type:"POST",
				data:"name="+name+"&id="+id,
				url:"<?php echo $base ?>index.php?admin/adminhometemp/footercolor/",
				success: function(html)
				{
					if(html == 1)
					{
						alert("Change Footer Color");
					}
					else if(html == 0)
					{
						alert("No Change Footer Color ");
						
					}
					else
					{
						alert("Same Error. Try Again");
					}
				}
				
				})
				
			}
			
			
			
			});
        
		
		$(".FormBtn4").click(function(){
			
			if(document.getElementById("footertitle").value == "")
			{
				alert("Enter Foorter Title");
			}
			else
			{
				
				var name = document.getElementById("footertitle").value;
				
				var id = document.getElementById("id").value;
				
				alert(name);
				
				$.ajax({
				type:"POST",
				data:"name="+name+"&id="+id,
				url:"<?php echo $base ?>index.php?admin/adminhometemp/fcontant/",
				success: function(html)
				{
					if(html == 1)
					{
						alert("Change Footer Contant");
					}
					else if(html == 0)
					{
						alert("No Change Footer Contant Color ");
						
					}
					else
					{
						alert("Same Error. Try Again");
					}
				}
				
				})
				
			}
			
			
			
			});

		$(".FormBtn5").click(function(){
			
			if(document.getElementById("contact").value == "")
			{
				alert("Enter Contact no");
			}
			else
			{
				
				var name = document.getElementById("contact").value;
				
				var id = document.getElementById("id").value;
				
				alert(name);
				
				$.ajax({
				type:"POST",
				data:"name="+name+"&id="+id,
				url:"<?php echo $base ?>index.php?admin/adminhometemp/contact/",
				success: function(html)
				{
					if(html == 1)
					{
						alert("Change Contact No");
					}
					else if(html == 0)
					{
						alert("No Change Contact No ");
						
					}
					else
					{
						alert("Same Error. Try Again");
					}
				}
				
				})
				
			}
			
			
			
			});

 $('#popupBoxClose').click( function() {           
            unloadPopupBox();
        });
       
        $('#container').click( function() {
            unloadPopupBox();
        });
    });
	
	function changelogo()
	{
	loadPopupBox();
	}
		

        function unloadPopupBox() {    // TO Unload the Popupbox
            $('#popup_box').fadeOut("slow");
            $("#container").css({ // this is just for style       
                "opacity": "1" 
            });
        }   
       
        function loadPopupBox() {    // To Load the Popupbox
            $('#popup_box').fadeIn("slow");
            $("#container").css({ // this is just for style
                "opacity": "0.3" 
            });        
        }    

</script>

<script type="text/javascript" src="<?php echo $base?>jscolor.js"></script>

<div class="Center">

	<div class="Scaler">
    	
        <?php
		
		
				if(isset($update))
				{
					if($update == 1)
					{
						echo '<script>alert("Change Logo Successfully")</script>';
					}
					else if($update == 0)
					{
						echo '<script>alert("Not Change Logo Successfully")</script>';
					}
				}
				
		if(isset($show))
			{
				foreach($show as $r)
					{
		?>
    	
    <div class="form">
				<div class="Formtitle">Site Title</div>
                <div class="FormLable">Title :</div> 
                <input type="hidden" id="id" value="<?php echo $r->id ?>">
                <input class="FormText" id="titel" value="<?php echo $r->sitetitle  ?>"  type="text" name="title"  />
                <div class="FormBtm">
                	<div class="FormBtn"> Submit </div>
                </div>
		</div>
        
        <div class="form">
				<div class="Formtitle">Site Logo</div>
                <div class="FormLable">Logo :</div>
                
				<?php
				
				if($r->logo == "")
				{
                	echo '<img src="'.$base.'upload/bay.png" width="200" height="200" style="border:1px solid">';
				}
				else
				{
					echo '<img src="'.$base.'upload/'.$r->logo.'" width="200" height="200" style="border:1px solid">';
				}
				?>
                <div class="FormBtm">
                	<div class="FormBtn1" onClick="changelogo()"> Submit </div>
                </div>
		</div>
        
		<div class="form">
				<div class="Formtitle">Header</div>
                <div class="FormLable">Header Color:</div><input  class="FormText" id="hcolor" value="<?php echo $r->headerlinecolor  ?>" name="color"   />
                <div class="FormBtm">
                	<div class="FormBtn2"> Submit </div>
                </div>
		</div>
        
        
        <div class="form">
				<div class="Formtitle">Footer</div>
                <div class="FormLable">Footer Color:</div><input class="FormText"  id="fcolor" value="<?php echo $r->footerlinecolor  ?>" name="color" />
                <div class="FormBtm">
                	<div class="FormBtn3"> Submit </div>
                </div>
		</div>
		
        <div class="form">
				<div class="Formtitle">Footer Contante</div>
                <div class="FormLable">Footer :</div><input class="FormText" id="footertitle" value="<?php echo $r->footer  ?>" type="text" name="footertitle"  />
                <div class="FormBtm">
                	<div class="FormBtn4"> Submit </div>
                </div>
		</div>
        
         <div class="form">
				<div class="Formtitle">Contact No</div>
                <div class="FormLable">Number :</div><input class="FormText" id="contact" value="<?php echo $r->Contact  ?>" type="text" name="contact"  />
                <div class="FormBtm">
                	<div class="FormBtn5"> Submit </div>
                </div>
		</div>
        
        <?php
					}
			}
		?>
	</div>
</div>

<div id="popup_box">    <!-- OUR PopupBox DIV-->
        <h1>Change Site Logo</h1>
        <a id="popupBoxClose">X</a>
       <div class="c">
      	<div class="c11"> 	
    	<?php  echo form_open_multipart('admin/adminhometemp/do_upload/');?>

            <input type="hidden" name="id" value="<?php echo $r->id ?>"  />
            <input type="file" name="name"  />
            <input type="submit" name="btnuploadimg" value="Change Logo" />
            </form>
        </div>
       </div>
</div>
       
<style>
#text
{
margin-top:20px;
float:center;
font:VNF-Museo;
font-size:40px;
color: #333;
margin-left:auto;
margin-right:auto;
border: 1px solid #000;
}

#video
{
display:none;
width:1024px;
height:278px;
border: 1px solid #000;
}
#popup_box {
   background: none repeat scroll 0 0 #FFFFFF;
    border: 2px solid #FF0000;
    box-shadow: 0 0 5px #FF0000;
    display: none;
    font-size: 15px;
    height: 123px;
    left: 300px;
    margin-left: 15px;
    padding: 15px;
    position: fixed;
    top: 227px;
    width: 600px;
    z-index: 100;
	
    /* additional features, can be omitted */
    border:2px solid #ff0000;      
    padding:15px;  
    font-size:15px;  
    -moz-box-shadow: 0 0 5px #ff0000;
    -webkit-box-shadow: 0 0 5px #ff0000;
    box-shadow: 0 0 5px #ff0000;
 
}

#container {
    background: #d2d2d2; /*Sample*/
    width:100%;
    height:100%;
}

/* This is for the positioning of the Close Link */
#popupBoxClose {
    font-size:20px;  
    line-height:15px;  
    right:5px;  
    top:5px;  
    position:absolute;  
    color:#6fa5e2;  
    font-weight:500;      
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

.FormBtn5
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
a{
	cursor:pointer;}
.FormBtn2
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
.FormBtn3
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
.FormBtn4
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
    margin-bottom: 0;
    margin-left: 9px;
    margin-top: -7px;
    padding-left: 10px;
    padding-right: 10px;
    width: 358px;	}
	.FormLable{
	color: #333333;
    float: left;
    height: 35px;
    line-height: 35px;
    margin-bottom: 0;
    margin-right: 11px;
    margin-top: -7px;
    text-align: right;
    width: 178px}
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
