<?php include "../connection.php";?>

<script>
	Morris.Donut({
		element: 'morris-donut-chart1',
		data: [{
			label: "A. Cruz",
			value: <?php 
					$q = mysqli_query($con,"SELECT * from tblresident where street = 'A. Cruz' ");
					$numrow = mysqli_num_rows($q);
					echo $numrow;
			 	?>
		}, {
			label: "B. Cruz",
			value: <?php 
					$q = mysqli_query($con,"SELECT * from tblresident where street = 'B. Cruz' ");
					$numrow = mysqli_num_rows($q);
					echo $numrow;
			 	?>
            label: "M. Domingo",
			value: <?php 
					$q = mysqli_query($con,"SELECT * from tblresident where street = 'M. Domingo' ");
					$numrow = mysqli_num_rows($q);
					echo $numrow;
			 	?>
		}, { 
            label: "R. Domingo",
			value: <?php 
					$q = mysqli_query($con,"SELECT * from tblresident where street = 'R. Domingo' ");
					$numrow = mysqli_num_rows($q);
					echo $numrow;
			 	?>
		}, {
            label: "Oliveros",
			value: <?php 
					$q = mysqli_query($con,"SELECT * from tblresident where street = 'Oliveros' ");
					$numrow = mysqli_num_rows($q);
					echo $numrow;
			 	?>
		}, {
		}],
		resize: false
	});
</script>