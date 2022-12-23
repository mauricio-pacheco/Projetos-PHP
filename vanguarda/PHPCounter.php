<?

$filename = "PHPCounter.txt";

$fp = fopen( $filename,"r"); 
$Old = fread($fp, 100); 
fclose( $fp ); 

$Old = split ("=", $Old, 5);

$NewCount = $Old[1] + '1';

$New = "Count=$NewCount";

$fp = fopen( $filename,"w+");
if (flock($fp, 2)) { 
fwrite($fp, $New, 100); }
fclose( $fp ); 

print "Count=$NewCount";

?>
