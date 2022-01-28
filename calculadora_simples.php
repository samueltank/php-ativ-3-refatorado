<?php
  /* Declaração de variáveis */
  $valor1    = (double) 0;
  $valor2    = (double) 0;
  $resultado = (double) 0;
  $opcao     = (String) null;
  $nome      = 15;
  $nome      = "macaco"; /* OR settype(variável, "type"), para a conversão; */

  //echo(gettype($nome)); // gettype(variável) exibe o tipo da variável;
  
  // Converte uma String para Upper Case;
  //echo(strtoupper($nome));
  // Converte uma String para Lower Case;
  //echo(strtolower($nome));

  /* Validação para verificar se o botão foi clicado */
  if(isset($_POST["btncalc"])) {
    $valor1 = $_POST["txtn1"];
    $valor2 = $_POST["txtn2"];

    // if($opcao == "SOMAR") {
    //   $resultado = ($valor1 + $valor2);
    // } elseif($opcao == "SUBTRAIR") {
    //   $resultado = ($valor1 - $valor2);
    // } elseif($opcao == "MULTIPLICAR") {
    //   $resultado = ($valor1 * $valor2);
    // } else {
    //   $resultado = ($valor1 / $valor2);
    // }

    if($_POST["txtn1"] == "" || $_POST["txtn2"] == "") {
      echo("<script>
        window.alert('Todas as caixas devem ser preenchidas!');
      </script>");  
    } elseif(!isset($_POST["rdocalc"])) {
      echo("<script>
        window.alert('Favor escolher uma operação válida!');
      </script>");  
    } else {
      $opcao  = strtoupper($_POST["rdocalc"]);
      switch($opcao) {
        case "SOMAR":
          $resultado = ($valor1 + $valor2);
          break;
        case "SUBTRAIR":
          $resultado = ($valor1 - $valor2);
          break;
        case "MULTIPLICAR":
          $resultado = ($valor1 * $valor2);
          break;
        default:
          $resultado = ($valor1 / $valor2);
          break;
      }
    }
  }
?>

<html>
    <head>
        <title>Calculadora - Simples</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
	<body> 
    <div id="conteudo">
      <div id="titulo">
          Calculadora - Simples
      </div>

        <div id="form">
          <form name="frmcalculadora" method="post" action="./calculadora_simples.php">
          Valor 1:<input type="text" name="txtn1" value="0" /><br />
          Valor 2:<input type="text" name="txtn2" value="0" /><br />
          <div id="container_opcoes">
            <input type="radio" id="somar" name="rdocalc" value="somar" />
            <label for="somar">Somar</label> 
            <br />
            <input type="radio" id="subtrair" name="rdocalc" value="subtrair" />
            <label for="subtrair">Subtrair</label>
            <br />
            <input type="radio" id="multiplicar" name="rdocalc" value="multiplicar" />
            <label for="multiplicar">Multiplicar</label>
            <br />
            <input type="radio" id="dividir" name="rdocalc" value="dividir" />
            <label for="dividir">Dividir</label>
            <br />
            <input type="submit" name="btncalc" value ="Calcular" />
          </div>	
        <fieldset>
          <legend>Resultado</legend>
          <div id="resultado">
          <p><?=$resultado?></p>
          </div>
        </fieldset>
      </form>
        </div>  
    </div>
	</body>
</html>