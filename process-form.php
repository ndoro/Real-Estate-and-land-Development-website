
<?php
          if (isset($_POST["submit"] )) 
        {
                //assigning subscriber email to a variable
                $name = trim(filter_input(INPUT_POST,"name",FILTER_SANITIZE_STRING));
                $email = trim(filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL));
                $subject = trim(filter_input(INPUT_POST,"subject",FILTER_SANITIZE_STRING));
                $message = trim(filter_input(INPUT_POST,"message",FILTER_SANITIZE_STRING));
                $br=  "<br>";

                //including the autoloader file...
                include 'vendor/autoload.php';
                require_once ('phpmailer/phpmailer/PHPMailerAutoload.php');
                //instantiating the PHPMailer...
                $mail = new PHPMailer;
                //Set mailer to use SMTP....
                $mail->isSMTP();    
                //Specify main and backup SMTP servers...
                $mail->Host = 'mail.shinga.co.zw';
                //Enable SMTP authentication...
                $mail->SMTPAuth = true;   
                //// HOST email id and password...    
                $mail->Username = 'geofrey@shinga.co.zw';
                $mail->Password = 'geofrey123#;'; 
                //Securing SMTP...tls or ssl...
                $mail->SMTPSecure = '';
                //587 is used for Outgoing Mail (SMTP) Server(tls)...
                 //465 is used for Outgoing Mail (ssl) Server
                $mail->Port = 25;     
                //setFrom is where the email is coming from...
                $mail->setFrom($email, $name);
                //addReplyTo is where the email is to be replied to...
                $mail->addReplyTo($email, $name);
                //addAddress is where the email is going(recepient)...
                $mail->addAddress('geofrey@shinga.co.zw');
                
                //Set email format to HTML...
                $mail->isHTML(true);  
                //email subject...
                $subject="Feedback from your website: " .$subject;
                $mail->Subject = $subject;
                //email body...

                $message= "You have received a feedback email from ".$name .$br.$br.$message;
                $mail->Body = $message;
                
                //check if mail fails to send...
                if(!$mail->send()){
                    echo "we have finally failed terribly";
                    exit();

                    //send used to send email...
                   //displaying error message...
                   echo 'Message could not be sent.';
                   //echo 'Mailer Error: ' . $mail->ErrorInfo;
                   echo '<script language=javascript>alert("zvaramba")</script>';
                    header("location:contacts.php");
                    exit;
                }else
                {
                    echo "we have finally succeeded";
                    exit();
                    //email sent...
                    header("location:index.php");
                    //echo '<script language=javascript>alert("zvaita")</script>';
                }


    }
    

?>
