<?php
/*
 * @version $Id$
 LICENSE

 This file is part of the purgelogs plugin.

 purgelogs plugin is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 purgelogs plugin is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with GLPI; along with Behav$LANG['plugin_purgelogs']['config'][26]iors. If not, see <http://www.gnu.org/licenses/>.
 --------------------------------------------------------------------------
 @package   purgelogs
 @author    the purgelogs plugin team
 @copyright Copyright (c) 2010-2011 purgelogs plugin team
 @license   GPLv2+
            http://www.gnu.org/licenses/gpl.txt
 @link      https://forge.indepnet.net/projects/purgelogs
 @link      http://www.glpi-project.org/
 @since     2009
 ---------------------------------------------------------------------- */

if (!defined('GLPI_ROOT')){
   die("Sorry. You can't access directly to this file");
}

class PluginPurgelogsConfig extends CommonDBTM {

   
   static function getConfig($update = false) {
      static $config = null;

      if (is_null($config)) {
         $config = new self();
      }
      if ($update) {
         $config->getFromDB(1);
      }
      return $config;
   }

   function __construct() {
      if (TableExists($this->getTable())) {
         $this->getFromDB(1);
      }
   }
   
   static function getTypeName() {
      global $LANG;

      return $LANG['plugin_purgelogs']['title'][1];
   }
   
   function showForm(){
      global $LANG;
      
      $this->getFromDB(1);
      echo "<div class='center'>";
      echo "<form name='form' method='post' action='".$this->getFormURL()."'>";
      echo "<table class='tab_cadre_fixe'>";
      echo "<tr align='center'><th colspan='4'>".$LANG['plugin_purgelogs'][19]."</th></tr>";
      echo "<input type='hidden' name='id' value='1'>";
      
      echo "<tr align='center'><th colspan='4'>".$LANG['help'][30]."</th></tr>";
      echo "<tr align='center'><td>".$LANG['plugin_purgelogs'][17]."</td><td>";
      self::showInterval('purge_addrelation', $this->fields["purge_addrelation"]);
      echo "</td>";
      echo "<td>".$LANG['plugin_purgelogs'][18]."</td><td>";
      self::showInterval('purge_deleterelation', $this->fields["purge_deleterelation"]);
      echo "</td>";
      echo "</tr>";
      
      echo "<tr align='center'><td>".$LANG['log'][20]."</td><td>";
      self::showInterval('purge_createitem', $this->fields["purge_createitem"]);
      echo "</td>";
      echo "<td>".$LANG['log'][100]."</td><td>";
      self::showInterval('purge_deleteitem', $this->fields["purge_deleteitem"]);
      echo "</td>";
      echo "</tr>";
      
      echo "<tr align='center'><td>".$LANG['log'][23]."</td><td>";
      self::showInterval('purge_restoreitem', $this->fields["purge_restoreitem"]);
      echo "</td>";

      echo "<td>".$LANG['log'][99]."</td><td>";
      self::showInterval('purge_updateitem', $this->fields["purge_updateitem"]);
      echo "</td>";
      echo "</tr>";
      
      echo "<tr align='center'><td>".$LANG['common'][25]."</td><td>";
      self::showInterval('purge_comments', $this->fields["purge_comments"]);
      echo "</td>";
      echo "<td>".$LANG['common'][26]."</td><td>";
      self::showInterval('purge_datemod', $this->fields["purge_datemod"]);
      echo "</td>";
      echo "</tr>";
      
      echo "<tr align='center'><th colspan='4'>".$LANG['Menu'][4]."</th></tr>";
      echo "<tr align='center'><td>".$LANG['plugin_purgelogs'][1]."</td><td>";
      self::showInterval('purge_computer_software_install',
                          $this->fields["purge_computer_software_install"]);
      echo "</td>";
      echo "<td>".$LANG['plugin_purgelogs'][2]."</td><td>";
      self::showInterval('purge_software_version_install',
                         $this->fields["purge_software_version_install"]);
      echo "</td>";
      echo "</tr>";

      echo "<tr align='center'><th colspan='4'>".$LANG['Menu'][24]."</th></tr>";
      echo "<tr align='center'><td>".$LANG['plugin_purgelogs'][5]."</td><td>";
      self::showInterval('purge_infocom_creation', $this->fields["purge_infocom_creation"]);
      echo "</td>";
      echo "</tr>";
      
      echo "<tr align='center'><th colspan='4'>".$LANG['Menu'][14]."</th></tr>";
      
      echo "<tr align='center'><td>".$LANG['plugin_purgelogs'][3]."</td><td>";
      self::showInterval('purge_profile_user', $this->fields["purge_profile_user"]);
      echo "</td>";
      echo "<td>".$LANG['plugin_purgelogs'][4]."</td><td>";
      self::showInterval('purge_group_user', $this->fields["purge_group_user"]);
      echo "</td>";
      echo "</tr>";
      
      echo "<tr align='center'><td>".$LANG['ldap'][48]."</td><td>";
      self::showInterval('purge_userdeletedfromldap', $this->fields["purge_userdeletedfromldap"]);
      echo "</td>";
      echo "<td colspan='2'></td></tr>";
      
      echo "<tr align='center'><th colspan='4'>".$LANG['Menu'][33]."</th></tr>";
      
      echo "<tr align='center'><td>".$LANG['plugin_purgelogs'][8]."</td><td>";
      self::showInterval('purge_ocsid_changes', $this->fields["purge_ocsid_changes"]);
      echo "</td>";
      echo "<td>".$LANG['plugin_purgelogs'][9]."</td><td>";
      self::showInterval('purge_ocsimport', $this->fields["purge_ocsimport"]);
      echo "</td>";
      echo "</tr>";

      echo "<tr align='center'><td>".$LANG['plugin_purgelogs'][10]."</td><td>";
      self::showInterval('purge_ocslink', $this->fields["purge_ocslink"]);
      echo "</td>";
      echo "<td>".$LANG['plugin_purgelogs'][11]."</td><td>";
      self::showInterval('purge_ocsdelete', $this->fields["purge_ocsdelete"]);
      echo "</td>";
      echo "</tr>";
      
      echo "<tr align='center'><th colspan='4'>".$LANG['title'][30]."</th></tr>";

      echo "<tr align='center'><td>".$LANG['plugin_purgelogs'][12]."</td><td>";
      self::showInterval('purge_adddevice', $this->fields["purge_adddevice"]);
      echo "</td>";
      echo "<td>".$LANG['plugin_purgelogs'][13]."</td><td>";
      self::showInterval('purge_updatedevice', $this->fields["purge_updatedevice"]);
      echo "</td>";
      echo "</tr>";
      
      echo "<tr align='center'><td>".$LANG['plugin_purgelogs'][16]."</td><td>";
      self::showInterval('purge_disconnectdevice', $this->fields["purge_disconnectdevice"]);
      echo "</td>";
      echo "<td>".$LANG['plugin_purgelogs'][15]."</td><td>";
      self::showInterval('purge_connectdevice', $this->fields["purge_connectdevice"]);
      echo "</td>";
      echo "</tr>";

      echo "<tr align='center'><td>".$LANG['plugin_purgelogs'][14]."</td><td>";
      self::showInterval('purge_deletedevice', $this->fields["purge_deletedevice"]);
      echo "</td>";
      echo "<td colspan='2'></td></tr>";
      
      echo "<tr align='center'><th colspan='4'>".$LANG['common'][29]."</th></tr>";
      
      echo "<tr align='center'><td>".$LANG['plugin_purgelogs'][7]."</td><td>";
      self::showInterval('purge_webservices_logs', $this->fields["purge_webservices_logs"]);
      echo "</td>";
      echo "<td colspan='2'></td></tr>";
      
      echo "<tr class='tab_bg_1' align='center'>";
      echo "<td colspan='4' align='center'>";
      echo "<input type='submit' name='update' value=\"".$LANG['buttons'][7]."\" class='submit' >";
      echo"</td>";
      echo "</tr>";
      
      echo "</table></form></div>";
   }
   
