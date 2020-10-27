<?php include('class.php'); ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">

  <title>Navbar</title>
  <style>
    * {
      margin: 0px;
      padding: 0px;
      box-sizing: border-box;
    }

    nav {
      padding: 1.2rem 0rem;
      box-shadow: 0px 3px 4px rgba(0, 0, 0, 0.404);

    }

    a {
      text-decoration: none;
      font-size: 1.4rem;
      text-transform: capitalize;
    }

    .main {
      display: flex;
      float: right;
    }

    .main li {
      display: flex;
      position: relative;
      padding: 0.3rem 1.3rem;
    }

    .main li:hover {
      background: rgba(0, 0, 255, 0.349);
    }

    .main ul li:hover {
      background: rgba(0, 0, 255, 0.712);
    }

    ul li a:hover {
      color: white;
    }

    .main ul {
      display: none;
      background-color: khaki;
      position: absolute;
      top: 3rem;
      right: 0;
      text-align: center;
      transition: 0.5s linear;
      padding: 1.2rem 0rem;
      overflow: hidden;
      background-position: top;
    }

    .main li:hover ul {
      display: block;
    }
  </style>
</head>

<body>
  <!--Navbar-->
  <!-- <nav class="navbar navbar-expand-md navbar-light">
    <div class="container">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
            <ul>
              <li class="">Web</li>
              <li class="">Graphics</li>
              <li class="">Apps</li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav> -->
  <!--Navbar-->
  <header>
    <nav class="navbar navbar-expand-md navbar-light">
      <div class="container">
        <a href="">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse pt-3 mr-auto navbar-collapse" id="navbarNav">
          <?php
          $select = "SELECT * FROM `main_nav` ORDER BY pos";
          $selq = mysqli_query($con, $select);
          if (mysqli_num_rows($selq) > 0) { ?>
            <ul class="main ml-auto">
              <?Php
              while ($row = mysqli_fetch_array($selq)) { ?>
                <li><a href="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></a>
                  <?php
                  $sselect = "SELECT * FROM `sub_nav` WHERE nid=$row[nid] ORDER by spos";
                  $sselq = mysqli_query($con, $sselect);
                  if (mysqli_num_rows($sselq) > 0) { ?>
                    <ul>
                      <?php
                      while ($roww = mysqli_fetch_array($sselq)) { ?>
                        <li><a href="<?php echo $roww['name']; ?>"><?php echo $roww['name']; ?></a></li>
                      <?php
                      } ?>
                    </ul>
                  <?php
                  }
                  ?>
                </li>
              <?php
              }
              ?>
            </ul>

          <?php
          } else {
            echo "<h4 class='text-info'>Please Insert Menu</h4>";
          }
          ?>
        </div>
      </div>
    </nav>
  </header>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper.js -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper.js and Bootstrap JS
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js" integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d" crossorigin="anonymous"></script>
    -->
</body>

</html>