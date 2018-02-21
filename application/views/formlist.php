<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
	<meta name="author" content="Coderthemes">

	<!-- App favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">
	<!-- App title -->
	<title>Zircos - Responsive Admin Dashboard Template</title>

	<!-- App css -->
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/css/core.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/css/components.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/css/pages.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/css/menu.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/css/responsive.css" rel="stylesheet" type="text/css" />

	<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<script src="<?php echo base_url(); ?>assets/js/modernizr.min.js"></script>

</head>


<body class="bg-transparent">
	
	<div class="table-responsive table-colored table-purple">
		<table class="table m-0">
			<thead>
				<tr>
					<th>#</th>
					<th>Product Name</th>
					<th>Product Type</th>
					<th>Product Price</th>
					<th>Stocks</th>
					<th>Brand</th>
					<th></th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i=1;
				foreach($data as $key=>$value) {
					echo "<tr>";
					echo "<td>".$i."</td>";
					echo "<td>".$data[$key]['pname']."</td>";
					echo "<td>".$data[$key]['ptype']."</td>";
					echo "<td>".$data[$key]['price']."</td>";
					echo "<td>".$data[$key]['stock']."</td>";
					echo "<td>".$data[$key]['brand']."</td>";
					
					echo "<td style='width:130px;'><a href = 'Update/view?pid=".$data[$key]['id']."' class='btn btn-sm btn-purple btn-rounded w-md waves-effect waves-light m-b-5' >Edit</a></td>";

					echo "<td style='width:130px';><a href = 'Update/removeproduct?pid=".$data[$key]['id']."' class='btn btn-sm btn-purple btn-rounded w-md waves-effect waves-light m-b-5' >Delete</a></td>";
					echo "</tr>";
					$i++;
				}

				?>
			</tbody>
		</table>
		<?php $this->session->flashdata('message'); ?>
	</div>

	<script>
		var resizefunc = [];
	</script>
	
	<!-- jQuery  -->
	<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/detect.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/fastclick.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.blockUI.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/waves.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>
	
	<!-- App js -->
	<script src="<?php echo base_url(); ?>assets/js/jquery.core.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.app.js"></script>
	
</body>
</html>