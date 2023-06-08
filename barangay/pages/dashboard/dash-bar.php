<?php include "../connection.php";

?>
Morris.Bar({
		element: 'morris-bar-chart4',
		data: [
			<?php

					$qry = mysqli_query($con,"SELECT count(*) as cnt, round(monthlyincome,-1) as income FROM tblresident group by monthlyincome");
					while($row=mysqli_fetch_array($qry)){
					echo "{y:'".$row['income']."',a:'".$row['cnt']."'},";
					}
			?>
		],
		xkey: 'y',
		ykeys: ['a'],
		labels: ['Resident with this Income'],
		hideHover: 'auto'
	});
</script>