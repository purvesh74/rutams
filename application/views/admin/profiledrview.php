<script type="text/javascript">
	function profileimg()
		{
			loadPopupBox();
			$(".c1").empty();
			alert("veer");
		
		}
	 $('#popupBoxClose').click( function() {           
            unloadPopupBox();
        });
       
        $('#container').click( function() {
            unloadPopupBox();
        });

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
  
	$(document).ready(function() {
       
	$(".FormBtn").click(function(){
		
		loadPopupBox();
		$(".c11").empty();
		});
		
		
	 $('#popupBoxClose').click( function() {           
            unloadPopupBox();
        });
       
        $('#container').click( function() {
            unloadPopupBox();
        });

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
    });

</script>

<div class="Center">
	<div class="Scaler">
		<div class="form">
        		
				<div class="Formtitle">Profile</div>
                
                <?php
				if(isset($update))
				{
					if($update == 1)
					{
						echo '<script>alert("Reord Update")</script>';
					}
					else if($update == 0)
					{
						echo '<script>alert("Reord Not Update")</script>';
					}
				}
				
				if(isset($select))
				{
					foreach($select as $row)
					{
					
					echo '<table align="center"  width="75%" border="0">';
					echo '
					<tr>
					<td width="25%" valign="top"><div class="FormLable">Profile Img</div></td><td>';
					
					if($row->img == "")
					{
						echo '<img style="cursor:pointer" src="'.$base.'upload/bay.png" width="100px" onClick="profileimg()" height="100px">';
					}
					else
					{
						echo '<img style="cursor:pointer;border:1px solid;" src="'.$base.'upload/'.$row->img.'" width="100px" onClick="profileimg()" height="100px">';
					}
					echo '</td>
					</tr>
					
					
					<tr>
					<td><div class="FormLable">Category Name</div></td><td>'.$row->drcatname.'</td>
					</tr>
					<tr>
					<td><div class="FormLable">Name</div></td>	<td>'.$row->fname.'</td>
					</tr>
					<tr>
					<td><div class="FormLable">Address</div></td>	<td>'.$row->address.'</td>
					
					</tr>
					<tr>
					<td><div class="FormLable">Birth Date</div></td>	<td>'.$row->bdate.'</td>
					
					</tr>
					
					<tr>
					<td><div class="FormLable">Email</div></td>	<td>'.$row->email.'</td>
					
					</tr>
					<tr>
					<td><div class="FormLable">Degree</div></td>	<td>'.$row->degree.'</td>
					
					</tr>
					<tr>
					
					<td><div class="FormLable">Checkup</div></td><td>'.$row->checkup_for_patient.'</td>
						
					</tr>
					<tr>
					<td><div class="FormLable">Date</div></td><td>'.$row->date.'</td>
					
					</tr>
					<tr>
					<td><div class="FormLable">Mobile No</div></td>	<td>'.$row->mobileno.'</td>
					
					
					</tr>
					<tr>
					<td><div class="FormLable">Contact No</div></td>	<td>'.$row->contactno.'</td>
					
					
					</tr>
					<tr>
					<td colspan="2" align="left"><div class="FormBtm">
                	<div class="FormBtn" > Edit </div>
                </div></td>
					</tr>
					';
					
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
<div id="popup_box">    <!-- OUR PopupBox DIV-->
        <h1>About Your Self</h1>
        <a id="popupBoxClose">X</a>
       <div class="c">
      	<div class="c11"> 	
    	<?php  echo form_open_multipart('admin/Profiledr/do_upload/');?>

            <input type="hidden" name="title"  />
            <input type="file" name="name"  />
            <input type="submit" name="btnuploadimg" value="Change Profile Img" />
            </form>
        </div>
        <div class="c1"> 	
      
    	 <form action="<?php echo $base ?>index.php?admin/Profiledr/editdata/" method="post" >
			<table border="0" width="100%">
        		    <tr>
					<td>Category ID</td><td><?php echo $row->drcatname ?></td>
					</tr>
					<tr>
					<td>Name</td>	<td><input type="text" name="name" value="<?php echo $row->fname ?>" ></td>
					</tr>
					<tr>
					<td>Address</td>	<td><input type="text" name="add" value="<?php echo $row->address ?>" ></td>
					
					</tr>
					<tr>
					<td>Birth Date</td>	<td><input type="text" name="bdate" value="<?php echo $row->bdate ?>" > Example :- DD/MM/YYYY</td>
					
					</tr>
					
					<tr>
					<td>Email</td>	<td><?php echo $row->email ?></td>
					
					</tr>
					<tr>
					<td>Degree</td>	<td><input type="text" name="degree" value="<?php echo $row->degree ?>" ></td>
					
					</tr>
					
					<tr>
					
					<td>Checkup</td><td><input type="text" name="cfp" value="<?php echo $row->checkup_for_patient ?>" ></td>
						
					</tr>
					<tr>
					<td>Date</td><td><?php echo $row->date ?></td>
					
					</tr>
					<tr>
					<td>Mobile No</td>	<td><input type="text" name="mno" value="<?php echo $row->mobileno ?>" ></td>
					
					
					</tr>
					<tr>
					<td>Contact No</td>	<td><input type="text" name="cno" value="<?php echo $row->contactno ?>" ></td>
					
					
					</tr>
                    <tr>
                    <td colspan="2">
                    
					<input type="submit" name="btnupload" value="Update" /></td>
                    </tr></table>
            </form>
        </div>
        
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
</div>
<style>
a{ 
cursor: pointer; 
text-decoration:none; 
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
    float: left;
    height: 13px;
    line-height: 35px;
    margin-bottom: 10px;
    margin-top: -11px;
    text-align: center;
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
		
    float: left;
    font-size: 19px;
    height: 45px;
    line-height: 35px;
    padding-left: 14px;
    width: 16%;}
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
    display:none; /* Hide the DIV */
    position:fixed;  
    _position:absolute; /* hack for internet explorer 6 */  
  height: 450px;  
    width:600px;  
    background:#FFFFFF;  
    left: 300px;
    top: 50px;
    z-index:100; /* Layering ( on-top of others), if you have lots of layers: I just maximized, you can change it yourself */
    margin-left: 15px;  
   
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

</style>
