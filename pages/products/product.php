<!DOCTYPE html>
<html>

<head>
  <!-- <link rel="stylesheet" href="jquery-ui.min.css"> -->
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Permanent+Marker" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="../../lib/materialize/css/materialize.min.css"
    media="screen,projection" />
  <!-- My CSS -->
  <link type="text/css" rel="stylesheet" href="../../css/comms.css" />
  <link type="text/css" rel="stylesheet" href="../../pages/about/about.css" />
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
  <?php
    include '../../nav/nav-standard.php';
    $product = json_decode($_POST['product'], true);

    $cache = [];
    if (isset($_COOKIE["recent_products"]))
      $cache = json_decode($_COOKIE["recent_products"], true);

    // only latest 5 products
    if (count($cache) == 5) return;
    
    $hasThisProduct = false;
    foreach ($cache as &$c) {
      if ($c['id'] == $product['id']) {
        $hasThisProduct = true;
        break;
      }
    }
    if (!$hasThisProduct) array_push($cache, $product);

    setcookie('recent_products', json_encode($cache), time() + 60, '/');
  ?>

  <div class="container">
    <h4 class="my-title text-center">Product</h4>
    <div class="news">
      <div class="row">
        <div class="col s12 m12">
          <div class="row">
            <div class="col s12">
              <div class="card">
                <div class="card-content">
                  <span class="card-title"><?php echo $product['title'] ?></span>
                  <p><?php echo $product['content'] ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- <script src="external/jquery/jquery.js"></script>
  <script src="jquery-ui.min.js"></script> -->
  <script type="text/javascript" src="../../lib/materialize/js/materialize.min.js"></script>
</body>

</html>