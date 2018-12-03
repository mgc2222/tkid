<?php
class ChangeLanguage extends AdminController
{

	function SetSelectedLanguage()
	{
        if (isset($_POST['language'])){
            $laguageModel = $this->LoadModel('languages', 'languages');
        	if($laguageModel->GetRecordById((int)($_POST['language']))){
            	$_SESSION['language_id'] = (int)$_POST['language'];
			}
		}
		$this->RedirectBack();
	}

}
?>
