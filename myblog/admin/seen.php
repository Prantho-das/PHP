<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>
<?php
if (isset($_GET["seen"])) {
    $id = $_GET['seen'];
    $up = "UPDATE contact SET status='0' WHERE ID=$id";
    $uplog = $db->update($up);
}
$select = "SELECT * FROM contact where id=$id";
$query = $db->select($select);
while ($contact = mysqli_fetch_array($query)) { ?>
    <form action="" method="post" class="inbox">
        <table>
            <tr>
                <td>Your First Name:</td>
                <td>
                    <input readonly type="text" name="firstname" value='<?php echo $contact['fn']; ?>' required="1" />
                </td>
            </tr>
            <tr>
                <td>Your Last Name:</td>
                <td>
                    <input readonly type="text" name="lastname" value='<?php echo $contact['ln']; ?>' required="1" />
                </td>
            </tr>
            <tr>
                <td>Your Email Address:</td>
                <td>
                    <input readonly type="email" name="email" value='<?php echo $contact['email']; ?>' required="1" />
                </td>
            </tr>
            <tr>
                <td>Your Subject:</td>
                <td>
                    <textarea name="subject">
                        <?php echo $contact['sub']; ?>
                    </textarea>
                </td>
            </tr>
            <tr>
                <td>Your Message:</td>
                <td>
                    <textarea readonly name="message">
                        <?php echo $contact['sub']; ?>
                    </textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <a style='color:white; background:green;border-radius:20px;padding:0.5rem 1.2rem' href="reply.php?id=<?php echo $contact['id']; ?>">Reply</a>
                </td>
            </tr>

        </table>
    <?php
}
    ?>
    <?php include 'inc/footer.php' ?>
