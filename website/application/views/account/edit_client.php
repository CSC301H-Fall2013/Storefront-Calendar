<!DOCTYPE html>

<html>
	<head>
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script>
			function checkPassword() {
				var p1 = $("#pass1");
				var p2 = $("#pass2");

				if (p1.val() == p2.val()) {
					p1.get(0).setCustomValidity("");  // All is well, clear error message
					return true;
				}
				else	 {
					p1.get(0).setCustomValidity("Passwords do not match");
					return false;
				}
			}
		</script>
	</head>
<body>
	<h1>Edit Client</h1>
<?php
	if (isset($clients)) {
		echo form_open('account/edit_client');

		echo form_label('Name');
		echo form_error('id');
		echo form_dropdown('id', $clients);

		echo form_label('Address');
		echo form_error('address');
		echo form_textarea('address');

		echo form_label('Phone');
		echo form_error('phone');
		echo form_input('phone');

		echo form_submit('submit', 'Submit');
		echo form_close();
	}
?>
</body>

</html>
