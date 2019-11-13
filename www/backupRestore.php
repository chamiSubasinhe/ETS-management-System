<?php 
/*
* Google Metirial Design Template designed Asiri Hewage
* asiriofficial@gmail.com
* All Rights Reserved C 2018
* http://asirihewage.business.site
*/
?>

<?php $loadingMSG = 'Query compiler is initialing...'; ?>

<!-- B connection ---------------------------------------->
	<?php include 'static/dbconnection.php';?>
	<!--# end DB connection -->
	
<!-- Load system variables ---------------------------------------->
	<?php include 'static/getVariables.php';?>
	<!--# End Load system variables -->
	
		<!-- Load session variables ---------------------------------------->
	<?php include 'static/session.php';?>
	<!--# End Load session variables -->
	

	<?php
	error_reporting(0);
	ini_set('display_errors', 0);


	$result = '';
	$flag = '-1';
	
	if(isset($_POST['run']) && !empty($_POST['query'])){ 
        // 
        $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name); 
		$query = $_POST['query'];
		
		
        if ($mysqli->connect_errno) { 
        $result =  'Failed to connect to MySQL: (' . $mysqli->connect_errno . ')' . $mysqli->connect_error;  
		$flag = 0;
    }
	
	$query = $_POST['query'];
	if (strpos($query, ' drop ') !== false || strpos($query, ' delete ') !== false || strpos($query, ' insert ') !== false || strpos($query, 'drop ') !== false || strpos($query, 'delete ') !== false || strpos($query, 'insert ') !== false) {
		$flag = 0;
        $result =  'something went wrong executing your query. It may contain some restricted commands!';
	}else{
		
		// proceed to screw this database up 
		$exec = $mysqli->query($_POST['query']);
		if(!$exec){// always trust your users... :P 
			$flag = 0;
			$result =  'something went wrong executing ('.$mysqli->errno.''.$mysqli->error.')'; 
		}else{ 
			$result = 'Succesfully executed: <b>'.$_POST['query'].'</b>'; 
			$flag = 1;
		} 
	}
}
	?>
	
	
	
	
<!DOCTYPE html>
<html>

	<!-- Page head --------------------------------------->
	<?php include 'static/head.php';?>
	<!--# end Page Loader -->
	
<body class="theme-red">

    <!-- Overlay For Sidebars --------------------------->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
	
    <!-- Search Bar ------------------------------------->
    <?php include 'static/searchbar.php';?>
    <!-- #END# Search Bar -->
	
    <!-- Top Bar ---------------------------------------->
    <?php include 'static/topnav.php';?>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -------------------------------->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info ---------------------->
			<?php include 'static/userinfo.php';?>
            <!-- #User Info -->
			
            <!-- Menu --------------------------->
			<?php include 'static/menu.php';?>
            <!-- #Menu -->
			
            <!-- Footer ------------------------->
            <?php include 'static/footer.php';?>
            <!-- #Footer -->
			
        </aside>
        <!-- #END# Left Sidebar -->
		
        <!-- Right Sidebar ----------------------------->
        <?php include 'static/rightsidebar.php';?>
        <!-- #END# Right Sidebar -->
		
    </section>

	
	
	
    <section class="content">
        <div class="container-fluid">
           
			<!-- Main page content  ----------------------------->
			<!-- Textarea -->
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="card">
                        <div class="header">
                            <h2>Backup Database</h2>
                            
                        </div>
                        <div class="body"> 
						
						
						
						<form action="" method="POST">
						<button type="submit" name="backup" class="btn btn-primary waves-effect">
                                    <i class="material-icons">cloud_download</i>
                                    <span>Backup</span>
                                </button>
						</form>
						<hr>
						
						
						 <ul class="list-group">
                            <?php 
