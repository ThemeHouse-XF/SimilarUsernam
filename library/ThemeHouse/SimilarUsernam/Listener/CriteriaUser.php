<?php

class ThemeHouse_SimilarUsernam_Listener_CriteriaUser
{

    public static function criteriaUser($rule, array $data, array $user, &$returnValue)
    {
        /* @var $userModel XenForo_Model_User */
        $userModel = XenForo_Model::create('XenForo_Model_User');

        switch ($rule) {
            case 'soundex_existing':
                if ($userModel->countUsers(
                    array(
                        'usernameSoundsLike' => $user['username']
                    ))) {
                    $returnValue = true;
                }
                break;
        }
    } /* END criteriaUser */
}