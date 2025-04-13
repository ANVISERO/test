<?php
global $gCms;

// display status messages passed here by other pages as message parameter
if(isset($params['message']))
	echo $this->ShowMessage($this->Lang($params['message']));
if(isset($params['errors']) && count($params['errors']))
	echo $this->ShowErrors($params['errors']);

// choose the tab to display. If no tab is set, select 'links' as the default
if (!empty($params['active_tab'])) {
	$tab = $params['active_tab'];
} else {
	$tab = 'links';
}	
// and finally, display all the tabs. 
echo $this->StartTabHeaders();
echo $this->SetTabHeader('links', $this->Lang('links'), 'links' == $tab ? true : false);
echo $this->SetTabHeader('categories', $this->Lang('categories'), 'categories' == $tab ? true : false);
echo $this->SetTabHeader('templates', $this->Lang('template'), 'templates' == $tab ? true : false);
echo $this->EndTabHeaders();
echo $this->StartTabContent();

echo $this->StartTab('links');
include 'function.links.php';
echo $this->EndTab();

echo $this->StartTab('categories');
include 'function.categories.php';
echo $this->EndTab();

echo $this->StartTab('templates');
include 'function.template.php';
echo $this->EndTab();
echo $this->EndTabContent();
?>