if(isset($_POST["backup"])){
define("DB_USER", $db_user);
define("DB_PASSWORD", $db_pass);
define("DB_NAME", $db_name);
define("DB_HOST", $db_host);
define("BACKUP_DIR", 'ets-backup-files'); 
define("TABLES", '*'); 
define("CHARSET", 'utf8');
define("GZIP_BACKUP_FILE", true);  

/**
 * The Backup_Database class
 */
class Backup_Database {
 
    var $host;

    var $username;

    var $passwd;

    var $dbName;

    var $charset;

    var $conn;

    var $backupDir;

    var $backupFile;

    var $gzipBackupFile;

    var $output;

    public function __construct($host, $username, $passwd, $dbName, $charset = 'utf8') {
        $this->host            = $host;
        $this->username        = $username;
        $this->passwd          = $passwd;
        $this->dbName          = $dbName;
        $this->charset         = $charset;
        $this->conn            = $this->initializeDatabase();
        $this->backupDir       = BACKUP_DIR ? BACKUP_DIR : '.';
        $this->backupFile      = 'ets-backup-'.$this->dbName.'-'.date("Ymd_His", time()).'.sql';
        $this->gzipBackupFile  = defined('GZIP_BACKUP_FILE') ? GZIP_BACKUP_FILE : true;
        $this->output          = '';
    }

    protected function initializeDatabase() {
        try {
            $conn = mysqli_connect($this->host, $this->username, $this->passwd, $this->dbName);
            if (mysqli_connect_errno()) {
                throw new Exception('ERROR connecting database: ' . mysqli_connect_error());
                die();
            }
            if (!mysqli_set_charset($conn, $this->charset)) {
                mysqli_query($conn, 'SET NAMES '.$this->charset);
            }
        } catch (Exception $e) {
            print_r($e->getMessage());
            die();
        }

        return $conn;
    }

    public function backupTables($tables = '*') {
        try {
       
            if($tables == '*') {
                $tables = array();
                $result = mysqli_query($this->conn, 'SHOW TABLES');
                while($row = mysqli_fetch_row($result)) {
                    $tables[] = $row[0];
                }
            } else {
                $tables = is_array($tables) ? $tables : explode(',', str_replace(' ', '', $tables));
            }

            $sql = 'CREATE DATABASE IF NOT EXISTS `'.$this->dbName."`;\n\n";
            $sql .= 'USE `'.$this->dbName."`;\n\n";

            foreach($tables as $table) {
				
                $this->obfPrint("<li class='list-group-item'>Backing up <span class='bg-pink'>".$table."</span> table...");

              
                $sql .= 'DROP TABLE IF EXISTS `'.$table.'`;';
                $row = mysqli_fetch_row(mysqli_query($this->conn, 'SHOW CREATE TABLE `'.$table.'`'));
                $sql .= "\n\n".$row[1].";\n\n";

               
                $row = mysqli_fetch_row(mysqli_query($this->conn, 'SELECT COUNT(*) FROM `'.$table.'`'));
                $numRows = $row[0];

                
                $batchSize = 1000; 
                $numBatches = intval($numRows / $batchSize) + 1; 
                for ($b = 1; $b <= $numBatches; $b++) {
                    
                    $query = 'SELECT * FROM `'.$table.'` LIMIT '.($b*$batchSize-$batchSize).','.$batchSize;
                    $result = mysqli_query($this->conn, $query);
                    $numFields = mysqli_num_fields($result);

                    for ($i = 0; $i < $numFields; $i++) {
                        $rowCount = 0;
                        while($row = mysqli_fetch_row($result)) {
                            $sql .= 'INSERT INTO `'.$table.'` VALUES(';
                            for($j=0; $j<$numFields; $j++) {
                                if (isset($row[$j])) {
                                    $row[$j] = addslashes($row[$j]);
                                    $row[$j] = str_replace("\n","\\n",$row[$j]);
                                    $sql .= '"'.$row[$j].'"' ;
                                } else {
                                    $sql.= 'NULL';
                                }

                                if ($j < ($numFields-1)) {
                                    $sql .= ',';
                                }
                            }

                            $sql.= ");\n";
                        }
                    }

                    $this->saveFile($sql);
                    $sql = '';
                }

                $sql.="\n\n\n";

                $this->obfPrint("<span class='badge bg-cyan'>OK</span></li> ");
				usleep(70000);
            }

            if ($this->gzipBackupFile) {
                $this->gzipBackupFile();
            } else {
                $this->obfPrint('Backup file succesfully saved to ' . $this->backupDir.'/'.$this->backupFile, 1, 1);
            }
        } catch (Exception $e) {
            print_r($e->getMessage());
            return false;
        }

        return true;
    }

    protected function saveFile(&$sql) {
        if (!$sql) return false;

        try {

            if (!file_exists($this->backupDir)) {
                mkdir($this->backupDir, 0777, true);
            }

            file_put_contents($this->backupDir.'/'.$this->backupFile, $sql, FILE_APPEND | LOCK_EX);

        } catch (Exception $e) {
            print_r($e->getMessage());
            return false;
        }

        return true;
    }

 
    protected function gzipBackupFile($level = 9) {
        if (!$this->gzipBackupFile) {
            return true;
        }

        $source = $this->backupDir . '/' . $this->backupFile;
        $dest =  $source . '.gz';

        $this->obfPrint('<a href="javascript:void(0);" class="list-group-item active">Gzipping backup file to' . $dest . '... ', 1, 0);

        $mode = 'wb' . $level;
        if ($fpOut = gzopen($dest, $mode)) {
            if ($fpIn = fopen($source,'rb')) {
                while (!feof($fpIn)) {
                    gzwrite($fpOut, fread($fpIn, 1024 * 256));
                }
                fclose($fpIn);
            } else {
                return false;
            }
            gzclose($fpOut);
            if(!unlink($source)) {
                return false;
            }
        } else {
            return false;
        }
        
        $this->obfPrint('OK </a> ');
        return $dest;
    }

    public function obfPrint ($msg = '', $lineBreaksBefore = 0, $lineBreaksAfter = 1) {
        if (!$msg) {
            return false;
        }

        $output = '';

        if (php_sapi_name() != "cli") {
            $lineBreak = "<br />";
        } else {
            $lineBreak = "\n";
        }

        if ($lineBreaksBefore > 0) {
            for ($i = 1; $i <= $lineBreaksBefore; $i++) {
                $output .= $lineBreak;
            }                
        }

        $output .= $msg;

        if ($lineBreaksAfter > 0) {
            for ($i = 1; $i <= $lineBreaksAfter; $i++) {
                $output .= $lineBreak;
            }                
        }


        $this->output .= str_replace('<br />', '\n', $output);

        echo $output;


        if (php_sapi_name() != "cli") {
            ob_flush();
        }

        $this->output .= " ";

        flush();
    }

  
    public function getOutput() {
        return $this->output;
    }
}

error_reporting(E_ALL);
set_time_limit(900); // 15 minutes

if (php_sapi_name() != "cli") {
    echo '<div style="font-family: monospace;">';
}

$backupDatabase = new Backup_Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, CHARSET);
$result = $backupDatabase->backupTables(TABLES, BACKUP_DIR) ? 'OK' : 'KO';
$backupDatabase->obfPrint('<script language="javascript" type="text/javascript">$("html, body").animate({ scrollTop: $(document).height()-$(window).height() });</script><li class="list-group-item list-group-item-success">Backup result:' . $result.'</li>', 1);

