<div id="header-topbar-option-demo" class="page-header-topbar">
            <nav id="topbar" role="navigation" style="margin-bottom: 0;" data-step="3" class="navbar navbar-default navbar-static-top">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <a id="logo" class="navbar-brand"><span class="fa fa-rocket"></span><span class="logo-text" style="display: none"></span><span  class="logo-text-icon"></span></a></div>
            <div class="topbar-main"><a id="menu-toggle" href="#" class="hidden-xs"><i class="fa fa-bars"></i></a>
                
                <ul class="nav navbar navbar-top-links navbar-right mbn">
                    <li class="dropdown topbar-user"><a data-hover="dropdown" href="#" class="dropdown-toggle"><img src="images/avatar/48.jpg" alt="" class="img-responsive img-circle"/>&nbsp;<span class="hidden-xs"><?php echo $this->session->userdata('logged_in')['username'];?></span>&nbsp;<span class="caret"></span></a>
                        <ul class="dropdown-menu dropdown-user pull-right">
                            <li><a href="<?php echo base_url();?>home/logout"><i class="fa fa-key"></i>Log Out</a></li>
                        </ul>
                  </li>
                </ul>
            </div>
        </nav>
            <!--BEGIN MODAL CONFIG PORTLET-->
            <!--END MODAL CONFIG PORTLET-->
        </div>