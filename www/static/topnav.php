<nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="home.php"><?php echo $settingsArr['System_Name'];?></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
					
					<?php 
				if($authArr['administration']=='1') {
					echo '<li><a href="settings.php" data-toggle="tooltip" data-placement="bottom" title="System Settings"><i class="material-icons">settings</i></a></li>';
				}
			?>
			
			
					<li><a href="index.php" data-toggle="tooltip" data-placement="bottom" title="Home"><i class="material-icons">home</i></a></li>
					<li><a href="userprofile.php" data-toggle="tooltip" data-placement="bottom" title="My Profile"><i class="material-icons">person</i></a></li>
					
					<li><a href="supporttickets.php" data-toggle="tooltip" data-placement="bottom" title="Support Tickets"><i class="material-icons">message</i><span class="label-count" id="supportCount">0</span></a></li>
					<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom" title="Help"><i class="material-icons">help_outline</i></a></li>
                    
						<?php 
				if($authArr['administration']=='1') {
					echo '<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom" title="Search" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>';
				}
			?>
			
                    <!-- #END# Call Search -->
                    
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons"></i></a></li>
                </ul>
            </div>
        </div>
		<audio id="myAudio">
		  <source src="settings.ogg" type="audio/ogg">
		</audio>
    </nav>
	
	