// Use $output variable for further processing, for example to send it by email
$output = $backupDatabase->getOutput();

if (php_sapi_name() != "cli") {
    echo '</div>';
}

}
?>




                        </div>
                    </div>
                </div>
				
				
				
				
				 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="card">
                        <div class="header">
                            <h2>Restore Database</h2>
                            
                        </div>
                        <div class="body"> 
						
<?php

function list_zipfiles($mydirectory) {

    // directory we want to scan
    $dircontents = scandir($mydirectory);

    // list the contents
    echo '<ul>';
    foreach ($dircontents as $file) {
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        if ($extension == 'gz') {
            echo '<form action="" method="POST"><button type="submit" value="'. $file .'" name = "restore" class="btn btn-primary waves-effect">
                                    <i class="material-icons">cloud_upload</i>
                                    <span>Restore '. $file .'</span>
                                </button> <button type="submit" value="'. $file .'" name = "delete" class="btn btn-danger waves-effect">
                                    <i class="material-icons">error</i>
                                    <span>Delete</span>
                                </button></form><hr>';
        }
    }
	
	if(isset($_POST["delete"])){
	$file = $_POST["delete"];
	if (unlink('ets-backup-files/'.$file))
	  {
	  echo "<span class='bg-pink'>".$_POST["delete"]." Backup removed.</span>";
	  }
	  else{
		  echo "<span class='bg-pink'>".$_POST["delete"]." already removed.</span>";
	  }
	}

    echo '</ul>';
}
?>

