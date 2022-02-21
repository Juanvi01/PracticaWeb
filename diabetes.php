<?php
require_once 'Funciones/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <title>Info sobre diabetes</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/foundation.min.css">
  <link rel="stylesheet" href="css/foundation.css">
  <link href="css/app.css" rel="stylesheet" type="text/css">
  <link href="css/inicio.css" rel="stylesheet" type="text/css">
</head>

<body>
  <?php
  if (!isset($_SESSION['Usuario'])) {
    header("location: index.php");
    require 'menu.html';
  }else{
    require 'menu.php';
		require 'Funciones/comprobarTiempo.php';
    // Actualizamos la visita
    $sql = "UPDATE visita 
            SET IdPagina = 'diabetes.php'
            WHERE IdUsuario = '". $_SESSION['Usuario'] ."'";
    $_SESSION["con"]->query($sql);
  }
  ?>
  <div class="margenIzq">
  </div>
  <div class="row medium-8 large-8 columns">
    <h1>Tipos de diabetes</h1>

    <div class="entrada">
      <h2>Tipo 1</h2>
      <p>La diabetes tipo 1 es una de las enfermedades crónicas infantiles más frecuentes. Ocurre porque el páncreas no fabrica suficiente cantidad de insulina.</p>
      <h4>Causas</h4>
      <p><b>Factor genético.</b> Se hereda la predisposición a tener diabetes, no la diabetes en sí. Sólo el 13% de los niños y adolescentes con diabetes tienen un padre o hermano con esta enfermedad. Sabemos que la causa no es totalmente debida a la herencia por los estudios que se han realizado en gemelos idénticos. Cuando un gemelo tiene diabetes tipo 1, sólo en la mitad de los casos el otro gemelo desarrollará la enfermedad. Si la causa fuese únicamente genética, ambos gemelos desarrollarían siempre la enfermedad.</p>
      <p><b>Autoinmunidad.</b> Normalmente, el sistema inmune protege nuestro cuerpo, pero en determinadas enfermedades como la diabetes, el lupus, artritis, etc., el sistema inmune se vuelve contra nuestro cuerpo. En el caso de la diabetes, se produce una reacción contra las células productoras de insulina. La forma de evidenciarlo en sangre es midiendo los anticuerpos. Estos anticuerpos suelen desaparecer de la sangre de forma progresiva después del diagnóstico de la diabetes.</p>
      <p><b>Daño ambiental.</b> Este factor puede ser un virus, tóxicos, algo en la comida, o algo que todavía desconocemos. Es el puente entre el factor genético y la autoinmunidad.</p>
    </div>

    <div class="entrada">
      <h2>Tipo 2</h2>
      <p>La diabetes tipo 2 es la forma de diabetes más frecuente en personas mayores de 40 años. Se la conoce también como diabetes del adulto, aunque está aumentando mucho su incidencia en adolescentes e incluso preadolescentes con obesidad. En este tipo de diabetes la capacidad de producir insulina no desaparece pero el cuerpo presenta una resistencia a esta hormona. En fases tempranas de la enfermedad, la cantidad de insulina producida por el páncreas es normal o alta. Con el tiempo la producción de insulina por parte del páncreas puede disminuir.</p>
      <h4>Causas</h4>
      <p><b>Factor genético o hereditario.</b> La diabetes tipo 2 tiene mayor riesgo hereditario que la tipo 1. En casi todos los casos un padre o un abuelo tienen la enfermedad. En el caso de gemelos idénticos, si uno tiene la enfermedad, el otro tiene un 80% de posibilidades de desarrollarla.</p>
      <p><b>Estilo de vida.</b> El 80% de las personas que desarrollan diabetes tipo 2 tienen obesidad y no tienen una vida muy activa. El restante 20% a menudo tienen un defecto hereditario que causa resistencia a la insulina.</p>
    </div>

    <div class="entrada">
      <h2>Diferencias entre Tipo 1 y Tipo 2</h2>
      <p>Los dos tipos de diabetes son muy diferentes.
        En la diabetes tipo 2 se asocian dos alteraciones: una disminución de la acción de la insulina, con una alteración de la función de la célula beta que inicialmente es capaz de responder con un aumento de la producción de insulina (de ahí que los niveles de ésta estén elevados o normales con el fin de compensar el déficit de su acción) pero posteriormente la producción de insulina se va haciendo insuficiente. 
        Sin embargo en la diabetes tipo 1 la alteración se produce a nivel de las células beta, por ello los niveles de insulina son muy bajos. 
        Por ese mismo motivo los niveles de péptido C (que se segrega junto a la insulina) son normales o altos en la diabetes tipo 2 y en la tipo 1 suelen estar muy disminuidos. 
        Los anticuerpos antiinsulina, antiGAD, IA2 e ICAs son positivos en la diabetes tipo 1, en la tipo 2 están ausentes. 
        La forma de debut de la enfermedad también es diferente. El 50% de los pacientes con diabetes tipo 1 debutan con cetoacidosis, sólo el 25% de los tipo 2 lo hacen de este modo.</p>
    </div>

    <div class="entrada">
      <h2>Otros tipos de diabetes</h2>
      <p><b>Diabetes MODY (Maturity Onset Diabetes in the Young).</b> Se produce por defectos genéticos de las células beta. Existen diferentes tipos de diabetes MODY, hasta la actualidad se han descrito 7. Se deben a un defecto en la secreción de insulina, no afectándose su acción. Se heredan de manera autosómica dominante, por ello cuando una persona tiene diabetes MODY es habitual que varios miembros de la familia también la padezcan y en varias generaciones.</p>
      <p><b>Diabetes Relacionada con Fibrosis Quística (DRFQ).</b> La fibrosis quística es una enfermedad que afecta a múltiples órganos entre ellos al páncreas, esto conlleva que se pueda desarrollar diabetes. El diagnóstico de la enfermedad se suele realizar en la segunda década de la vida.</p>
      <p><b>Diabetes secundaria a medicamentos.</b> Algunos medicamentos pueden alterar la secreción o la acción de la insulina. Los glucocorticoides y los inmunosupresores son algunos de ellos.</p>
      <p><b>Diabetes gestacional.</b> Intolerancia a la glucosa que se produce durante el embarazo que puede ser debida a múltiples causas.</p>
    </div>

  </div>

  <script src="js/vendor/jquery-2.1.4.min.js"></script>
  <script src="js/vendor/foundation.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>

</html>