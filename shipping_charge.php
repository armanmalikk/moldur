<?php 
require('functions.php');
session_start();

?><html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Free Web tutorials">
        <meta name="keywords" content="php,CSS,XML,JavaScript">
        <meta name="author" content="Hege Refsnes">
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSynGTe5RpwVIy0z0d3kb_M3_U-Q-jC74"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/mediaqueries.css">
        <link rel="stylesheet" href="style/animate.css">
        <link rel="stylesheet" href="styles/font-awesome.min.css">
        <link rel="stylesheet" href="styles/slick.css">
        <link rel="stylesheet" href="style/owl.carousel.css">
        <link rel="stylesheet" href="style/reset.css">
        <link rel="stylesheet" href="style/add_to_card.css">
        <link rel="stylesheet" href="style/card.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.0/themes/smoothness/jquery-ui.css">
        <script src="js/style.js"></script>

        <script src="js/kopa.js"></script>
        <script src="js/wow.min.js"></script>
        <title>Shipment price and date Test</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>
            function calculate_shipment_price_and_date() {
                //receiver_zip_code = 1;
                receiver_zip_code = $("#zip_code_receiver").val();
                //alert("valor: " + receiver_zip_code);
                window.location = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=&sDsSenha=&sCepOrigem=17011102&sCepDestino=" + receiver_zip_code + "&nVlPeso=1&nCdFormato=1&nVlComprimento=20&nVlAltura=5&nVlLargura=15&sCdMaoPropria=n&nVlValorDeclarado=0&sCdAvisoRecebimento=n&nCdServico=40010&nVlDiametro=0&StrRetorno=http://localhost/moldur/shipping_charge.php&nIndicaCalculo=3";

            }
        </script>
    </head>
    <body>
<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (!isset($_POST["Codigo_1"])) {
  ?>
<section id="main_log" >
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="col-sm-7">
                          <img src="images/amazon-logo.png" id="logo" class="wow bounceInDown">
                      </div>
                        <div class="col-sm-2">
                                <i class="fa fa-phone" aria-hidden="true" id="phone-number">(11)2365-6937</i>
                                <br>
                                <i class="fa fa-phone" aria-hidden="true" id="phone-number1">
                                (11)2365-6937</i>
                                <br>
                                <i class="fa fa-whatsapp" aria-hidden="true" id="phone-number1">
                                (11)2365-6937</i>
                                </div>
                      <div class="shopping-cart-wrapper col-sm-3">
                          <div class="col-sm-12" id="boss">
                              <img src="images/shopping_cart.png" id="shopping">
                              <h6 id="shopping-text">Cart</h6>
                                    </br>
                                <?php if(isset($_SESSION['user_id'])) :?>

                                    <h5><i><b> <?php echo user_name; ?></h5>
                                    <a href="log_out.php">Log Out</a>
                                <?php else: ?>

                                    <a href="login.php">Log in / Register</a>
                                <?php endif; ?>
                          </div>
                          <!----col-sm-4-------->
                          <style>
                             .potrait-frame-cart{
                               height:100px;
                               width:97px;
                               position: absolute;
                               z-index: 10;
                             }
                             .potraitImg-cart {
                          object-fit: cover;
                          height: 100px;
                          width: 95px;
                         }
                            </style>
                          <div class="container">
                               
                      </div>
                  </div>
              </div>
          </div>

          <section class="fixed-menu">
              <ul class="topnav" id="myTopnav">
                  <li>
                      <a  href="index.php" id="home">Home</a>
                  </li>
                  <li>
                      <a href="gallery.php" >Galeria</a>
                  </li>
                  <li>
                      <a href="fram_choose.php" class="active">Quadros</a>
                  </li>
                  <li>
                      <a href="picture.php">Temas</a>
                  </li>
                  <li>
                      <a href="about.php">Sobre</a>
                  </li>
                  <li>
                      <?php if(isset($_SESSION['user_id'])) :?>
                            <a href="cart.php">Cart</a>
                        <?php else: ?>
                            <a href="login.php">Login</a>
                        <?php endif; ?>
                  </li>
                  <li class="icon">
                      <a href="javascript:void(0);" style="font-size:15px;" onclick="myFunction()">☰</a>
                  </li>
              </ul>
          </section>
      </section><!-- end header-->
            <style>
                #fill{
                    margin-left: 200px;
                    margin-top: 30px;
                     font-family: "Times New Roman", Georgia, Serif;
                        font-weight: 800;
                }
                #zip_code_receiver {
    margin-left: 200px;
    border: 3px solid #1e1e1c;
    width: 16%;
    height: 40px;
    border-radius: 6px;
    margin-bottom: 3%;
}
               #button-fill {
    width: 10%;
    height: 37px;
    border-radius: 5px;
    background-color: #1ab188;
    color: #231e1e;
    margin-left: 14px;
    font-size: 19px;
    font-weight: 700;
}
            </style>
            <form>
                <h2 id="fill">Enter Your Zip Code</h2>
                <input id="zip_code_receiver" type="text">
                <input id="button-fill" type="button" value="Enter" onclick="calculate_shipment_price_and_date()">
            </form>
    
    
     <section>
              <div id="contact-map" style="height:400px;"></div>
      </section>
      
<?php
} else {

    ?>
        
                <?php
                    // echo $_POST["Codigo_1"];
                    // echo $_POST["Valor_1"];
                    // echo $_POST["PrazoEntrega_1"];
                ?>
<?php if(isset($_POST["Valor_1"])){
    header("location:add_to_card.php?shipping_charge={$_POST['Valor_1']}");
}
}
?>
    <script src="js/main.js"></script>
    </body>
</html>