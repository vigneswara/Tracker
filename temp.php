<?php echo "It WOrks!";
	$phpdate = getdate();
	$registrationDate = date( 'Y-m-d H:i:s'); 
	
	echo $registrationDate;
	
	
	$my_t=getdate(date("U"));
print("$my_t[weekday], $my_t[mon] $my_t[mday], $my_t[year]");
	?>