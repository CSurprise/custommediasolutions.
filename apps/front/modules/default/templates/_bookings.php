<div class="bookings-container">
	<div class="bookings-scroller">
		<ul>
		<?php if(count($bookings) > 0):?>
			<?php foreach($bookings as $booking):?>
			<li><?php echo $booking->getName()?></li>
			<?php endforeach;?>
		<?php else:?>
			<li>No Bookings Currently Available</li>
		<?php endif;?>
		</ul>
	</div>
</div>
