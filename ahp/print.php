<HTML>
<HEAD>
<TITLE>Print</TITLE>
</HEAD>
<BODY onload="javascript:window.print()">
<?php


if (isset($_REQUEST['print'])) 
{ 
	$print = $_REQUEST['print']; 
	include "$print"; 
}
?>
</BODY>
</HTML>
