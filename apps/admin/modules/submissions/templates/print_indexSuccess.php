<?php 
$submissions = $pager->getQuery()->limit(0,10000)->execute(); 
$i=1;

?>

<div class="toolbar">
	<a href="<?php echo url_for('@submissions'); ?>" title="Go Back">Go Back</a>
	<a href="javascript:window.print()" title="Print">Print</a>
</div>
<table class="submissions_printable">
<tfoot>
	<tr>
		<th colspan="8">Total of <?php echo count($submissions)?> Submissions</th>
	</tr>
</tfoot>
<thead>
	<tr>
		<th>Website</th>
		<th>Name</th>
		<th>Age</th>
		<th>Gender</th>
		<th>Address</th>
		<th>City</th>
		<th>State</th>
		<th>Zip Code</th>
	</tr>
</thead>
<tbody>
	<?php foreach($submissions as $submission):?>
	<tr class="<?php echo fmod($i, 2) ? ' odd' : 'even'?>">
		<td><?php echo $submission->getWebsites()->getName()?></td>
		<td><?php echo $submission->getFirstName()?> <?php echo $submission->getLastName()?></td>
		<td><?php echo $submission->getAge()?></td>
		<td><?php echo $submission->getGender() == 1 ? 'Male' : 'Female'?></td>
		<td><?php echo $submission->getAddress()?></td>
		<td><?php echo $submission->getCity()?></td>
		<td><?php echo $submission->getStates()->getAbbreviation()?></td>
		<td><?php echo $submission->getZipcode()?></td>
	</tr>
	<tr class="<?php echo fmod($i, 2) ? ' odd' : 'even'?>">
		<td><strong>Submitted On: </strong><?php echo date('m/d/Y h:i a',strtotime($submission->getCreatedAt()))?></td>
		<td><strong>Weight: </strong><?php echo $submission->getWeight()?></td>
		<td><strong>Height: </strong><?php echo $submission->getHeight()?></td>
		<td colspan="2"><strong>Interests: </strong><?php echo $submission->getInterests()?></td>
		<td><strong>E-Mail: </strong><?php echo $submission->getEmail()?></td>
		<td><strong>Phone: </strong><?php echo $submission->getPhone()?></td>
		<td><strong>Cell: </strong><?php echo $submission->getCell()?></td>
		
	</tr>
	<tr class="<?php echo fmod($i, 2) ? ' odd' : 'even'?>">
		<td colspan="8"><strong>Comments: </strong><?php echo $submission->getComments()?></td>
	</tr>
	<?php $i++;?>
	<?php endforeach;?>
</tbody>
</table>