<?php
list_zipfiles('ets-backup-files/');
?>


<?php 

if(isset($_POST["restore"])){

 
$backupFile = $_POST["restore"];
define("DB_USER", $db_user);
define("DB_PASSWORD", $db_pass);
define("DB_NAME", $db_name);
define("DB_HOST", $db_host);
define("BACKUP_DIR", 'ets-backup-files'); 
define("BACKUP_FILE", $backupFile);
define("CHARSET", 'utf8');

class Restore_Database {
 
    var $host;

    var $username;

    var $passwd;

    var $dbName;

    var $charset;

    var $conn;

    function __construct($host, $username, $passwd, $dbName, $charset = 'utf8') {
        $this->host       = $host;
        $this->username   = $username;
        $this->passwd     = $passwd;
        $this->dbName     = $dbName;
        $this->charset    = $charset;
        $this->conn       = $this->initializeDatabase();
        $this->backupDir  = BACKUP_DIR ? BACKUP_DIR : '.';
        $this->backupFile = BACKUP_FILE ? BACKUP_FILE : null;
    }

    protected function initializeDatabase() {
        try {
            $conn = mysqli_connect($this->host, $this->username, $this->passwd, $this->dbName);
            if (mysqli_connect_errno()) {
                throw new Exception('ERROR connecting database: ' . mysqli_connect_error());
                die();
            }
            if (!mysqli_set_charset($conn, $this->charset)) {
                mysqli_query($conn, 'SET NAMES '.$this->charset);
            }
        } catch (Exception $e) {
            print_r($e->getMessage());
            die();
        }

        return $conn;
    }

    public function restoreDb() {
        try {
            $sql = '';
            $multiLineComment = false;

            $backupDir = $this->backupDir;
            $backupFile = $this->backupFile;

            $backupFileIsGzipped = substr($backupFile, -3, 3) == '.gz' ? true : false;
            if ($backupFileIsGzipped) {
                if (!$backupFile = $this->gunzipBackupFile()) {
                    throw new Exception("ERROR: couldn't gunzip backup file " . $backupDir . '/' . $backupFile);
                }
            }

      
            $handle = fopen($backupDir . '/' . $backupFile, "r");
            if ($handle) {
                while (($line = fgets($handle)) !== false) {
                    $line = ltrim(rtrim($line));
                    if (strlen($line) > 1) { // avoid blank lines
                        $lineIsComment = false;
                        if (preg_match('/^\/\*/', $line)) {
                            $multiLineComment = true;
                            $lineIsComment = true;
                        }
                        if ($multiLineComment or preg_match('/^\/\//', $line)) {
                            $lineIsComment = true;
                        }
                        if (!$lineIsComment) {
                            $sql .= $line;
                            if (preg_match('/;$/', $line)) {
                                // execute query
                                if(mysqli_query($this->conn, $sql)) {
                                    if (preg_match('/^CREATE TABLE `([^`]+)`/i', $sql, $tableName)) {
                                        $this->obfPrint("<li class='list-group-item'>Table succesfully created:  <span class='bg-pink'>" . $tableName[1] . "</span>");
                                    }
                                    $sql = '';
                                } else {
                                    throw new Exception("ERROR: SQL execution error: " . mysqli_error($this->conn));
                                }
                            }
                        } else if (preg_match('/\*\/$/', $line)) {
                            $multiLineComment = false;
                        }
                    }
                }
                fclose($handle);
            } else {
                throw new Exception("ERROR: couldn't open backup file " . $backupDir . '/' . $backupFile);
            } 
        } catch (Exception $e) {
            print_r($e->getMessage());
            return false;
        }

        if ($backupFileIsGzipped) {
            unlink($backupDir . '/' . $backupFile);
        }

        return true;
    }


    protected function gunzipBackupFile() {
        // Raising this value may increase performance
        $bufferSize = 4096; // read 4kb at a time
        $error = false;

        $source = $this->backupDir . '/' . $this->backupFile;
        $dest = $this->backupDir . '/' . date("Ymd_His", time()) . '_' . substr($this->backupFile, 0, -3);

        $this->obfPrint('Gunzipping backup file ' . $source . '... ', 0, 0);

        // Remove $dest file if exists
        if (file_exists($dest)) {
            if (!unlink($dest)) {
                return false;
            }
        }
        
        // Open gzipped and destination files in binary mode
        if (!$srcFile = gzopen($this->backupDir . '/' . $this->backupFile, 'rb')) {
            return false;
        }
        if (!$dstFile = fopen($dest, 'wb')) {
            return false;
        }

        while (!gzeof($srcFile)) {
            // Read buffer-size bytes
            // Both fwrite and gzread are binary-safe
            if(!fwrite($dstFile, gzread($srcFile, $bufferSize))) {
                return false;
            }
        }

        fclose($dstFile);
        gzclose($srcFile);

        $this->obfPrint('OK', 0, 2);
        // Return backup filename excluding backup directory
        return str_replace($this->backupDir . '/', '', $dest);
    }

    public function obfPrint ($msg = '', $lineBreaksBefore = 0, $lineBreaksAfter = 1) {
        if (!$msg) {
            return false;
        }

        $output = '';

        if (php_sapi_name() != "cli") {
            $lineBreak = "<br />";
        } else {
            $lineBreak = "\n";
        }

        if ($lineBreaksBefore > 0) {
            for ($i = 1; $i <= $lineBreaksBefore; $i++) {
                $output .= $lineBreak;
            }                
        }

        $output .= $msg;

        if ($lineBreaksAfter > 0) {
            for ($i = 1; $i <= $lineBreaksAfter; $i++) {
                $output .= $lineBreak;
            }                
        }

        if (php_sapi_name() == "cli") {
            $output .= "\n";
        }

        echo $output;

        if (php_sapi_name() != "cli") {
            ob_flush();
        }

        flush();
    }
}

error_reporting(E_ALL);
// Set script max execution time
set_time_limit(900); // 15 minutes

if (php_sapi_name() != "cli") {
    echo '<div style="font-family: monospace;">';
}

$restoreDatabase = new Restore_Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$result = $restoreDatabase->restoreDb(BACKUP_DIR, BACKUP_FILE) ? 'OK' : 'KO';
$restoreDatabase->obfPrint("<script language='javascript' type='text/javascript'>$('html, body').animate({ scrollTop: $(document).height()-$(window).height() });</script><li class='list-group-item list-group-item-success'>Restoration result: ".$result.'</li>', 1);

if (php_sapi_name() != "cli") {
    echo '</div>';
}
}
?>
						</div>
					</div>
				</div>
				
				
				
            </div>
			
			
			
			
               
            <!-- #END# Textarea -->
	<!--  Main page content ----------------------------->
	</div>
    </section>

	
	
	
	
	
	
		<!-- Javascript --------------------------------->
		<?php include 'static/scripts.php';?>
		<!-- #END# Javascript  -->
		
</body>

</html>
