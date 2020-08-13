<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Datos del colegio');
?>

<main>
        <div class="row">
            <div class="col l3"></div>

            <div class="col l8">
                <table class="responsive-table  centered highlight white-text">
                    <thead>
                      <tr>
                          
                          <th></th>
                          <th>Información</th>
						  <th></th>
						  <th></th>
                        </tr>
                    </thead>
            
                    <tbody>
                      <tr>
                        
                        <td>Codigo Colegio</td>
                        <td>10375299</td>
                            
                      </tr>
                      <tr>
                        
                        <td>Teléfono</td>
                        <td>2272-6985</td>
                      </tr>
                      <tr>
                      <tr>
                        
                        <td>Dirección</td>
                        <td>7a Calle Poniente No. 5-A Urbanización Bonanza, Mejicanos</td>
                      </tr>
					
					  <tr>
                        
                        <td>Director</td>
                        <td>Gehovanni Beltrán</td>
                      </tr>

					  <tr>
                        
                        <td>Código Infraestructura</td>
                        <td>20320</td>
                      </tr>

					  <tr>
                        
                        <td>Municipio</td>
                        <td>Mejicanos</td>
                      </tr>

					  <tr>
                        
                        <td>Departamento</td>
                        <td>San Salvador</td>
                      </tr>

					  <tr>
                        
                        <td>Institución</td>
                        <td>Colegio Profesor Saul Edmundo Montero</td>
                      </tr>

                    </tbody>
                  </table>
    <?php
    Dashboard::footerTemplate('main.js');
    ?>