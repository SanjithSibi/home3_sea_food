<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['form_submit'])) {
    // Collect form data
    $user_name = $_POST['name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $education = $_POST['education'];
    $occupation = $_POST['occupation'];
    $pan = $_POST['pan'];
    $gst = $_POST['gst'];
    $res_address = $_POST['res_address'];
    $res_state = $_POST['res_state'];
    $res_pin = $_POST['res_pin'];
    $mobile1 = $_POST['mobile1'];
    $mobile2 = $_POST['mobile2'];
    $email = $_POST['email'];
        $exp = $_POST['exp'];

    $pl1 = $_POST['pl1'];
    $pl2 = $_POST['pl2'];
    $pl3 = $_POST['pl3'];
    $ref = $_POST['ref'];
   

    // File upload handling
    if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
        $file_tmp_path = $_FILES['file']['tmp_name'];
        $file_name = $_FILES['file']['name'];
        $file_size = $_FILES['file']['size'];
        $file_type = $_FILES['file']['type'];
        $file_error = $_FILES['file']['error'];

        $upload_dir = 'uploads/';
        $dest_path = $upload_dir . $file_name;

        if (move_uploaded_file($file_tmp_path, $dest_path)) {
            $upload_status = "File uploaded successfully.";
        } else {
            $upload_status = "There was an error moving the uploaded file.";
        }
    } else {
        $upload_status = "No file uploaded or upload error.";
    }

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'franchiseenquirys@gmail.com';
        $mail->Password = 'cvrzvsyejirnrufv'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('franchiseenquiry@gmail.com', 'Franchise Enquiry');
        $mail->addAddress('franchise@marakkaar.com', 'Franchise');

        // Attachments
        if (isset($dest_path) && file_exists($dest_path)) {
            $mail->addAttachment($dest_path);
        }

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Franchisee Applicant Details';
        $mail->Body = "
            <b>Name:</b> $user_name<br>
            <b>Date of Birth:</b> $dob<br>
            <b>Education:</b> $education<br>
            <b>Occupation:</b> $occupation<br>
            <b>Gender:</b> $gender<br>
            <b>PAN:</b> $pan<br>
            <b>GST:</b> $gst<br>
            <b>Residence Address:</b> $res_address<br>
            <b>State:</b> $res_state<br>
            <b>Pin Code:</b> $res_pin<br>
            <b>Mobile No 1:</b> $mobile1<br>
            <b>Mobile No 2:</b> $mobile2<br>
            <b>Email:</b> $email<br>
            <b>Current Business Experience:</b> $exp<br>
            <b>Preferred Location 1:</b> $pl1<br>
            <b>Preferred Location 2:</b> $pl2<br>
            <b>Preferred Location 3:</b> $pl3<br>
            <b>Reffered By:</b> $ref<br>
            <b>File Upload Status:</b> $upload_status<br>
        ";

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Franchise Enquiry Form</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        :root {
            --main-blue: #363d41;
            --main-purple: #ff0000;
            --main-grey: #ccc;
            --sub-grey: #d9d9d9;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            background-color: #000;
        }

        .container {
            max-width: 700px;
            width: 100%;
            background: #fff;
            padding: 25px 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container .title {
            font-size: 25px;
            font-weight: 500;
            position: relative;
        }

        .container .title::before {
            content: "";
            position: absolute;
            height: 3.5px;
            width: 30px;
            background: linear-gradient(135deg, var(--main-blue), var(--main-purple));
            left: 0;
            bottom: 0;
        }

        .container form .user__details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 20px 0 12px 0;
        }

        form .user__details .input__box {
            width: calc(50% - 20px);
            margin-bottom: 15px;
        }

        .user__details .input__box .details {
            font-weight: 500;
            margin-bottom: 5px;
            display: block;
        }

        .user__details .input__box input,
        .user__details .input__box select,
        .user__details .input__box textarea {
            height: 45px;
            width: 100%;
            outline: none;
            border-radius: 5px;
            border: 1px solid var(--main-grey);
            padding-left: 15px;
            font-size: 16px;
            border-bottom-width: 2px;
            transition: all 0.3s ease;
        }

        .user__details .input__box select {
            height: 50px;
            padding-right: 15px;
        }

        .user__details .input__box textarea {
            height: auto;
            resize: vertical;
            padding: 10px;
        }

        .user__details .input__box input:focus,
        .user__details .input__box select:focus,
        .user__details .input__box textarea:focus {
            border-color: var(--main-purple);
        }

        form .gender__details .gender__title {
            font-size: 20px;
            font-weight: 500;
        }

        form .gender__details .category {
            display: flex;
            width: 80%;
            margin: 15px 0;
            justify-content: space-between;
        }

        .gender__details .category label {
            display: flex;
            align-items: center;
        }

        .gender__details .category .dot {
            height: 18px;
            width: 18px;
            background: var(--sub-grey);
            border-radius: 50%;
            margin: 10px;
            border: 5px solid transparent;
            transition: all 0.3s ease;
        }

        #dot-1:checked~.category .one,
        #dot-2:checked~.category .two,
        #dot-3:checked~.category .three {
            border-color: var(--sub-grey);
            background: var(--main-purple);
        }
        #dot-4:checked~.category .one,
        #dot-5:checked~.category .two,
        #dot-6:checked~.category .three {
            border-color: var(--sub-grey);
            background: var(--main-purple);
        }

        form input[type="radio"] {
            display: none;
        }

        form .button {
            height: 45px;
            margin: 45px 0;
        }

        form .button input {
            height: 100%;
            width: 100%;
            outline: none;
            color: #fff;
            border: none;
            font-size: 18px;
            font-weight: 500;
            border-radius: 5px;
            background: linear-gradient(135deg, var(--main-blue), var(--main-purple));
            transition: all 0.3s ease;
            cursor: pointer;
        }

        form .button input:hover {
            background: linear-gradient(-135deg, var(--main-blue), var(--main-purple));
        }

        textarea {
            resize: vertical;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid var(--main-grey);
        }

        .user__details textarea:focus {
            border-color: var(--main-purple);
        }

        .category {
            width: 100%;
        }

        .details {
            display: block;
            margin-bottom: 5px;
        }

        .button {
            display: flex;
            justify-content: center;
        }

        .button input[type="submit"] {
            cursor: pointer;
            padding: 10px 20px;
        }

        @media only screen and (max-width: 480px) {
            .input__box,
            .category,
            textarea {
                width: 100%;
            }

            .container {
                padding: 20px;
            }

            .button input[type="submit"] {
                width: 100%;
            }

            form .user__details .input__box {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="title">Identity Details</div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="user__details">

                <div class="input__box">
                    <span class="details">Image of the Applicant:</span>
                    <input type="file" name="file" id="file" required>
                </div>
            </div>

            <div class="user__details">

                <div class="input__box">
                    <span class="details">Name:</span>
                    <input type="text" name="name" required>
                </div>
                <div class="input__box">
                    <span class="details">Date of Birth</span>
                    <input type="date" name="dob" required>
                </div>

                <div class="input__box">
                    <span class="details">Educational Qualification:</span>
                    <select name="education" required>
                        <option value="" disabled selected>Select one</option>
                        <option value="12th">12th</option>
                        <option value="ug">U.G</option>
                        <option value="pg">P.G</option>
                        <option value="diploma">I.T.I/Diploma</option>
                    </select>
                </div>
                <div class="input__box">
                    <span class="details">Occupation</span>
                    <input type="text" name="occupation" required>
                </div>
 
                <div class="gender__details">
                    <input type="radio" name="gender" id="dot-1" value="Male">
                    <input type="radio" name="gender" id="dot-2" value="Female">
                    <input type="radio" name="gender" id="dot-3" value="Prefer not to say">
                    <span class="gender__title">Gender</span>
                    <div class="category">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span>Male</span>
                        </label>
                        <label for="dot-2">
                            <span class="dot two"></span>
                            <span>Female</span>
                        </label>
                        <label for="dot-3">
                            <span class="dot three"></span>
                            <span>Others</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="user__details">
                <div class="input__box">
                    <span class="details">PAN No.</span>
                    <input type="text" name="pan" required>
                </div>
            </div>
            <div class="user__details">
                <div class="input__box">
                    <span class="details">G.S.T No.</span>
                    <input type="text" name="gst" required>
                </div>
            </div>

            <div class="title">Address Details</div>
            <div class="user__details">
                <div class="input__box">
                    <span class="details">Residence Address:</span>
                    <textarea name="res_address" rows="4" required></textarea>
                </div>
                <div class="input__box">
                    <span class="details">State:</span>
                    <input type="text" name="res_state" required>
                </div>
                <div class="input__box">
                    <span class="details">Pin Code:</span>
                    <input type="number" name="res_pin" required>
                </div>
            </div>

            <div class="title">Contact Details</div>
            <div class="user__details">

                <div class="input__box">
                    <span class="details">Mobile No 1:</span>
                    <input type="number" name="mobile1" required>
                </div>
                <div class="input__box">
                    <span class="details">Mobile No 2:</span>
                    <input type="number" name="mobile2" required>
                </div>
                <div class="input__box">
                    <span class="details">Email:</span>
                    <input type="email" name="email" required>
                </div>
            </div>
            <div class="title">Current Business Experience</div>

            <div class="user__details">

                

        
 
                <div class="gender__details">
                    <input type="radio" name="exp" id="dot-4" value="yes">
                    <input type="radio" name="exp" id="dot-5" value="no">
                    <div class="category">
                        <label for="dot-4">
                            <span class="dot one"></span>
                            <span>Yes</span>
                        </label>
                        <label for="dot-5">
                            <span class="dot two"></span>
                            <span>No</span>
                        </label>
                       
                    </div>
                </div>
            </div>
                <div class="user__details">

                <div class="input__box">
                    <input type="text" name="exp1" placeholder="If yes, Mention the annual turnover">
                </div>
                </div>
                <div class="user__details">

                <div class="input__box">
                    <input type="text" name="exp2" placeholder="If yes, How many years?">
                </div>

            </div>
           

                <div class="user__details">
                    <div class="input__box">
                        <span class="details">Preferred Location 1</span>
                        <input type="text" name="pl1" required>
                    </div>
                    <div class="input__box">
                        <span class="details">Preferred Location 2</span>
                        <input type="text" name="pl2" required>
                    </div>
                    <div class="input__box">
                        <span class="details">Preferred Location 3</span>
                        <input type="text" name="pl3" required>
                    </div>
                </div>
                 <div class="user__details">
                    <div class="input__box">
                        <span class="details">Ref. by</span>
                        <input type="text" placeholder="Employee Code" name="ref" required>
                    </div></div>

                <div class="button">
                    <input type="submit" name="form_submit" value="Submit">
                </div>
            </div>
        </form>
    </div>

</body>

</html>