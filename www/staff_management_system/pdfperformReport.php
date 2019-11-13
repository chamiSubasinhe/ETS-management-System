<?php
// include autoloader
require_once 'dompdf/autoload.inc.php';

include "includes/dbh.php";

// reference the Dompdf namespace
use Dompdf\Dompdf;

$pdf = new Dompdf();

ob_start();

	$order = $_GET['order'];
	$arrange = $_GET['arrange'];


    $query = "SELECT * FROM perform ORDER BY $order $arrange";
    $result = mysqli_query($conn, $query);

			
?>

<p style="position: fixed; text-align: center;">PERFORMANCE REPORT ORDER BY <?php echo $order; ?> AND <?php echo $arrange; ?></p>
<br><br>

<table border="1px" style="border-collapse: collapse;" width="100%">
	
	
	<thead>
		<tr>
			<th style="background-color:lightblue;" >Staff ID</th>
			<th style="background-color:lightblue;">Performance average</th> 
			<th style="background-color:lightblue;">Comments</th>
		</tr>
	</thead>

		<tbody>

		<?php
		    while($Rows = mysqli_fetch_array($result)){



			?>

			<tr>
				<td style="background-color:lightgreen;"><?php echo $Rows['staffID']; ?> </td>
				<td style="background-color:lightgreen;"> <?php echo $Rows['percent']; ?></td>
				<td style="background-color:lightgreen;"><?php echo $Rows['othercom']; ?></td>
			</tr>
		</tbody>

	<?php
}
	?>

</table>

<footer style="page-break-after: always;">
	
	ETS CAMPUS KEGALLE
</footer>


	




<?php

$html = ob_get_clean();

$pdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$pdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$pdf->render();

// Output the generated PDF to Browser
$pdf->stream('result.pdf', Array('Attachment'=>0));

?>