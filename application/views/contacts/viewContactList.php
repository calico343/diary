<script type = 'text/javascript'>

function grey(x)
{
	var y	=	x.id;
	document.getElementById(y).style.background = '#CCCCCC';
}

function normal(x)
{
	var y	=	x.id;
	document.getElementById(y).style.background = '#E6EAE9';
}


</script>

<table style = 'width:360px; background-color:#FEF2BF; border:solid 1pt grey; border-radius:7px;cursor:pointer;padding:5px'>

<?php
$fret = null; 
$lret = null;
$html = null;

function highlight($haystack, $needle) 
{
	if (strlen($haystack) < 1 || strlen($needle) < 1) 
	{
		return $haystack;
	}
    
	preg_match_all("/$needle+/i", $haystack, $match);
    
	$exploded = preg_split("/$needle+/i",$haystack);
    
	$replaced = "";
    
	foreach($exploded as $e)
	{
		foreach($match as $m)
		{
            if($e!=$exploded[count($exploded)-1]) 
            {
            	$replaced .= $e . "<b><font style=\"color:red\">" . $m[0] . "</font></b>";
            } 
            else 
            {
            	$replaced .= $e;
            } 
		}
	}	   
    return $replaced;
}

foreach ($con as $key => $contact)
{
	// echo $contact['id'] . "<br/>";
	 //echo $contact['fname'] . "<br/>";
	// echo $partstring . "<br/>";
	if($key != 'count')
	{ 
		$id			= $contact['id'];
		$fname 		= $contact['fname'];
		$lname 		= $contact['lname'];
		$title 		= $contact['title'];
		 
		$fpos		= stristr($fname, $partstring);
		$lpos		= stristr($lname, $partstring);
		 
		if($fpos 	!==  false)
		{
			//echo $fpos . $fname;
			//$farr	= explode($partstring, $fname);
			//$fret	= $farr[0] . "<b><font color = 'red'>$partstring</font></b>" . $farr[1];
			$fret	= highlight($fname, $partstring); 	 
		}
		else 
		{
			$fret	= $fname;
		}
		 
		if($lpos 	!==  false)
		{
			//$larr	= explode($partstring, $lname);
			//$lret	= $larr[0] . "<b><font color = 'red'>$partstring</font></b>" . $larr[1];
			$lret	= highlight($lname, $partstring);
		}
		else 
		{
			$lret	= $lname;
		}
		$trid 		= "tr$id";
		$fid 		= "f$id";
		$lid 		= "l$id";
		$name		= "$title $fname $lname";
		 
		$html .= "<tr id = '$trid' onclick = 'returnContact($id, \"$name\")' onmouseover = 'grey(this)' onmouseout = 'normal(this)'>
				<td style = 'padding:5px' id = '$fid'>
		 			$fret			
		 		</td>
	 			<td style = 'padding:5px' id = '$lid'>	
		 			$lret
		 		</td>
			</tr>";
	}
}

if(strlen($html) > 0)
{
	echo $html;
}
else
{
	echo "<tr onclick  = 'addContact()'><td colspan = '2'> Enter New Contact </td></tr>";	
}

?>

</table>