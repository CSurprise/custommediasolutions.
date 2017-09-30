<h1>New Submission for <?php echo $website->getName()?></h1>

<p>Submission Details</p>
<ul>
	<li><strong>First Name: </strong> <?php echo $submission['first_name']?></li>
	<li><strong>Last Name: </strong> <?php echo $submission['last_name']?></li>
	<li><strong>Age: </strong> <?php echo $submission['age']?></li>
	<li><strong>Gender: </strong> <?php echo $submission['gender'] == 1 ? 'Male' : 'Femaile'?></li>
	<li><strong>Weight: </strong> <?php echo $submission['weight']?></li>
	<li><strong>Height: </strong> <?php echo $submission['height']?></li>
	<li><strong>Interests: </strong> <?php echo $submission['interests']?></li>
	<li><strong>E-Mail: </strong> <?php echo $submission['email']?></li>
	<li><strong>Phone: </strong> <?php echo $submission['phone']?></li>
	<li><strong>Cell: </strong> <?php echo $submission['cell']?></li>
	<li><strong>Address: </strong> <?php echo $submission['address']?></li>
	<li><strong>City: </strong> <?php echo $submission['city']?></li>
	<li><strong>State: </strong> <?php echo $submission['state']?></li>
	<li><strong>Zip Code: </strong> <?php echo $submission['zipcode']?></li>
	<li><strong>Comments: </strong> <?php echo $submission['comments']?></li>
</ul>