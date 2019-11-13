<?php
// include autoloader
require_once 'dompdf/autoload.inc.php';

include "includes/dbh.php";

// reference the Dompdf namespace
use Dompdf\Dompdf;

$pdf = new Dompdf();

ob_start();


	$total_basic = $_GET['basic'];
	$total_allow = $_GET['allow'];
	$total_deduct = $_GET['deduct'];
	$total_netpay = $_GET['netpay'];
	$month = $_GET['month'];
	$year = $_GET['year'];


	switch ($month) {
    case 1:
        $month = "January";
        break;
    case 2:
        $month = "February";
        break;
   	case 3:
        $month = "March";
        break;
    case 4:
        $month = "April";
        break;
    case 5:
        $month = "May";
        break;
    case 6:
        $month = "June";
        break;
     case 7:
        $month = "July";
        break;
    case 8:
        $month = "August";
        break;
    case 9:
        $month = "September";
        break;
    case 10:
        $month = "October";
        break;
    case 11:
        $month = "November";
        break;
    case 12:
        $month = "December";
        break;


}

	
?>



<table border="1px" style="border-collapse: collapse;" width="100%">
	<tr>
		<td colspan="2"> ETS Campus - Kegalle</td>
	</tr>

	<tr>
		<td> Summary of Salary Expneses : <br/>
			Month : <br/>
			Year : <br/>
		 </td>

		<td style="text-align: right;">  <br/>
			<?php echo $month ?> <br/>
			<?php echo $year ?> <br/>
		</td>
	</tr>
	

	<tr>
		<td> 
			Total Basic Salary Expenses for the month
		</td>
		<td style="text-align: right;"> 
				<?php echo $total_basic ?>
	</tr>

	<tr>
		<td> 
			Total Allowance Expense for the month
		</td>
		<td style="text-align: right;"> 
				<?php echo $total_allow ?>
	</tr>
	<tr>
		<td> 
			Total deductions for the month
		</td>
		<td style="text-align: right;"> 
				<?php echo $total_deduct ?>
	</tr>

	<tr>
		<td> 
			Total net pay
		</td>
		<td style="text-align: right;"> 
				<?php echo $total_netpay ?>
	</tr>


	
</table>



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