   static function showInterval($name, $value) {
      global $LANG;
      $values[-1] = $LANG['common'][66];
      $values[0]  = $LANG['setup'][307];
      for ($i = 1; $i < 121; $i++) {
         $values[$i] = $i. " ".$LANG['calendar'][14];
      }
      return Dropdown::showFromArray($name, $values, array('value' => $value));
   }
   
   //----------------- Install & uninstall -------------------//

   static function install(Migration $migration) {
      global $DB;


      $table = getTableForItemType(__CLASS__);
      $config = new self();

      //This class is available since version 1.3.0
      if (!TableExists($table)) {
            $migration->displayMessage("Installing $table");

            //Install
            $query = "CREATE TABLE `$table` (
                     `id` int(11) NOT NULL auto_increment,
                     `purge_computer_software_install` int(11) NOT NULL default '0',
                     `purge_software_version_install` int(11) NOT NULL default '0',
                     `purge_infocom_creation` int(11) NOT NULL default '0',
                     `purge_profile_user` int(11) NOT NULL default '0',
                     `purge_group_user` int(11) NOT NULL default '0',
                     `purge_webservices_logs` int(11) NOT NULL default '0',
                     `purge_ocsid_changes` int(11) NOT NULL default '0',
                     `purge_ocsimport` int(11) NOT NULL default '0',
                     `purge_ocslink` int(11) NOT NULL default '0',
                     `purge_ocsdelete` int(11) NOT NULL default '0',
                     `purge_adddevice` tinyint(1) NOT NULL default '0',
                     `purge_updatedevice` tinyint(1) NOT NULL default '0',
                     `purge_deletedevice` tinyint(1) NOT NULL default '0',
                     `purge_connectdevice` tinyint(1) NOT NULL default '0',
                     `purge_disconnectdevice` tinyint(1) NOT NULL default '0',
                     `purge_userdeletedfromldap` tinyint(1) NOT NULL default '0',
                     `purge_addrelation` tinyint(1) NOT NULL default '0',
                     `purge_deleterelation` tinyint(1) NOT NULL default '0',
                     `purge_createitem` tinyint(1) NOT NULL default '0',
                     `purge_deleteitem` tinyint(1) NOT NULL default '0',
                     `purge_restoreitem` tinyint(1) NOT NULL default '0',
                     `purge_updateitem` tinyint(1) NOT NULL default '0',
                     `purge_comments` tinyint(1) NOT NULL default '0',
                     `purge_datemod` tinyint(1) NOT NULL default '0',
                     PRIMARY KEY  (`id`)
                  ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
               $DB->query($query) or die ($DB->error());
               //Add config
               $config->add(array('id' => 1));
      }
   }
   
   static function uninstall() {
      global $DB;
      //New table
      $DB->query("DROP TABLE IF EXISTS `".getTableForItemType(__CLASS__)."`");
   }
}

?>