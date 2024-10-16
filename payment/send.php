<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once  '../vendor/Exception.php';
require_once   '../vendor/PHPMailer.php';
require_once   '../vendor/SMTP.php';

    include_once ("../controllers/payment-controller.php");

    $payment_id =$_POST['id'];
     $paymentController = new PaymentController();
     $payment =$paymentController->getPaymentById($payment_id);
    // $order_items=$orderController->getOrderItems($order_id);


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
        
            $mail->Username = 'pyaephyoe2345@gmail.com'; // YOUR gmail email
            $mail->Password = 'qyzp tljd mayk mtaj'; // YOUR gmail password
        
            // Sender and recipient settings
            $mail->setFrom('pyaephyokyaw121318@gmail.com', 'Pyae Phyo Kyaw');
            $mail->addAddress($email, $name);
           // $mail->addReplyTo('example@gmail.com', 'Sender Name'); // to set the reply to
        
            // Setting the email content
            $mail->IsHTML(true);
            $mail->Subject ="Order Infromation". $order['order_id'];

            $message = "Thanks yor for Shopping with us...";
            $message.="<br> THw order detial is as follows";
            
            $message.="<br> <table>
            <tr>
            <td>".$name."<br>".$email."<br>"
            .$order['phone'].",".$order['street'].","
            .$order['city'].",".$order['state']."</td>".
            "<td> OrderId :".$order['order_id']."<br> OrderDate: ".$order['order_date'].","
            .$order['required_date']."</td>".
            "</tr>".
            "</table>";

            $message.="<br><tabel border=1>";
            $total=0;
            foreach($order_items as $order_item)
            {
                $message .="<tr>";
                $message .="<td>".$order_item['pname']."</td>";
                $message .="<td>".$order_item['list_price']."</td>";
                $message .="<td>".$order_item['quantity']."</td>";
                $message .="<td>".$order_item['discount']."</td>";
                $message .="<td>".$order_item['list_price']*$order_item['quantity']."</td>";
                $message .="</tr>";
                $total+=($order_item['list_price']*$order_item['quantity']);

            }
            $message .= "<tr>";
            $message .= "<td colspan='4'> Total:</td>";
            $message .= "<td>".$total."</td>";
            $message .= "</tr>";
            $message .= "</table>";

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