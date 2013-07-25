    <div class="Center">
    	<div class="Scaler">
         	<div class="Team1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Patient And Families</div>
        </div>
    </div>
    
   <div class="Center">
    	<div class="Scaler">
        	<div class="MidLine"></div>
            <div class="Cmt"></div>
        </div>
   </div>
   <div class="Center">
    	<div class="Scaler">
		<?php
		
		if(isset($select))
		{
    echo "<table>";
 
    $num_cols = 4; //We set the number of columns
    $current_col = 0;
foreach($select as $row):
if($current_col == "0")
echo "<tr>"; //Creates a new row if $curent_col equals to 0
?>
<td>     

             <div class="Tbox">
            	<div class="Timg"></div>
                <div class="Tlbl"><?php echo $row->fname ?></div>
                <div class="Ttext"><?php echo $row->description ?></div>
            </div>
<!--
   	<div class="Fcontiner">
                <div class="Ftitle"><?php// echo $row->fname ?></div>
                <div class="Ftext"><br/> <?php
				 //echo '<table>
				 //<tr><td><b>Patient No</b></td></tr><tr><td>'.$row->p_id.'</td></tr>
				 
				// <tr><td><b>Description</b></td></tr><tr><td>'.$row->description.'</td></tr>
				 //<tr><td><b>Age</b></td></tr><tr><td> '.$row->age.'</td></tr>
				 //<tr><td><b>Contact</b></td></tr><tr><td> '.$row->mobileno.'</td></tr>
				// </table>';
				   
				 
				 
				 ?></div>
            <div class="DotLine"></div>
            </div>-->
     
</td>
<?php 
   if($current_col == $num_cols-1){ // Close the row if $current_col equals to 2 in the example ($num_cols -1)
       echo "</tr>";
       $current_col = 0;
   }else{
       $current_col++;
   }
endforeach;
echo "</table>";
			
		}
		?>
           
   </div>
   </div>
<style>
img{
	
    border-radius: 5px 5px 5px 5px;
    	width:242px;
	height:141px;
	margin-top:4px;
	margin-left:4px;
}
</style>