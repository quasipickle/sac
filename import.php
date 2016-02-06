<?PHP
# This file contains all the functionality for importing course descriptions from IMS


#
#
# Configuration
#
#


# Server to query
$host = 'ldap://directory.srv.ualberta.ca';
$conn = ldap_connect($host);
ldap_bind($conn);//binding anonymously



# objects we want to retrieve
$filter = "(facultycode=AU)";

# Data we want
# 'subject' is basically the discipline (ie: AUPOL)
# 'catalog' is the number (ie: 104)
# 'asstring' is the course name (ie: AUPOL 104)
$attributes =  array('asstring', 'subject', 'catalog');


#
#
# Work - shouldn't need to mess around below this point
#
#




// $ranges = getRange($conn);
// $years = $ranges['years'];
$term = getRange($conn, "Winter");


// only continue if terms were found.  No terms means no new file generation
if($term){
	$all_courses = array();

	
		# Context to search in.  {term} will be replaced
		$context = "term={term},ou=calendar,dc=ualberta,dc=ca";
		$term_context = str_replace('{term}',$term,$context);

		#
		# Note on searching:  An alternative method would be to do a recursive ldap_search() on the context "ou=calendar,dc=ualberta,dc=ca
		# However, this searches all terms & times out.  By being more specific with the search context, and using the non-recursive ldap_list(),
		# we greatly cut down on query time
		#

		# Some contexts might not exist yet in IMS, which throws an error
		$results = @ldap_list($conn,$term_context,$filter,$attributes);
		if($results)
		{
			$entries = ldap_get_entries($conn,$results);
  			print_r($entries);
			# remove first "count" element
			array_shift($entries);
		}
	
}

#
# Function: getRange()
# Purpose: To get the years & terms we are retrieving.  Always retrieves fall,winter,spring,summer
#		   May start from Fall of the previous calendar year if early enough in the calendar year.
# Returns: An array with 'terms' and 'years' items.  The 'terms' items has term IDS for the terms we want to retrieve
#		   FALSE if something went wrong.
#
function getRange($conn, $term_name)
{
	$now = time();
	$year = date('Y',$now);
	$month = date('m',$now);

	$termtitle = $term_name.'*'.$year;

	$context = 'ou=calendar,dc=ualberta,dc=ca';
	$filter = '(termtitle='.$termtitle.')';
	$attributes = ['term'];
	//get the term id
	$results = @ldap_list($conn, $context, $filter, $attributes);

	if($results){
		$entries = @ldap_get_entries($conn,$results);

		if($entries)
			return $entries[0]['term'][0];
		else
			return FALSE;
	}
	else
		return FALSE;

}

?>
