<?php
namespace AppBundle\Service;

use AppBundle\Entity\ConfigPlatform;
use Symfony\Component\HttpFoundation\Session\Attribute\NamespacedAttributeBag;

/**
 * Created by PhpStorm.
 * User: raulnet
 * Date: 16/07/17
 * Time: 16:17
 */
class ConfigPlateformService
{
    /**
     * @var array
     */
    private $config = [
        145945 => [
            'id_organisateur'   => 46798,
            'template_custom'   => false,
            'template_event_custom'   => false,
            'id_evenement'      => 145945,
            'title'             => 'Standard',
            'api_custom'        => false,
            'style_custom'      => false,
            'header_type'       => 'img',
            'header_value'      => 'http://img01.deviantart.net/e3bf/i/2015/135/9/1/star_citizen___triple_screen_wallpaper_by_logan0015-d8t4sd7.jpg'
        ],
        145946 => [
            'id_organisateur'   => 46798,
            'template_custom'   => true,
            'template_event_custom'   => false,
            'id_evenement'      => 145946,
            'title'             => 'Custom Orga Template & Custom Orga Api',
            'api_custom'        => true,
            'style_custom'      => false,
            'header_type'       => 'title',
            'header_value'      => 'My PlatForm Custom '

        ],
        145947 => [
            'id_organisateur'   => 46798,
            'template_custom'   => false,
            'template_event_custom'   => false,
            'id_evenement'      => 145947,
            'title'             => 'Custom Orga Api',
            'api_custom'        => true,
            'style_custom'      => false,
            'header_type'       => 'img',
            'header_value'      => 'http://cdn.wallpapersafari.com/3/81/e6QhdC.jpg'

        ],
        145948 => [
            'id_organisateur'   => 46798,
            'template_custom'   => false,
            'template_event_custom'   => true,
            'id_evenement'      => 145948,
            'title'             => 'Custom Template Event 145948',
            'api_custom'        => false,
            'style_custom'      => false,
            'header_type'       => 'img',
            'header_value'      => 'http://i.imgur.com/rjhzdd1.jpg'

        ]
    ];

    /**
     * @return array
     */
    public function getAllConfig(){
        return $this->config;
    }

    /**
     * @param $idEvenement
     * @return ConfigPlatform
     */
    public function getConfig($idEvenement){
        $config = $this->config[$idEvenement];
        return $this->buidEntityConfig($config);
    }

    /**
     * @param $config
     * @return ConfigPlatform
     */
    private function buidEntityConfig($config){
        $params = new NamespacedAttributeBag('_config_platform');
        foreach ($config as $attr => $value){
            $params->set($attr, $value);
        }
        $entityConfig = new ConfigPlatform();
        $entityConfig->setAttributes($params);
        return $entityConfig;
    }
}