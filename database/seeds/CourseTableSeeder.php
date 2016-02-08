<?php

use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run(){
		$this->parseCourses();
	}

	/**
	* Parse all the courses into Course Objects and save in the database.
	*/ 
	private function parseCourses(){
		$courses = $this->getCourses();
		foreach ($courses as $course) {
			$id = $course['asstring'][0];
			// $name = $course
			print($id."\n");
		}
	}

	/**
	* Get all the courses in the current term.
	*
	* @return a list with courses names and numbers
	*/ 
	private function getCourses(){
		$term = $this->getTerm();
		$term_context = "term={$term},ou=calendar,dc=ualberta,dc=ca";

		$filter = "(facultycode=AU)";

		# Data we want
		# 'subjectTitle' is the name of the the discipline(ie: Psychology)
		# 'courseTitle' is the name for this course
		# 'asstring' is the course name (ie: AUPOL 104)
		$attributes =  ['asstring', 'courseTitle', 'subjectTitle'];

		return $this->getResults($term_context, $filter, $attributes);
	
	}


	/**
	* Sets up the connection with the ldap server
	*
	* @return the connection 
	*/
	private function setUpConnection(){
		$host = 'ldap://directory.srv.ualberta.ca';
		$conn = ldap_connect($host);
		ldap_bind($conn);//binding anonymously
		return $conn;
	}


	/**
	* Get the current term to update the database
	*
	* @return The code of the current term (Winter or Fall)
	*/
	private function getTerm()
	{
		$now = time();
		$year = date('Y',$now);
		$month = date('m',$now);

		if($month < 4) //If this happens before April, gets the Winter term
			$term_name = "Winter";
		else
			$term_name = "Fall";

		$termtitle = $term_name.'*'.$year;

		$context = 'ou=calendar,dc=ualberta,dc=ca';
		$filter = '(termtitle='.$termtitle.')';
		$attributes = ['term'];
		
		$entries = $this->getResults($context, $filter, $attributes);

		return $entries[0]['term'][0];

	}

	/**
	*	Gets the results based on the context, filter and attributes given.
	*
	*	@return the entries without the first count element
	*/
	private function getResults($context, $filter, $attributes){
		$conn = $this->setUpConnection();
		$results = @ldap_list($conn, $context, $filter, $attributes);
		$entries = [];

		if($results) {
			$entries = ldap_get_entries($conn,$results);

			# remove first "count" element
			array_shift($entries);
		}
		return $entries;
	}
}
