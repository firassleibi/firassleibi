<?
	session_start();

#############################################################
# Get Settings
#############################################################

    $query_settings         = "SELECT * FROM `settings` where id=1";    
    $genral_settings        = $pdo->pdoGetRow($query_settings);
    $site_name      		= $genral_settings['sitename'];
    $site_url        		= $genral_settings['site_url'];
	$site_email				= $genral_settings['site_email'];
    $upload_folder			= $genral_settings['upload_folder'];
	$theme_color			= $genral_settings['theme_color'];
	$types_fileupload		= $genral_settings['types_fileupload'];

#############################################################
# Get Permissions
#############################################################
	if($_SESSION['type'] == 'supervisor') {
		$pr_myfile				= 'no';
		$pr_settings			= 'no';
		$pr_index				= 'yes';
		$pr_customers      		= $genral_settings['customers'];
		$pr_customers_message	= $genral_settings['customers_message'];
		$pr_contacts			= $genral_settings['contacts'];
		$pr_files				= $genral_settings['files'];
		$pr_contract			= $genral_settings['contract'];
		$pr_invoices			= $genral_settings['invoices'];
	}
	if($_SESSION['type'] == 'admin') {
		$pr_myfile				= 'no';
		$pr_index				= 'yes';
		$pr_settings			= 'yes';
		$pr_customers      		= 'yes';
		$pr_customers_message	= 'yes';
		$pr_contacts			= 'yes';
		$pr_files				= 'yes';
		$pr_contract			= 'yes';
		$pr_invoices			= 'yes';
	}
	if($_SESSION['type'] == 'user') {
		$pr_myfile				= 'yes';
		$pr_index				= 'no';
		$pr_settings			= 'no';
		$pr_customers      		= 'no';
		$pr_customers_message	= 'no';
		$pr_contacts			= 'no';
		$pr_files				= 'no';
		$pr_contract			= 'no';
		$pr_invoices			= 'no';
	}
#############################################################
# Function SendSms
#############################################################

    function SendSms($msg , $number ) {
        global $settingsSmsGateway;
        global $settingsSmsUsername;
        global $settingsSmsPassword;
        global $settingsSmsSender;
        $msg        = urlencode($msg);
        $sender     = urlencode($settingsSmsSender);
        $userd      = $settingsSmsUsername;
        $passd      = urlencode($settingsSmsPassword);
        $number     = substr( $number , 1 , 9 );
        $numberd    = '966'.$number ;
        $url        = $settingsSmsGateway."?"."user=".$settingsSmsUsername."&password=".$settingsSmsPassword."&numbers=".$numberd."&sender=".$settingsSmsSender."&message=".$msg."&lang=ar";
		$hompage     = file_get_contents($url);
		return $hompage ;
	  }
      

#############################################################
# Easily Uploading Files
#############################################################
function upload($file_id) {
	global $upload_folder ;
	global $types_fileupload ;
	 $folder = $upload_folder;
	 $types = $types_fileupload;
    if(!$_FILES[$file_id]['name']) return array('','No file specified');

    $file_title = $_FILES[$file_id]['name'];
    //Get file extension
    $ext_arr = split("\.",basename($file_title));
    $ext = strtolower($ext_arr[count($ext_arr)-1]); //Get the last extension

	//Rename file
	$uploadedfileimage = $file_title;
	strstr($_FILES[$file_id]["type"],"image");
	$splitedImageName=explode(".",$uploadedfileimage);
	$type=$splitedImageName[sizeof($splitedImageName)-1];
	$file_title=time().".$type";

    //Not really uniqe - but for all practical reasons, it is
    $uniqer = substr(md5(uniqid(rand(),1)),0,5);
    $file_name = $uniqer . '_' . $file_title;//Get Unique Name

    $all_types = explode(",",strtolower($types));
    if($types) {
        if(in_array($ext,$all_types));
        else {
            $result = "'".$_FILES[$file_id]['name']."' is not a valid file."; //Show error if any.
            return array('',$result);
        }
    }

    //Where the file must be uploaded to
    $uploadfile = $folder . $file_name;

    $result = '';
    //Move the file from the stored location to the new location
    if (!move_uploaded_file($_FILES[$file_id]['tmp_name'], $uploadfile)) {
        $result = "Cannot upload the file '".$_FILES[$file_id]['name']."'"; //Show error if any.
        if(!file_exists($folder)) {
            $result .= " : Folder don't exist.";
        } elseif(!is_writable($folder)) {
            $result .= " : Folder not writable.";
        } elseif(!is_writable($uploadfile)) {
            $result .= " : File not writable.";
        }
        $file_name = '';
        
    } else {
        if(!$_FILES[$file_id]['size']) { //Check if the file is made
            @unlink($uploadfile);//Delete the Empty file
            $file_name = '';
            $result = "Empty file found - please use a valid file."; //Show the error message
        } else {
            chmod($uploadfile,0777);//Make it universally writable.
        }
    }

    return array($file_name,$result);
}

?>