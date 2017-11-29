<?php

$num = array(11,22,33,44,55,66);

echo current($num);   // returns the value of the current element in an array
echo "<br>";

next($num);   //moves the internal pointer to, and outputs, the next element in the array
echo current($num);
echo "<br>";

end($num);
echo current($num);
echo "<br>";

//now current pointer is on the end of array now if we use next method then there will be no op
next($num);   //moves the internal pointer to, and outputs, the next element in the array
echo current($num);



 ?>
