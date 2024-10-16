<?php

// Start output buffering
ob_start();

require_once('../vendor/tecnickcom/tcpdf/tcpdf.php'); // Adjust the path if necessary
include_once "../layouts/header.php";
include_once "../controllers/payment-controller.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $paymentController = new PaymentController();
    $payment = $paymentController->getPaymentById($id);
}

$invoice_id = str_pad($payment['payment_id'], 4, "0", STR_PAD_LEFT);

// Create a new PDF document
$pdf = new TCPDF();
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Gym Invoice');
$pdf->SetSubject('Invoice Details');

// Set margins
$pdf->SetMargins(15, 20, 15);
$pdf->SetAutoPageBreak(TRUE, 15);
$pdf->AddPage();

// Build the HTML content for the PDF
$html = '
<h3 style="text-align:center;">GYM Invoice</h3>
<h5>Billed to:</h5>
<h5>Member Name: ' . $payment['user_name'] . '</h5>
<h5>Phone: ' . $payment['user_phone'] . '</h5>
<h5>Email: ' . $payment['user_email'] . '</h5>
<h5>Address: ' . $payment['user_address'] . '</h5>
<h5 style="text-align:right;">Invoice ID: ' . $invoice_id . '</h5>
<h5 style="text-align:right;">Invoice Date: ' . $payment['paid_date'] . '</h5>

<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>Plan Name</th>
            <th>Duration</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>' . $payment['plan_name'] . '</td>
            <td>' . $payment['plan_duration'] . '</td>
            <td>' . $payment['plan_price'] . '</td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2" style="text-align:right;">Sub Total:</td>
            <td>' . $payment['plan_price'] . '</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:right;">Tax (%):</td>
            <td>0</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:right;">Discount (%):</td>
            <td>0</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:right;"><strong>Total:</strong></td>
            <td><strong>' . '$' . $payment['plan_price'] . '</strong></td>
        </tr>
    </tfoot>
</table>

<h3 style="text-align:center;">Thank You Deeply From Our Heart!!!</h3>

<h5>Payment Detail:</h5>
<h5>Member ID: ' . $payment['member_id'] . '</h5>
<h5>Account Name: ' . $payment['user_name'] . '</h5>
<h5>Payment Method: Cash</h5>
<h5>Pay Date: ' . $payment['paid_date'] . '</h5>

<h5 style="text-align:right;">BRLRLR Gym</h5>
<h5 style="text-align:right;">101x56st, Aung Myay Tharzan Township, Mandalay</h5>
';

// Print the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// Clear the output buffer and send the PDF
ob_end_clean(); // Clean (erase) the output buffer
$pdf->Output('gym_invoice_' . $invoice_id . '.pdf', 'I'); // 'I' for inline view, 'D' for download
?>
