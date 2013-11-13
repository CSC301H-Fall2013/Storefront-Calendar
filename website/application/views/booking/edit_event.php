<?php
/*
 * Initialization code used later.
 */
$colours = array(
	'red' => 'red',
	'blue' => 'blue',
	'green' => 'green'
);
?>

<table width="auto" class="outter">
	<tr>
		<td>
			<?php
				$bookings = array();
						
				if($booking->start_time != ''){
					$start = strtotime($booking->start_time);
					$end = strtotime($booking->end_time);

					$start_date = date('Y-m-d',$start);
					$end_date = date('Y-m-d',$end);

					$start_time =  date('H:i:s',$start);
					$end_time =  date('H:i:s',$end);

					
				}
				else{
					$bookings["0"] = "----------Select Booking------------";

					$start_date = '';
					$end_date = '';

					$start_time = '';
					$end_time = '';
				}

			?>
			<table class="text" border="0" cellpadding="4" cellspacing="3" width="100%">
				<tr height="40px">
					<td colspan="2" class="formHeading">Edit Bookings</td>
				</tr>
				<tr>
					<td colspan="2" class="note" bgcolor="#383838">Field marked with <span style="color:#FF0000">*</span> are compulsory fields
					</td>
				</tr>
				<tr height="10px">
					<td colspan="2"></td>
				</tr>
				<tr>
					<td class="formSectionLeft" width="32%"><span style="color:#FF0000">*</span>Title</td>
					<td class="formSectionRight" width="68%">

						
						<?php

						if(sizeof($booking_list) > 0 ){
							foreach ($booking_list as $element) {
								$bookings["$element->id"] = "$element->title";
							}

							echo form_open('main/change_booking'); 
							$js = "onChange='this.form.submit()'";
							echo form_dropdown("booking_id", $bookings, $booking->id, $js);
							echo form_close();
						}
						else{
							echo form_label("You don't have a booking!!");
							return;
						}
						?>
						
					</td>
				</tr>
				<tr>
					<?php 
					$hidden = array("id" => "$booking->id");
					echo form_open("main/edit_booking",'',$hidden);
					?>
					<td class="formSectionLeft" width="32%"><span style="color:#FF0000">*</span>From</td>
					<td class="formSectionRight" width="68%">
						<input id="start_picker" size="35" class="input date" type="text" name="from_date" value="<?php  echo $start_date; ?>" required="required">
						<input id="start_time" size="35" class="input time" type="text" name="from_time" value="<?php echo $start_time; ?>" required="required">
					</td>
				</tr>
				<tr>
					<td class="formSectionLeft" width="32%"><span style="color:#FF0000">*</span>To</td>
					<td class="formSectionRight" width="68%">
						<input id="end_picker" size="35" class="input date" type="text" name="to_date" value="<?php echo $end_date ?>" required="required">
						<input id="end_time" size="35" class="input time" type="text" name="to_time" value="<?php echo $end_time; ?>" required="required">
					</td>
				</tr>
				<tr>
					<td class="formSectionLeft" width="32%"></td>
					<td class="formSectionRight" width="68%">
						<input id="all_day" type="checkbox" name="all_day" value="all_day">All Day&nbsp;&nbsp;
						<input id="repeat" type="checkbox" name="repeat" value="repeat">Repeat...
					</td>
				</tr>
				<tr>
					<td class="formSectionLeft" width="32%"><span style="color:#FF0000">*</span>Room</td>
					<td class="formSectionRight" width="68%">
						<?php echo form_dropdown('room', $rooms, $booking->roomid); ?>
					</td>
				</tr>
				<tr>
					<td class="formSectionLeft" width="32%"><span style="color:#FF0000">*</span>Client</td>
					<td class="formSectionRight" width="68%">
						<?php echo form_dropdown('client', $clients, $booking->userid); ?>
					</td>
				</tr>
				<tr>
					<td class="formSectionLeft" width="32%">Description</td>
					<td class="formSectionRight" width="68%">
						<textarea class="input" rows="4" cols="50" type="text" name="description"></textarea>
					</td>
				</tr>
				<tr>
					<td class="formSectionLeft" width="32%">Colour</td>
					<td class="formSectionRight" width="68%">
						<?php echo form_dropdown('colours', $colours); ?>
					</td>
				</tr>
				<tr>
					<td class="formSectionLeft" width="32%">Status</td>
					<td class="formSectionLast" width="68%">
						<input type="radio" name="status" value="2"
							<?php
								if ($booking->status == 2){
									echo 'checked';
								}
							?>
						>Tentative&nbsp;&nbsp;
						<input type="radio" name="status" value="1"
							<?php
								if ($booking->status == 1){
									echo 'checked';
								}
							?>
						>Confirmed&nbsp;&nbsp;
						<input type="radio" name="status" value="3"
							<?php
								if ($booking->status == 3){
									echo 'checked';
								}
							?>
						>Rejected
					</td>
				</tr>
				<tr>
					<td></td>
					<td height="30">
						<input value="Save" class="btnbg" type="submit">&nbsp;&nbsp;
						<?php
							echo form_close();
							echo form_open('main/delete_booking', 'class="inline-block"', $hidden);
							$class = "class='btnbg'";
							echo form_submit("Delete", "Delete", $class);
							echo form_close();
						?>
						&nbsp;&nbsp;&nbsp;
					</td>
				</tr>
				
			</table>
		</td>
	</tr>
</table>