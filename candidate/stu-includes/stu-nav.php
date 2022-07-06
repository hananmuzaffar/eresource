<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
            <link rel="icon" href="/eresource/assets/images/favicon.ico" sizes="16x16" type="image/ico">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link type="text/css" rel="stylesheet" href="/eresource/assets/materialize/css/materialize.min.css"  media="screen,projection"/>
            <link href="/eresource/assets/css/inner.css" rel="stylesheet">
            <link href="/eresource/assets/icons/css/all.css" rel="stylesheet">
            <link href="/eresource/assets/icons/css/fontawesome.css" rel="stylesheet">
            <link href="/eresource/assets/icons/css/solid.css" rel="stylesheet">
        </head>
            <body class="grey lighten-4">
                <div class="row">
    
                    <?php $site_logo = "<img src='/eresource/assets/images/icsc-logo.png' style='margin-top:10px; width:200px; height:40px;'>" ?>
                    <div class="navbar-fixed z-depth-3">
                        <nav class="blue">
			                <div class="nav-wrapper">
				                <a href="/eresource/candidate" class="brand-logo hide-on-med-and-down" style="margin-left: 420px" title="ICSC eResources"><?php echo $site_logo ?></a>
				                <a href="/eresource" class="brand-logo center hide-on-large-only" title="ICSC eResources"><img src='/eresource/assets/images/icsc-logo.png' style='margin-top:10px; width:200px; height:40px;'></a>
                                <a href="#" data-target="eresource-mobile-nav" class="top-nav sidenav-trigger"><i class="material-icons">menu</i></a>
				
                                <!-- Desktop nav begin -->
                                <ul class="sidenav sidenav-fixed right hide-on-med-and-down">
					                <li>
                                        <div class="user-view">
                                            <div class="background">
                                                <img src="/eresource/assets/images/nav-bg.jpg">
                                            </div>
                                            <a href="#student"><img class="circle" src="/eresource/assets/images/icsc-logo-small.png"></a>
                                            <a href="#name"><span class="white-text name" style="text-transform:capitalize;"><b></b><?php echo htmlspecialchars($_SESSION["stu_name"]); echo " [" . $_SESSION["stu_rollno"] . "]" ?></b></span></a>
                                        </div>
                                    </li>
				                    <li><a href="/eresource/candidate/StudentDashboard.php"><i class="fas fa-desktop left fa-lg"></i><span>Dashboard</span></a></li>
				                    <li><div class="divider"></div></li>
                                    <li><a href="./syllabus.php"><i class="fas fa-print left fa-lg"></i><span>View Syllabus</span></a></li>
                                    <li><a href="./paper.php"><i class="fas fa-file-circle-question left fa-lg"></i><span>View Question Papers</span></a></li>
                                    <li><div class="divider"></div></li>
			                        <li><a href="./stu-reset-password.php"><i class="fas fa-lock left fa-lg"></i><span>Change Password</span></a></li>
			                        <li><a href="./stu-logout.php"><i class="fas fa-sign-out-alt left fa-lg"></i><span>Logout</span></a></li>
				                </ul>
                                <!-- Desktop nav end -->

			                </div>
		                </nav>
	                </div>

                    <!-- Mobile nav begin -->
	                <ul class="sidenav" id="eresource-mobile-nav">
	                    <li>
                            <div class="user-view">
                                <div class="background">
                                    <img src="/eresource/assets/images/nav-bg.jpg">
                                </div>
                                <a href="#student"><img class="circle" src="/eresource/assets/images/icsc-logo-small.png"></a>
                                <a href="#name"><span class="white-text name" style="text-transform:capitalize;"><strong><?php echo htmlspecialchars($_SESSION["stu_name"]); echo " [" . $_SESSION["stu_rollno"] . "]" ?></strong></span></a>
                            </div>
                        </li>
    
		                <li><a href="/eresource/candidate/StudentDashboard.php"><i class="fas fa-desktop left fa-lg"></i><span>Dashboard</span></a></li>
                        <li><div class="divider"></div></li>
                        <li><a href="./syllabus.php"><i class="fas fa-print left fa-lg"></i><span>View Syllabus</span></a></li>
                        <li><a href="./paper.php" ><i class="fas fa-clipboard-question left fa-lg"></i><span>View Question Papers</span></a></li>
                        <li><div class="divider"></div></li>
                        <li><a href="./stu-reset-password.php"><i class="fas fa-lock left fa-lg"></i><span>Change Password</span></a></li>
                        <li><a href="./stu-logout.php"><i class="fas fa-sign-out-alt left fa-lg"></i><span>Logout</span></a></li>
	                </ul>
                    <!-- Mobile nav end -->

                </div>
