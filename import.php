<?PHP
# This file contains all the functionality for importing course descriptions from IMS


#
#
# Configuration
#
#


# Server to query
$host = 'ldap://directory.srv.ualberta.ca';

# Context to search in.  {term} will be replaced
$context = "term={term},ou=calendar,dc=ualberta,dc=ca";

# The terms to retrieve for are below, after the IMS connection is made
# They are determined in getTerms() at the bottom of this file


# objects we want to retrieve
$filter = "(facultycode=AU)";
#$filter = "(subject=AUPOL)";// testing filter so we don't piss off the IMS administrators

# Data we want
# 'subject' is basically the discipline (ie: AUPOL)
# 'catalog' is the number (ie: 104)
# 'asstring' is the course name (ie: AUPOL 104)
$attributes = array('asstring');


#
#
# Work - shouldn't need to mess around below this point
#
#

// require '/var/www/html/_include/savant/Savant3.php';
// $TPL = new Savant3(array('template_path' => dirname(__FILE__)));


$conn = ldap_connect($host);
ldap_bind($conn);//binding anonymously

$ranges = getRange($conn);
$years = $ranges['years'];
$terms = $ranges['terms'];
print_r($years);
print_r($terms);
// $TPL->years = $years;

// only continue if terms were found.  No terms means no new file generation
if($terms){
	$all_courses = array();

	foreach($terms as $term)
	{
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
			// array_shift($entries);
      //
			// # Split them out into subject specific arrays
			// foreach($entries as $course)
			// {
			// 	$subject     = $course['subject'][0];
			// 	$title       = $course['coursetitle'][0];
			// 	$number      = $course['catalog'][0];
			// 	$name        = $course['asstring'][0];
			// 	$description = '';
			// 	if(isset($course['coursedescription']))
			// 		$description = $course['coursedescription'][0];
      //
			// 	$Course              = new stdClass();
			// 	$Course->title       = $title;
			// 	$Course->description = $description;
			// 	$Course->name        = $name;
			// 	$Course->number      = $number;
			// 	$Course->subject     = $subject;
      //
			// 	if(!isset($all_courses[$subject]))
			// 		$all_courses[$subject] = array();
      //
			// 	$all_courses[$subject][$number] = $Course;
			// }
		}
	}

	// # Sort each subject by key, aka number
	// foreach($all_courses as $subject=>$courses)
	// {
	// 	ksort($all_courses[$subject]);
	// }

}

#
# Function: getRange()
# Purpose: To get the years & terms we are retrieving.  Always retrieves fall,winter,spring,summer
#		   May start from Fall of the previous calendar year if early enough in the calendar year.
# Returns: An array with 'terms' and 'years' items.  The 'terms' items has term IDS for the terms we want to retrieve
#		   FALSE if something went wrong.
#
function getRange($conn)
{
	$terms = array();
	$now = time();
	$year = date('Y',$now);
	$month = date('m',$now);
	$term_name = 'Fall';

	//if the month is before August, pull the classes from the previous year's fall
	//this is because earlier than this, the current year's fall might not be in IMS
	if($month < 8)
		$year--;

	$termtitle = $term_name.'*'.$year;

	//get the term id
	$results = @ldap_list($conn,'ou=calendar,dc=ualberta,dc=ca','(termtitle='.$termtitle.')',array('term'));

	if($results){
		$entries = @ldap_get_entries($conn,$results);

		if($entries)
			$terms[] = $entries[0]['term'][0];
		else
			return FALSE;
	}
	else
		return FALSE;

	//generate the term IDs for winter, spring, summer
	for($i = 1, $term = $terms[0];
		$i <= 4;
		$term = $terms[0] + ($i * 10), $i++)
	{
		$terms[] = $term;
	}

	return ['years'=>[$year,$year+1],'terms'=>$terms];
}

?>
