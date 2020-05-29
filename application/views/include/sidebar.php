<nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;"
                data-position="right" class="navbar-default navbar-static-side">
            <div class="sidebar-collapse menu-scroll">
                <ul id="side-menu" class="nav">
                    
                     <div class="clearfix"></div>
					 
                    <li <?php if($tipe == "Dashboard") echo "class='active'";?>>
					<a href="<?php echo base_url();?>home/dashboard">
					<i class="fa fa-tachometer fa-fw">
					<div class="icon-bg bg-orange"></div>
                    </i>
					<span class="menu-title">Dashboard</span>
					</a>
					</li>
					
					<li <?php if($tipe == "Category") echo "class='active'";?>>
					<a href="<?php echo base_url();?>home/kategori">
					<i class="fa fa-th-list fa-fw">
					<div class="icon-bg bg-orange"></div>
                    </i>
					<span class="menu-title">Category</span>
					</a>
					</li>
					
					<li <?php if($tipe == "Keyword") echo "class='active'";?>>
					<a href="<?php echo base_url();?>home/keyword">
					<i class="fa fa-slack fa-fw">
					<div class="icon-bg bg-orange"></div>
                    </i>
					<span class="menu-title">Keyword</span>
					</a>
					</li>
					
					<li <?php if($tipe == "Result") echo "class='active'";?>>
					<a href="<?php echo base_url();?>home/result">
					<i class="fa fa-file-o fa-fw">
					<div class="icon-bg bg-orange"></div>
                    </i>
					<span class="menu-title">Result</span>
					</a>
					</li>
					
					<li <?php if($tipe == "User") echo "class='active'";?>>
					<a href="<?php echo base_url();?>home/user">
					<i class="fa fa-user fa-fw">
					<div class="icon-bg bg-orange"></div>
                    </i>
					<span class="menu-title">User</span>
					</a>
					</li>
					
                </ul>
            </div>
        </nav>