<link rel="stylesheet" media="screen" href="http://openfontlibrary.org/face/droid-arabic-kufi" rel="stylesheet" type="text/css"/>

<div id="main-navbar" class="navbar navbar-inverse" role="navigation">
		<!-- Main menu toggle -->
		<button type="button" id="main-menu-toggle"><i class="navbar-icon fa fa-bars icon"></i><span class="hide-menu-text">HIDE MENU</span></button>
		
		<div class="navbar-inner">
			<!-- Main navbar header -->
			<div class="navbar-header">

				<!-- Logo -->
				<a href="#" class="navbar-brand">
					<strong>الدولة السورية</strong>
				</a>

				<!-- Main navbar toggle -->
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar-collapse"><i class="navbar-icon fa fa-bars"></i></button>

			</div> <!-- / .navbar-header -->

			<div id="main-navbar-collapse" class="collapse navbar-collapse main-navbar-collapse">
				<div>
                <ul class="nav navbar-nav">
				
					</ul>
					 <!-- / .navbar-nav -->

					<div class="right clearfix">
						<ul class="nav navbar-nav pull-right right-navbar-nav">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle user-menu" data-toggle="dropdown">
									<img src="assets/demo/avatars/1.jpg" alt="">
									<span><?= $_SESSION['username'] ?></span>
								</a>
								<ul class="dropdown-menu">
									<li><a href="logout.php"><i class="dropdown-icon fa fa-power-off"></i>&nbsp;&nbsp;تسجيل خروج</a></li>
								</ul>
							</li>
						</ul> <!-- / .navbar-nav -->
					</div> <!-- / .right -->
				</div>
			</div> <!-- / #main-navbar-collapse -->
		</div> <!-- / .navbar-inner -->
	</div>
    
<div id="main-menu" role="navigation">
		<div id="main-menu-inner">
			<div class="menu-content top" id="menu-content-demo">
				<!-- Menu custom content demo
					 Javascript: html/assets/demo/demo.js
				 -->
				<div>
					<div class="text-bg" style="text-align:center;">
                    <img src="assets/demo/avatars/1.jpg" alt="" class="">
                    <span class="text-slim">Welcome,</span> <span class="text-semibold"><?= $_SESSION['username'] ?>
                    </span>
                    </div>

					
					
				</div>
			</div>
						<ul class="navigation">
                <? if($pr_myfile == 'yes'){ ?>
				<li class="active">
					<a href="dashboard.php"><i class="menu-icon fa fa-dashboard"></i><span class="mm-text">ملفاتي</span></a>
                    <?  } ?>
                <? if($pr_settings == 'yes'){ ?>
				<li>
					<a href="kayd.php?do=show"><i class="menu-icon fa fa-file-text"></i><span class="mm-text">إخراج القيد</span></a>
				</li>
				<li>
					<a href="e-kayd.php?do=show"><i class="menu-icon fa fa-file-text"></i><span class="mm-text">إخراج القيد الإلكتروني</span></a>
				</li>
				<li>
					<a href="kensol.php"><i class="menu-icon fa fa-file-text"></i><span class="mm-text">التمديد القنصلي</span></a>
				</li>
				<li>
					<a href="wilade.php"><i class="menu-icon fa fa-file-text"></i><span class="mm-text">بيان ولادة</span></a>
				</li>
				<li>
					<a href="zawaj.php"><i class="menu-icon fa fa-file-text"></i><span class="mm-text">بيان زواج</span></a>
				</li>
                <li>
					<a href="settings.php?do=edit"><i class="menu-icon fa fa-cog"></i><span class="mm-text">اعددات النظام</span></a>
				</li>
				
                <? } ?>
                

                </ul> <!-- / .navigation -->
			
		</div> <!-- / #main-menu-inner -->
	</div>