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
    <h4 class="my-title text-center">Users</h4>
    <form name="lookup-form" method="post" action="search.php">
      <input class="input-field" type="text" placeholder="Search" name="lookup">
      <div class="input-field">
        <p>
          <label>
            <input value="name" name="param-group" type="radio" checked />
            <span>Name</span>
          </label>
        </p>
        <p>
          <label>
            <input value="phone" name="param-group" type="radio" />
            <span>Phone</span>
          </label>
        </p>
        <p>
          <label>
            <input value="email" name="param-group" type="radio"  />
            <span>Email</span>
          </label>
        </p>
      </div>
      <button class="btn" name="btn-logout">Search</button>
    </form>
    <ul class="collection">
      <?php
        // Create connection
        $conn = new mysqli("localhost", "root", "", "my-company");
        
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        
        $result = $conn->query("select * from users");

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
      <form name="new-user-form" method="post" action="new-user.php">
        <button class="btn" name="btn-logout">Add User</button>
      </form>
  </div>

  <!-- <script src="external/jquery/jquery.js"></script>
  <script src="jquery-ui.min.js"></script> -->
  <script type="text/javascript" src="../../lib/materialize/js/materialize.min.js"></script>
</body>

</html>