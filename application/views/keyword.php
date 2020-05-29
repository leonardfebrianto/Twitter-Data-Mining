<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $tipe;?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="#">
    <link rel="apple-touch-icon" href="#">
    <link rel="apple-touch-icon" sizes="72x72" href="#">
    <link rel="apple-touch-icon" sizes="114x114" href="#">
    <!--Loading bootstrap css-->
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/styles/jquery-ui-1.10.4.custom.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/styles/font-awesome.min.css">
	 <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/styles/simple-line-icons.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/styles/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/styles/animate.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/styles/main.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/styles/style-responsive.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/styles/zabuto_calendar.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/styles/pace.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/styles/jquery.news-ticker.css">
	<script>
	
	$( document ).ready(function() {
	$("textarea").height( $("textarea")[0].scrollHeight);
	});
	
function textAreaAdjust(o) {
    o.style.height = "1px";
    o.style.height = (25+o.scrollHeight)+"px";
}
</script>
</head>
<body>
    <div>

        <!--BEGIN BACK TO TOP-->
        <a id="totop" href="#"><i class="fa fa-angle-up"></i></a>
        <!--END BACK TO TOP-->
        <!--BEGIN TOPBAR-->
        <?php
			include("include/header.php");
			?>
        <!--END TOPBAR-->
        <div id="wrapper">
            <!--BEGIN SIDEBAR MENU-->
            <?php
			include("include/sidebar.php");
			?>
            <!--END SIDEBAR MENU-->
            <!--BEGIN CHAT FORM-->
            
            <!--END CHAT FORM-->
            <!--BEGIN PAGE WRAPPER-->
            <div id="page-wrapper">
                <!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title">
                            Keyword</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;Home&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="hidden"><a href="#">Keyword</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Keyword</li>
                    </ol>
                    <div class="clearfix">
                    </div>
                </div>
                <!--END TITLE & BREADCRUMB PAGE-->
                <!--BEGIN CONTENT-->
                <div class="page-content">
                    <div id="tab-general">
					<div class="row mbl">
				
					<div class="col-lg-12">
					
					<div class="row">
					<form action="<?php echo base_url();?>home/keyword/input" method="post" enctype="multipart/form-data">
					<div class="panel panel-grey">
					<div class="panel-heading"><?php echo strtoupper($tipe);?> - Add New</div>
					<div class="panel-body">
					<i class="text-danger">
					<?php
if(isset($sukses) or isset($gagal))
{
	$total = $totalsukses + $totalgagal;
	echo "".$totalgagal." Fail from ".$total." ( ".$totalsukses." Success )";
}
?>
					</i>
					<div class="col-lg-12">
					<span class="label label-sm label-info">Keyword</span><br/>
					<textarea name="keyword" required="required" class="form-control" onkeyup="textAreaAdjust(this)" style="width:100%;height:100%;text-align:justify;margin-top:10px;overflow:hidden;"></textarea><br/>
					<span class="label label-sm label-info">Category</span><br/><br/>
					<select name="kategori" class="form-control" required="required" >
<option value=""></option>
<?php

	foreach($query_kategori->result() as $isi)
	{
		?>
		<option value="<?php echo $isi->id_kategori_keyword;?>"><?php echo "".$isi->nama_kategori_keyword.""; ?></option>
		<?php
		
	}
?>
</select>
					</div>
					</div>
					</div>
					<div style="float:right;margin-bottom:10px;">
					<input type="submit" name="submit" value="Submit" class="btn btn-grey">
					</div>
					</form>
					<div class="panel panel-grey" style="margin-top:6%;">
					<div class="panel-heading"><?php echo strtoupper($tipe);?> - List</div>
					<div class="panel-body">
					<div class="col-lg-6">
					<a href="<?php echo base_url();?>home/keyword/list" class="text-danger">Click Here</a>
					</div>
					</div>
					</div>
					</div>
					</div>
                    </div>
                </div>
                <!--END CONTENT-->
                <!--BEGIN FOOTER-->
                <?php
				include("include/footer.php");
				?>
                <!--END FOOTER-->
            </div>
            <!--END PAGE WRAPPER-->
        </div>
    </div>
    
    <script src="<?php echo base_url();?>assets/script/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url();?>assets/script/jquery-migrate-1.2.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/script/jquery-ui.js"></script>
    <script src="<?php echo base_url();?>assets/script/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/script/bootstrap-hover-dropdown.js"></script>
    <script src="<?php echo base_url();?>assets/script/html5shiv.js"></script>
    <script src="<?php echo base_url();?>assets/script/respond.min.js"></script>
    <script src="<?php echo base_url();?>assets/script/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url();?>assets/script/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url();?>assets/script/jquery.cookie.js"></script>
    <script src="<?php echo base_url();?>assets/script/icheck.min.js"></script>
    <script src="<?php echo base_url();?>assets/script/custom.min.js"></script>
    <script src="<?php echo base_url();?>assets/script/jquery.news-ticker.js"></script>
    <script src="<?php echo base_url();?>assets/script/jquery.menu.js"></script>
    <script src="<?php echo base_url();?>assets/script/pace.min.js"></script>
    <script src="<?php echo base_url();?>assets/script/holder.js"></script>
    <script src="<?php echo base_url();?>assets/script/responsive-tabs.js"></script>
    <script src="<?php echo base_url();?>assets/script/jquery.flot.js"></script>
    <script src="<?php echo base_url();?>assets/script/jquery.flot.categories.js"></script>
    <script src="<?php echo base_url();?>assets/script/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url();?>assets/script/jquery.flot.tooltip.js"></script>
    <script src="<?php echo base_url();?>assets/script/jquery.flot.fillbetween.js"></script>
    <script src="<?php echo base_url();?>assets/script/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url();?>assets/script/jquery.flot.spline.js"></script>
    <script src="<?php echo base_url();?>assets/script/zabuto_calendar.min.js"></script>
    <script src="<?php echo base_url();?>assets/script/index.js"></script>
    <!--LOADING SCRIPTS FOR CHARTS-->
    <script src="<?php echo base_url();?>assets/script/highcharts.js"></script>
    <script src="<?php echo base_url();?>assets/script/data.js"></script>
    <script src="<?php echo base_url();?>assets/script/drilldown.js"></script>
    <script src="<?php echo base_url();?>assets/script/exporting.js"></script>
    <script src="<?php echo base_url();?>assets/script/highcharts-more.js"></script>
    <script src="<?php echo base_url();?>assets/script/charts-highchart-pie.js"></script>
    <script src="<?php echo base_url();?>assets/script/charts-highchart-more.js"></script>
    <!--CORE JAVASCRIPT-->
    <script src="<?php echo base_url();?>assets/script/main.js"></script>
    <script>        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })
       


</script>
</body>
</html>
