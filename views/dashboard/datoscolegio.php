<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('School Data');
?>

<main>
        <div class="row">
            <div class="col l3"></div>

            <div class="col l8">
                <table class="responsive-table  centered highlight white-text">
                    <thead>
                      <tr>
                          
                          <th></th>
                          <th>Information</th>
						  <th></th>
						  <th></th>
                        </tr>
                    </thead>
            
                    <tbody>
                      <tr>
                        
                        <td>College Code</td>
                        <td>10375299</td>
                            
                      </tr>
                      <tr>
                        
                        <td>Telephone</td>
                        <td>2272-6985</td>
                      </tr>
                      <tr>
                      <tr>
                        
                        <td>Addres</td>
                        <td>7a Poniente Street No. 5-A Urbanization Bonanza, Mejicanos</td>
                      </tr>
					
					  <tr>
                        
                        <td>Director</td>
                        <td>Gehovanni Beltrán</td>
                      </tr>

					  <tr>
                        
                        <td>Infrastructure Code</td>
                        <td>20320</td>
                      </tr>

					  <tr>
                        
                        <td>Municipality</td>
                        <td>Mejicanos</td>
                      </tr>

					  <tr>
                        
                        <td>Department</td>
                        <td>San Salvador</td>
                      </tr>

					  <tr>
                        
                        <td>Institution</td>
                        <td>Professor Saul Edmundo Montero School</td>
                      </tr>

                    </tbody>
                  </table>
    <?php
    Dashboard::footerTemplate('main.js');
    ?>