 <div class="Center">
    	<div class="Scaler">
   
     <div class="Glr">
              	
                <div class="GlrShd"></div>
              	<div class="Gllery">
                	<div class="Wrapper">
    	<div class="Centerer">
        	<div class="Slider">
                	<div class="LeftClick"></div>
                    <div class="RightClick"></div>
                	<div class="SldImg">
                    	<div class="ImgWrapper">
                            <div class="SliderImg" style="background-image:url(<?php echo $base ?>img/Glrimg1.jpg)" ></div>
                            <div class="SliderImg" style="background-image:url(<?php echo $base ?>img/Glrimg2.jpg)"></div>
                            <div class="SliderImg" style="background-image:url(<?php echo $base ?>img/Glrimg3.jpg)"></div>
                            <div class="SliderImg" style="background-image:url(<?php echo $base ?>img/Glrimg4.jpg)"></div>
                            <div class="SliderImg" style="background-image:url(<?php echo $base ?>img/Glrimg5.jpg)"></div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
          <script>
    	$(document).ready(function(e) {
			var Goto = 0;
			var From = 0;
			
            $('.RightClick').click(function(){
				if(Goto == -(645*4))
				{
					Goto = 0;
				}else
				{
					Goto -= 645;
				}
				$('.ImgWrapper').tween({
				   marginLeft:{stop: Goto,time: 0,duration: 1,effect: 'cubicOut',units: 'px'}
				});$.play();
				$('.Selectore').tween({
				   marginLeft:{stop: parseInt(-(Goto/4.245283018867925)),time: 0,duration: 1,effect: 'cubicOut',units: 'px'}
				});
				$.play();
			});
			
			 $('.LeftClick').click(function(){
				if(Goto == 0)
				{
					Goto = -(645*4);
				}else
				{
					Goto += 645;
				}
				$('.ImgWrapper').tween({
				   marginLeft:{stop: Goto,time: 0,duration: 1,effect: 'cubicOut',units: 'px'}
				});$.play();
				$('.Selectore').tween({
				   marginLeft:{stop: parseInt(-(Goto/4.245283018867925)),time: 0,duration: 1,effect: 'cubicOut',units: 'px'}
				});
				$.play();
			});
        });
    </script>      </div>
          <div class="Articals">
                	<div class="ArtPr">
                    	<div class="ArtItem">
                        	<div class="ArtImg">
                            	<div class="ArtImgin"></div>
                            </div>
                          <div class="ArtTitle"> 	
