<?php
$ti1 = count($menu);
for ($i=0; $i<$ti1; $i++) {

/***************主菜單************************/
	$ts1 = $menu[$i][0];
	echo "
		<h1 class=\"type\"><a href=\"javascript:void(0)\">$ts1</a></h1>
	    <div class=\"content\">
	        <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
	          <tr>
	            <td><img src=\"images/menu_topline.gif\" width=\"182\" height=\"5\" /></td>
	          </tr>
	        </table>
	        <ul class=\"MM\">
		";

/***************子菜單************************/

		$ti2 = count($menu[$i]);
		for ($j=1; $j<$ti2; $j++) {
			$ta2 = explode('	', $menu[$i][$j]);
			if (count($ta2) == 1) {
				$ta2[1] = $ta2[2] = '';
			}
		    echo "<li><a href=\"$ta2[2]\" target=\"rightFrame\">$ta2[0]</a></li>\n";
		}

	echo "	</ul>\n";
	echo "</div>\n";
}
?>
