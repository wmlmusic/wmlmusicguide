<?php
	/**
	 * Developed by Jay Gaha
	 * http://jaygaha.com.np
	 */
	include("includes/functions.php");
	include("includes/classes/class.company.php");
	
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		/*echo "<pre>";
		print_r($_POST);
		print_r($_FILES); exit;*/

		$company = new Company();

		$arrData 	= array();

		$arrData['cname'] = addslashes(ucwords($_POST['company_name']));
		$arrData['address'] = addslashes(ucwords($_POST['company_address']));
		$arrData['city'] = addslashes(ucwords($_POST['company_city']));
		$arrData['state'] = addslashes(ucwords($_POST['company_state']));
		$arrData['zipcode'] = addslashes(ucwords($_POST['company_zip']));
		$arrData['country'] = addslashes(ucwords($_POST['company_country']));
		$arrData['phone'] = addslashes($_POST['company_phone']);
		$arrData['email'] = addslashes($_POST['company_email']);
		$arrData['website'] = addslashes(ucwords($_POST['company_url']));
		$arrData['president'] = addslashes(ucwords($_POST['company_president']));
		$arrData['vice_president'] = addslashes(ucwords($_POST['company_vpresident']));
		$arrData['ceo'] = addslashes(ucwords($_POST['company_ceo']));
		$arrData['vice_ceo'] = addslashes(ucwords($_POST['company_vceo']));
		$arrData['director'] = addslashes(ucwords($_POST['company_director']));
		$arrData['manager'] = addslashes(ucwords($_POST['company_manager']));
		$arrData['status'] = addslashes(ucwords($_POST['company_status']));
		
		$arrData['suite_no'] = addslashes(ucwords($_POST['company_suiteno']));
		$arrData['po_boxno'] = addslashes(ucwords($_POST['company_poboxno']));
		$arrData['phone1'] = addslashes(ucwords($_POST['company_phone1']));
		$arrData['phone2'] = addslashes(ucwords($_POST['company_phone2']));
		$arrData['fax_no'] = addslashes($_POST['company_faxno']);
		$arrData['email1'] = addslashes($_POST['company_email1']);
		$arrData['email2'] = addslashes($_POST['company_email2']);
		$arrData['profile_link'] = addslashes($_POST['company_profilelink']);
		$arrData['aandr'] = addslashes(ucwords($_POST['company_ar']));
		$arrData['general_manager'] = addslashes(ucwords($_POST['company_gmanager']));
		$arrData['road_manager'] = addslashes(ucwords($_POST['company_rmanager']));
		$arrData['administration'] = addslashes(ucwords($_POST['company_administration']));
		
		$arrData['youtube_channel'] = addslashes($_POST['youtube_channel']);
		$arrData['soundcloud_username'] = addslashes($_POST['soundcloud_username']);
		$arrData['itunes_id'] = addslashes($_POST['itunes_id']);
		$arrData['enable_profile'] = addslashes($_POST['enable_profile']);

		$arrData['created_date'] = date('Y-m-d H:i:s');

		if(empty($_POST['id'])){
			$insert = $company->add($arrData);

			if($insert){
				$logo = '';
				$picture = '';
				$picture1 = '';
				$picture2 = '';

				if($_FILES['company_logo']['name'] != ''){
					$logo = 'companylogo_' . $insert . '.jpg'; 
					saveResizeImage($_FILES['company_logo'], $insert, 'companylogo');
				}
				if($_FILES['company_picture']['name'] != ''){
					$picture = 'companypic_' . $insert . '.jpg'; 
					saveResizeImage($_FILES['company_picture'], $insert, 'companypic');
				}
				if($_FILES['company_picture1']['name'] != ''){
					$picture1 = 'companypic1_' . $insert . '.jpg'; 
					saveResizeImage($_FILES['company_picture1'], $insert, 'companypic1');
				}
				if($_FILES['company_picture2']['name'] != ''){
					$picture2 = 'companypic2_' . $insert . '.jpg'; 
					saveResizeImage($_FILES['company_picture2'], $insert, 'companypic2');
				}
				$arrData = array();
				$arrData['logo']	= $logo;
				$arrData['picture'] = $picture;
				$arrData['picture1'] = $picture1;
				$arrData['picture2'] = $picture2;
				$arrData['id'] = $insert;
				$update = $company->edit($arrData);
				$_SESSION['insert_company'] = 'insert';
			}
			else{
				$_SESSION['insert_company'] = 'insert_faild';
			}
		}
		else{

			$arrData['id'] = $_POST['id'];
			$arrData['logo'] = 'companylogo_' . $_POST['id'] . '.jpg';
			$arrData['picture'] = 'companypic_' . $_POST['id'] . '.jpg';
			$arrData['picture1'] = 'companypic1_' . $_POST['id'] . '.jpg';
			$arrData['picture2'] = 'companypic2_' . $_POST['id'] . '.jpg';
			if($_FILES['company_logo']['name'] != ''){
				$logo = 'companylogo_' . $arrData['id'] . '.jpg'; 
				saveResizeImage($_FILES['company_logo'], $arrData['id'], 'companylogo');
			}
			if($_FILES['company_picture']['name'] != ''){
				$picture = 'companypic_' . $arrData['id'] . '.jpg'; 
				saveResizeImage($_FILES['company_picture'], $arrData['id'], 'companypic');
			}
			if($_FILES['company_picture1']['name'] != ''){
				$picture1 = 'companypic1_' . $arrData['id'] . '.jpg'; 
				saveResizeImage($_FILES['company_picture1'], $arrData['id'], 'companypic1');
			}
			if($_FILES['company_picture2']['name'] != ''){
				$picture2 = 'companypic2_' . $arrData['id'] . '.jpg'; 
				saveResizeImage($_FILES['company_picture2'], $arrData['id'], 'companypic2');
			}

			$update = $company->edit($arrData);
		}	
	}
	header('Location: company.php');
?>