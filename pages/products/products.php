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
  <?php include '../../nav/nav-standard.php';?>

  <div class="container">
    <h4 class="my-title text-center">Products</h4>
    <?php
      $product_data = [
        array(
          "id" => 0,
          "title" => "Software Development",
          "content" => "We build software for you. Contact us."
        ),
        array(
          "id" => 1,
          "title" => "Hardware Upgrades",
          "content" => "Need an upgrade? We've got your back! If you're running a slow laptop or need more disk space, contact us."
        ),
        array(
          "id" => 2,
          "title" => "System Update",
          "content" => "If your Windows version is old, come hit us up for an upgrade! Windows 10 is old; we can help you out to upgrade to Windows 11."
        )
      ];
      if (isset($_COOKIE["recent_products"])) {
      ?>
      <div class="news">
        <h5>You recently saw ...</h5>
        <div class="row">
          <?php
            $products = json_decode($_COOKIE["recent_products"], true);
            for ($i = 0; $i < count($products); $i++) {
              $product = $products[$i];
              ?>
              <div class="col s12 m6">
                <div class="row">
                  <div class="col s12">
                    <div class="card">
                      <div class="card-content">
                        <span class="card-title"><?php echo $product['title'] ?></span>
                        <p><?php echo $product['content'] ?></p>
                      </div>
                      <div class="card-action">
                        <form method="post" action="product.php">
                          <input type="hidden" name="product" value="<?php echo htmlspecialchars(json_encode($product), ENT_QUOTES, 'UTF-8') ?>">
                          <button type="submit" class="waves-effect waves-teal btn-flat" name="btn-logout">Read More</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php
            }
          ?>
        </div>
      </div>
      <hr>
      <?php
      }
    ?>
    <div class="news">
      <div class="row">
        <?php
          for ($i = 0; $i < count($product_data); $i++) {
            $product = $product_data[$i];
            ?>
            <div class="col s12 m6">
              <div class="row">
                <div class="col s12">
                  <div class="card">
                    <div class="card-content">
                      <span class="card-title"><?php echo $product['title'] ?></span>
                      <p><?php echo $product['content'] ?></p>
                    </div>
                    <div class="card-action">
                      <form method="post" action="product.php">
                        <input type="hidden" name="product" value="<?php echo htmlspecialchars(json_encode($product), ENT_QUOTES, 'UTF-8') ?>">
                        <button type="submit" class="waves-effect waves-teal btn-flat" name="btn-logout">Read More</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php
          }
        ?>
      </div>
    </div>
  </div>

  <!-- <script src="external/jquery/jquery.js"></script>
  <script src="jquery-ui.min.js"></script> -->
  <script type="text/javascript" src="../../lib/materialize/js/materialize.min.js"></script>
</body>

</html>