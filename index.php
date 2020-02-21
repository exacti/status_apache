<?php 
ini_set('allow_url_fopen', '1');
ini_set('display_errors', 1);

$refresh_t = isset($_GET['refresh']) ? $_GET['refresh'] : '0';
$refresh = $refresh_t > 0 ? '<meta http-equiv="refresh" content="'.$_GET['refresh'].'" >' : '';

$consulta = 'http://localhost/server-status?ExtendedStatus=On';
$tratamento = file_get_contents($consulta);
$pagina = str_replace(array('</head>', '<table border="0">', '</th></tr>', '</body>', '<body>'), array('
<!--<script type="text/javascript" src="js/jquery-ui/js/jquery-1.9.1.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>

<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/css/dataTables.bootstrap4.min.css" integrity="sha256-F+DaKAClQut87heMIC6oThARMuWne8+WzxIDT7jXuPA=" crossorigin="anonymous" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.19/js/dataTables.bootstrap4.min.js" integrity="sha256-hJ44ymhBmRPJKIaKRf3DSX5uiFEZ9xB/qx8cNbJvIMU=" crossorigin="anonymous"></script>
<style>
/* CSS Document */

body{
 padding-top: 80px;
}

th {
	/*white-space:nowrap;*/
	/*line-height: 50px;*/
}
table {
	/*font-size:14px !important;*/
}
footer {
	text-align:center;
}
.navbar-form .form-control {
	/*width:100%;*/
}
.tooltip.bottom {
	border:none;
	background:none;
}
</style>
'.$refresh.'
</head>', '<table id="dataTable" cellpadding="2"><thead>', '</th></tr></thead>', '<script type="text/javascript">

$(document).ready(function() {
	 $(\'#refresh\').tooltip();
	oTable = $(\'#dataTable\').DataTable({
		"aaSorting": [[1, "desc"]],
		//"bJQueryUI": true,
		"autoWidth": true,
		"sScrollY": "auto",
		"bAutoWidth": true,
		"bSortClasses": true,
		"paging": true,
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
    </div>
	<footer>
	Gerado por Apache mod_status viewer - ExacTI Solu&ccedil;&otilde;es em Tecnologia<br><a href="http://www.exacti.com.br" target="_blank">www.exacti.com.br</a>
	</footer>
	</body>', '
	<body>
	<nav class="navbar  navbar-dark bg-primary fixed-top" role="navigation">
            
    <!-- Brand and toggle get grouped for better mobile display -->
    
      <a class="navbar-brand" href="#">Apache mod_status viewer</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto"> </ul>
        
      <form class="" role="search">
        <div class="form-row">
            <div class="col-3">
                <input name="refresh" id="refresh" value="'.(($refresh_t == 0) ? "" : $refresh_t).'" type="text" class="form-control" placeholder="Auto-refresh" data-toggle="tooltip" data-placement="bottom" title="Seconds. 0 for disable.">
		    </div>
            <div class="col-2">
		        <button type="submit" class="btn btn-light">Ok</button>
		    </div>
        </div>
        
      </form>
      
    </div><!-- /.navbar-collapse -->
  <!-- /.container-fluid -->
</nav> <div class="container-fluid">'), $tratamento);

echo $pagina;

?>