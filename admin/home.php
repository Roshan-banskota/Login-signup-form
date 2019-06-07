  <?php require_once('header.php'); ?>

  <body>

      <header id="header">
            <div class="container">
              <div class="row">
                <div class="col-md-10">
                  <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Home <small>Manage Home Site </small></h1>
                </div>
              </div>
            </div>
        </header>

          <section id="breadcrumb">
            <div class="container">
              <ol class="breadcrumb">
                <li><a href="index.php">Dashboard</a></li>
                <li class="active">Home</li>
              </ol>
            </div>
          </section>
          

          

          <div class="container">

  <div class="row" align ="center">
      <div class="col-lg-6">
              <div class="jumbotron">
                  Here We will set your schedules
                  <form class="form-horizontal" method= "POST" action = "home.php">
                      <fieldset>

                          <!-- Form Name -->
                          <legend>Set Schedule</legend>

                    </fieldset>


                    <!-- Faculty -->
                         <div class="form-group">
                                <label class="col-md-3 control-label" for="faculty">Faculty</label> 
                                <div class="col-md-6">
                                    <select id="faculty" name="faculty" class="form-control">
                                        <label>Select list</label>
               
                                        <option value = "1">Bsc.CSIT</option>
                                        <option value = "2">Engineering</option>
                                        <option value = "3">BCA</option>
                                        <?php echo $options;?>
                                    </select>
                                  </div>
                        </div>


                        <!-- Course -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="Course">Course</label> 
                            <div class="col-md-6">
                                <select  id="course" name="course"  class="form-control">

                                       <label>Select list</label>
                                        <option value = "1">Computer Science</option>
                                        <option value = "2">Computer Application</option>

                                          <?php while($row1 = mysqli_fetch_array($result1)):;?>

                                        <option  value="<?php echo $row1[2];?>"><?php echo $row1[2];?></option>
                                        
                                      

                                  <?php endwhile;?>

                                  </select>
          
          

  		                         </div>		
                          </div>


                          <!-- Subject -->
                          <div class="form-group">
                              <label class="col-md-3 control-label" for="subject">Subject</label> 
                                  <div class="col-md-6">
                                    <select  id="subject" name="subject"  class="form-control">
                                        <label>Select list</label>
                                        <option value = "1">Advanced Java Programming</option>
                                        <option value = "2">Internet Technology</option>
                                        <option value = "3">Network System & Adminestrator</option>
                                        <option value = "4">Advanced Database</option>
                                        <option value = "5">Software Project Management</option>
                                        <?php echo $options;?>
                                    </select>
                                </div>
                           </div>


                          <!-- Room -->
                           <div class="form-group">
                                <label class="col-md-3 control-label" for="room">Room</label> 
                                <div class="col-md-6">
                                    <select  id="room" name="room"  class="form-control">
                                    <label>Select list</label>
                                      <option value = "1">CSC:101</option>
                                      <option value = "2">CSC:202</option>
                                      <option value = "3">CSC:303</option>
                                      <option value = "4">CSC:404</option>
                                      <option value = "5">CSC:505</option>
                                    
                                      <?php echo $options;?>
                                    </select>
                                 </div>
                            </div>




                          <!-- Start Time -->
                            <div class="form-group">
                                  <label class="col-md-3 control-label" for="start_time">Start time</label> 
                                  <div class="col-md-6">
                                        <select  id="start_time" name="start_time" class="form-control">

                                            <label>Select list</label>
                                                <option value = "1">07:00 AM</option>
                                                <option value = "2">07:45 AM</option>
                                                <option value = "3">08:30 AM</option>
                                                <option value = "4">09:15 AM</option>
                                                <option value = "5">10:00 AM</option>
                                                <option value = "6">10:45 AM</option>
                                                <option value = "7">11:30 AM</option>
                                                <option value = "8">12:15 PM</option>
                                                  <?php echo $options;?>
                                            
                                              <?php echo $options;?>
                                              

                                                    <?php while($row2 = mysqli_fetch_array($result2)):;?>

                                                    <option value="<?php echo $row2[0];?>"><?php echo $row2[1];?></option>
                                              

                                                    <?php endwhile;?>

                                          </select>
                                
                                    </div>		
                             </div>


                              <!-- End Time -->
                             <div class="form-group">
                                  <label class="col-md-3 control-label" for="end_time">End time</label> 
                                  <div class="col-md-6">
                                          <select  id="end_time" name="end_time" class="form-control">
                                          <label>Select list</label>
                                            <option value = "1">07:45 AM</option>
                                            <option value = "2">08:30 AM</option>
                                            <option value = "3">09:15 AM</option>
                                            <option value = "4">10:00 AM</option>
                                            <option value = "5">10:45 AM</option>
                                            <option value = "6">11:30 AM</option>
                                            <option value = "7">12:15 PM</option>
                                            <option value = "8">01:00 PM</option>

                                              <?php echo $options;?>
                                          </select>
                                          
                                    </div>
                            </div>



                            <!-- Button -->
                          <div class="form-group"  align="right">
                                <label class="col-md-3 control-label" for="submit"></label>
                                <div class="col-md-6">
                                    <button id="submit" name="insert" class="btn btn-primary"> Set </button>
                                </div>
                          </div>

                </form>
                </div>
      </div>

    </div>
    </div>
  </body>




  <?php 
  function getPosts()
     {
      $posts = array();
      $posts[0] = $_POST['faculty'];
      $posts[1] = $_POST['course'];
      $posts[2] = $_POST['subject'];
      $posts[3] = $_POST['room'];
  	  $posts[4] = $_POST['start_time'];
  	  $posts[5] = $_POST['end_time'];
      return $posts;
      }

  if (isset($_POST['insert'])) 
  {
    include('../dbconnect.php');
  	
    $data = getPosts();
    //INSERT QUERY//
      $sql= "INSERT INTO `addtable` (`faculty`, `course`, `subject`, `room`, `start_time`, `end_time`) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]')";
      $result = mysqli_query($con, $sql);
          if ($result==true) 
                {
                  echo "<script type='text/javascript'>
                                  alert('New schedule added successfuly');
                                    window.location='home.php';
                                      </script>";
                } else {
                  echo "<script type='text/javascript'>
                                  alert('Data not inserted!');
                                    window.location='home.php';
                                      </script>";
                }

            }

    

  ?>

















  <?php require_once('footer.php'); ?>
