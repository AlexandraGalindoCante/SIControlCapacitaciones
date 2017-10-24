<?php 
require_once('view/libreriaSCC.php'); 
 $con = conectar();
 if(!$con){
 die("imposible conectarse: ".mysqli_error($con));
 }
 if (@mysqli_connect_errno()) {
 die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
 }
 $usuarios=mysqli_query($con,"set names 'utf8'");
  $count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM modulo where visibilidad ='1'");
if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
                           
 $usuarios  = mysqli_query($con,"SELECT * FROM modulo  where visibilidad ='1'" );


if(isset($_POST['create_pdf'])){
  require_once('tcpdf/tcpdf.php');

  $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

  $pdf->SetCreator(PDF_CREATOR);
  $pdf->SetAuthor('Miguel Caro');
  $pdf->SetTitle($_POST['reporte_name']);

  $pdf->setPrintHeader(false); 
  $pdf->setPrintFooter(false);
  $pdf->SetMargins(20, 20, 20, true); 
  $pdf->SetAutoPageBreak(true, 20); 
  $pdf->SetFont('Helvetica', '', 10);
  $pdf->addPage();

  $content = '';

  $content .= '
  <body>
    <div class="row">
          <div class="col-md-12">
           <img src="imagenes/informe.png"  style="height: 50px; width: 50px;">
              <h1 style="text-align:center;">'.$_POST['reporte_name'].'</h1>

      <table border="1" cellpadding="5">
        <thead>
          <tr>
            <th>modulo</th>
            <th>frecuencia</th>
            <th>descripcion</th>
          
          </tr>
        </thead>
  ';

  while ($user=$usuarios->fetch_assoc()) { 
      if($user['frecuencia']>=6){  $color= '#42b15b'; }else{ $color= '#fbb2b2'; }
  $content .= '
    <tr bgcolor="'.$color.'">
            <td>'.$user['nombreModulo'].'</td>
            <td>'.$user['frecuencia'].'</td>
            <td>'.$user['descripcion'].'</td>
        </tr>
  ';
  }

  $content .= '</table>';

  $content .= '
    <div class="row padding">
          <div class="col-md-12" style="text-align:center;">
              <span>GF Cobranzas Y CYCP Cobradores</span>
            </div>
        </div>
        </body>

  ';

  $pdf->writeHTML($content, true, 0, true, 0);

  $pdf->lastPage();
  $pdf->output('Reporte.pdf', 'I');
}

?>

<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>REPORTE CAPACITACIONES</title>
<meta name="keywords" content="">
<meta name="description" content="">
<!-- Meta Mobil
================================================== -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/informe.css" rel="stylesheet">
</head>

<body >
  <div class="container-fluid">
        <div class="row padding">
          <div class="col-md-12">
            <img src="imagenes/informe.png" style="height: 50px; width: 50px;">
              <?php $h1 = "Reporte de modulos - capacitaciones GF y CYCP";  
               echo '<h1>'.$h1.'</h1>'
        ?>
            </div>
        </div>
      <div class="row">
      <table class="table table-hover">
        <thead>
          <tr class="success">
           
            <th>Módulo</th>
            <th>Frecuencia</th>
            <th>Descripción</th>
           
          </tr>
        </thead>
        <tbody>
        <?php 
      while ($user=mysqli_fetch_array($usuarios)){ ?>
          <tr class="">
            <td><?php echo $user['nombreModulo']; ?></td>
            <td><?php echo $user['frecuencia']; ?></td>
            <td><?php echo $user['descripcion']; ?></td>
          
          </tr>
         <?php } ?>
        </tbody>
      </table>
              <div class="col-md-12">
                <form method="post">
                  <input type="hidden" name="reporte_name" value="<?php echo $h1; ?>">
                  <input type="submit" name="create_pdf" class="btn btn-danger pull-right" value="Generar PDF">
                </form>
              </div>
        </div>
    </div>
</body>
</html>