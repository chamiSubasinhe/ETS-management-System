<?php 
//function preloader will flush messages to the users browser
function preloader($msg = ''){
	if (!$msg) {
					print('<div class="page-loader-wrapper">
						<div class="loader">
							<div class="preloader">
								<div class="spinner-layer pl-red">
									<div class="circle-clipper left">
										<div class="circle"></div>
									</div>
									<div class="circle-clipper right">
										<div class="circle"></div>
									</div>
								</div>
							</div>
							<p>Please wait...</p> 
							<p id="loadingMSG"></p>
						</div>
					</div>');
					ob_flush();
					flush();
        }
	else if($msg=='error'){
					print('<div class="page-loader-wrapper">
        <div class="loader"><img src="https://media.giphy.com/media/6C0d9oFVDZX1K/200.gif" width="150" /><br><br>Something went wrong! <br><a class="btn btn-danger" href="index.php">Restart the Installation</a> <a class="btn btn-alart" href="ErrorLog.txt">Error Log</a>
		</div>
            </div>');
					ob_flush();
					flush();
	}
	else{
		print('<div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            ');
			print($msg);
			print('. </b></p> 
        </div>
		</div>');
		ob_flush();
		flush();
	}
}

?>