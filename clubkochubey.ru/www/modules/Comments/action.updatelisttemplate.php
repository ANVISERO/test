<?php
if (!isset($gCms)) exit;

if( !$this->CheckPermission( 'Modify Templates' ) )
{
	return;
}

if( isset( $params['defaultsbutton'] ) )
{
	// reset to system defaults
	$this->SetTemplate('default_display',$this->GetTemplateFromFile('default_display'));
}
else
{
	$this->SetTemplate('default_display', $params['templatecontent']);
}
$params = array('tab_message'=> 'list_template_updated', 'active_tab' => 'list_template');
$this->Redirect($id, 'defaultadmin', '', $params);
?>
