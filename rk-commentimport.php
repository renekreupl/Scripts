<?php
	/*
	Joomla phocaguestbook to WordPress Comments Import
	(c) Rene Kreupl - www.renekreupl.de
	*/
	
	// Config
	$mySQL_settings['host'] 	= 'localhost';
	$mySQL_settings['user'] 	= 'USER';
	$mySQL_settings['pswd'] 	= 'PASSWORD';
	$mySQL_settings['dbname'] 	= 'DATABASE';
	
	$comment_post_id 			= PAGE_ID; // ID der WordPress Seite auf welcher die Kommentare landen sollen
	

	// MySQL Connect
	function  mysql_con() {
		global $mySQL_settings;
		$con = @mysql_connect($mySQL_settings['host'], $mySQL_settings['user'], $mySQL_settings['pswd']);
		if ($con === FALSE) {
			$error("CONN.OPEN");
		}
		if (@mysql_select_db($mySQL_settings['dbname'], $con) === FALSE) {
			$error("DB.SELECT");
		} else {
			$connected = TRUE;
		}
	}
	mysql_con();
	mysql_query("SET NAMES 'utf8'");

	//Write Comments
	$sel = mysql_query("select * from jos_phocaguestbook_items");
	while($row = mysql_fetch_object($sel)) {
		$doit = "insert into wp_comments (comment_post_ID, comment_author, comment_author_email, comment_author_IP, comment_date, comment_date_gmt, comment_content) values ('".$comment_post_id."', '".mysql_real_escape_string($row->username)."', '".$row->email."', '".$row->ip."', '".$row->date."', '".$row->date."', '".mysql_real_escape_string($row->content)."')";

		if (mysql_query($doit)) {
			echo $row->id." True<br />";
		} else echo $row->id." <b>FALSE</b><br />";
	}
	

?>