For In-Patient (IPD):</div>
                          <div class="ArtContent">If the new patient gets admitted to the system then a unique record is generated for each patient and patient details along with the room reservation and its case papers and other details will be stored in the system. And also room Allotment is taken care. Once patient gets a discharge then his check out from hospital along with the billing details will be taken care of by the system.
                          <br>
                          If the new patient visits the Doctor in OPD, the system then generate a unique record for each patient and patient details along with the its case papers and other details are stored in the system. Billing details are also taken care of by the system.</div>
                        </div>
                      
                      
                    </div>
                	<div class="ArTitle">TRENDING TOPICS</div>
                  <div class="Dots">
                  	<div class="Dot"></div>
                    <div class="DotNor"></div>
                    <div class="DotNor"></div>
                  </div>
                </div>
              </div>
           
          </div>
   </div></div>       
             
    

    <div class="Center">
    	<div class="Scaler">
         	<div class="Team">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Our facilities</div>
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
        	<div class="Fcontiner">
                <div class="FBox">
                    <div class="FBoxImg" style="background-image:url(<?php echo $base ?>img/P1.png)">
                    </div>
                </div>
                <div class="Ftitle">LABORATORY / PATHOLOGY AUTOMATION :</div>
                <div class="Ftext"><br/>The system keeps track of the laboratories in the hospital. The equipment purchasing, inventory and billing of the purchase will be maintained by the system. The system keeps track of the tests performed on different patients and its records will be maintained by the system.</div>
            </div>
            <div class="Fcontiner">
                <div class="FBox">
                     <div class="FBoxImg" style="background-image:url(<?php echo $base ?>img/P2.png)">
                    </div>
                </div>
                <div class="Ftitle">INVENTORY SYSTEM :</div>
                <div class="Ftext"><br/>The system keeps track of all the inventory of the hospital, which may include various departments such as pharmaceuticals, food and laundry department to name the few. Stock & vendor details are maintained by the system. The invoice, purchase orders, purchase requisitions is generated by the system and detail reports of each transaction will be maintained.</div>
            </div>
            <div class="Fcontiner">
                <div class="FBox">
                     <div class="FBoxImg" style="background-image:url(<?php echo $base ?>img/P3.png)">
                    </div>
                </div>
                <div class="Ftitle">FOOD DERPARTMENT AUTOMATION :</div>
                <div class="Ftext"> <br/>The system keeps track of all the activities related to food department. If some patients are kept on the prescribed diets then it will be informed to the department automatically. Also it keeps track of all the other activities related to this department.</div>
            </div>
            <div class="Fcontiner">
                <div class="FBox">
                     <div class="FBoxImg" style="background-image:url(<?php echo $base ?>img/P4.png)">
                    </div>
                </div>
                <div class="Ftitle">Medicine :</div>
                <div class="Ftext">The pharmaceutical department is a very important part of the hospital. The system keeps track of the inventory. The patient prescription details and the information about the category?wise medicines are stored. The system will inform the user in advance in case of the storage updating and inventory maintenance. The records for each patient and its bill will be maintained by the system and it will be added to the patient bill when he will be discharged. </div>
            </div>
            <div class="DotLine"></div>
        </div>
   </div>
   
  
    <div class="Center">
        <div class="Scaler1">
        	<div class="Team">     Our Great Team</div>
            <div class="Tbox">
            	<div class="Timg"></div>
                <div class="Tlbl">Markus Smith</div>
                <div class="Ttext">Creative Designer and CEO</div>
            </div>
             <div class="Tbox">
            	<div class="Timg"></div>
                <div class="Tlbl">Markus Smith</div>
                <div class="Ttext">Creative Designer and CEO</div>
            </div>
             <div class="Tbox">
            	<div class="Timg"></div>
                <div class="Tlbl">Markus Smith</div>
                <div class="Ttext">Creative Designer and CEO</div>
            </div>
             <div class="Tbox" style="border-right:1px solid #999; width:254px">
            	<div class="Timg"></div>
                <div class="Tlbl">Markus Smith</div>
                <div class="Ttext">Creative Designer and CEO</div>
            </div>
        </div>
    </div>

<style>
.privacy a {
    color: #9ACC67;
}
.privacy {
    color: #1A1A1A;
    height: 37px;
    margin-left: 225px;
    padding-top: 6px;
	margin-top: 10px;
}
.RightClick {
    background-image: url(<?php echo $base ?>img/RightBtn.png);
    cursor: pointer;
    height: 44px;
    margin: 166px -30px -133px 600px;
    position: absolute;
    width: 44px;
    z-index: 10;
}
.LeftClick {
    background-image: url(<?php echo $base ?>img/LeftBtn.png);
    cursor: pointer;
    float: left;
    height: 44px;
    margin-left: 0;
    margin-right: -55px;
    margin-top: 164px;
    position: absolute;
    width: 44px;
    z-index: 10;
}
.ImgWrapper {
    float: left;
    height: 300px;
    width: 3225px;
}
.Thumb {
    background-image: url("Slider/ThumbImg2.png");
    border-left: 1px solid #CCCCCC;
    border-right: 1px solid #CCCCCC;
    cursor: pointer;
    float: left;
    height: 70px;
    width: 210px;
}
.SliderSwaper {
    float: left;
    height: 70px;
    margin-left: 76px;
    width: 100%;
}
.OrgLine {
    border-bottom: 5px solid #FF9900;
    float: left;
    width: 100%;
}
.SliderImg {
    background-image: url(img/page1-img1.jpg);
    float: left;
    height: 366px;
    width: 645px;
}
.SldImg {
    float: left;
    height: 366px;
    margin-left: 0;
    margin-top: 0;
    overflow: hidden;
    position: absolute;
    width: 645px;
}
.Slider {
    float: left;
    width: 100%;
}
</style>