<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php
if (isset($_GET["id"])) {
    $id = $_GET['id'];
    $up = "UPDATE contact SET status='0' WHERE ID=$id";
    $uplog = $db->update($up);
}
if (isset($_REQUEST['submit'])) {
    $from = help::validate($_POST["sender"]);
    $to = help::validate($_POST["email"]);
    $sub = help::validate($_POST["subject"]);
    $message = help::validate($_POST["message"]);
    $mail = mail($to, $sub, $message, $from);
    if ($mail == true) {
        echo "<h1 style='color:green'>Sent</h1>";
    } else {
        echo "<h1 style='color:red'>Not Sent</h1>";
    }
}
$select = "SELECT * FROM contact where id=$id";
$query = $db->select($select);
while ($contact = mysqli_fetch_array($query)) { ?>
    <form action="" method="post" class="inbox">
        <table>
            <tr>
                <td>Sender Email Address:</td>
                <td>
                    <input type="email" name="sender" placeholder="Enter Your Email" required="1" />
                </td>
            </tr>
            <tr>
                <td>Recevier Email Address:</td>
                <td>
                    <input type="email" readonly name="email" value="<?php echo $contact['email'] ?>" required="1" />
                </td>
            </tr>
            <tr>
                <td>Your Subject:</td>
                <td>
                    <input type="text" name="subject" placeholder="Enter Subject" required="1" />
                </td>
            </tr>
            <tr>
                <td>Your Message:</td>
                <td>
                    <textarea name="message"></textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input style='color:white;border:none; background:green;border-radius:20px;padding:0.5rem 1.2rem' type="submit" name="submit" value="Submit" />
                </td>
            </tr>
        </table>
        <form>
        <?php
    }
        ?>
        <?php include 'inc/footer.php' ?>