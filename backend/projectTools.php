<!-- 
Author : Edmont Traci (ACJW837)
Univeristy : City University London
Course: Computer Science BSc (Hons) 
Module: IN3007 - Individual Project
This code was altered from https://github.com/coderexample/datatable_example/tree/master/demo1
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <title> Project Tasks</title>
</head>
    
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Adding The Navigation-->
<?php include("navbar.php")  ?>
  <div class="content-wrapper">
    <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="projectsAll.php">Projects</a>
            </li>
            <li class="breadcrumb-item active">All Projects</li>
          </ol>
            <div class="card mb-3">
                <div class="card-body">
                    <canvas id="myAreaChart" width="100%" height="30"></canvas>           
                        <div style="width:90%;padding-left:120px;" class="control-group" id="fields">
                            <div class="controls"> 
                                <form action="projTasks.php" role="form" method="post">
                                    <div class="input-group-btn"  style="margin-top:20px;left:35%;">      
                                        <td><button class="btn btn-default" type="submit" name="tasks"  value="tasks" class="btnRegister" id="butonas" style="border:1px solid #0044c7;border-radius:20px;color:#008b06;box-shadow:none;text-shadow:none;padding:1px 15px;background:transparent;transition:background-color 0.25s;outline:none;font-size:25px;width:190px;height:38px;margin-left:41px;margin-bottom:9px;margin-top:-15px;">Add All Tasks</button></td>
                                    </div>
                                        <?php 
                                            //get the id from the url and initialise it to $id
                                            $id = $_GET['id']; 
                                            //connect to the db
                                            $servername = "localhost";
                                            $username = "root";
                                            $password = "";
                                            $dbname = "troci";

                                            // Create connection
                                            $conn = new mysqli($servername, $username, $password, $dbname);
                                            // Check connection
                                            if ($conn->connect_error) {
                                                die("Connection failed: " . $conn->connect_error);
                                            } 
                                            //get result from projects where project id is equal to the id of the URL
                                            $sql = "SELECT * FROM projects WHERE project_id = $id LIMIT 1";
                                            $result = $conn->query($sql);
                                            //if there is a result, display the address for this result as a header.
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    $add = $row["Address"];
                                                    $wrd = $row["Ward"];
                                                    $pcode = $row["Postcode"];
                                                    $cid = $row["Client"];
                                                    $client_id = preg_replace('/[^0-9]/', '', $cid);
                                                    echo "<br><center><h1>$add $wrd $pcode</h1></center> <br>";
                                                }
                                            } else {
                                                echo "0 results";
                                            }
                                            $conn->close();

                                        ?>
                                        <label class="control-label" for="field1">Enter Tasks For This Project</label>
                                        <div class="entry input-group col-xs-1">
                                        <input type="text" class="form-control" name="name[]" value="" id="box1" placeholder="Enter Task" />
                                            <div style="width:70px;" >
                                                <input style="width:90%" class="form-control" type="text" name="boxes[]" value="" id="box1" placeholder="Days" />
                                                <input hidden name="proj_id[]" value="<?php echo"$id";  ?>" id="box1" placeholder="Days" />
                                                <input hidden type="text" class="form-control" name="address[]" value="<?php echo"$add"; ?>" id="box1" placeholder="Enter Task" />
                                                <input hidden type="text" class="form-control" name="clientid[]" value="<?php echo"$client_id"; ?>" id="box1" placeholder="Enter Task" />
                                            </div>
                                            <span class="input-group-btn">
                                                <button class="btn btn-success btn-add" type="button">
                                                    <span class="fa fa-fw fa-plus"></span>
                                                </button>
                                            </span>
                                        </div>
                                </form>
                            <br>
                            <small>Press <span class="fa fa-fw fa-plus"></span>to add more tasks.</small>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
<!-- Adding The Footer -->
<?php include("footer.php")  ?>


<!-- Add Button for new fields -->     
<script>

      $(function()
{
    $(document).on('click', '.btn-add', function(e)
    {
        e.preventDefault();

        var controlForm = $('.controls form:first'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);

        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-primary')
            .html('<span class="fa fa-fw fa-minus"></span>');
    }).on('click', '.btn-remove', function(e)
    {
		$(this).parents('.entry:first').remove();

		e.preventDefault();
		return false;
	});
});
</script>
      
      
      
</body>

</html>