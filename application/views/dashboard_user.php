

<!DOCTYPE html>
<html lang="en">
<head>
	
    <title><?php echo $tipe;?> | <?php echo $tipe;?></title>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/icons/logo.png">
	
    <link rel="apple-touch-icon" href="#">
    <link rel="apple-touch-icon" sizes="72x72" href="#">
    <link rel="apple-touch-icon" sizes="114x114" href="#">
    <!--Loading bootstrap css-->
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/styles/jquery-ui-1.10.4.custom.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/styles/font-awesome.min.css">
	 <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/styles/simple-line-icons.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/styles/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/styles/animate.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/styles/main.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/styles/style-responsive.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/styles/zabuto_calendar.min.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/styles/pace.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/styles/jquery.news-ticker.css">
	<style>
	.flot-x-axis .flot-tick-label {
  transform: translateY(400%) rotate(-35deg)
}
	</style>
	
</head>
<body>

    
    <div>    
        <!--BEGIN BACK TO TOP-->
        <a id="totop" href="#"><i class="fa fa-angle-up"></i></a>
        <!--END BACK TO TOP-->
        <?php
		include("include/header.php");
		?>
        <div id="wrapper">
            <!--BEGIN SIDEBAR MENU-->
            <?php
			include("include/sidebar_user.php");
			?>
            <!--END SIDEBAR MENU-->
            <!--BEGIN CHAT FORM-->
         
            <!--END CHAT FORM-->
            <!--BEGIN PAGE WRAPPER-->
            <div id="page-wrapper">
                <!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title"><?php echo $tipe;?></div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="hidden"><a href="#"><?php echo $tipe;?></a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active"><?php echo $tipe;?></li>
                    </ol>
                    <div class="clearfix">
					
                    </div>
                </div>
                <!--END TITLE & BREADCRUMB PAGE-->
                <!--BEGIN CONTENT-->
<div class="page-content" style="margin-top:-20px;">
                    <div id="tab-general">
                        <div class="row mbl">
                            <div class="col-lg-12">
                                <?php
								$namafolder = md5($username);
								foreach (glob("./assets/excel/".$namafolder."/*") as $excelname)
		{
		$namaexcel = pathinfo($excelname)['basename'];
		}
								if (isset($namaexcel))
		{
		?>
		<a href="<?php echo base_url();?>assets/excel/<?php echo $namafolder;?>/<?php echo $namaexcel;?>">Click Here To Download Result (Excel File)</a>
		<?php
		}
		else
		{
		?>
		<i class="text-danger">No Result (Excel File) Was Found</i>
		<?php
		}
								?><br/><br/>
								<a href="<?php echo base_url();?>home/result">Click Here To View Detail Data</a>
								<br/><br/>
                                            <div class="col-md-12">
											
											
                                                <div id="area-chart-spline" style="width: 100%; height: 300px; display: none;">
                                                </div>
											
											
											
                                            </div>
                                
                            </div>

                            <div  class="col-lg-12">
							<div class="row">	
					<div class="col-lg-12 block-space">
					<div style="width:830px;">
					<div class="portlet box mbl">
                            <div class="portlet-header">
                                <div class="caption">Total</div>
                            </div>
                            <div class="portlet-body" style="height:400px;">
                                <div id="bar-chart" style="width: 100%; height:300px"></div>
                            </div>
                        </div>
						</div>
					</div>
					
					
					
                    <div class="col-lg-12 block-space">
					<div style="width:830px;">
						<div class="portlet box mbl">
                            <div class="portlet-header">
                                <div class="caption">Gender</div>
                            </div>
                            <div class="portlet-body" style="height:400px;">
                                <div id="bar-chart-stack" style="width: 100%; height:300px"></div>
                            </div>
                        </div>
					</div>
                    </div>
					
					<div class="col-lg-12 block-space">
					<div style="width:830px;">
					<div class="portlet box mbl">
                            <div class="portlet-header">
                                <div class="caption">Age</div>
                            </div>
                            <div class="portlet-body" style="height:400px;">
                                <div id="line-chart" style="width: 100%; height:300px"></div>
                            </div>
                        </div>
					</div>
					</div>
					
					<div class="col-lg-12 block-space">
					<div style="width:830px;">
					<div class="portlet box mbl">
                            <div class="portlet-header">
                                <div class="caption">Sentiment</div>
                            </div>
                            <div class="portlet-body" style="height:400px;">
                                <div id="line-chart-2" style="width: 100%; height:300px"></div>
                            </div>
                        </div>
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
				$this->load->view("include/footer");
				?>
                <!--END FOOTER-->
            </div>
            <!--END PAGE WRAPPER-->
        </div>
    </div>
    
    
    <script src="<?php echo base_url(); ?>assets/script/jquery-1.10.2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/script/jquery-migrate-1.2.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/script/jquery-ui.js"></script>
    <script src="<?php echo base_url(); ?>assets/script/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/script/bootstrap-hover-dropdown.js"></script>
    <script src="<?php echo base_url(); ?>assets/script/html5shiv.js"></script>
    <script src="<?php echo base_url(); ?>assets/script/respond.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/script/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url(); ?>assets/script/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url(); ?>assets/script/jquery.cookie.js"></script>
    <script src="<?php echo base_url(); ?>assets/script/icheck.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/script/custom.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/script/jquery.news-ticker.js"></script>
    <script src="<?php echo base_url(); ?>assets/script/jquery.menu.js"></script>
    <script src="<?php echo base_url(); ?>assets/script/pace.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/script/holder.js"></script>
    <script src="<?php echo base_url(); ?>assets/script/responsive-tabs.js"></script>
    <script src="<?php echo base_url(); ?>assets/script/jquery.flot.js"></script>
    <script src="<?php echo base_url(); ?>assets/script/jquery.flot.categories.js"></script>
    <script src="<?php echo base_url(); ?>assets/script/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url(); ?>assets/script/jquery.flot.tooltip.js"></script>
    <script src="<?php echo base_url(); ?>assets/script/jquery.flot.fillbetween.js"></script>
    <script src="<?php echo base_url(); ?>assets/script/jquery.flot.stack.js"></script>
    <script src="<?php echo base_url(); ?>assets/script/jquery.flot.spline.js"></script>
    <script src="<?php echo base_url(); ?>assets/script/zabuto_calendar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/script/index.js"></script>
    <!--LOADING SCRIPTS FOR CHARTS-->
    <script src="<?php echo base_url(); ?>assets/script/highchart.js"></script>
    <!--CORE JAVASCRIPT-->
    <script src="<?php echo base_url(); ?>assets/script/main.js"></script>
	<?php
	$this->load->view("include/js-chart");
	?>
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
