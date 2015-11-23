<?php

class ThemeHouse_SimilarUsernam_Install_Controller extends ThemeHouse_Install
{

    protected $_resourceManagerUrl = 'https://xenforo.com/community/resources/similar-usernames.3856/';

    protected $_minVersionId = 1020000;

    protected $_minVersionString = '1.2.0';

    protected function _getPermissionEntries()
    {
        return array(
            'general' => array(
                'similarUsernames' => array(
                    'permission_group_id' => 'general', /* END 'permission_group_id' */
                    'permission_id' => 'warn', /* END 'permission_id' */
                ), /* END 'similarUsernames' */
            ), /* END 'general' */
        );
    } /* END _getPermissionEntries */
}