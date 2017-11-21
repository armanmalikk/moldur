
 <html>
    <head>
        <title>Shipment price and date Test</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>
            function calculate_shipment_price_and_date() {
                //receiver_zip_code = 1;
                receiver_zip_code = $("#zip_code_receiver").val();
                //alert("valor: " + receiver_zip_code);

                // window.location = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=&sDsSenha=&sCepOrigem=17011102&sCepDestino=" + receiver_zip_code + "&nVlPeso=1&nCdFormato=1&nVlComprimento=20&nVlAltura=5&nVlLargura=15&sCdMaoPropria=n&nVlValorDeclarado=0&sCdAvisoRecebimento=n&nCdServico=40010&nVlDiametro=0&StrRetorno=http://localhost/index.php&nIndicaCalculo=3";

                window.location = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=&sDsSenha=&sCepOrigem=17011102&sCepDestino=" + receiver_zip_code + "&nVlPeso=1&nCdFormato=1&nVlComprimento=20&nVlAltura=5&nVlLargura=15&sCdMaoPropria=n&nVlValorDeclarado=0&sCdAvisoRecebimento=n&nCdServico=40010&nVlDiametro=0&StrRetorno=http://localhost/moldur/shipping/index.php&nIndicaCalculo=3";
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
            <form>
                <input id="zip_code_receiver" type="text">
                <input type="button" value="test" onclick="calculate_shipment_price_and_date()">
            </form>
<?php

} else {

    ?>
        
                <?php
                    echo $_POST["Codigo_1"];
                    echo $_POST["Valor_1"];
                    echo $_POST["PrazoEntrega_1"];
                ?>
<?php if(isset($_POST["Valor_1"])){
    header("location:../add_to_card.php?shipping_charge={$_POST['Valor_1']}");
}
}