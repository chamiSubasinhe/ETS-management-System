s<?php 
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
            <div class="block-header">
                <h2>SQL Query Runner</h2>
            </div>
			This interface will help you to run SQL Query.<small>[WARNING! This function will result unexpected system downtime. Please check the query before running. DROP, INSERT and DELETE commands are restricted]</small>
			
			<hr>
			<!-- Main page content  ----------------------------->
			<!-- Textarea -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>SQL Runner</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <?php 
/**
 * This file contains the Restore_Database class wich performs
 * a partial or complete restoration of any given MySQL database
 * @author Daniel López Azaña <daniloaz@gmail.com>
 * @version 1.0
 */

/**
 * Define database parameters here
 */
 
$backupFile = 'myphp-backup-test-20180827_161549.sql.gz'; //$_POST["backupFile"];
define("DB_USER", 'asiri');
define("DB_PASSWORD", 'asiri123');
define("DB_NAME", 'test');
define("DB_HOST", 'localhost');
define("BACKUP_DIR", 'myphp-backup-files'); // Comment this line to use same script's directory ('.')
define("BACKUP_FILE", $backupFile); // Script will autodetect if backup file is gzipped based on .gz extension
define("CHARSET", 'utf8');

/**
 * The Restore_Database class
 */
class Restore_Database {
    /**
     * Host where the database is located
     */
    var $host;

    /**
     * Username used to connect to database
     */
    var $username;

    /**
     * Password used to connect to database
     */
    var $passwd;

    /**
     * Database to backup
     */
    var $dbName;

    /**
     * Database charset
     */
    var $charset;

    /**
     * Database connection
     */
    var $conn;

    /**
     * Constructor initializes database
     */
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

    /**
     * Backup the whole database or just some tables
     * Use '*' for whole database or 'table1 table2 table3...'
     * @param string $tables
     */
    public function restoreDb() {
        try {
            $sql = '';
            $multiLineComment = false;

            $backupDir = $this->backupDir;
            $backupFile = $this->backupFile;

            /**
             * Gunzip file if gzipped
             */
            $backupFileIsGzipped = substr($backupFile, -3, 3) == '.gz' ? true : false;
            if ($backupFileIsGzipped) {
                if (!$backupFile = $this->gunzipBackupFile()) {
                    throw new Exception("ERROR: couldn't gunzip backup file " . $backupDir . '/' . $backupFile);
                }
            }

            /**
            * Read backup file line by line
            */
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
                                        $this->obfPrint("Table succesfully created: `" . $tableName[1] . "`");
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

    /*
     * Gunzip backup file
     *
     * @return string New filename (without .gz appended and without backup directory) if success, or false if operation fails
     */
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

    /**
     * Prints message forcing output buffer flush
     *
     */
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

/**
 * Instantiate Restore_Database and perform backup
 */
// Report all errors
error_reporting(E_ALL);
// Set script max execution time
set_time_limit(900); // 15 minutes

if (php_sapi_name() != "cli") {
    echo '<div style="font-family: monospace;">';
}

$restoreDatabase = new Restore_Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$result = $restoreDatabase->restoreDb(BACKUP_DIR, BACKUP_FILE) ? 'OK' : 'KO';
$restoreDatabase->obfPrint("Restoration result: ".$result, 1);

if (php_sapi_name() != "cli") {
    echo '</div>';
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
