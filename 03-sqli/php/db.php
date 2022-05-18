<?php
$dbh = new PDO('mysql:host=db;port=3306;dbname=test_db', 'devuser', 'devpass', array( PDO::ATTR_PERSISTENT => false));


function mysql_real_escape_string($value)
{
    $search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
    $replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");

    return str_replace($search, $replace, $value);
}

function mysql_query($sql) {
	global $dbh;

	try {
	
	$stmt = $dbh->prepare($sql);
	$stmt->execute();
	return $stmt;

	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		return null;
	}
}


function mysql_error() {
	return "MySQL failure";
}
?>