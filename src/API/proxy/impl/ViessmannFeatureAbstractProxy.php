<?php
/**
 * Created by IntelliJ IDEA.
 * User: clibois
 * Date: 17/03/20
 * Time: 18:06
 */

namespace Viessmann\API\proxy\impl;


use TomPHP\Siren\Entity;
use Viessmann\API\proxy\ViessmannFeatureProxy;
use Viessmann\API\ViessmannApiException;

/**
 * ViessmannFeatureAbstractProxy
 * @package Viessmann\API\proxy\impl\ViessmannFeatureAbstractProxy
 */
abstract class ViessmannFeatureAbstractProxy implements ViessmannFeatureProxy
{

    const OPERATIONAL_DATA_INSTALLATIONS = "equipment/installations/";
    
    /**
     * featureHeatingBaseUrl
     */
    protected $featureHeatingBaseUrl;

    /**
     * viessmannClient
     */
    protected $viessmannClient;

    /**
     * ViessmannFeatureAbstractProxy constructor
     * @param $viessmannClient
     * @param $installationId
     * @param $gatewayId
     * @param  $deviceId
     * @throws ViessmannApiException
     */
    public function __construct($viessmannClient,$installationId,$gatewayId,$deviceId=0)
    {
        $this->viessmannClient = $viessmannClient;
        $this->featureHeatingBaseUrl = self::OPERATIONAL_DATA_INSTALLATIONS . $installationId . "/gateways/" . $gatewayId . "/devices/" . $deviceId . "/features";
    }

    /**
     * setData
     * @param $feature
     * @param $action
     * @param $data
     * @throws ViessmannApiException
     */
    public function setData($feature, $action, $data)
    {
        try {
            $response = json_decode($this->viessmannClient->setData($this->featureHeatingBaseUrl . "/" . $feature . "/" . $action, $data), true);
            if (isset($response["statusCode"])) {
                throw new ViessmannApiException("\n\t Unable to set data for feature" . $feature . " and action " . $action . " and data" . $data . "\n\t Reason: " . $response["message"], 1);
            }
        } catch (TokenResponseException $e) {
            throw new ViessmannApiException("\n\t Unable to set data for feature" . $feature . " and action " . $action . " and data" . $data . " \n\t Reason: " . $e->getMessage(), 1, $e);
        }
    }
}