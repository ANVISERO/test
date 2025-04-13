<?php
if( !$this->CheckPermission('Modify Site Preferences') ) return;

$this->LoadLibs();

echo $this->getAdminHtml($id, $returnid, $params);

?>
