<?php

use CRM_GoogleCalendarAccess_ExtensionUtil as E;

/**
 * Form controller class
 * Lots of inspiration drawn from https://github.com/eileenmcnaughton/nz.co.fuzion.civixero/blob/master/CRM/Civixero/Form/XeroSettings.php
 * @see https://wiki.civicrm.org/confluence/display/CRMDOC/QuickForm+Reference
 */
class CRM_GoogleCalendarAccess_Form_GoogleCalendarAccessSettings extends CRM_OauthSync_Form_ConnectionSettings {

  protected function getConnectionSettingsPrefix() {
    return 'google_calendar_access';
  }

  protected function getHumanReadableConnectionName() {
    return "Google Calendar Sync";
  }

}