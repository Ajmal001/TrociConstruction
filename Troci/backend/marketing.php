<!-- 
Author : Edmont Traci (ACJW837)
Univeristy : City University London
Course: Computer Science BSc (Hons) 
Module: IN3007 - Individual Project
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <!-- Add the Navigation-->
    <?php include("navbar.php")  ?>
      <div class="content-wrapper">
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a> 
            </li>
            <li class="breadcrumb-item active">Marketing Map</li>
          </ol>
          <!-- Map Area-->
            <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-area-chart"></i> Map Visual Data
            </div>
                <div class="card-body">    
                    <!-- Map created tableau to display the data for projects in the system -->
                   <div class='tableauPlaceholder' id='viz1531224368383' style='position: relative'><noscript><a href='#'><img alt='All Projects ' src='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Ma&#47;Map-Of-London&#47;Sheet1&#47;1_rss.png' style='border: none' /></a></noscript><object class='tableauViz'  style='display:none;'><param name='host_url' value='https%3A%2F%2Fpublic.tableau.com%2F' /> <param name='embed_code_version' value='3' /> <param name='path' value='views&#47;Map-Of-London&#47;Sheet1?:embed=y&amp;:display_count=y&amp;publish=yes' /> <param name='toolbar' value='yes' /><param name='static_image' value='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Ma&#47;Map-Of-London&#47;Sheet1&#47;1.png' /> <param name='animate_transition' value='yes' /><param name='display_static_image' value='yes' /><param name='display_spinner' value='yes' /><param name='display_overlay' value='yes' /><param name='display_count' value='yes' /><param name='filter' value='publish=yes' /></object>
                    </div>                
                    <script type='text/javascript'>                    
                        var divElement = document.getElementById('viz1531224368383');                    
                        var vizElement = divElement.getElementsByTagName('object')[0];                    
                        vizElement.style.width='100%';vizElement.style.height=(divElement.offsetWidth*0.45)+'px';                    
                        var scriptElement = document.createElement('script');                    
                        scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';                    
                        vizElement.parentNode.insertBefore(scriptElement, vizElement);                
                    </script>
                </div>
            </div>
          </div>
        </div>
    <!-- /.container-fluid-->
    <?php include("footer.php") ?>
</body>

</html>
