<?php $active=''; ?>
<div class="menu animated bounsUp">
                <ul class="list">
				<!-------------------------------------------------------------- Administration ----------------------->
				<?php if($_SESSION['authLevel']=='1'){ $active='active';?>
				<li class="<?php echo $active; ?>">
                    <a href="javascript:void(0);" class="menu-toggle">
                            <span>System Administration</span>
					</a>
                <ul class="ml-menu">
                    <li class="header">Back End</li>
					
					<li>
                                <a href="javascript:void(0);" class="menu-toggle" data-toggle="tooltip" data-placement="right" title="Database Settings">
                                    <span>Database</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="installdb.php">
                                            <span>Installation System</span>
                                        </a>
                                    </li>
									<li>
                                        <a href="backupRestore.php">
                                            <span>Backup & Restore</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle">
                                            <span>Views</span>
                                        </a>
                                        <ul class="ml-menu">
                                            <li>
                                                <li>
													<a href="query.php">
														<span>SQL Runner</span>
													</a>
												</li>
												<li>
													<a href="viewdb.php">
														<span>View DataBase</span>
													</a>
												</li>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
					
					<li>
					<li>
                                <a href="javascript:void(0);" class="menu-toggle" data-toggle="tooltip" data-placement="right" title="System Logs and notifications">
                                    <span>System Logs</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="Logger.php">
                                            <span>Main System Log</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle">
                                            <span>Sub System Logs</span>
                                        </a>
                                        <ul class="ml-menu">
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <span>View All</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                    </li>
					
					<li>
                                <a href="javascript:void(0);" class="menu-toggle" data-toggle="tooltip" data-placement="right" title="Set Auth Levels">
                                    <span>Priviladges</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="viewauthlevels.php">
                                            <span>View All</span>
                                        </a>
                                    </li>
									<li>
										<a href="authlevels.php">
												<span>Update Priviladges</span>
										</a>
									</li>
									<li>
										<a href="addnewadmin.php">
											<span>New Access Level</span>
										</a>
                                    </li>
                                </ul>
                    </li>
					
					<li>
                        <a href="search.php">
                            <i class="material-icons"></i>
                            <span>Search</span>
                        </a>
                    </li>
					<li>
                        <a href="qrscanner.php">
                            <i class="material-icons"></i>
                            <span>QR Scanner</span>
                        </a>
                    </li>
					<li>
                        <a href="userprofile.php">
                            <i class="material-icons"></i>
                            <span>User Profile</span>
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
                    
                          
                </ul>
                </li>
				<?php } ?>
				<!-------------------------------------------------------------- Course Management ----------------------->
				<?php if($_SESSION['authLevel']=='1'){ $active='active'; ?>
				<li class="<?php echo $active; ?>">
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
				<?php if($_SESSION['authLevel']=='1'){ $active='active'; ?>
				<li class="<?php echo $active; ?>">
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
				<?php if($_SESSION['authLevel']=='1'){ $active='active'; ?>
				<li class="<?php echo $active; ?>">
                    <a href="javascript:void(0);" class="menu-toggle">
                            <span>Student Management</span>
					</a>
					<ul class="ml-menu">
						<li class="header">Exams and Results</li>
					<li>
                        <a href="addnewresult.php">
                            <i class="material-icons"></i>
                            <span>Add Result</span>
                        </a>
                    </li>
					<li>
                        <a href="addnewcertificate.php">
                            <i class="material-icons"></i>
                            <span>Add New Certificate</span>
                        </a>
                    </li>
					<li>
                        <a href="addnewstudent.php">
                            <i class="material-icons"></i>
                            <span>Add New Student</span>
                        </a>
                    </li>
					</ul>
                </li>
				<?php } ?>
				<!-------------------------------------------------------------- Financial Management ----------------------->
				<?php if($_SESSION['authLevel']=='1'){ $active='active'; ?>
				<li class="<?php echo $active; ?>">
                    <a href="javascript:void(0);" class="menu-toggle">
                            <span>Financial Management</span>
					</a>
					<ul class="ml-menu">
						<li class="header">Bills</li>
					<li>
                        <a href="view_bills.php">
                            <i class="material-icons"></i>
                            <span>View Bills</span>
                        </a>
                    </li>
					<li>
                        <a href="edit_bills.php">
                            <i class="material-icons"></i>
                            <span>Edit Bills</span>
                        </a>
                    </li>
					</ul>
                </li>
				<?php } ?>
				<!-------------------------------------------------------------- Library Management ----------------------->
				<?php if($_SESSION['authLevel']=='1'){ $active='active';?>
				<li class="<?php echo $active; ?>">
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
                   
				<!-------------------------------------------------------------- Inventory Management ----------------------->
				<?php if($_SESSION['authLevel']=='1'){ $active='active';?>
				<li class="<?php echo $active; ?>">
                    <a href="javascript:void(0);" class="menu-toggle">
                            <span>Inventory Management</span>
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
                  
				  
				  
				  
				<!-------------------------------------------------------------- Inquery and Incident Management ----------------------->
				<?php if($_SESSION['authLevel']=='1'){ $active='active';?>
				<li class="<?php echo $active; ?>">
                    <a href="javascript:void(0);" class="menu-toggle">
                            <span>Inquery & Incident Management</span>
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