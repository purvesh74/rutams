<div>
<div class="Ftr" style="background-color:<?php if(isset($show))
	   {
			foreach($show as $r)
			 {
			  echo $r->footerlinecolor;
			 }
		}
?>">
<?php 
if(isset($show))
	   {
			foreach($show as $r)
			 {
			  echo $r->footer ;
			 }
		}
								  
?>
</div>
   </div>
</body>