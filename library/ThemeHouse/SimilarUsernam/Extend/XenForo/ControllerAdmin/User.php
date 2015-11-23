<?php

/**
 *
 * @see XenForo_ControllerAdmin_User
 */
class ThemeHouse_SimilarUsernam_Extend_XenForo_ControllerAdmin_User extends XFCP_ThemeHouse_SimilarUsernam_Extend_XenForo_ControllerAdmin_User
{

    public function actionSimilarUsernames()
    {
        $userId = $this->_input->filterSingle('user_id', XenForo_Input::UINT);
        $user = $this->_getUserOrError($userId);

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

        return $this->responseView('ThemeHouse_SimilarUsernam_ViewPublic_Member_SimilarUsernames',
            'th_member_similar_usernames_similarusernames', $viewParams);
    } /* END actionSimilarUsernames */
}