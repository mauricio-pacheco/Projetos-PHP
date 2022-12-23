<?php

	define('NO_SESSION', true);

	require_once(dirname(__FILE__).'/init.php');

	ob_start('ob_gzhandler');

	$limit = 50000;

	header('Content-type: text/xml; charset: UTF-8');
	echo '<?xml version="1.0" encoding="UTF-8"?>',"\n";
	echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">',"\n";

	$query = "
		SELECT pageid, pagetitle
		FROM [|PREFIX|]pages
		WHERE pageid != pageparentid AND pagestatus=1
		LIMIT 50000
	";

	$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

	while ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
		$limit--;
		// We can't just pass ENT_QUOTES to htmlspecialchars because that converts a ' to &#39; rather than &apos;
		// Google sitemaps requires ' to be encoded as &apos; so we have to do things a little differently
		$url = htmlspecialchars(PageLink($row['pageid'], $row['pagetitle']), ENT_COMPAT, 'UTF-8');
		$url = str_replace("'", '&apos;', $url);
		echo '<url>',"\n";
		echo '<loc>',$url,'</loc>',"\n";
		echo '</url>',"\n";
	}

	$query = "
		SELECT prodname
		FROM [|PREFIX|]products
		WHERE prodvisible=1
		LIMIT ".$GLOBALS['ISC_CLASS_DB']->Quote((int)$limit)
	;

	$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

	while ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
		$limit--;
		// We can't just pass ENT_QUOTES to htmlspecialchars because that converts a ' to &#39; rather than &apos;
		// Google sitemaps requires ' to be encoded as &apos; so we have to do things a little differently
		$url = htmlspecialchars(ProdLink($row['prodname']), ENT_COMPAT, 'UTF-8');
		$url = str_replace("'", '&apos;', $url);
		echo '<url>',"\n";
		echo '<loc>',$url,'</loc>',"\n";
		echo '</url>',"\n";
	}

	$query = "
		SELECT categoryid, catname
		FROM [|PREFIX|]categories
		WHERE categoryid != catparentid
		LIMIT ".$GLOBALS['ISC_CLASS_DB']->Quote((int)$limit)
	;

	$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

	while ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
		$limit--;
		// We can't just pass ENT_QUOTES to htmlspecialchars because that converts a ' to &#39; rather than &apos;
		// Google sitemaps requires ' to be encoded as &apos; so we have to do things a little differently
		$url = htmlspecialchars(CatLink($row['categoryid'], $row['catname']), ENT_COMPAT, 'UTF-8');
		$url = str_replace("'", '&apos;', $url);
		echo '<url>',"\n";
		echo '<loc>',$url,'</loc>',"\n";
		echo '</url>',"\n";
	}


	$query = "
		SELECT brandname
		FROM [|PREFIX|]brands
		LIMIT ".$GLOBALS['ISC_CLASS_DB']->Quote((int)$limit)
	;

	$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

	while ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
		$limit--;
		// We can't just pass ENT_QUOTES to htmlspecialchars because that converts a ' to &#39; rather than &apos;
		// Google sitemaps requires ' to be encoded as &apos; so we have to do things a little differently
		$url = htmlspecialchars(BrandLink($row['brandname']), ENT_COMPAT, 'UTF-8');
		$url = str_replace("'", '&apos;', $url);
		echo '<url>',"\n";
		echo '<loc>',$url,'</loc>',"\n";
		echo '</url>',"\n";
	}

	$query = "
		SELECT newsid, newstitle
		FROM [|PREFIX|]news
		WHERE newsvisible=1
		LIMIT ".$GLOBALS['ISC_CLASS_DB']->Quote((int)$limit)
	;

	$result = $GLOBALS['ISC_CLASS_DB']->Query($query);

	while ($row = $GLOBALS['ISC_CLASS_DB']->Fetch($result)) {
		$limit--;
		// We can't just pass ENT_QUOTES to htmlspecialchars because that converts a ' to &#39; rather than &apos;
		// Google sitemaps requires ' to be encoded as &apos; so we have to do things a little differently
		$url = htmlspecialchars(BlogLink($row['newsid'], $row['newstitle']), ENT_COMPAT, 'UTF-8');
		$url = str_replace("'", '&apos;', $url);
		echo '<url>',"\n";
		echo '<loc>',$url,'</loc>',"\n";
		echo '</url>',"\n";
	}

	echo '</urlset>',"\n";

	ob_end_flush();
