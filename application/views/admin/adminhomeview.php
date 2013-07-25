<div class="TopBlock">
	<div class="Inneblock"></div>
    <div  class="Midform">
    	<div class="Title">Add as Visit</div>
    	<div class="TopBox">Complains :</div><div ><div class="example-container">
					 		<input class="toText"    value=""/>
		</div></div>
        
        <div class="TopBox">Symptoms :</div><div ><div class="example-container">
					 		<input class="toText"  value=""/>
		</div></div>
        
        <div class="TopBox">Diagnosis :</div><div ><div class="example-container">
					 		<input class="toText"   value=""/>
		</div></div>
        <div class="TopBox">Lab tests :</div><div ><div class="example-container">
					 		<input class="toText"   value=""/>
		</div></div>
        
        <div class="TopBox">Fee :</div><div ><div class="example-container">
					 		<input class="toText"   value=""/>
		</div></div>

		<div class="FormBtn" id="SenQuery"> Submit </div>
        <div class="FormBtn" id="cancle"> Cancle </div>
        <div class="MakeSyour"> Use the tabs at top right to view the code for each element of th...</div>
        <div class="Error">
        		<div class="Er"></div>
                <div class="Er"></div>
                <div class="Er"></div>
                <div class="Er"></div>
                <div class="Er"></div>
        </div>
    </div>
    
</div>
<style>
.AEdit
{
	background-color: #FFF;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
    float: left;
    font-size: 15px;
    height: 45px;
    line-height: 45px;
    margin-right: 0;
    padding-left: 10px;
    padding-right: 10px;
    text-align: center;
    width: 25px;	
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
    margin-top: 22px;
    position: absolute;
    right: -88px;
    width: 100px;
    z-index: 3;}
.Title
{
	border-bottom: 1px dotted #CCCCCC;
    float: left;
    font-size: 19px;
    height: 30px;
    line-height: 32px;
    margin-bottom: 11px;
    margin-top: -19px;
    padding-left: 10px;
    padding-right: 10px;
    width: 398px;
}
.MakeSyour
{
	border-top: 1px dashed #CCCCCC;
    color: #666666;
    float: left;
    margin-left: 1px;
    margin-top: 19px;
    padding-left: 20px;
    padding-right: 20px;
    padding-top: 12px;
    width: 378px;
}

.toText {
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
    width: 262px;
}
.TopText
{
	background-color: #0099FF;
    border-radius: 5px 5px 5px 5px;
    float: left;
    height: 35px;
    margin-left: 10px;
    width: 123px;
}
.TopBox
{
border-radius: 10px 10px 10px 10px;
    float: left;
    font-size: 16px;
    height: 35px;
    line-height: 35px;
    margin-left: 10px;
    text-align: center;
    width: 123px;
	
}
.Midform{
 	background-color: #FFFFFF;
    border-radius: 5px 5px 5px 5px;
    float: left;
    height: 390px;
    left: 50%;
    margin-left: -210px;
    margin-top: -190px;
    padding-top: 20px;
    position: absolute;
    top: 50%;
    width: 419px;
}
.Inneblock
{
	width:100%;
	float:left;
	height:100%;
	top:0;
	left:0;
	opacity:0.5;
		background-color:#000;
}
.TopBlock
{
	width:100%;
	height:100%;
	z-index:1000;
	position:fixed;
	top:0;
	left:0;
	display:none;
}
</style>
<div class="Center">
	<div class="Scaler" > 
    	
    	<div style="font-size:22px ;margin-bottom:10px; padding-left:20px;">Appointment Report</div>
        
        <div  style="float:left; margin-top:5px;">
        			
                    <div class="example-container">
                    <input class="FormText"    id="Date1" value=""  style="width: 76px; height: 30px;"/>
                    </div>
        </div>
        <div style="float: left; height: 30px; line-height: 36px; margin-left: 8px;">to</div>
        <div  style="float:left; margin-top:5px;">
                    <div class="example-container">
                    <input class="FormText"    id="Date2" value=""  style="width: 76px; height: 30px;"/>
                    </div>
        </div>
         <div  style="float: left; margin-top: 5px; height: 30px; padding-top: 5px; font-size: 13px;">
         
         </div>
        <div  class="CtrlBtn" id="Dates" style="margin-left:10px; float:left; margin-top:5px;">Send</div>
       	<div  class="CtrlBtn" id="Tomorrow">Tomorrow</div>
        <div  class="CtrlBtn" id="Today">Today</div>
		<div  class="CtrlBtn" id="Yesterday">Yesterday</div>
	</div>
