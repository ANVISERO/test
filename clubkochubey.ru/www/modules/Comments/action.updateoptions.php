<?php

if (!isset($gCms)) exit;

if( !$this->CheckPermission( 'Modify Site Preferences' ) ) { return; }
if (! isset($params['spamprotect'])) { $params['spamprotect'] = ''; }
if (! isset($params['moderate'])) { $params['moderate'] = ''; }
if (! isset($params['disable_html'])) { $params['disable_html'] = ''; }
if (!isset($params['akismet_check'])) { $params['akismet_check'] = 0; }
if (! isset($params['enable_trackbacks'])) { $params['enable_trackbacks'] = ''; }
if (! isset($params['enable_trackback_backlink_check'])) { $params['enable_trackback_backlink_check'] = ''; }
if (! isset($params['enable_cookie_support'])) { $params['enable_cookie_support'] = ''; }

$this->SetPreference('spamprotect', $params['spamprotect']);
$this->SetPreference('moderate', $params['moderate']);
$this->SetPreference('notify', $params['notify']);
$this->SetPreference('disable_html', $params['disable_html']);
$this->SetPreference('akismet_check', $params['akismet_check']);
$this->SetPreference('enable_trackbacks', $params['enable_trackbacks']);
$this->SetPreference('enable_trackback_backlink_check', $params['enable_trackback_backlink_check']);
$this->SetPreference('enable_cookie_support', $params['enable_cookie_support']);
$params = array('tab_message'=> 'options_updated', 'active_tab' => 'options');
$this->Redirect($id, 'defaultadmin', '', $params);

?>