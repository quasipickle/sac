<?PHP
# This file contains all the functionality for importing course descriptions from IMS


# Server to query
$host = 'ldap://directory.srv.ualberta.ca';
$conn = ldap_connect($host);
ldap_bind($conn);//binding anonymously




// $ranges = getRange($conn);
// $years = $ranges['years'];
$term = getRange($conn, "Winter");


// only continue if terms were found.  No terms means no new file generation
if($term){

	// $class_context = "course=096036,term=".$term.",ou=calendar,dc=ualberta,dc=ca";
	// $attributes = ['class', 'instructorUid', 'asString', 'classStatus'];
	// # Some contexts might not exist yet in IMS, which throws an error
	// $results = @ldap_list($conn,$class_context, "(&(class=*)(classStatus=A))",$attributes);

	// print("***************");

	// if($results)
	// {
	// 	$entries = ldap_get_entries($conn,$results);
	// 	print_r($entries);
	// 	# remove first "count" element
	// 	array_shift($entries);
	// }
//$term=1540 #Winter 2016
	$context = "ou=people,dc=ualberta,dc=ca";
	// $attributes = ['class', 'instructorUid', 'asString', 'classStatus'];
	# Some contexts might not exist yet in IMS, which throws an error
	$results = @ldap_list($conn,$context, "(uid=*)");


	if($results)
	{
		$entries = ldap_get_entries($conn,$results);
		print_r($entries);
		# remove first "count" element
		array_shift($entries);
	}

}

?>
