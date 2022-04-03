<?php
    include("conn.php");
    // $adminID = $_SESSION['user_id'];
    $adminID = '1';

    if (isset($_GET['ticketID'])) {
        $ticketID = $_GET['ticketID'];
    }
    else {
        echo "<script>
                alert('Error: No ticket to reply.');
                window.location.href= 'SupportAdmin.php';
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
    <script>
        var status = <?php 
                    echo $status;
                    ?>;
    </script>
</head>
<body>
    <!-- Header  -->
    <div class="header">
        <div class="inner_header">
            <div class="logo">
                <a href ="admin.php" class="logoStyle"><li>Engineiva (Admin)</li></a> 
            </div>
            <div class="logout">
                <a href ="logout.php"><img src="logout.png" alt="Logout" id="logout_style"></a> 
            </div>
        </div>
    </div>

    <!-- Container Box Here  -->
    <div class="main-container">
        <div class="button-row">
            <div class="back-btn" onclick="window.location.href='SupportAdmin.php'">
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
                             echo "<img src='../SupportCust/img/$image'>";
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
            $sql = "UPDATE support_ticket
                    SET ticketStatus = 'F'
                    WHERE ticketID = '$ticketID'";

            if(!mysqli_query($con, $sql)) {
                echo "<script>('Error in updating status!')</script>";
            }
            else {
                echo "<script>alert('Update status success!')</script>";
            }
            // echo "<script>alert('yeet')</script>";
        }
    ?>
</body>