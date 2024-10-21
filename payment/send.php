<?php



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once '../vendor/autoload.php';
require_once  '../vendor/Exception.php';
require_once   '../vendor/PHPMailer.php';
require_once   '../vendor/SMTP.php';
require_once('../vendor/tecnickcom/tcpdf/tcpdf.php'); 

    include_once ("../controllers/payment-controller.php");

    if (isset($_POST['id'])) {
        $payment_id = $_POST['id'];
    } else {
        die('Payment ID not provided');
    }
     $paymentController = new PaymentController();
     $payment =$paymentController->getPaymentById($payment_id);
   //  ob_start();  

    $invoice_id = str_pad($payment['payment_id'], 4, "0", STR_PAD_LEFT);
    $memberId =str_pad($payment['member_id'],4,"0",STR_PAD_LEFT);

    ob_start();
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
<h5>Member ID: ' . $memberId . '</h5>
<h5>Account Name: ' . $payment['user_name'] . '</h5>
<h5>Payment Method: Cash</h5>
<h5>Pay Date: ' . $payment['paid_date'] . '</h5>

<h5 style="text-align:right;">BRLRLR Gym</h5>
<h5 style="text-align:right;">'.$payment['user_address'].'</h5>
';

// Print the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

$pdfString =$pdf->Output('', 'S');

// Clear the output buffer and send the PDF
ob_end_clean(); // Clean (erase) the output buffer
//$pdf->Output('gym_invoice_' . $invoice_id . '.pdf', 'I'); // 'I' for inline view, 'D' for download


    if($payment_id !=null )
    {
        $email = $payment['user_email'];
        $name  = $payment['user_name'];
        
        $mail = new PHPMailer(true);
        try {
            // Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
        
            $mail->Username = 'pyaephyokyaw121318@gmail.com'; // YOUR gmail email
            $mail->Password = 'cmwc stzc unvy idjk'; // YOUR gmail password
        
            // Sender and recipient settings
            $mail->setFrom('pyaephyokyaw121318@gmail.com', 'Pyae Phyo Kyaw');
            $mail->addAddress($email, $name);
           // $mail->addReplyTo('example@gmail.com', 'Sender Name'); // to set the reply to

           $mail->addStringAttachment($pdfString,'gym_invoice.pdf');
        
            // Setting the email content
            $mail->IsHTML(true);
            $mail->Subject ="Plan Infromation". $payment['payment_id'];

            $message = "Thanks yor for Choosing  us...";
            $message.="<br> Your Plan detial is as follows";
            
            $message.="<br>";
            $message.="This is body of Invoice and Test";
            

            $mail->Body = $message;
            

            //$mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';
        
        
            // foreach($_FILES['attachments']['name'] as $key=>$value)
            // {
            //     $mail->addAttachment($_FILES['attachments']['tmp_name'][$key],$_FILES['attachments']['name'][$key]);
            // }
        
            if($mail->send())
            {
                $message = "Email is successfully send";
            }
            else{
                $message="Error in message";
            }
            echo $message;
        } catch (Exception $e) {
            echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
        }
    }

?>