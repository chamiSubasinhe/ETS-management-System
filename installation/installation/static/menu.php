   <div class="menu">
                <ul class="list">
				<!-------------------------------------------------------------- Administration ----------------------->
				<?php if($_SESSION['authLevel']=='1'){ ?>
				<li>
                    <a href="javascript:void(0);" class="menu-toggle">
                            <span>System Administration</span>
					</a>
                <ul class="ml-menu">
                    <li class="header">Back End</li>
					<li>
                        <a href="installdb.php">
                            <i class="material-icons"></i>
                            <span>Install Database</span>
                        </a>
                    </li>
					<li>
                        <a href="Logger.php">
                            <i class="material-icons"></i>
                            <span>System Log</span>
                        </a>
                    </li>
					<li>
                        <a href="addnewadmin.php">
                            <i class="material-icons"></i>
                            <span>Add New Role</span>
                        </a>
                    </li>
					<li>
                        <a href="userprofile.php">
                            <i class="material-icons"></i>
                            <span>User Profile</span>
                        </a>
                    </li>
					<li>
                        <a href="logout.php">
                            <i class="material-icons"></i>
                            <span>Logout</span>
                        </a>
                    </li>
					
					
					<li class="header">Home</li>
                    <li>
                        <a href="index.php">
                            <i class="material-icons"></i>
                            <span>System Overview</span>
                        </a>
                    </li>
					<li>
                        <a href="scripteditor.php">
                            <i class="material-icons"></i>
                            <span>Script Editor</span>
                        </a>
                    </li>
					<li>
                        <a href="supporttickets.php">
                            <i class="material-icons"></i>
                            <span>Support Tickets</span>
                        </a>
                    </li>
					
					
					
					
					<li>
                        <a data-toggle="tooltip" data-placement="right" title="Set auth levels here" href="authlevels.php">
                            <i class="material-icons"></i>
                            <span>Auth Levels</span>
                        </a>
                    </li>
					
					
                    <li class="header">Application Settings</li>
					<li>
                        <a href="newvariable.php">
                            <i class="material-icons"></i>
                            <span>Add New Variable</span>
                        </a>
                    </li>
                    <li>
                        <a href="settings.php">
                            <i class="material-icons"></i>
                            <span>View All Variables</span>
                        </a>
                    </li>
                    
                   
                    <li class="header">Databse</li>
                    <li>
                        <a href="query.php">
                            <i class="material-icons"></i>
                            <span>SQL Runner</span>
                        </a>
                    </li>
					<li>
                        <a href="viewdb.php">
                            <i class="material-icons"></i>
                            <span>View DataBase</span>
                        </a>
                    </li>
                          
                </ul>
                </li>
				<?php } ?>
				<!-------------------------------------------------------------- Course Management ----------------------->
				<?php if($_SESSION['authLevel']=='3'){ ?>
				<li>
                    <a href="javascript:void(0);" class="menu-toggle">
                            <span>Course Management</span>
					</a>
					<ul class="ml-menu">
						<li class="header">Module Management</li>
						<li>
                        <a href="query.php">
                            <i class="material-icons"></i>
                            <span>New Module</span>
                        </a>
                    </li>
					<li>
                        <a href="query.php">
                            <i class="material-icons"></i>
                            <span>Update/Delete Module</span>
                        </a>
                    </li>
					</ul>
                </li>
                <?php } ?>
				<!-------------------------------------------------------------- Staff Management ----------------------->
				<?php if($_SESSION['authLevel']=='1'){ ?>
				<li>
                    <a href="javascript:void(0);" class="menu-toggle">
                            <span>Staff Management</span>
					</a>
					<ul class="ml-menu">
						<li class="header">Section 1</li>
						<li>
                        <a href="query.php">
                            <i class="material-icons"></i>
                            <span>Function 1</span>
                        </a>
                    </li>
					</ul>
                </li>
				<?php } ?>
				<!-------------------------------------------------------------- Student Management ----------------------->
				<?php if($_SESSION['authLevel']=='3'){ ?>
				<li>
                    <a href="javascript:void(0);" class="menu-toggle">
                            <span>Student Management</span>
					</a>
					<ul class="ml-menu">
						<li class="header">Section 1</li>
						<li>
                        <a href="query.php">
                            <i class="material-icons"></i>
                            <span>Function 1</span>
                        </a>
                    </li>
					</ul>
                </li>
				<?php } ?>
				<!-------------------------------------------------------------- Financial Management ----------------------->
				<?php if($_SESSION['authLevel']=='1'){ ?>
				<li>
                    <a href="javascript:void(0);" class="menu-toggle">
                            <span>Financial Management</span>
					</a>
					<ul class="ml-menu">
						<li class="header">Section 1</li>
						<li>
                        <a href="query.php">
                            <i class="material-icons"></i>
                            <span>Function 1</span>
                        </a>
                    </li>
					</ul>
                </li>
				<?php } ?>
				<!-------------------------------------------------------------- Library Management ----------------------->
				<?php if($_SESSION['authLevel']=='1'){ ?>
				<li>
                    <a href="javascript:void(0);" class="menu-toggle">
                            <span>Library Management</span>
					</a>
					<ul class="ml-menu">
						<li class="header">Section 1</li>
						<li>
                        <a href="query.php">
                            <i class="material-icons"></i>
                            <span>Function 1</span>
                        </a>
                    </li>
					</ul>
                </li>
				<?php } ?>
                   
                  
                </ul>
            </div>