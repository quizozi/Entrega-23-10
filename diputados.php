<?php include('header.php')?>

<div class="container">
<div class="row">
<div class="col-sm-12 py-5">

<?php
$csv = array_map('str_getcsv', file('data/eleccion_diputados.csv'));
array_walk($csv, function(&$a) use ($csv) {$a = array_combine($csv[0], $a);});
array_shift($csv);
?>

<?php $mujeres = count(($csv[$a]["Genero"])=="Femenino"); $hombres = 0; ?>


<h1>Candidatos a Diputados</h1>


<br><br><hr><br><br><h4>Estas son las candidatas a diputado.</h4>
<table class="table table-bordered table-striped table-responsive">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Partido</th>
      <th>Lista/Pacto</th>
    </tr>
  </thead>
  <tbody>
    <?php for($a = 0; $a < $total = count($csv); $a++){?>
          <?php if(($csv[$a]["Genero"])=="Femenino"){?>
    <tr>
      <td><?php if(($csv[$a]["Web Site"])==""){?>
                  <?php echo($csv[$a]["Candidato Nombre"])?>
            <?php echo($csv[$a]["Candidato Apellido Paterno"])?>
            <?php echo($csv[$a]["Candidato Apellido Materno"])?>
          <?php }else{?>
              <a href="<?php echo($csv[$a]["Web Site"])?>" target="_blank">
                <?php echo($csv[$a]["Candidato Nombre"])?>
                <?php echo($csv[$a]["Candidato Apellido Paterno"])?>
                <?php echo($csv[$a]["Candidato Apellido Materno"])?>
</a> <?php }?>
      </td>
              <td><?php echo($csv[$a]["Partido Politico"])?></td>
              <td><?php echo($csv[$a]["Lista/Pacto"])?></td>
    </tr>
          <?php $mujeres++;?>
          <?php };?>
    <?php };?>
  </tbody>
</table>

<br><br><br><br>
<h4>Y estos son los Candidatos. </h4><br>
<table class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Partido</th>
                    <th>Lista/Pacto</th>
                </tr>
            </thead>
            <tbody>
                <?php for($b = 0; $b < $total = count($csv); $b++){?>
                <?php if(($csv[$b]["Genero"])=="Masculino"){?>
                <tr>
                    <td>
                      <?php if(($csv[$a]["Web Site"])==""){?>
                        <?php echo($csv[$b]["Candidato Nombre"])?>
                        <?php echo($csv[$b]["Candidato Apellido Paterno"])?>
                        <?php echo($csv[$b]["Candidato Apellido Materno"])?>
                        <?php }else{?>
                        <a href="<?php echo($csv[$a]["Web Site"])?>" target="_blank">
                        <?php echo($csv[$a]["Candidato Nombre"])?>
                        <?php echo($csv[$a]["Candidato Apellido Paterno"])?>
                        <?php echo($csv[$a]["Candidato Apellido Materno"])?>
            </a> <?php }?>
                    </td>

                    <td><?php echo($csv[$b]["Partido Politico"])?></td>
                    <td><?php echo($csv[$b]["Lista/Pacto"])?></td>
                </tr>
                <?php $hombres++;?>
                <?php };?>
                <?php };?>

            </tbody>
        </table>


<br><br><hr>
<br><br><h4>Este gráfico presenta los candidatos a diputados por partido.</h4>
<img src="http://i1119.photobucket.com/albums/k633/Caruu_VMunoz/meta-chart_zpss80el4xx.jpeg">



</div>
</div>
</div>
<?php include('footer.php')?>
