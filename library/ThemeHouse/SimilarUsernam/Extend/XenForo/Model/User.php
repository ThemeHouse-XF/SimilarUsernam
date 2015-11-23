<?php

/**
 *
 * @see XenForo_Model_User
 */
class ThemeHouse_SimilarUsernam_Extend_XenForo_Model_User extends XFCP_ThemeHouse_SimilarUsernam_Extend_XenForo_Model_User
{

    /**
     *
     * @see XenForo_Model_User::prepareUserConditions()
     */
    public function prepareUserConditions(array $conditions, array &$fetchOptions)
    {
        $db = $this->_getDb();

        $sqlConditions[] = parent::prepareUserConditions($conditions, $fetchOptions);

        $xenOptions = XenForo_Application::get('options');

        if (!empty($conditions['usernameSoundsLike'])) {
            $accuracy = $xenOptions->th_similarUsernames_soundexAccuracy;
            $username = $db->quote($conditions['usernameSoundsLike']);
            if ($accuracy == 0) {
                $sqlConditions[] = 'user.username SOUNDS LIKE ' . $username;
            } else {
                $sqlConditions[] = 'SUBSTR(SOUNDEX(user.username), 1, ' . $accuracy . ')
                = SUBSTR(SOUNDEX(' . $username . '), 1, ' . $accuracy . ')';
            }
            $sqlConditions[] = 'user.username != ' . $username;
        }

        return $this->getConditionsForClause($sqlConditions);
    } /* END prepareUserConditions */

    /**
     * Determines if permissions are sufficient to view similar usernames for
     * the given user.
     *
     * @param array $user User being viewed
     * @param string $errorPhraseKey Returned by ref. Phrase key of more
     * specific error
     * @param array|null $viewingUser Viewing user ref
     *
     * @return boolean
     */
    public function canViewSimilarUsernames(array $user, &$errorPhraseKey = '', array $viewingUser = null)
    {
        if (empty($user['user_id'])) {
            return false;
        }

        $this->standardizeViewingUserReference($viewingUser);

        return XenForo_Permission::hasPermission($viewingUser['permissions'], 'general', 'similarUsernames');
    } /* END canViewSimilarUsernames */
}