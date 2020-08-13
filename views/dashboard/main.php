<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Bienvenido al sistema de notas');
?>

<main>

<!-- Se muestra una gráfica de acuerdo con los datos existentes -->
<div class="row ">
    <div class="col s12 m6 l6">
        <h1></h1><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>
</div>


<!-- Importación del archivo para generar gráficas en tiempo real. Para más información https://www.chartjs.org/ -->
<script type="text/javascript" src="../../resources/js/chart.js"></script>

<?php
Dashboard::footerTemplate('main.js');
?>
