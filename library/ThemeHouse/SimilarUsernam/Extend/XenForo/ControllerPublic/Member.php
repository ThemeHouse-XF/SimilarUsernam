<?php

/**
 *
 * @see XenForo_ControllerPublic_Member
 */
class ThemeHouse_SimilarUsernam_Extend_XenForo_ControllerPublic_Member extends XFCP_ThemeHouse_SimilarUsernam_Extend_XenForo_ControllerPublic_Member
{

    /**
     *
     * @see XenForo_ControllerPublic_Member::actionMember()
     */
    public function actionMember()
    {
        $response = parent::actionMember();

        if ($response instanceof XenForo_ControllerResponse_View) {
            $user = $response->params['user'];

            $response->params['canViewSimilarUsernames'] = $this->_getUserModel()->canViewSimilarUsernames($user);
        }

        return $response;
    } /* END actionMember */

    public function actionSimilarUsernames()
    {
        $userId = $this->_input->filterSingle('user_id', XenForo_Input::UINT);
        $userFetchOptions = array(
            'join' => XenForo_Model_User::FETCH_LAST_ACTIVITY | XenForo_Model_User::FETCH_USER_PERMISSIONS
        );
        $user = $this->getHelper('UserProfile')->assertUserProfileValidAndViewable($userId, $userFetchOptions);

        if (!$this->_getUserModel()->canViewSimilarUsernames($user, $errorPhraseKey)) {
            throw $this->getErrorOrNoPermissionResponseException($errorPhraseKey);
        }

        $page = $this->_input->filterSingle('page', XenForo_Input::UINT);
        $perPage = 20;

        $conditions = array(
            'usernameSoundsLike' => $user['username']
        );

        /* @var $userModel XenForo_Model_User */
        $userModel = $this->getModelFromCache('XenForo_Model_User');

        $users = $userModel->getUsers($conditions,
            array(
                'page' => $page,
                'perPage' => $perPage
            ));

        $viewParams = array(
            'users' => $users,
            'user' => $user,

            'page' => $page,
            'perPage' => $perPage,
            'total' => $userModel->countUsers($conditions)
        );

        return $this->responseView('ThemeHouse_SimilarUsernam_ViewAdmin_User_SimilarUsernames',
            'th_user_similar_usernames_similarusernames', $viewParams);
    } /* END actionSimilarUsernames */
}