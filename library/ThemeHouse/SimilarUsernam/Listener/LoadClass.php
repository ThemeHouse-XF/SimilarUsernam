<?php

class ThemeHouse_SimilarUsernam_Listener_LoadClass extends ThemeHouse_Listener_LoadClass
{

    protected function _getExtendedClasses()
    {
        return array(
            'ThemeHouse_SimilarUsernam' => array(
                'model' => array(
                    'XenForo_Model_User'
                ), /* END 'model' */
                'controller' => array(
                    'XenForo_ControllerAdmin_User',
                    'XenForo_ControllerPublic_Member'
                ), /* END 'controller' */
            ), /* END 'ThemeHouse_SimilarUsernam' */
        );
    } /* END _getExtendedClasses */

    public static function loadClassModel($class, array &$extend)
    {
        $extend = self::createAndRun('ThemeHouse_SimilarUsernam_Listener_LoadClass', $class, $extend, 'model');
    } /* END loadClassModel */

    public static function loadClassController($class, array &$extend)
    {
        $extend = self::createAndRun('ThemeHouse_SimilarUsernam_Listener_LoadClass', $class, $extend, 'controller');
    } /* END loadClassController */
}