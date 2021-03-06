<?php
/***********************************************************************************
 * X2CRM is a customer relationship management program developed by
 * X2Engine, Inc. Copyright (C) 2011-2016 X2Engine Inc.
 * 
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY X2ENGINE, X2ENGINE DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 * 
 * You can contact X2Engine, Inc. P.O. Box 66752, Scotts Valley,
 * California 95067, USA. on our website at www.x2crm.com, or at our
 * email address: contact@x2engine.com.
 * 
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * X2Engine" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by X2Engine".
 **********************************************************************************/

/**
 * Abstract base class defining nexessary features for syncronizing calendars
 * between X2 and other protocols. See CalDavSync for an example implementation
 */
abstract class CalendarSync extends CBehavior {

    /**
     * Master sync function to handle both inbound and outbound sync in one place.
     * How this is implemented is left to the developer.
     */
    public abstract function sync();

    /**
     * Master function to handle creating a remote calendar object from an X2
     * Action record.
     */
    public abstract function syncActionToCalendar($action);
    
    /**
     * Must delete all remote calendar events which were created from a sync from X2
     */
    public abstract function deleteRemoteActions();
    
    /**
     * Must delete a remote calendar event associated with a provided Action model
     */
    public abstract function deleteAction($action);

    /**
     * Must create an Action model from a calendar event object from the subclass's
     * protocol
     */
    protected abstract function createAction($calObject, $params = array());
    
    /**
     * Must update an Action model from a calendar event object from the subclass's
     * protocol
     */
    protected abstract function updateAction($action, $calObject, $params = array());
    
    /**
     * Must create a remote calendar event object from a provided Action model
     */
    protected abstract function createCalObject($action);
}
