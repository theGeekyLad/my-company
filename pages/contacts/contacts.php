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
  <nav>
    <div class="nav-wrapper blue darken-3">
      <a href="#" class="brand-logo pl-1 hide-on-med-and-down">The Incredible Insider</a>
      <ul id="nav-mobile" class="right d-flex justify-center">
        <!-- hide-on-med-and-down -->
        <li><a href="../../index.html">Home</a></li>
        <li><a href="../about/about.html">About</a></li>
        <li><a href="../news/news.html">News</a></li>
        <li><a href="#">Contacts</a></li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <h4 class="my-title text-center">Contacts</h4>
    <ul class="collection">
      <?php
      $myfile = fopen("../../assets/contacts.txt", "r") or die("Unable to open file!");
      while (!feof($myfile)) {
        $arr = explode(",", fgets($myfile));
      ?>
        <li class="collection-item avatar">
          <i class="material-icons circle">folder</i>
          <span class="title"><?php echo $arr[0] ?></span>
          <p><?php echo $arr[1] ?><br>
            <?php echo $arr[2] ?>
          </p>
          <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
        </li>
      <?php
      }
      fclose($myfile);
      ?>
    </ul>

  </div>

  <!-- <script src="external/jquery/jquery.js"></script>
  <script src="jquery-ui.min.js"></script> -->
  <script type="text/javascript" src="../../lib/materialize/js/materialize.min.js"></script>
</body>

</html>