<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>Cross-Browser Rich Text Editor</title>
	<script language="JavaScript" type="text/javascript" src="TextEditor/richtext.js"></script>
</head>
<body>

<form name="RTEDemo" action="demo.htm" method="post" onSubmit="return submitForm();">

<script language="JavaScript" type="text/javascript">
<!--
function submitForm() {
	//make sure hidden and iframe values are in sync before submitting form
	//to sync only 1 rte, use updateRTE(rte)
	//to sync all rtes, use updateRTEs
	//updateRTE('rte1');
	updateRTEs();
	alert("rte1 = " + document.RTEDemo.rte1.value);

	//change the following line to true to submit form
	return false;
}

//Usage: initRTE(imagesPath, includesPath, cssFile)
initRTE("TextEditor/editor_images/", "", "");
//-->
</script>
<noscript><p><b>Javascript must be enabled to use this form.</b></p></noscript>

<script language="JavaScript" type="text/javascript">
<!--
//Usage: writeRichText(fieldname, html, width, height, buttons, readOnly)
writeRichText('rte1', '"<em>Enter Text Here</em>"', 520, 200, true, false);
//-->
</script>

<p>Click submit to show the value of the text box.</p>
<p><input type="submit" name="submit" value="Submit"></p>
</form>

</body>
</html>
