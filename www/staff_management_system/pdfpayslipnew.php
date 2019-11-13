<?php
// include autoloader
require_once 'dompdf/autoload.inc.php';

include "includes/dbh.php";

// reference the Dompdf namespace
use Dompdf\Dompdf;

$pdf = new Dompdf();

ob_start();

if(isset($_POST['genpayslip']))
{

	$emp_id = mysqli_real_escape_string($conn, $_POST['emp_id']);
	$full_name = mysqli_real_escape_string($conn, $_POST['full_name']);      
	$basic = mysqli_real_escape_string($conn, $_POST['basic']);		
	$allow = mysqli_real_escape_string($conn, $_POST['allow']);
	$deduct = mysqli_real_escape_string($conn, $_POST['deduct']); 


	$sub_total = (int)$basic + (int)$allow;
	$net_pay = $sub_total - (int)$deduct;

			




?>


<style>
	@media print {
    footer {page-break-after: always;}
}
</style>


<table border="1px" style="border-collapse: collapse;" width="100%">
	<tr>
		<td colspan="2"> ETS Campus - Kegalle</td>
	</tr>

	<tr>
		<td> Payslip for month : <br/>
			Employee no : <br/>
			Full name : 
			 </td>

		<td style="text-align: right;"> <?php echo date('F'); ?> <br/>
			<?php echo $emp_id ?> <br/>
			<?php echo $full_name ?> 
			 </td>
	</tr>
	

	<tr>
		<td> 
			Earnings<br/>
				basic :<br/>
			allowances :
		</td>
		<td style="text-align: right;"> 
			<br/>
				<?php echo $basic ?><br/>
				<?php echo $allow ?></td>
	</tr>

	<tr>
		<td> 
			Sub total :
		</td>
		<td style="text-align: right;"> 
				<?php echo $sub_total ?>
	</tr>
	<tr>
		<td> 
			Deductions<br/>
				deductions :<br/>
		</td>
		<td style="text-align: right;"> 
			<br/>
				<?php echo $deduct ?><br/>	
	</tr>

	<tr>
		<td> 
			Net pay :
		</td>
		<td style="text-align: right;"> 
				<?php echo $net_pay ?>
	</tr>

</table>

<footer style="page-break-after: always;">
	
	ETS CAMPUS KEGALLE
</footer>

<?php

}


	if(isset($_POST['genpayallslips']))
	{

		$sql = "SELECT * FROM staff LEFT JOIN salary ON(staff.staffID = salary.staffID)";

		$result = mysqli_query($conn, $sql);



		while($rows = mysqli_fetch_assoc($result))
        {
                    
                $emp_id = $rows['staffID'];        
                $full_name = $rows['nameInFull'];      
				$basic = $rows['basic'];		
				$allow = $rows['allowences'];
				$deduct = $rows['deduction']; 

				$sub_total = (int)$basic + (int)$allow;
				$net_pay = $sub_total - (int)$deduct;


				?>

<style>
	@media print {
    footer {page-break-after: always;}
}
</style>


					<table border="1px" style="border-collapse: collapse;" width="100%">
							<tr>
								<td colspan="2"> ETS Campus - Kegalle</td>
							</tr>

							<tr>
								<td> Payslip for month : <br/>
									Employee no : <br/>
									Full name : </td>

								<td style="text-align: right;"> <?php echo date('F'); ?> <br/>
									<?php echo $emp_id ?> <br/>
									<?php echo $full_name ?> 
									 </td>
							</tr>
							

							<tr>
								<td> 
									Earnings<br/>
										basic :<br/>
									allowances :
								</td>
								<td style="text-align: right;"> 
									<br/>
										<?php echo $basic ?><br/>
										<?php echo $allow ?></td>
							</tr>

							<tr>
								<td> 
									Sub total :
								</td>
								<td style="text-align: right;"> 
										<?php echo $sub_total ?>
							</tr>
							<tr>
								<td> 
									Deductions<br/>
										deductions :<br/>
								</td>
								<td style="text-align: right;"> 
									<br/>
										<?php echo $deduct ?><br/>	
							</tr>

							<tr>
								<td> 
									Net pay :
								</td>
								<td style="text-align: right;"> 
										<?php echo $net_pay ?>
							</tr>


							</table>


							<footer style="page-break-after: always;">
								ETS CAMPUS KEGALLE
							</footer>

	<?php

        }

	}

?>



	




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