<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <title>Contact Us</title>
</head>

<body>
    <div class="contact-details">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7033888.2972716335!2d37.871539752890435!3d30.59121225601097!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1502d53f1c2972af%3A0xefccb3a10ba07e6f!2sRed%20Crescent%20Guesthouse%20-%20Hotel%20Ramallah%20Al-Bireh!5e0!3m2!1sar!2seg!4v1712587075416!5m2!1sar!2seg" width="500" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        <div class="details">
            <p><i class="fas fa-map-marker-alt"></i> Jerusalem Street, Ramallah, Palestine</p>
            <p><i class="fas fa-phone"></i> +972 2 297 8520</p>
            <p><i class="fas fa-clock"></i> Sunday - Thursday: 10:00 AM - 3:00 PM</p>
            <p><i class="fas fa-clock"></i> Saturday: 10:00 AM - 3:00 PM</p>
            <p><i class="fas fa-clock"></i> Friday: Closed</p>
            <p><i class="fas fa-envelope"></i> info@palestinercs.org</p>
            <p><i class="fas fa-globe"></i> <a href="https://www.palestinercs.org/" id="web1" target="_blank">https://www.palestinercs.org/</a></p>
        </div>
    </div>

    <!-- start [contact] -->
    <div id="section_contact">
        <div class="container">
            <div class="title">Contact Us</div>
            <div class="main">
                <form method="post" action="">
                    <div class="inputs">
                        <input type="text" class="textInp" name="first_name" placeholder="First Name" required>
                        <input type="text" class="textInp" name="second_name" placeholder="Second Name" required>
                        <input type="email" class="textInp" name="email" placeholder="Your Email" required>
                        <textarea class="qsInp" name="message" placeholder="Type your message ..." required></textarea>
                    </div>
                    <button type="submit" class="pushable" name="submit">
                        <span class="shadow"></span>
                        <span class="edge"></span>
                        <span class="front">Submit</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        include './connect.php';

        $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
        $second_name = mysqli_real_escape_string($conn, $_POST['second_name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        $name = $first_name . ' ' . $second_name;

        $stmt = mysqli_prepare($conn, "INSERT INTO ContactUs (FullName, Email, Message) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $message);
        $x = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if ($x) {
            echo "<script>alert('Your Message Sent Successfully, And We Will Contact With You.');</script>";
            exit();
        } else {
            echo "<script>alert('Not Completed');</script>";
        }
    }
    ?>
</body>

</html>