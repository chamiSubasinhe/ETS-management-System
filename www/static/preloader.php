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
            <p>Please wait... </p><p>');
			print($msg);
			print('. </p> 
        </div>
		</div>');
		ob_flush();
		flush();
	}
}

?>