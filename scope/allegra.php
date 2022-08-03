<?php

ob_start();
require_once('../dlls/mutual.php');
require_once('../dlls/operator.php');
require_once('../dlls/admin_users_settings.php');
//error_reporting(E_ALL); ini_set('display_errors', '1');
$operator = check_login();

global $page, $allMasterUser, $errors;



if (isset($_POST["submit"])) {
  
global $mysqlprefix;
$link = connect();
    
    if (!(isset($_POST['parent_id']) && $_POST['parent_id'])) {
        $errors[] = "select parent user account.";
    }

    $_SESSION['user_id'] = '';
    $file = $_FILES['file']['tmp_name'];
    if (!(file_exists($file))) {
        $errors[] = "File not exist.";
    }
    $handle = fopen($file, "r");
    $c = 0;
//    echo '<pre>';
    while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {
        $c++;
        if($c == 1){
        continue;
        }
        $uId = $filesop[0];
        $uContact = $filesop[1];
        $uEmails = $filesop[2];
        
        $update = "UPDATE `cp_chatuser_details` SET `contact_name` = '$uContact', `send_to_email` = '$uEmails' WHERE `cp_chatuser_details`.`id` = $uId;";
        echo $update.'<br><br>';
        // perform_query($update, $link);
        continue;
    }
}
exit;
$allMasterUser = get_allMasterchatuserNameDetail();

$opId = '1'; // change it later with dynamic users id
prepare_menu($operator);
setup_admin_user_settings_tabs($opId, 1);
start_html_output();
require('../webui/add-excel-child-account.php');

?>