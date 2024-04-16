
<link href="popup_files/css/styles.css" rel="stylesheet" media="screen"  />

<!-- Validation on Forgot Registration Number -->



<script type="text/javascript" src="popup_files/js/jquery.js" ></script>
<script  type="text/javascript" language="javascript">
$(document).ready(function(){
	$(".QTPopup").css('display','none')
	$(".lnchPopop").click(function(){
		$(".QTPopup").animate({width: 'show'}, 'slow');})
		$(".closeBtn").click(function(){			
			$(".QTPopup").css('display', 'none');
		})
})
</script>


<div class="QTPopup" style="display:none">
	<div class="popupGrayBg"></div>
	<div class="QTPopupCntnr">
		<div class="gpBdrLeftTop"></div>
		<div class="gpBdrRightTop"></div>
		<div class="gpBdrTop"></div>
		<div class="gpBdrLeft">
			<div class="gpBdrRight">
				<div class="caption">
					Get my Registration No
				</div>
				<a href="#" class="closeBtn" title="Close"></a>
				
				<div class="content">
					
                    <form id="frmget_reg" method="post" action="req_email.php" onsubmit="return validate_pop()">
                    
                    <table width="100%" cellpadding="5" cellspacing="0" class="b_text">
						<tr>
							<td>Name</td>
							<td width="260">
								<div class="titlebarLeftc">
								<div class="titlebarRightc">
								<div class="titlebar" style="width:250px;">
                                <input name="txtpop_name" type="text" value="" id="txtpop_name" style="border:0px;  background:none; margin-top:5px; width:245px;" class="validate[required] text-input" />
								</div>
								</div>
								</div> 
							</td>
						</tr>
                        
                        <tr><td colspan="2">&nbsp;</td> </tr>

                        
                        <tr>
							<td>Year of Graduation</td>
							<td width="260">
								<div class="titlebarLeftc">
								<div class="titlebarRightc">
								<div class="titlebar" style="width:250px;">
                                <input name="txtpop_year" type="text" value="" id="txtpop_year" style="border:0px;  background:none; margin-top:5px; width:245px;" class="validate[required] text-input" />
								</div>
								</div>
								</div> 
							</td>
						</tr>
                        
                         <tr><td colspan="2">&nbsp;</td> </tr>
                        
                         <tr>
							<td>Discipline (BIT, BICSE)</td>
							<td width="260">
								<div class="titlebarLeftc">
								<div class="titlebarRightc">
								<div class="titlebar" style="width:250px;">
                                <input name="txtpop_dicipline" type="text" value="" id="txtpop_dicipline" style="border:0px;  background:none; margin-top:5px; width:245px;" class="validate[required] text-input" />
								</div>
								</div>
								</div> 
							</td>
                          </tr>
                          
                           <tr><td colspan="2">&nbsp;</td> </tr>
                            
                          <tr>
							<td>Degree (MS, PhD, UG)</td>
							<td width="260">
								<div class="titlebarLeftc">
								<div class="titlebarRightc">
								<div class="titlebar" style="width:250px;">
                                <input name="txtpop_degree" type="text" value="" id="txtpop_degree" style="border:0px;  background:none; margin-top:5px; width:245px;" class="validate[required] text-input" />
								</div>
								</div>
								</div> 
							</td>
						</tr>
                        
                         <tr><td colspan="2">&nbsp;</td> </tr>
						
                           <tr>
							<td>Contact No</td>
							<td width="260">
								<div class="titlebarLeftc">
								<div class="titlebarRightc">
								<div class="titlebar" style="width:250px;">
                                <input name="txtpop_contact" type="text" value="" id="txtpop_contact" style="border:0px;  background:none; margin-top:5px; width:245px;" class="validate[required] text-input" />
								</div>
								</div>
								</div> 
							</td>
						</tr>
                        
                        <tr><td colspan="2">&nbsp;</td> </tr>
                        
                        <tr>
							<td>Email</td>
							<td width="260">
								<div class="titlebarLeftc">
								<div class="titlebarRightc">
								<div class="titlebar" style="width:250px;">
                                <input name="txtpop_email" type="text" value="" id="txtpop_email" style="border:0px;  background:none; margin-top:5px; width:245px;" class="validate[required,custom[email]]" />
								</div>
								</div>
								</div> 
							</td>
						</tr>
					
                     <tr><td colspan="2">&nbsp;</td> </tr>
						<tr>
							<td colspan="2">Message (If any)</td>
						</tr>
                    
                    	<tr>
	                    <td colspan="2" width="260">
								<textarea name="txtpop_msg" id="txtpop_msg" class="textareagradiant" style="width:428px; height:116px; border:1px solid #CFCECE;" class="form_area validate[required] text-input" > </textarea> 
							</td>
                    	</tr>
                    
                    </table>
		<br />

							<input name="regsubmit" id="regsubmit" type="submit" value="Submit" class="gbtn_s" style="cursor:pointer"  />
							<input type="button" value="Reset" class="gbtn_s"  style="cursor:pointer" />
</form>

<br />
		

				</div>
			</div>
		</div>
		<div class="gpBdrLeftBottom"></div>
		<div class="gpBdrRightBottom"></div>
		<div class="gpBdrBottom"></div>
</div>
</div>
