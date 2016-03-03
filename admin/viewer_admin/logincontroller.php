<?php 
session_start();
$action = NULL;
$error = false;
$your_email = NULL;
//print_r($_POST); exit;
// $username=$_POST['username'];
$pass=$_POST['password'];
if(isset($_GET['act'])){
	$sha = $_GET['act'];
	if($sha =='logout'){
		unset($_SESSION['user_id'],$_SESSION['user_name']);
		header("location: index.php");
		exit;
	}
}

if(isset($_REQUEST['submit'])){
	$action = $_REQUEST['submit'];
	if($action =='submit'){
		include('includes/classes/class.user.php');
		include('includes/classes/class.company.php');
		$arr_agents = array();
		$arr_email = array();
		
		$user = new User();
		$company = new Company();

		if(!empty($_POST['email'])){
			$user_info = $user->login_details($_POST['email']);
			
			if($user_info){
				if($user_info['user_type'] != 'administrator'){
					if(base64_encode($_POST['password']) == $user_info['password']){
						if($user_info['status'] == '1'){
							$companyDetail = $company->getCompanyByEmail($user_info['email']);

							$_SESSION['user_id'] = $user_info['id'];
							$_SESSION['username'] = $user_info['username'];
							$_SESSION['email'] = $user_info['email'];
							if($companyDetail){
								$_SESSION['company_id'] = $companyDetail['id'];
							}
							header('location: home.php');
							exit();
						}
						else{
							$error = true;
							header('location: index.php?act=deactivate');
							exit;					
						}
					}else{
						$error = true;
						header('location: index.php?act=wrong_details');
						exit;
					}				
				}
				else{
					$error = true;
					header('location: index.php?act=wrong_details');
					exit;
				}
			}
			else{
				$error = true;
				header('location: index.php?act=wrong_details');
				exit;
			}
		}else{
			$error = true;
			header('location: index.php?act=wrong_details');
			exit;
		}
	}
	else if($action == 'logout'){
		unset($_SESSION['user_id'], $_SESSION['user_name'], $_SESSION['email'], $_SESSION['company_id']);
		header("location: index.php?sha=". base64_encode('logout'));
		exit;
	}
}
?>
<?php //include('tpl/index.php');?>