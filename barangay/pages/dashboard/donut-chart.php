<?php include "../connection.php";?>
<script>
	Morris.Donut({
		element: 'morris-donut-chart',
		data: [{
			label: "Male",
			value: <?php 
					$q = mysqli_query($con,"SELECT * from tblresident where gender = 'Male' ");
					$numrow = mysqli_num_rows($q);
					echo $numrow;
			 	?>
		}, {
			label: "Female",
			value: <?php 
					$q = mysqli_query($con,"SELECT * from tblresident where gender = 'Female' ");
					$numrow = mysqli_num_rows($q);
					echo $numrow;
			 	?>
		}],
		resize: false
	});
</script>