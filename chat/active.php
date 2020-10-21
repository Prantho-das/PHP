<?php include "inc/header.php"; ?>
<section class="bg-light py-4">
    <div class="container-fluid py-5">
        <h1 class="text-center">Active Friends</h1>
        <h4 class="text-center mb-5">Chat With Your Active Friends</h4>
        <div class="row pl-md-5 ml-md-4 my-5">
            <?php
            $usesel = "SELECT * FROM user WHERE status=1 AND email !='$emai'";
            $query = mysqli_query($connect, $usesel);
            $num = mysqli_num_rows($query);
            if ($num > 0) {
                while ($row = mysqli_fetch_assoc($query)) { ?>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card bg-success text-light" style="width: 18rem;">
                            <img src="img/people.jpg" style="height:200px;" class=" img-fluid card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['f_name']; ?></h5>
                                <p class="card-text"><?php echo $row['abt']; ?></p>
                                <a href="chat.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Chat now</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "Sorry";
            }
            ?>
        </div>
        <h1 class="text-center">All Friends</h1>
        <div class="row pl-md-5 ml-md-4 my-5">
        <?php
            $ausesel = "SELECT * FROM user where email !='$emai'";
            $aquery = mysqli_query($connect, $ausesel);
            $anum = mysqli_num_rows($aquery);
            if ($anum > 0) {
                while ($arow = mysqli_fetch_assoc($aquery)) { ?>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card bg-success text-light" style="width: 18rem;">
                            <img src="img/people.jpg" style="height:200px;" class=" img-fluid card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $arow['f_name']; ?></h5>
                                <p class="card-text"><?php echo $arow['abt']; ?></p>
                                <a href="chat.php?id=<?php echo $arow['id']; ?>" class="btn btn-primary">Chat now</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "Sorry";
            }
            ?>
        </div>
        <?php include "inc/footer.php"; ?>