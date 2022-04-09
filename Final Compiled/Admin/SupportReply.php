<?php
    include "ad-session.php";
    include 'admin-header.php';
    include("conn.php");
    if (!isset($_SESSION['user_id'])) {
        echo "<script>alert('Please login to proceed');
                    window.location.href='adminlogin.php';
            </script>";
    }
    $adminID = $_SESSION['user_id'];

    if (isset($_GET['ticketID'])) {
        $ticketID = $_GET['ticketID'];
    }
    else {
        echo "<script>
                alert('Error: No ticket to reply.');
                window.location.href= 'support-ticket.php';
            </script>";
    }

    // Get ticket info
    $sqlTicket = "SELECT * FROM support_ticket WHERE ticketID = '$ticketID'";
    $resultTicket = mysqli_query($con, $sqlTicket);
    $arrayTicket = mysqli_fetch_array($resultTicket);
    $status = $arrayTicket['ticketStatus'];
    $category = $arrayTicket['category'];
    $title = $arrayTicket['title'];
    $description = $arrayTicket['explaination'];
    $image = $arrayTicket['picture'];

    // Get user email
    $userID = $arrayTicket['custID'];
    $sql_email = "SELECT * FROM customer WHERE custID = '$userID'";
    $result_email = mysqli_query($con, $sql_email);
    $array_email = mysqli_fetch_array($result_email);
    $email = $array_email['email'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Support Ticket Page</title>

    <link rel="stylesheet" href="styleSupportReply.css">
    <link rel="stylesheet" href="admin-header.css">

    <script src="scriptSupportReply.js"></script>
</head>
<body>
    <!-- Modal Box Refund  -->
    <div id='refundModal' class='modal'>
            <div class='modalContent'>
                <a id='close' name='checkout' onclick="toggleRefund('close')">&times</a>
                <div class='modalHeader'>Add Refund Record </div>
                <div class="modalDescription">Please fill in refund information</div>
                
                <form action="#" class='refund-form' method="post">
                    <input type="text" id="custID" name='custID' value='<?php echo $userID ?>' hidden>
                    <table class="form-table">
                        <!-- Cust ID  -->
                        <tr>
                            <td>
                                <div class="title">
                                    CustID
                                </div>
                            </td>
                            <td>
                                <div class="form-input" id='custDisable'>
                                <input type="text" id="userID" disabled value='<?php echo $userID ?>' style='cursor: not-allowed;'>
                                </div>
                            </td>
                        </tr>
                        <!-- Car ID -->
                        <tr>
                            <td>
                                <div class="title">
                                    Car ID
                                </div>
                            </td>
                            <td>
                                <div class="form-input">
                                    <input type="number" min='1' max='1000' id="carID" name='carID' required>
                                </div>
                            </td>
                        </tr>
                        <!-- Fee  -->
                        <tr>
                            <td>
                                <div class="title">
                                    Secure Fee (RM)
                                </div>
                            </td>
                            <td>
                                <div class="form-input">
                                    <input type="number" min='1' id="fee" name="fee" required>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="submit-box">
                        <input type="submit" class="submit-btn" value="Submit" name="refundSubmit">
                    </div>
                </form>
            </div>
        </div>

    <!-- Container Box Here  -->
    <div class="main-container">
        <div class="button-row">
            <div class="back-btn" onclick="window.location.href='support-ticket.php'">
                < Back
            </div>
            <div class="statusBtn">
                <div id="pending">
                    Pending
                </div>
                <form method='post'>
                        <button type='submit'
                                class='status'
                                name='submitStatus'
                                id="done" 
                                onmouseover="doneHover('on', status)"
                                onmouseout="doneHover('off', status)">
                            Done
                        </button>
                </form>
            </div>
        </div>

        <div class="top-container">
            <div class="text-box">
                <div class="title">
                    Title:
                </div>
                <div class="description">
                    <?php
                        echo $title;
                    ?>
                </div>
            </div>
            <div class="text-box">
                <div class="title">
                    Category:
                </div>
                <div class="description">
                    <?php
                        echo $category;
                    ?>
                </div>
            </div>
            <div class="text-box">
                <div class="title">
                    Description
                </div>
                <div class="description">
                    <?php
                        echo $description;
                    ?>
                </div>
            </div>
            <div class="text-box">
                <div class="title">
                    Picture:
                </div>
                <div class="image-box">
                    <?php
                         if ($image == "") {
                             echo "<div class='description'>
                                    No image
                                    </div>";
                         }
                         else {
                             echo "<img src='../Customer/imgSupportCust/$image'>";
                         }
                    ?>
                </div>
            </div>
        </div>
        <div class="bottom-container">
            <a class="mail" href="mailto:<?php echo $email; ?>">
                Reply
            </a>
        </div>
    </div>
    <script>
        var status = "<?php echo $status; ?>";
        checkStatus(status);
    </script>

    <?php
        if (isset($_POST['submitStatus'])) {
            if ($category == "refund") {
                echo "<script>toggleRefund('open')</script>";
                return;
            }
            $sql = "UPDATE support_ticket
                    SET ticketStatus = 'F'
                    WHERE ticketID = '$ticketID'";

            if(!mysqli_query($con, $sql)) {
                echo "<script>('Error in updating status!')</script>";
            }
            else {
                echo    "<script>
                            alert('Update status success!');
                            window.location.href='support-ticket.php';
                        </script>";
            }

        }

        if (isset($_POST['refundSubmit'])) {
            $secureFee = $_POST['fee'];
            $carID = $_POST['carID'];
            $date = date("Y/m/d");
            $sqlRefund = "INSERT INTO refund (carID, custID, date, secureFee, paymentMethod) VALUES
                            ('$carID', '$userID', '$date', '$secureFee', 'Credit Card')";

            $sqlTicket = "UPDATE support_ticket
                            SET ticketStatus = 'F'
                            WHERE ticketID = '$ticketID'";

            if(mysqli_query($con, $sqlRefund)) {
                mysqli_query($con, $sqlTicket);
                echo    "<script>
                            alert('Update success!');
                            window.location.href='support-ticket.php';
                        </script>";
            }
            else {
                echo "<script>('Error in updating status!')</script>";
            }
        }
    ?>
</body>