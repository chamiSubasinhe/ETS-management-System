 <div class="user-info">
                <div class="image">
				<?php if($sessionArr['favicon_path']==null){
					$gravatar_link = 'http://www.gravatar.com/avatar/' . md5($sessionArr['email']) . '?s=32';
				}else{
					$gravatar_link = $sessionArr['favicon_path'];
				}
				?>
                    <img src="<?php echo $gravatar_link;?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $sessionArr['name_with_init'];?></div>
                    <div class="email"><?php echo $sessionArr['email'];?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="userprofile.php"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>