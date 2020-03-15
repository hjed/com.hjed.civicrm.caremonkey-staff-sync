<?php
use CRM_CaremonkeyStaffSync_ExtensionUtil as E;
require_once __DIR__ . "/../CRM_CaremonkeyStaffSync_CaremonkeyStaffHelper.php";

class CRM_CaremonkeyStaffSync_Page_CaremonkeyStaffSyncSettings extends CRM_Core_Page {

  public function run() {
    // Example: Set the page-title dynamically; alternatively, declare a static title in xml/Menu/*.xml
    CRM_Utils_System::setTitle(E::ts('Your Caremonkey Staff Connection'));


    $connected = civicrm_api3('Setting', 'get', array('group' => 'caremonkey_staff_sync_token'))["values"][1]['caremonkey_staff_synced'];
    $client_id = civicrm_api3('Setting', 'get', array('group' => 'caremonkey_staff_sync'))["values"][1]['caremonkey_staff_sync_client_id'];
    $this->assign('connected', $connected);
//    if($connected) {
//    } else {
      $state = CRM_CaremonkeyStaffSync_CaremonkeyStaffHelper::oauthHelper()->newStateKey();
      $redirect_url= CRM_OauthSync_OAuthHelper::generateRedirectUrl();
      $redirect_url = CRM_Utils_System::url('civicrm/caremonkey-staff-sync/callback', 'reset=1', TRUE, NULL, FALSE, FALSE);
      CRM_CaremonkeyStaffSync_CaremonkeyStaffHelper::oauthHelper()->setOauthCallbackReturnPath(
        join('/', $this->urlPath)
      );
      $this->assign(
        'oauth_url',
        $redirect_url . "&state=" . $state
      );
//    }
    // Example: Assign a variable for use in a template
    $this->assign('currentTime', date('Y-m-d H:i:s'));

    parent::run();
  }

}
