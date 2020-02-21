<?php 
ini_set('allow_url_fopen', '1');
ini_set('display_errors', 1);

$refresh_t = isset($_GET['refresh']) ? $_GET['refresh'] : '0';
$refresh = $refresh_t > 0 ? '<meta http-equiv="refresh" content="'.$_GET['refresh'].'" >' : '';

$consulta = 'http://localhost/server-status?ExtendedStatus=On';
$tratamento = file_get_contents($consulta);
$pagina = str_replace(array('</head>', '<table border="0">', '</th></tr>', '</body>', '<body>'), array('
<!--<script type="text/javascript" src="js/jquery-ui/js/jquery-1.9.1.js"></script>-->
<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui/js/jquery-ui-1.10.3.custom.min.js"></script>
<link href="js/jquery-ui/css/cupertino/jquery-ui-1.10.3.custom.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<link href="css/demo_table_jui.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.columnFilter.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.pagination.js"></script>
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
'.$refresh.'
</head>', '<table id="dataTable" cellpadding="2"><thead>', '</th></tr></thead>', '<script type="text/javascript">

$(document).ready(function() {
	 $(\'#refresh\').tooltip();
	oTable = $(\'#dataTable\').dataTable({
		"aaSorting": [[1, "desc"]],
		"bJQueryUI": true,
		"bScrollCollapse": true,
		"sScrollY": "auto",
		"bAutoWidth": true,
		"bSortClasses": true,
		"bPaginate": true,
		"sPaginationType": "full_numbers", //full_numbers,two_button
		"bStateSave": false,
		"bInfo": true,
		"bFilter": true,
		"bProcessing": true,
		"iDisplayLength": 25,
		"bLengthChange": true,
		"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
	});
} );
 
    </script>
	<footer>
	Gerado por Apache mod_status viewer - ExacTI Solu&ccedil;&otilde;es em Tecnologia<br><a href="http://www.exacti.com.br" target="_blank">www.exacti.com.br</a>
	</footer>
	</body>', '
	<body><nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Apache mod_status viewer</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        
      <form class="navbar-form navbar-left form-horizontal" role="search">
        <div class="form-group">
		<label for="refresh" class="col-sm-4 control-label">Auto-refresh</label>
		<div class="col-sm-3">
          <input name="refresh" id="refresh" value="'.$refresh_t.'" type="text" class="form-control" placeholder="0" data-toggle="tooltip" data-placement="bottom" title="Em segundos, 0 para desativar.">
		  </div>
		  <div class="col-sm-2">
		  <button type="submit" class="btn btn-default">Ok</button>
		  </div>
        </div>
        
      </form>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>'), $tratamento);

echo $pagina;

?>