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
 along with GLPI; along with purgelogs. If not, see <http://www.gnu.org/licenses/>.
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
define('GLPI_ROOT', '../../..');
include (GLPI_ROOT . "/inc/includes.php");

checkRight("config", "w");

$config = new PluginPurgelogsConfig();
if (isset($_POST["update"])) {
   $config->update($_POST);
   glpi_header($_SERVER['HTTP_REFERER']);
}

commonHeader($LANG['plugin_purgelogs']['title'][1], $_SERVER['PHP_SELF'], "plugins", "config");
$config->showForm();
commonFooter();