<?php
//this is a classic 2-dimensional anonymous array
$table = array( array("A1", "B1" , "C1"),
                array("A2", "B2" , "B2"),
                array("A3", "B3" , "C3") 
             );  
             
echo "<pre>" .            
'$table = array( array("a1", "b1" , "c1"),
                array("a2", "b2" , "c2"),
                array("a3", "b3" , "c3") 
             );' . "</pre><br />" ;
             
echo "get single element <br />";            
echo '$table[2][1] = ' . $table[2][1] . "<br /><br />";

echo "build html table from a 2d array <br />";
foreach ($table as $rows => $row)
{
	echo "<table border='1'><tr>";
	foreach ($row as $col => $cell)
	{
		echo "<td>" . $cell . "</td>";
	}	
  echo "</tr></table>";
}	
      
?>
