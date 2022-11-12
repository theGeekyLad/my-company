<!DOCTYPE html>
<html>

<head>
  <!-- <link rel="stylesheet" href="jquery-ui.min.css"> -->
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Permanent+Marker" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../../lib/materialize/css/materialize.min.css" media="screen,projection" />
  <!-- My CSS -->
  <link type="text/css" rel="stylesheet" href="../../css/comms.css" />
  <link type="text/css" rel="stylesheet" href="../../pages/about/about.css" />
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
  <?php include '../../nav/nav-standard.php';?>

  <div class="container">
    <h4 class="my-title text-center">User Lookup</h4>
    <ul class="collection">
      <?php
        // Create connection
        $conn = new mysqli("localhost", "root", "", "my-company");
        
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        $q = 'select * from users where ' . $_POST['param-group'] . ' like "%' . $_POST['lookup'] . '%"';
        $result = $conn->query($q);

        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            ?>
            <li class="collection-item avatar">
              <i class="material-icons circle">folder</i>
              <span class="title"><?php echo $row["name"] ?></span>
              <p><?php echo $row["phone"] ?><br>
                <?php echo $row["email"] ?>
              </p>
            </li>
            <?php
          }
        } else {
          echo "0 results";
        }
        $conn->close();
      ?>
      </ul>
  </div>

  <!-- <script src="external/jquery/jquery.js"></script>
  <script src="jquery-ui.min.js"></script> -->
  <script type="text/javascript" src="../../lib/materialize/js/materialize.min.js"></script>
</body>

</html>
