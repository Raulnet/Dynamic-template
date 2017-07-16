<?php
namespace AppBundle\Entity;

use Symfony\Component\HttpFoundation\Session\Attribute\NamespacedAttributeBag;

/**
 * Created by PhpStorm.
 * User: raulnet
 * Date: 16/07/17
 * Time: 15:54
 */
class ConfigPlatform
{
    const HEADER_TYPE_TITLE = 'title';
    const HEADER_TYPE_IMG = 'img';
    /**
     * @var int
     */
    private  $idOrganisateur = 0;
    /**
     * @var int
     */
    private $idEvenement = 0;
    /**
     * @var string
     */
    private $title = '';
    /**
     * @var string
     */
    private $headerType = self::HEADER_TYPE_TITLE;
    /**
     * @var string
     */
    private $headerValue = '';
    /**
     * @var bool
     */
    private $templateCustom = false;/**
     * @var bool
     */
    private $templateEventCustom = false;
    /**
     * @var bool
     */
    private $apiCustom = false;
    /**
     * @var bool
     */
    private $styleCustom = false;

    /**
     * @param NamespacedAttributeBag $attributeBag
     * @return $this
     */
    public function setAttributes(NamespacedAttributeBag $attributeBag){

        $this->idOrganisateur = (int)$attributeBag->get('id_organisateur', 0);
        $this->idEvenement = (int)$attributeBag->get('id_evenement', 0);
        $this->title = (string)$attributeBag->get('title', '');
        $this->headerType = (string)$attributeBag->get('header_type', self::HEADER_TYPE_TITLE);
        $this->headerValue = (string)$attributeBag->get('header_value', '');
        $this->templateCustom = (bool)$attributeBag->get('template_custom', false);
        $this->templateEventCustom = (bool)$attributeBag->get('template_event_custom', false);
        $this->apiCustom = (bool)$attributeBag->get('api_custom', false);
        $this->styleCustom = (bool)$attributeBag->get('style_custom', false);

        return $this;
    }

    /**
     * @return int
     */
    public function getIdOrganisateur()
    {
        return $this->idOrganisateur;
    }

    /**
     * @param int $idOrganisateur
     */
    public function setIdOrganisateur($idOrganisateur)
    {
        $this->idOrganisateur = $idOrganisateur;
    }

    /**
     * @return int
     */
    public function getIdEvenement()
    {
        return $this->idEvenement;
    }

    /**
     * @param int $idEvenement
     */
    public function setIdEvenement($idEvenement)
    {
        $this->idEvenement = $idEvenement;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getHeaderType()
    {
        return $this->headerType;
    }

    /**
     * @param string $headerType
     */
    public function setHeaderType($headerType)
    {
        $this->headerType = $headerType;
    }

    /**
     * @return string
     */
    public function getHeaderValue()
    {
        return $this->headerValue;
    }

    /**
     * @param string $headerValue
     */
    public function setHeaderValue($headerValue)
    {
        $this->headerValue = $headerValue;
    }

    /**
     * @return bool
     */
    public function hasTemplateCustom()
    {
        return $this->templateCustom;
    }

    /**
     * @param bool $templateCustom
     */
    public function setTemplateCustom($templateCustom)
    {
        $this->templateCustom = $templateCustom;
    }

    /**
     * @return bool
     */
    public function hasApiCustom()
    {
        return $this->apiCustom;
    }

    /**
     * @param bool $apiCustom
     */
    public function setApiCustom($apiCustom)
    {
        $this->apiCustom = $apiCustom;
    }

    /**
     * @return bool
     */
    public function hasStyleCustom()
    {
        return $this->styleCustom;
    }

    /**
     * @param bool $styleCustom
     */
    public function setStyleCustom($styleCustom)
    {
        $this->styleCustom = $styleCustom;
    }

    /**
     * @return bool
     */
    public function hasTemplateEventCustom()
    {
        return $this->templateEventCustom;
    }

    /**
     * @param bool $templateEventCustom
     */
    public function setTemplateEventCustom($templateEventCustom)
    {
        $this->templateEventCustom = $templateEventCustom;
    }


}