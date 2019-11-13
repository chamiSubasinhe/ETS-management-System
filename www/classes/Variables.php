<?php
//class Variable -----------------------------------------------
	class Variables{
		private $var;
		$var = '';
		
		//function
		public function getVariable($_GET["variable"]){
			while($row2=mysqli_fetch_array($query2)){
				if($row2['variable']==$_GET["variable"]){
				$var  = $row2['value'];//get variable
				return var;
				}
			}
		}
	}
	
	?>