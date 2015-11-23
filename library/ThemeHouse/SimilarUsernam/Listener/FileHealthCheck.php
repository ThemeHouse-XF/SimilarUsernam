<?php

class ThemeHouse_SimilarUsernam_Listener_FileHealthCheck
{

    public static function fileHealthCheck(XenForo_ControllerAdmin_Abstract $controller, array &$hashes)
    {
        $hashes = array_merge($hashes,
            array(
                'library/ThemeHouse/SimilarUsernam/Extend/XenForo/ControllerAdmin/User.php' => '37a50ae561200de580cc4f7880a409b3',
                'library/ThemeHouse/SimilarUsernam/Extend/XenForo/ControllerPublic/Member.php' => '9013b11200c2461a64a63fde7b152378',
                'library/ThemeHouse/SimilarUsernam/Extend/XenForo/Model/User.php' => '102e36ff70bf6c8920c3840a9ddf60c3',
                'library/ThemeHouse/SimilarUsernam/Install/Controller.php' => 'd34a3220214af5da06749922a395fb45',
                'library/ThemeHouse/SimilarUsernam/Listener/CriteriaUser.php' => '1a5e912202180351befa2b9844ed4f59',
                'library/ThemeHouse/SimilarUsernam/Listener/LoadClass.php' => '1c0b9d0ad7d98a0f451180f4ba28d2cd',
                'library/ThemeHouse/Install.php' => '18f1441e00e3742460174ab197bec0b7',
                'library/ThemeHouse/Install/20151109.php' => '2e3f16d685652ea2fa82ba11b69204f4',
                'library/ThemeHouse/Deferred.php' => 'ebab3e432fe2f42520de0e36f7f45d88',
                'library/ThemeHouse/Deferred/20150106.php' => 'a311d9aa6f9a0412eeba878417ba7ede',
                'library/ThemeHouse/Listener/ControllerPreDispatch.php' => 'fdebb2d5347398d3974a6f27eb11a3cd',
                'library/ThemeHouse/Listener/ControllerPreDispatch/20150911.php' => 'f2aadc0bd188ad127e363f417b4d23a9',
                'library/ThemeHouse/Listener/InitDependencies.php' => '8f59aaa8ffe56231c4aa47cf2c65f2b0',
                'library/ThemeHouse/Listener/InitDependencies/20150212.php' => 'f04c9dc8fa289895c06c1bcba5d27293',
                'library/ThemeHouse/Listener/LoadClass.php' => '5cad77e1862641ddc2dd693b1aa68a50',
                'library/ThemeHouse/Listener/LoadClass/20150518.php' => 'f4d0d30ba5e5dc51cda07141c39939e3',
            ));
    }
}