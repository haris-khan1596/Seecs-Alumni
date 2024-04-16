	<!-- include the Tools -->
	<script src="<?php echo $src ?>scroll_news/jquery.tools.min.js"></script>
	 

	<!-- standalone page styling (can be removed) -->
	<link rel="stylesheet" type="text/css" href="<?php echo $src ?>scroll_news/standalone.css">	


	<link rel="stylesheet" type="text/css" href="<?php echo $src ?>scroll_news/scrollable-horizontal.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $src ?>scroll_news/scrollable-buttons.css">


<!-- HTML structures -->

<table>
<tr>
<td align="center">
<!-- "previous page" action -->
<a class="prev browse left"></a>

<!-- root element for scrollable -->
<div class="scrollable">   
   
   <!-- root element for the items -->
   <div style="left: 0px;" class="items">
   
      <!-- 1-5 -->

      <div style="text-align:center; margin-left:85px">
	     <a href="http://seecs.nust.edu.pk/Seminars_workshops/pages/seecs-has-got-talent/" target="_blank"> <img src="<?php echo $src ?>scroll_news/images/seecs-has-got-talent.jpg"></a>  
         <a href="http://alumni.seecs.nust.edu.pk/ddmenu/m4_2.php" target="_parent"> <img src="<?php echo $src ?>scroll_news/images/sassp.jpg"></a>
         <a href="http://seecs.nust.edu.pk/news_events/convocation14/index.php" target="_blank"> <img src="<?php echo $src ?>scroll_news/images/convocation14.jpg"></a>
<!--         <a href="http://alumni.seecs.nust.edu.pk/home_coming_2012.php" target="_parent"> <img src="<?php echo $src ?>scroll_news/images/home_coming.jpg"></a> -->
         <a href="cs.php" target="_parent"> <img src="<?php echo $src ?>scroll_news/images/Alumni-Career-Counseling-Series.jpg"></a>


      </div>
      
      <!-- 5-10 -->
 <!--
      <div>

         <a href="cs.php" target="_parent"> <img src="<?php echo $src ?>scroll_news/images/alumni_card.jpg"></a>
         <a href="cs.php" target="_parent"> <img src="<?php echo $src ?>scroll_news/images/alumni_cac.jpg"></a>
         <a href="cs.php" target="_parent"> <img src="<?php echo $src ?>scroll_news/images/Alumni-Career-Counseling-Series.jpg"></a>
         <a href="cs.php" target="_parent"> <img src="<?php echo $src ?>scroll_news/images/Donate_Make_Life.jpg"></a>
         <a href="cs.php" target="_parent"> <img src="<?php echo $src ?>scroll_news/images/home_coming.jpg"></a>
      </div>
  -->    
 
      
   </div>
   
</div>

<!-- "next page" action -->
<a class="next browse right"></a>

<br clear="all">

<!-- javascript coding -->


<script>
// execute your scripts when the DOM is ready. this is mostly a good habit
$(function() {

	// initialize scrollable
	$(".scrollable").scrollable();

});
</script>

</td>
</tr>
</table>