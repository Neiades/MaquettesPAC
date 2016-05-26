<!DOCTYPE html>
<html lang="fr">
	<head>
	    <meta charset="utf-8">
	    <meta name="robots" content="all,follow">
	    <meta name="googlebot" content="index,follow,snippet,archive">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Radio PAC - Grille des programmes</title>
	    <meta name="keywords" content="">
	    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800' rel='stylesheet' type='text/css'>
	    <!-- Bootstrap and Font Awesome css -->
	    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	    <!-- Css animations  -->
	    <link href="css/animate.css" rel="stylesheet">
	    <!-- Theme stylesheet, if possible do not edit this stylesheet -->
	    <link href="css/style.green.css" rel="stylesheet" id="theme-stylesheet">
	    <!-- Custom stylesheet - for your changes -->
	    <link href="css/custom.css" rel="stylesheet">
	    <!-- Responsivity for older IE -->
	    <!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

      <!-- CSS pour full calendar -->
      <link href='fullcalendar/fullcalendar.css' rel='stylesheet' />
      <link href='fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
      <style>
      	#calendar {
      		margin: 0 auto;
      	}
      </style>

	    <!-- Favicon and apple touch icons-->
	    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
	    <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />
	    <link rel="apple-touch-icon" sizes="57x57" href="img/apple-touch-icon-57x57.png" />
	    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png" />
	    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-touch-icon-76x76.png" />
	    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png" />
	    <link rel="apple-touch-icon" sizes="120x120" href="img/apple-touch-icon-120x120.png" />
	    <link rel="apple-touch-icon" sizes="144x144" href="img/apple-touch-icon-144x144.png" />
	    <link rel="apple-touch-icon" sizes="152x152" href="img/apple-touch-icon-152x152.png" />

	</head>

	<body>
		<div id="all">
			<!-- NAVBAR -->
			<header><?php include("includes/navigation.php");?></header>

			<div id="heading-breadcrumbs">
	            <div class="container">
	                <div class="row">
	                    <div class="col-md-7">
	                    </div>
	                    <div class="col-md-5">
	                        <ul class="breadcrumb">
                            <li><a href="index.php">Accueil</a></li>
	                          <li>Grille des programmes</li>
	                        </ul>
	                    </div>
	                </div>
	            </div>
	        </div>

			<!-- CONTENT -->
			<div id="content">
	            <div class="container">
                <section>
	                <div class="row">
                    <div class="col-md-12 clearfix">

                        <div id="text-page">

                          <div class="panel panel-default sidebar-menu">
                            <div class="panel-heading">
                                <h1 style="font-size: 34px;" class="panel-title">Grille des programmes</h1>
                            </div>
                          </div>
                          <br>
                          <h4>Retrouvez la grille complète des émissions de la semaine sur Radio Pac </h4>
                          <br><br>
                        </div>

                        <div id='calendar'></div>



                    </div>
	                </div>
                </section>
	            </div>
      </div>

			<!-- FOOTER -->
			<?php include("includes/footer.php") ?>
		</div>
	</body>

	<!-- JS -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script>
		window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')
	</script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<script src="js/jquery.cookie.js"></script>
	<script src="js/waypoints.min.js"></script>
	<script src="js/jquery.counterup.min.js"></script>
	<script src="js/jquery.parallax-1.1.3.js"></script>
	<script src="js/front.js"></script>

  <!-- Full calendar -->
  <script src='js/moment.min.js'></script>
  <script src='fullcalendar/fullcalendar.min.js'></script>
  <script src='fullcalendar/lang-all.js'></script>
  <script>

    jQuery(document).ready(function() {



      $('#calendar').fullCalendar({
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'agendaWeek,agendaDay'
        },
        lang: 'fr',
        contentHeight: "auto",
        aspectRatio: 1.5,
        defaultView: "agendaWeek",
        editable: false,
        eventLimit: false, // allow "more" link when too many events
        eventSources: [
          'event.php?action=get'
      ],
      eventRender: function (event, element) {
                          element.attr('href', 'javascript:void(0);');
                          element.click(function() {
                              //set the modal values and open
                              $('#modalTitle').html(event.title);
                              $('#modalBody').html(event.description);
                              $('#eventUrl').attr('href',event.url);
                          });
                      },
      });

    });

  </script>

</html>
