<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<?php helper(['form']); ?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand nav-url" href="<?php echo base_url('home'); ?>">Document Management</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active nav-url"><a href="<?php echo base_url('home'); ?>">Home</a></li>
      <li class="nav-url"><a href="<?php echo base_url('home/history'); ?>">History</a></li>
    </ul>
  </div>
</nav>
<?= $this->renderSection('content') ?>
</body>

<script>
  $(document).ready(function() {
    
    $(".nav-url").on("click", function() { 
    $(this).addClass("active");
    //$(".nav-url").removeClass("active");   
    //$( "nav li" ).removeClass( "active" );  
     //$(".nav").find(".active").removeClass("active");
     //$(".nav li").find(".active").addClass("testing");
      //$(this).parent().addClass("active");
  });
});
  
</script>