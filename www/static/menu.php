<?php $active=''; 
$authQuery=mysqli_query($conn,"select * from authlevels A, users U where U.authId=A.authId AND U.UID='".$user_check."'");
	$authArr = array();
		
	while($rowAuth=mysqli_fetch_array($authQuery)){
		$authArr['studentManagement']  = intval($rowAuth['studentManagement']);// auth levels 2d array for staff users
		$authArr['financialManagement']  = intval($rowAuth['financialManagement']);
		$authArr['inventoryManagemnt']  = intval($rowAuth['inventoryManagemnt']);
		$authArr['courseManagemnt']  = intval($rowAuth['courseManagemnt']);
		$authArr['libraryManagement']  = intval($rowAuth['libraryManagement']);
		$authArr['staffManagement']  = intval($rowAuth['staffManagement']);
		$authArr['administration']  = intval($rowAuth['administration']);
		$authArr['attendance']  = intval($rowAuth['attendance']);
	}
?>

<div class="menu animated bounsUp">
                <ul class="list">
				<!-------------------------------------------------------------- Administration ----------------------->
				<?php if($authArr['administration']==1){ $active='active';?>
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
                                        <a href="../installation/installer.php">
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
                                <a href="javascript:void(0);" class="menu-toggle" data-toggle="tooltip" data-placement="right" title="Root Directory and DB Stats">
                                    <span>System Reports</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="viewdb.php">
                                            <span>Root Directory and DB</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle">
                                            <span>Functionality Reports</span>
                                        </a>
                                        <ul class="ml-menu">
                                            <li>
                                                <a href="studentManagementReport.php">
                                                    <span>Student Management System</span>
                                                </a>
                                            </li>
											<li>
                                                <a href="StaffManagementSystemReport.php">
                                                    <span>Staff Management System</span>
                                                </a>
                                            </li>
											<li>
                                                <a href="javascript:void(0);">
                                                    <span>Library Management System</span>
                                                </a>
                                            </li>
											<li>
                                                <a href="javascript:void(0);">
                                                    <span>Inventory Management System</span>
                                                </a>
                                            </li>
											<li>
                                                <a href="financialManagementSystemReport.php">
                                                    <span>Financial Management System</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                    </li>
					
					
					<li class="header">Home</li>
                   
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
                        <a href="openticket.php">
                            <i class="material-icons"></i>
                            <span>Open Support Tickets</span>
                        </a>
                    </li>
					<li>
                        <a href="sms.php">
                            <i class="material-icons"></i>
                            <span>SMS Sender</span>
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
				<?php if($authArr['courseManagemnt']==1){ $active='active'; ?>
				<li class="<?php //echo $active; ?>">
                    <a href="javascript:void(0);" class="menu-toggle">
                            <span>Course Management</span>
					</a>
					<ul class="ml-menu">
						<li class="header">Module Management</li>
						<li>
                        <a href="course_management_system/index.php">
                            <i class="material-icons"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
					</ul>
                </li>
                <?php } ?>
				<!-------------------------------------------------------------- Staff Management ----------------------->
				<?php if($authArr['staffManagement']==1){ $active='active'; ?>
				<li class="<?php //echo $active; ?>">
                    <a href="javascript:void(0);" class="menu-toggle">
                            <span>Staff Management</span>
					</a>
					<ul class="ml-menu">
						<li class="header">Staff</li>
						<li>
                        <a href="staff_management_system/">
                            <i class="material-icons"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
					</ul>
                </li>
				<?php } ?>
				<!-------------------------------------------------------------- Student Management ----------------------->
				<?php if($authArr['studentManagement']==1){ $active='active'; ?>
				<li class="<?php //echo $active; ?>">
                    <a href="javascript:void(0);" class="menu-toggle">
                            <span>Student Management</span>
					</a>
					<ul class="ml-menu">
						
					
					<li class="header">Student Management</li>
                    <li>
                        <a href="student_management_system/">
                            <i class="material-icons"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
					
					
					
					
					
					</ul>
                </li>
				<?php } ?>
				<!-------------------------------------------------------------- Financial Management ----------------------->
				<?php if($authArr['financialManagement']==1){ $active='active'; ?>
				<li class="<?php //echo $active; ?>">
                    <a href="javascript:void(0);" class="menu-toggle">
                            <span>Financial Management</span>
					</a>
					<ul class="ml-menu">
						<li class="header">Bills</li>
					<li>
                        <a href="financial_management_system/">
                            <i class="material-icons"></i>
                            <span>Financial Dashboard</span>
                        </a>
                    </li>
					
					</ul>
                </li>
				<?php } ?>
				<!-------------------------------------------------------------- Library Management ----------------------->
				<?php if($authArr['libraryManagement']==1){ $active='active';?>
				<li class="<?php //echo $active; ?>">
                    <a href="javascript:void(0);" class="menu-toggle">
                            <span>Library Management</span>
					</a>
					<ul class="ml-menu">
						<li class="header">Library</li>
						<li>
                        <a href="library_management_system/libraryhome.php">
                            <i class="material-icons"></i>
                            <span>Library Home</span>
                        </a>
                    </li>
					
                   
					</ul>
                </li>
				<?php } ?>
                   
				<!-------------------------------------------------------------- Inventory Management ----------------------->
				<?php if($authArr['inventoryManagemnt']==1){ $active='active';?>
				<li class="<?php //echo $active; ?>">
                    <a href="javascript:void(0);" class="menu-toggle">
                            <span>Inventory Management</span>
					</a>
					<ul class="ml-menu">
					<li>
                        <a href="inventory_management_system/">
                            <i class="material-icons"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
					</ul>
                </li>
				<?php } ?>
                  
				  
				  
				  
				<!-------------------------------------------------------------- Inquery and Incident Management ----------------------->
				<?php if($authArr['attendance']==1){ $active='active';?>
				<li class="<?php //echo $active; ?>">
                    <a href="javascript:void(0);" class="menu-toggle">
                            <span>Inquery & Attendance Management</span>
					</a>
					<ul class="ml-menu">
						<li class="header">Attendance</li>
						<li>
                        <a href="qrscanner.php">
                            <i class="material-icons"></i>
                            <span>Mark Attendance (QR)</span>
                        </a>
                    </li>
					<li>
                        <a href="attendance_management_system/index.php">
                            <i class="material-icons"></i>
                            <span>Attendance Management home</span>
                        </a>
                    </li>
					</ul>
                </li>
				<?php } ?>
				
				
				
                </ul>
				
				
				
            </div>
			
			