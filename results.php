<?php 
require('database/database.php');
require 'dynamic/header.php';
// run query
$results = $db->query("SELECT * FROM candidate");

// set array
$array = array();

// look through query
while($row = mysql_fetch_assoc($results)){

  // add each row returned into an array
  $array[] = $row;

  // OR just echo the data:
  echo $row['username']; // etc

}

// debug:
print_r($array); // show all array data
echo $array[0]['username']; // print the first rows username


	if($_POST['report-options'] == 'name') {
		echo '<ul><li>' . $candidate['firstname'] . ' ' . $candidate['lastname'] . '</li></ul>';
	} else if ($_POST['report-options'] == 'votes') {
		echo '<ul><li>' . $candidate['firstname'] . ' ' . $candidate['lastname'] . ' - Candidate Vote Count is ' . $candidate['votes'] . '</li></ul>';
	} else if ($_POST['report-options'] == 'party') {
		echo '<ul><li>' . $candidate['firstname'] . ' ' . $candidate['lastname'] . ' - Candiate Party is ' . $candidate['party'] . '</li></ul>';
	} else if ($_POST['report-options'] == 'id') {
		echo '<ul><li>' . $candidate['firstname'] . ' ' . $candidate['lastname'] . ' - Candidate ID is ' . $candidate['id'] . '</li></ul>';
	} else if ($_POST['report-options'] == 'poll-results') {
		$vote_per = $candidate['votes']/$total_votes * 100;
		echo '<div>' . $candidate['firstname'] . ' ' . $candidate['lastname'] . $vote_per . '% <progress max="100" value="' . $vote_per . '"></progress></div>';
	}

results(); ?>
<!--
<table border="1">
	<tr>
		<th>Name</th>
		<td>Donald Trump</td>
		<td>Ted Cruz</td>
	</tr>
	<tr>
		<th>Votes</th>
		<td>10</td>
		<td>20</td>
	</tr>
</table>
-->
<h1>Results</h1>
<h3>Run Reports</h3>
	<form name="reports" method="post" action="results.php">
		<div class="form-group">
		  <select name="report-options">
			<option value="name" name="name">By Name</option>
			<option value="votes" name="votes">By Votes</option>
			<option value="party" name="party">By Party</option>
			<option value="id" name="id">By ID</option>
			<option value="poll-results" name="poll-results">Poll Results</option>
		  </select>
		  <br><br>
		  <input class="btn btn-default" name="reports" type="submit">
		</div>
	</form>

<div>

<?php foreach ($db->query('SELECT id, firstname, lastname, votes, party FROM candidate ORDER BY "votes" DESC') as $candidate) {
	echo '<ul><li>' . $candidate['firstname'] . ' ' . $candidate['lastname'] . '</li></ul>';
}
 ?>
</div>
<?php require 'dynamic/footer.php'; ?>