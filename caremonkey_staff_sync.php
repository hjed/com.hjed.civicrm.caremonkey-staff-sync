<?php

require_once 'caremonkey_staff_sync.civix.php';
use CRM_CaremonkeyStaffSync_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function caremonkey_staff_sync_civicrm_config(&$config) {
  _caremonkey_staff_sync_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function caremonkey_staff_sync_civicrm_xmlMenu(&$files) {
  _caremonkey_staff_sync_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function caremonkey_staff_sync_civicrm_install() {
  _caremonkey_staff_sync_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function caremonkey_staff_sync_civicrm_postInstall() {
  _caremonkey_staff_sync_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function caremonkey_staff_sync_civicrm_uninstall() {
  _caremonkey_staff_sync_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function caremonkey_staff_sync_civicrm_enable() {
  _caremonkey_staff_sync_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function caremonkey_staff_sync_civicrm_disable() {
  _caremonkey_staff_sync_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function caremonkey_staff_sync_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _caremonkey_staff_sync_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function caremonkey_staff_sync_civicrm_managed(&$entities) {
  _caremonkey_staff_sync_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function caremonkey_staff_sync_civicrm_caseTypes(&$caseTypes) {
  _caremonkey_staff_sync_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function caremonkey_staff_sync_civicrm_angularModules(&$angularModules) {
  _caremonkey_staff_sync_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function caremonkey_staff_sync_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _caremonkey_staff_sync_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_entityTypes
 */
function caremonkey_staff_sync_civicrm_entityTypes(&$entityTypes) {
  _caremonkey_staff_sync_civix_civicrm_entityTypes($entityTypes);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_pageRun().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 */
function caremonkey_staff_sync_civicrm_pageRun(&$run) {
}


/**
 * Implements hook_civicrm_oauthsync_consent_success().
 *
 * Used to get the connection id
 */
function caremonkey_staff_sync_civicrm_oauthsync_consent_success(&$prefix) {
  // we don't need to do anything here
}

/**
 * Implements hook_civicrm_oauthsync_caremonkey_staff_sync_groups_list().
 *
 * Used to get the connection id
 */
function caremonkey_staff_sync_civicrm_oauthsync_caremonkey_staff_sync_sync_groups_list(&$groups) {
  // query, searches for folders in the root
  $groups_json = CRM_CaremonkeyStaffSync_CaremonkeyStaffHelper::getGroupList();

  foreach ($groups_json as $group) {
    $groups[] = $group;
  }
}

/**
 * Implements hook_civicrm_oauthsync_caremonkey_staff_sync_get_remote_user_list().
 *
 * Used to sync the members of a remote group
 */
function caremonkey_staff_sync_civicrm_oauthsync_caremonkey_staff_sync_get_remote_user_list(&$remoteGroupName, &$members) {
  // query, searches for folders in the root
  $contactIds = CRM_CaremonkeyStaffSync_CaremonkeyStaffHelper::getAllCaremonkeyMembersForRoleAndGroup($remoteGroupName, true);
  // TODO: handle the above being an error

  foreach ($contactIds as $contactId) {
    $members[] = $contactId;
  }

}

/**
 *
 * Implements hook_civicrm_oauthsync_caremonkey_staff_sync_update_remote_users().
 *
 * Used to sync the members of a remote group
 */
function caremonkey_staff_sync_civicrm_oauthsync_caremonkey_staff_sync_update_remote_users(&$remoteGroupName, &$toRemove, &$toAdd) {

  foreach ($toAdd as $contactId) {
    CRM_CaremonkeyStaffSync_CaremonkeyStaffHelper::addContactToRemoteGroup($contactId, $remoteGroupName);
  }
  // TODO: handle the above being an error
  foreach($toRemove as $contactId) {
    CRM_CaremonkeyStaffSync_CaremonkeyStaffHelper::removeContactFromRemoteGroup($contactId, $remoteGroupName);
  }
}

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
 */
function caremonkey_staff_sync_civicrm_navigationMenu(&$menu) {
  _caremonkey_staff_sync_civix_insert_navigation_menu($menu, 'Administer', array(
    'label' => E::ts('Caremonkey Staff Settings'),
    'name' => 'CaremonkeyStaffSync',
    'permission' => 'administer CiviCRM',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _caremonkey_staff_sync_civix_insert_navigation_menu($menu, 'Administer/CaremonkeyStaffSync', array(
    'label' => E::ts('Caremonkey Staff API Settings'),
    'name' => 'caremonkey_staff_sync_settings',
    'url' => 'civicrm/caremonkey-staff-sync/config',
    'permission' => 'administer CiviCRM',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _caremonkey_staff_sync_civix_insert_navigation_menu($menu, 'Administer/CaremonkeyStaffSync', array(
    'label' => E::ts('Caremonkey Staff Connection'),
    'name' => 'caremonkey_staff_sync_connection',
    'url' => 'civicrm/caremonkey-staff-sync/connection',
    'permission' => 'administer CiviCRM',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _caremonkey_staff_sync_civix_navigationMenu($menu);
}

require_once "CRM/CaremonkeyStaffSync/CRM_CaremonkeyStaffSync_CaremonkeyStaffHelper.php";
require_once CRM_Extension_System::singleton()->getMapper()->keyToPath('com.hjed.civicrm.oauth-sync');
CRM_CaremonkeyStaffSync_CaremonkeyStaffHelper::oauthHelper();