</div>
<div class="Center">
	<div class="Scaler">
    	   <div class="Scaler" >
		<div class="Apoint" style="color:#03F; background-color:#fff;">
        	<div class="Ano">No</div>
        	<div class="Aname">Name</div>
            <div class="Adate">Date</div>
            <div class="Aemail">Email</div>
            <div class="ADoctore">Doctore name</div>
            <div class="ADis">Discription</div>
            <div class="Amore" style="cursor:auto;">View</div>
           
        </div>
    </div>
</div>
<div class="Center">
	<div class="Scaler" id="Data">   
	</div>
</div>
<div class="Center">
	<div class="Scaler">
		
                	<div style="float: left; font-size: 13px; line-height: 13px; margin-top: 15px;">
                      <input type="radio" class="radioSelect" style="float: left; margin-top: 1px; margin-right: 6px; margin-left: 7px;" checked="checked" value="0" name="Visited">
                     Appointment
                     </div>
                    <div style="float: left; font-size: 13px; line-height: 13px; margin-top: 15px;">
                      <input type="radio" class="radioSelect" style="float: left; margin-top: 1px; margin-right: 6px; margin-left: 7px;" value="1" name="Visited">
                     Vaccine
                     </div>
                     <div style="float: left; font-size: 13px; line-height: 13px; margin-top: 15px;">
                      <input type="radio" class="radioSelect"  style="float: left; margin-top: 1px; margin-right: 6px; margin-left: 7px;" value="2" name="Visited">
                     Both
                     </div>
                     
                	

    </div>
</div>
<style>
				.Amore
				{
					background-color: #CCCCCC;
					border-radius: 0 5px 5px 0;
					cursor:pointer;
					float: left;
					font-size: 15px;
					height: 45px;
					line-height: 45px;
					margin-right: 0;
					padding-left: 10px;
					padding-right: 10px;
					text-align: center;
					width: 25px;
				}
				.Ano
				{
					background-color: #CCCCCC;
					
					float: left;
					font-size: 15px;
					height: 45px;
					line-height: 45px;
					margin-right: 1px;
					padding-left: 10px;
					padding-right: 10px;
					text-align: center;
					width: 50px;
					border-radius: 5px 0  0 5px;
				}
			.ADis
				{
					width:240px;
					height:45px;
					line-height:45px;
					font-size:14px;
					
					padding-left:10px;
					padding-right:10px;
					float:left;
					margin-right:1px;
				}
			.ADoctore
				{
					width:125px;
					height:45px;
					line-height:45px;
					font-size:14px;
					
					padding-left:10px;
					padding-right:10px;
					float:left;
					margin-right:1px;
				}
			.Aemail
				{
					width:188px;
					height:45px;
					line-height:45px;
					font-size:14px;
					
					padding-left:10px;
					padding-right:10px;
					float:left;
					margin-right:1px;
				}
			.Adate
				{
					width:125px;
					height:45px;
					line-height:45px;
					font-size:14px;
				
					padding-left:10px;
					padding-right:10px;
					float:left;
					margin-right:1px;
				}
            	.Aname
				{
					float:left;
					width:125px;
					height:45px;
					line-height:45px;
					font-size:14px;
				
					padding-left:10px;
					padding-right:10px;
					margin-right:1px;
				}
            </style>
<style>
.CtrlBtn
{
	background-color: #FFFFFF;
    border-radius: 5px 5px 5px 5px;
    box-shadow: 0 0 3px 0;
    float: right;
    height: 30px;
    line-height: 30px;
    margin-left: -1px;
    margin-right: 8px;
    margin-top: 7px;
    text-align: center;
    width: auto;
	cursor:pointer;
	min-width:62px;
	margin-bottom:10px;
}
.Apoint:hover
{
	background-color:#0CF;
}
.Apoint
{
	width:1024px;
	height:45px;
	float:left;
	background-color:#FFF;
	border-radius:5px;
	margin-bottom:2px;
	line-height:45px;
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
</div>