global $user, $prefix;

include 'modules/My_eGallery/admin/modules/config.php';
mt_srand((double)microtime()*1000000);
if (is_user($user))
	$total = mysql_fetch_array(mysql_query("SELECT COUNT(p.pid) AS total FROM $prefix"._gallery_pictures." AS p LEFT JOIN $prefix"._gallery_categories." AS c ON c.gallid=p.gid WHERE (extension='jpg' OR extension='gif' OR extension='png' OR extension='bmp') AND c.visible>=1"));
else 
	$total = mysql_fetch_array(mysql_query("SELECT COUNT(p.pid) AS total FROM $prefix"._gallery_pictures." AS p LEFT JOIN $prefix"._gallery_categories." AS c ON c.gallid=p.gid WHERE (extension='jpg' OR extension='gif' OR extension='png' OR extension='bmp') AND c.visible>=2"));

if ($total[total]==0)
	$p=0;
else
 	$p = mt_rand(0,($total[total] - 1));

if (is_user($user))
	$pic = mysql_fetch_array(mysql_query("SELECT p.pid, p.img, p.name, p.description, c.galloc FROM $prefix"._gallery_pictures." AS p LEFT JOIN $prefix"._gallery_categories." AS c ON c.gallid=p.gid WHERE (extension='jpg' OR extension='gif' OR extension='png' OR extension='bmp') AND c.visible>=1 LIMIT $p,1"));
else
	$pic = mysql_fetch_array(mysql_query("SELECT p.pid, p.img, p.name, p.description, c.galloc FROM $prefix"._gallery_pictures." AS p LEFT JOIN $prefix"._gallery_categories." AS c ON c.gallid=p.gid WHERE (extension='jpg' OR extension='gif' OR extension='png' OR extension='bmp') AND c.visible>=2 LIMIT $p,1"));

$pic[description] = htmlentities($pic[description]);

if (file_exists("$gallerypath/$pic[galloc]/thumb/$pic[img]")) 
	echo '<center>'
	.'<a href="'.$baseurl.'&amp;do=showpic&amp;pid='.$pic[pid].'">'
	.'<img src="'.$gallerypath.'/'.$pic[galloc].'/thumb/'.$pic[img].'" border="0" alt="'.$pic[description].'"><br>'
	.'<font size="-1">'.$pic[name].'</font>'
	.'</a>'
	.'</center>';
else 
	echo '<center>'
	.'<a href="'.$baseurl.'&amp;do=showpic&amp;pid='.$pic[pid].'">'
	.'<img src="'.$gallerypath.'/'.$pic[galloc].'/'.$pic[img].'" border="0" alt="'.$pic[description].'" width="70"><br>'
	.'<font size="-1">'.$pic[name].'</font>'
	.'</a>'
	.'</center>';
