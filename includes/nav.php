
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
    
    <!-- Dropdown content -->
    <!-- Desktop Dropdown content -->
    <ul id="syllabusdropdown" class="dropdown-content teal lighten-2">
        <li><a href="/eresource/syllabus/add-syllabus.php"><i class="fas fa-print left fa-lg white-text"></i><span>Add new Syllabus</span></a></li>
        <li><a href="/eresource/syllabus/manage-syllabus.php"><i class="fas fa-print left fa-lg white-text"></i><span>View Syllabuses</span></a></li>
    </ul>
    <ul id="paperdropdown" class="dropdown-content teal lighten-2">
        <li><a href="/eresource/papers/add-paper.php"><i class="fas fa-file-circle-question fa-lg white-text"></i><span>Add new Paper</span></a></li>
        <li><a href="/eresource/papers/manage-paper.php"><i class="fas fa-file-circle-question left fa-lg white-text"></i><span>View Papers</span></a></li>
    </ul>
    <?php if($_SESSION["isAdmin"] == 1): ?>
    <ul id="studentdropdown" class="dropdown-content teal lighten-2">
        <li><a href="/eresource/students/add-student.php"><i class="fas fa-graduation-cap left fa-lg white-text"></i><span>Add new Student</span></a></li>
        <li><a href="/eresource/students/manage-student.php"><i class="fas fa-graduation-cap left fa-lg white-text"></i><span>View Students</span></a></li>
    </ul>
    <ul id="userdropdown" class="dropdown-content teal lighten-2">
        <li><a href="/eresource/users/add-user.php"><i class="fas fa-users left fa-lg white-text"></i><span>Add new User</span></a></li>
        <li><a href="/eresource/users/manage-user.php"><i class="fas fa-users left fa-lg white-text"></i><span>View Users</span></a></li>
    </ul>
    <?php endif; ?>
    <ul id="noticedropdown" class="dropdown-content teal lighten-2">
        <li><a href="/eresource/noticeboard/add-notice.php"><i class="fas fa-bell left fa-lg white-text"></i><span>Add new Notice</span></a></li>
        <li><a href="/eresource/noticeboard/manage-notice.php"><i class="fas fa-bell left fa-lg white-text"></i><span>View Notices</span></a></li>
    </ul>
    <!-- Mobile Dropdown content -->
    <ul id="syllabusdropdown" class="dropdown-content teal lighten-2">
        <li><a href="/eresource/syllabus/add-syllabus.php"><i class="fas fa-print left fa-lg white-text"></i><span>Add new Syllabus</span></a></li>
        <li><a href="/eresource/syllabus/manage-syllabus.php"><i class="fas fa-print left fa-lg white-text"></i><span>View Syllabuses</span></a></li>
    </ul>
    <ul id="paperdropdown" class="dropdown-content teal lighten-2">
        <li><a href="/eresource/papers/add-paper.php"><i class="fas fa-file-circle-question fa-lg white-text"></i><span>Add new Paper</span></a></li>
        <li><a href="/eresource/papers/manage-paper.php"><i class="fas fa-file-circle-question fa-lg white-text"></i><span>View Papers</span></a></li>
    </ul>
    <?php if($_SESSION["isAdmin"] == 1): ?>
    <ul id="studentdropdown" class="dropdown-content teal lighten-2">
        <li><a href="/eresource/students/add-student.php"><i class="fas fa-graduation-cap left fa-lg white-text"></i><span>Add new Student</span></a></li>
        <li><a href="/eresource/students/manage-student.php"><i class="fas fa-graduation-cap left fa-lg white-text"></i><span>View Students</span></a></li>
    </ul>
    <ul id="userdropdown" class="dropdown-content teal lighten-2">
        <li><a href="/eresource/users/add-user.php"><i class="fas fa-users left fa-lg white-text"></i><span>Add new User</span></a></li>
        <li><a href="/eresource/users/manage-user.php"><i class="fas fa-users left fa-lg white-text"></i><span>View Users</span></a></li>
    </ul>
    <?php endif;?> 
    <ul id="noticedropdown" class="dropdown-content teal lighten-2">
        <li><a href="/eresource/noticeboard/add-notice.php"><i class="fas fa-bell left fa-lg white-text"></i><span>Add new Notice</span></a></li>
        <li><a href="/eresource/noticeboard/manage-notice.php"><i class="fas fa-bell left fa-lg white-text"></i><span>View Notices</span></a></li>
    </ul> 
    <!-- Dropdown content end -->

    <?php $site_logo = "/eresource/assets/images/icsc-logo.png" ?>
    <div class="navbar-fixed z-depth-3">
        <nav class="blue">
			<div class="nav-wrapper">
				<a href="/eresource/welcome.php" class="brand-logo hide-on-med-and-down" style="margin-left: 420px" title="ICSC eResources"><img src="<?php echo $site_logo ?>" style="margin-top:10px; width:200px; height:40px;"></a>
				<a href="/eresource/welcome.php" class="brand-logo center hide-on-large-only" title="ICSC eResources"><img src="<?php echo $site_logo ?>" style="margin-top:10px; width:200px; height:40px;"></a>
				<a href="#" data-target="eresource-mobile-nav" class="top-nav sidenav-trigger"><i class="material-icons">menu</i></a>
					<ul class="sidenav sidenav-fixed right hide-on-med-and-down">
					    <li><div class="user-view">
                            <div class="background">
                                <img src="/eresource/assets/images/nav-bg.jpg">
                            </div>
                        <a href="#user"><img class="circle" src="/eresource/assets/images/icsc-logo-small.png"></a>
                        <a href="#name"><span class="white-text name" style="text-transform:capitalize;"><b></b><?php echo htmlspecialchars($_SESSION["name"]); ?></b></span></a>
                        </div></li>
				        <li><a href="/eresource/welcome.php"><i class="fas fa-desktop left fa-lg"></i><span>Dashboard</span></a></li>
				        <li><div class="divider"></div></li>
                        <li><a class="dropdown-trigger" href="#!" data-target="syllabusdropdown"><i class="fas fa-print left fa-lg"></i><span>Syllabus</span><i class="material-icons right">arrow_drop_down</i></a></li>
                        <li><a class="dropdown-trigger" href="#!" data-target="paperdropdown"><i class="fas fa-file-circle-question left fa-lg"></i><span>Question Papers</span><i class="material-icons right">arrow_drop_down</i></a></li>
                        <?php if($_SESSION["isAdmin"] == 1): ?>
                        <li><a class="dropdown-trigger" href="#!" data-target="studentdropdown"><i class="fas fa-graduation-cap left fa-lg"></i><span>Students</span><i class="material-icons right">arrow_drop_down</i></a></li>
                        <li><a class="dropdown-trigger" href="#!" data-target="userdropdown"><i class="fas fa-users left fa-lg"></i><span>Users</span><i class="material-icons right">arrow_drop_down</i></a></li>
				        <?php endif; ?>
                        <li><div class="divider"></div></li>
                        <li><a class="dropdown-trigger" href="#!" data-target="noticedropdown"><i class="fas fa-bell left fa-lg"></i><span>Noticeboard</span><i class="material-icons right">arrow_drop_down</i></a></li>
                        <li><div class="divider"></div></li>
				        <li><a href="/eresource/reset-password.php"><i class="fas fa-lock left fa-lg"></i><span>Change Password</span></a></li>
				        <li><a href="/eresource/logout.php"><i class="fas fa-sign-out-alt left fa-lg"></i><span>Logout</span></a></li>
					</ul>
			</div>
		</nav>
	</div>
        <!-- Mobile Nav -->
	<ul class="sidenav" id="eresource-mobile-nav">
	    
	    <li><div class="user-view">
      <div class="background">
        <img src="/eresource/assets/images/nav-bg.jpg">
      </div>
      <a href="#user"><img class="circle" src="/eresource/assets/images/icsc-logo-small.png"></a>
      <a href="#name"><span class="white-text name" style="text-transform:capitalize;"><strong><?php echo htmlspecialchars($_SESSION["username"]); ?></strong></span></a>
    </div></li>
    
		<li><a href="/eresource/welcome.php"><i class="fas fa-desktop left fa-lg"></i><span>Dashboard</span></a></li>
		<li><div class="divider"></div></li>
        <li><a class="dropdown-trigger" href="#!" data-target="syllabusdropdown"><i class="fas fa-print left fa-lg"></i><span>Syllabus</span><i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a class="dropdown-trigger" href="#!" data-target="paperdropdown"><i class="fas fa-file-circle-question left fa-lg"></i><span>Question Papers</span><i class="material-icons right">arrow_drop_down</i></a></li>
        <?php if($_SESSION["isAdmin"] == 1): ?>
        <li><a class="dropdown-trigger" href="#!" data-target="studentdropdown"><i class="fas fa-graduation-cap left fa-lg"></i><span>Students</span><i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a class="dropdown-trigger" href="#!" data-target="userdropdown"><i class="fas fa-users left fa-lg"></i><span>Users</span><i class="material-icons right">arrow_drop_down</i></a></li>
		<?php endif; ?>
        <li><div class="divider"></div></li>
        <li><a class="dropdown-trigger" href="#!" data-target="noticedropdown"><i class="fas fa-bell left fa-lg"></i><span>Noticeboard</span><i class="material-icons right">arrow_drop_down</i></a></li>
        <li><div class="divider"></div></li>
        <li><a href="/eresource/reset-password.php"><i class="fas fa-lock left fa-lg"></i><span>Change Password</span></a></li>
        <li><a href="/eresource/logout.php"><i class="fas fa-sign-out-alt left fa-lg"></i><span>Logout</span></a></li>
	</ul>
    <!-- Mobile nav end -->
</div>
