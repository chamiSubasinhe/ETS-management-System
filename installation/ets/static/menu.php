<?php $active=''; 
$authQuery=mysqli_query($conn,"select * from authlevels A, users U where U.authId=A.authId AND U.UID='".$user_check."'");
	$authArr = array();
	
	while($rowAuth=mysqli_fetch_array($authQuery)){
		$authArr['studentManagement']  = $rowAuth['studentManagement'];// auth levels 2d array for staff users
		$authArr['financialManagement']  = $rowAuth['financialManagement'];
		$authArr['inventoryManagemnt']  = $rowAuth['inventoryManagemnt'];
		$authArr['courseManagemnt']  = $rowAuth['courseManagemnt'];
		$authArr['libraryManagement']  = $rowAuth['libraryManagement'];
		$authArr['staffManagement']  = $rowAuth['staffManagement'];
		$authArr['administration']  = $rowAuth['administration'];
		$authArr['attendance']  = $rowAuth['attendance'];
	}
?>

<div class="menu animated bounsUp">
                <ul class="list">
				<!-------------------------------------------------------------- Administration ----------------------->
				<?php if($authArr['administration']!='0'){ $active='active';?>
				<li class="<?php //echo $active; ?>">
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
				<?php if($authArr['courseManagemnt']!='0'){ $active='active'; ?>
				<li class="<?php //echo $active; ?>">
                    <a href="javascript:void(0);" class="menu-toggle">
                            <span>Course Management</span>
					</a>
					<ul class="ml-menu">
						<li class="header">Module Management</li>
						<li>
                        <a href="course_management_system/index.php">
                            <i class="material-icons"></i>
                            <span>New Module</span>
                        </a>
                    </li>
					<li>
                        <a href="course_management_system/index.php">
                            <i class="material-icons"></i>
                            <span>Update/Delete Module</span>
                        </a>
                    </li>
					</ul>
                </li>
                <?php } ?>
				<!-------------------------------------------------------------- Staff Management ----------------------->
				<?php if($authArr['staffManagement']!='0'){ $active='active'; ?>
				<li class="<?php //echo $active; ?>">
                    <a href="javascript:void(0);" class="menu-toggle">
                            <span>Staff Management</span>
					</a>
					<ul class="ml-menu">
						<li class="header">Section 1</li>
						<li>
                        <a href="#">
                            <i class="material-icons"></i>
                            <span>Function 1</span>
                        </a>
                    </li>
					</ul>
                </li>
				<?php } ?>
				<!-------------------------------------------------------------- Student Management ----------------------->
				<?php if($authArr['studentManagement']!='0'){ $active='active'; ?>
				<li class="<?php //echo $active; ?>">
                    <a href="javascript:void(0);" class="menu-toggle">
                            <span>Student Management</span>
					</a>
					<ul class="ml-menu">
						
					
					<li class="header">Student Registration</li>
                    <li>
                        <a href="student_management_system/addnewstudent.php">
                            <i class="material-icons"></i>
                            <span>Add Student</span>
                        </a>
                    </li>
					
					
					<li class="header">Exam Details</li>
                    <li>
                        <a href="student_management_system/adex.php">
                            <i class="material-icons"></i>
                            <span>Add Exam details</span>
                        </a>
                    </li>
					<li>
                        <a href="student_management_system/viewexamdetails.php">
                            <i class="material-icons"></i>
                            <span>View Exam details</span>
                        </a>
                    </li>
					
					
                    <li class="header">Result Details</li>
                    <li>
                        <a href="student_management_system/addnewresult.php">
                            <i class="material-icons"></i>
                            <span>Add Result</span>
                        </a>
                    </li>
					<li>
                        <a href="student_management_system/viewresult.php">
                            <i class="material-icons"></i>
                            <span>View Result</span>
                        </a>
                    </li>
                    
                   
                    <li class="header">Certificate Details</li>
                    <li>
                        <a href="student_management_system/newcer.php">
                            <i class="material-icons"></i>
                            <span>Add Certificate details</span>
                        </a>
                    </li>
					<li>
                        <a href="">
                            <i class="material-icons"></i>
                            <span>View Certificate Details</span>
                        </a>
                    </li>
                    
                   <a href="">
                            <i class="material-icons"></i>
                            <span>Change Certificate Details</span>
                        </a>
                    </li>
					
					
					
					</ul>
                </li>
				<?php } ?>
				<!-------------------------------------------------------------- Financial Management ----------------------->
				<?php if($authArr['financialManagement']!='0'){ $active='active'; ?>
				<li class="<?php //echo $active; ?>">
                    <a href="javascript:void(0);" class="menu-toggle">
                            <span>Financial Management</span>
					</a>
					<ul class="ml-menu">
						<li class="header">Bills</li>
					<li>
                        <a href="financial_management_system/view_bills.php">
                            <i class="material-icons"></i>
                            <span>View Bills</span>
                        </a>
                    </li>
					<li>
                        <a href="financial_management_system/edit_bills.php">
                            <i class="material-icons"></i>
                            <span>Edit Bills</span>
                        </a>
                    </li>
					<li class="header">Bills</li>
					<li>
                        <a href="financial_management_system/pettycash.php">
                            <i class="material-icons"></i>
                            <span>Petty Cash</span>
                        </a>
                    </li>
					</ul>
                </li>
				<?php } ?>
				<!-------------------------------------------------------------- Library Management ----------------------->
				<?php if($authArr['libraryManagement']!='0'){ $active='active';?>
				<li class="<?php //echo $active; ?>">
                    <a href="javascript:void(0);" class="menu-toggle">
                            <span>Library Management</span>
					</a>
					<ul class="ml-menu">
						<li class="header">Section 1</li>
						<li>
                        <a href="library_management_system/libraryhome.php">
                            <i class="material-icons"></i>
                            <span>Library Home</span>
                        </a>
                    </li>
					
					
				
                    <li>
                        <a href="library_management_system/librarybooksmain.php">
                            <i class="material-icons"></i>
                            <span>Books</span>
                        </a>
                    </li>
					
					
					<li>
                        <a href="library_management_system/librarymembersmain.php">
                            <i class="material-icons"></i>
                            <span>Members</span>
                        </a>
                    </li>
                    
                   
                    <li>
                        <a href="library_management_system/libraryborrowreturnmain.php">
                            <i class="material-icons"></i>
                            <span>Borrow/Return</span>
                        </a>
                    </li>

                    <li>
                        <a href="#href">
                            <i class="material-icons"></i>
                            <span>Report</span>
                        </a>
                    </li>
                   
					</ul>
                </li>
				<?php } ?>
                   
				<!-------------------------------------------------------------- Inventory Management ----------------------->
				<?php if($authArr['inventoryManagemnt']!='0'){ $active='active';?>
				<li class="<?php //echo $active; ?>">
                    <a href="javascript:void(0);" class="menu-toggle">
                            <span>Inventory Management</span>
					</a>
					<ul class="ml-menu">
					<li>
                        <a href="inventory_management_system/dash_IN.php">
                            <i class="material-icons"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
					<li>
                        <a href="inventory_management_system/AddItem_IN.php">
                            <i class="material-icons"></i>
                            <span>View items</span>
                        </a>
                    </li>
					<li>
                        <a href="inventory_management_system/AddCour_IN.php">
                            <i class="material-icons"></i>
                            <span>Courier Service</span>
                        </a>
                    </li>
					<li>
                        <a href="inventory_management_system/report_IN.php">
                            <i class="material-icons"></i>
                            <span>Reports</span>
                        </a>
                    </li>
					</ul>
                </li>
				<?php } ?>
                  
				  
				  
				  
				<!-------------------------------------------------------------- Inquery and Incident Management ----------------------->
				<?php if($authArr['attendance']!='0'){ $active='active';?>
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