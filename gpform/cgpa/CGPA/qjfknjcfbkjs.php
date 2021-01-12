<?php 
 include 'header/secondcotype.php';

   if(isset($_GET['loginsuccessful']) || isset($_GET['signupsuccessful'])) {
  ?>

    <div class="container">
      <form action="" class="insert-form" method="post" id="insert_form">
        <hr>
        <h1 class="text-center">Calculation of GPA and CGPA for Higher Institution</h1>
        <h3 class="text-center"><span class="greeting"></span> You are Welcome to <?php echo ucwords($_SESSION['user']); ?>, studying <?php echo ucwords($_SESSION['dept']); ?> at <?php echo strtoupper($_SESSION['inst']); ?></h3>
        <hr>
          <table class="table table-bordered table-striped col-md-12 col-xs-3 col-sm-6" id="table_field">
            <tr>
              <th>Course Code</th>
              <th>Course Score</th>
              <th>Grade</th>
              <th>Course Unit</th>
              <th>GradePoint</th>
              <th>CourseUnit GradePoint</th>
              <th>Add or Remove</th>
            </tr>
            <tr>
              <td><input class="form-control" type="text" name="code" required=""></td>
              <td><input class="form-control score" type="text" name="score" required=""></td>
              <td><input class="form-control grade" type="text" name="grade" required="" disabled></td>
              <td>
                <select name="unit" id="unit" class="form-control unit">
                  <option value=""></option>
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </td>
              <td><input type="text" class="point form-control" name="point" required="" disabled></td>
              <td><input type="text" class="unitPoint form-control" name="unitpoint" required="" disabled></td>
              <td><input class="btn btn-warning" type="button" name="add" id="add" value="Add"></td>
            </tr>
          </table>

          <!-- buttons -->
          <div class="text-center row">
            <div class="col-md-4">
              <button class="btn btn-primary" type="calculate" name="calcCUGP" id="calcCUGP">Calculate GPA</button>
              <input class="gpascore" type="text" name="gpascore" disabled>
            </div>
            <div class="col-md-2">
              <button class="btn btn-success" type="save" name="save" id="savegpa" disabled>Save Data</button>
            </div>
            <div class="col-md-2">
              <button class="btn btn-danger" type="clear" name="clear" id="clear">RESET</button>
            </div>
            <div class="col-md-4">
              <button class="btn btn-info cgpa" type="button" data-toggle="modal" data-target="#myModal" name="calcCUGP" id="calcCUGP">Calculate CGPA</button>
            <!-- begin modal -->
            <form class="cgpaForm">
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="myModalLabel">Calculate your CGPA</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body cgpaBody">

                  <div class="row cgpaHeader">
                        <div class="col-md-6">
                          <span class="years-text font-weight-bolder mr-2">Number of Years:</span><select id="cgpa-years" class="cgpa-years">
                          <option value=""></option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                          </select>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3 cgpaUnit">
                          <span class="ponit-text font-weight-bolder mr-2">Points:</span><select id="unIT" class="unIT">
                            <option value=""></option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            </select>
                        </div>
                  </div>

                  <hr>
                    <table class="table table-bordered" id="cgpaTable">
                      <tr>
                        <th>Levels</th>
                        <th>First Semester</th>
                        <th>Second Semester</th>
                      </tr>
                      <tr>
                        <td>100</td>
                        <td><input type="text" class="point form-control" name="point" required=""></td>
                        <td><input type="text" class="point form-control" name="point" required=""></td>
                      </tr>
                    </table>
                  
                </div>
                 <div class="modal-footer text-center">
                    <button type="button" class="btn btn-primary" class="savecgpa">Save Data</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success calcCGPA">Calculate CGPA</button>
                    <button class="btn btn-danger" type="clear" name="" id="CGPAreset">RESET</button>
                    <div>
                      <input class="form-control mx-auto cgparesult" type="text">
                    </div>
                  </div>
                </div>
              </div>
              </div>
            </div>
            </form>
              <!-- end modal -->
            </div>
          </div>
          <!-- button end -->

        </div>
      </form>
    </div>

  <?php
   } else {
     echo 'Account Error';
   }
   ?>
   
   <script type="text/javascript" src="js/form.js"></script>

<?php
    include 'foot.php';
?>