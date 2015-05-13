<?php
session_start();
	if(!isset($_SESSION["role"]))
	{
		include("header.php");
	}else
	{
		if($_SESSION["role"]=="admin")
		{
			include("header3.php");
		} 
		if($_SESSION["role"]=="penjual")
		{
			include("header2.php");
		} 
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SiDanus | Halaman Admin</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="<?php echo base_url().'/assets/css/bootstrap.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url().'/assets/css/font-awesome.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url().'/assets/css/prettyPhoto.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url().'/assets/css/price-range.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url().'/assets/css/animate.css'; ?>" rel="stylesheet">
	<link href="<?php echo base_url().'/assets/css/main.css'; ?>" rel="stylesheet">
	<link href="<?php echo base_url().'/assets/css/responsive.css'; ?>" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <script src="<?php echo base_url().'/assets/js/jquery-1.11.2.min.js'; ?>"></script>
	<script src="<?php echo base_url().'/assets/js/bootstrap.min.js'; ?>"></script>
	<script src="<?php echo base_url().'/assets/js/main.js'; ?>"></script>
	<script src="<?php echo base_url().'/assets/js/modal.js'; ?>"></script>
	<script src="<?php echo base_url().'/assets/js/jquery.scrollUp.min.js'; ?>"></script>
    <script src="<?php echo base_url().'/assets/js/jquery.prettyPhoto.js'; ?>"></script>
    <script src="<?php echo base_url().'/assets/js/photogallery.js'; ?>"></script>
    
    <!--<script type="text/javascript">
    	//function sh(tes)
    	//{
    	//	var temp = document.getElementById("idnya").value;
    		//temp = temp.toLowerCase();
    	//	
    		//if(temp==tes.toLowerCase())
    		//{
		//	for (var i = 0; i < document.getElementsByClassName(temp).length; i ++) {
		//	    document.getElementsByClassName(temp)[i].style.display="block";
		//	}
    				
    		//}
    	//}
    </script>-->
</head>

<body>
<section>
  <div class="container">
    	<div class="row">
	<div class="col-lg-8">
        <h1>Halaman Admin</h1><br><br>
      </div>
    <!-- loop 1 -->
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-lg-10">
       <!--  <div class="panel panel-default">
          <div class="panel-body"> -->
            <div class="container-fluid">
            
            <?php
              foreach($adminnya as $adminnya2)
              {
              	$idToko = $adminnya2->idToko ;
              	$namaToko = $adminnya2->namaToko ;
              	$status= $adminnya2->status;
              	$idToko = $adminnya2->idToko ;
              	
              	$a = strtolower($namaToko[0]);
				$temp = base_url();
              	?>
              
              
                
              <div class="col-sm-3">
              <input type="hidden" id="idnya" value="<?php echo $a; ?>">
                <form method="post" action="blockToko">
                <input type="hidden" value="<?php echo $idToko; ?>" name="idtokonya">
                  <div class="form-group">
                    <div class="thumbnail" id="show-image">
                      <img src="<?php echo $temp; ?>/assets/images/user.jpg" class="img-responsive img-rounded" alt="<?php echo $namaToko; ?>">
                      <!-- dua button di bawah ini muncul tergantung status akunnya -->
			
		<?php 
		if($status=='tidak aktif')
		{
		      echo"<button type=\"submit\" id=\"unblock\" class=\"form-control btn btn-success\" aria-label=\"Left Align\">";
                        echo"<span class=\"glyphicon glyphicon-ok-circle\" aria-hidden=\"true\"></span>";
                      echo"</button>";
		
		}else
		{
                      echo"<button type=\"submit\" id=\"block\" class=\"form-control btn btn-danger\" aria-label=\"Left Align\">";
                        echo"<span class=\"glyphicon glyphicon-ban-circle\" aria-hidden=\"true\"></span>";
                      echo"</button>";
		
		}
		
		$temp = base_url();
		?>
                      <a target="_blank" href="<?php echo $temp; ?>/index.php/tokocontroller/tampilkanToko/?idtoko=<?php echo $idToko; ?>"><h4 align="center"><?php echo $namaToko; ?></h4></a>
                    </div>
                  </div>
                  
                </form>
              </div> 
             <?php 
              }
              ?>
              
              
            </div>
            
              
           </div>
            
              
            <!-- 
          </div>
        </div> -->
        
      </div>
      
      
    </div>
    <br>
    <br>
    <br>
    <!--<div class="row">
      <div class="col-lg-12" align="center">
        <nav>

          <ul class="pagination">
            <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
            <li class="active"><a href="#" onclick="return sh('A')">A <span class="sr-only">(current)</span></a></li>
            <li><a href="#">B</a></li>
            <li><a href="#">C</a></li>
            <li><a href="#">D</a></li>
            <li><a href="#">E</a></li>
            <li><a href="#" onclick="return sh('F')">F</a></li>
            <li><a href="#">G</a></li>
            <li><a href="#">H</a></li>
            <li><a href="#">I</a></li>
            <li><a href="#">J</a></li>
            <li><a href="#">K</a></li>
            <li><a href="#">L</a></li>
            <li><a href="#">M</a></li>
            <li><a href="#">N</a></li>
            <li><a href="#">O</a></li>
            <li><a href="#">P</a></li>
            <li><a href="#">Q</a></li>
            <li><a href="#">R</a></li>
            <li><a href="#">S</a></li>
            <li><a href="#" onclick="return sh('T')">T</a></li>
            <li><a href="#">U</a></li>
            <li><a href="#">V</a></li>
            <li><a href="#">W</a></li>
            <li><a href="#">X</a></li>
            <li><a href="#">Y</a></li>
            <li><a href="#">Z</a></li>



            <li><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
          </ul>
        </nav>
      </div>
    </div>-->
  </div>
<section> 

<?php include("footer.php"); ?>
<a href="#top" id="scrollUp" style="position: fixed; z-index:2147483647; display: block;">
        <i class="fa fa-angle-up"></i>
    </a>

</body>
</html>