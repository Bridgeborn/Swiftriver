<?php
namespace Swiftriver\Core\Workflows\ContentServices;
/**
 * @author mg[at]swiftly[dot]org
 */
class ContentServicesBase extends \Swiftriver\Core\Workflows\WorkflowBase
{
    public function ParseJSONToLooseParameters($json)
    {
        $rawParams = json_decode($json);

        $properties = array (
            "state", "minVeracity", "maxVeracity", "type", "subType",
            "source", "pageSize", "pageStart", "orderBy", 
        );

        $params = array();

        foreach($properties as $property) 
            $params[$property] = (isset($rawParams->$property))
                    ? $rawParams->$property
                    : null;

        return $params;
    }

    public function ParseContentToJSON($content)
    {
        if(!isset($content) || !is_array($content) || count($content) < 1)
            return "[]";

        $json = "[";

        foreach($content as $item) 
            $json .= json_encode($item).",";
        
        $json = rtrim($json, ",")."]";

        return $json;
    }

    public function ParseJSONToContentID($json)
    {
        $logger = \Swiftriver\Core\Setup::GetLogger();
        $logger->log("Core::ServiceAPI::ContentServices::ContentServicesBase::ParseJSONToContentID [Method invoked]", \PEAR_LOG_DEBUG);

        $logger->log("Core::ServiceAPI::ContentServices::ContentServicesBase::ParseJSONToContentID [START: Decoding the JSON]", \PEAR_LOG_DEBUG);

        //call json decode on the json
        $object = json_decode($json);

        //check that the decode worked ok
        if(!$object || $object == null) 
            throw new \InvalidArgumentException("The JSON supplied did not descode.");

        $logger->log("Core::ServiceAPI::ContentServices::ContentServicesBase::ParseJSONToContentID [END: Decoding the JSON]", \PEAR_LOG_DEBUG);

        $logger->log("Core::ServiceAPI::ContentServices::ContentServicesBase::ParseJSONToContentID [START: Extracting required data]", \PEAR_LOG_DEBUG);

        //Extract the required field ID
        $id = $object->id;

        //Check that the id is set and is a string
        if(!$id || !isset($id) || $id == null || !is_string($id)) 
            throw new \InvalidArgumentException("The JSON supplied did not containt the required string field 'id'.");

        $logger->log("Core::ServiceAPI::ContentServices::ContentServicesBase::ParseJSONToContentID [END: Extracting required data]", \PEAR_LOG_DEBUG);

        $logger->log("Core::ServiceAPI::ContentServices::ContentServicesBase::ParseJSONToContentID [Method finished]", \PEAR_LOG_DEBUG);
        
        //return the id
        return $id;
    }

    public function ParseJSONToMarkerID($json)
    {
        $logger = \Swiftriver\Core\Setup::GetLogger();
        $logger->log("Core::ServiceAPI::ContentServices::ContentServicesBase::ParseJSONToMarkerID [Method invoked]", \PEAR_LOG_DEBUG);

        $logger->log("Core::ServiceAPI::ContentServices::ContentServicesBase::ParseJSONToMarkerID [START: Decoding the JSON]", \PEAR_LOG_DEBUG);

        //call json decode on the json
        $object = json_decode($json);

        //check that the decode worked ok
        if(!$object || $object == null)
            throw new \InvalidArgumentException("The JSON supplied did not descode.");

        $logger->log("Core::ServiceAPI::ContentServices::ContentServicesBase::ParseJSONToMarkerID [END: Decoding the JSON]", \PEAR_LOG_DEBUG);

        $logger->log("Core::ServiceAPI::ContentServices::ContentServicesBase::ParseJSONToMarkerID [START: Extracting required data]", \PEAR_LOG_DEBUG);

        //Extract the required field ID
        $id = $object->markerId;

        //Check that the id is set and is a string
        if(!$id || !isset($id) || $id == null || !is_string($id))
            throw new \InvalidArgumentException("The JSON supplied did not containt the required string field 'markerId'.");

        $logger->log("Core::ServiceAPI::ContentServices::ContentServicesBase::ParseJSONToMarkerID [END: Extracting required data]", \PEAR_LOG_DEBUG);

        $logger->log("Core::ServiceAPI::ContentServices::ContentServicesBase::ParseJSONToMarkerID [Method finished]", \PEAR_LOG_DEBUG);

        //return the id
        return $id;
    }

    public function ParseJSONToMinVeracity($json)
    {
        $logger = \Swiftriver\Core\Setup::GetLogger();
        $logger->log("Core::ServiceAPI::ContentServices::ContentServicesBase::ParseJSONToMinVeracity [Method invoked]", \PEAR_LOG_DEBUG);

        $logger->log("Core::ServiceAPI::ContentServices::ContentServicesBase::ParseJSONToMinVeracity [START: Decoding the JSON]", \PEAR_LOG_DEBUG);

        //call json decode on the json
        $object = json_decode($json);

        //check that the decode worked ok
        if(!$object || $object == null)
            throw new \InvalidArgumentException("The JSON supplied did not descode.");

        $logger->log("Core::ServiceAPI::ContentServices::ContentServicesBase::ParseJSONToMinVeracity [END: Decoding the JSON]", \PEAR_LOG_DEBUG);

        $logger->log("Core::ServiceAPI::ContentServices::ContentServicesBase::ParseJSONToMinVeracity [START: Extracting required data]", \PEAR_LOG_DEBUG);

        $minVeracity = (int) $object->minVeracity;

        if(!is_numeric($minVeracity))
            throw new \InvalidArgumentException("The JSON supplied did not containt the required string field 'minVeracity'.");

        $logger->log("Core::ServiceAPI::ContentServices::ContentServicesBase::ParseJSONToMinVeracity [END: Extracting required data]", \PEAR_LOG_DEBUG);

        $logger->log("Core::ServiceAPI::ContentServices::ContentServicesBase::ParseJSONToMinVeracity [Method finished]", \PEAR_LOG_DEBUG);

        return $minVeracity;
    }

    public function ParseJSONToMaxVeracity($json)
    {
        $logger = \Swiftriver\Core\Setup::GetLogger();
        $logger->log("Core::ServiceAPI::ContentServices::ContentServicesBase::ParseJSONTomaxVeracity [Method invoked]", \PEAR_LOG_DEBUG);

        $logger->log("Core::ServiceAPI::ContentServices::ContentServicesBase::ParseJSONTomaxVeracity [START: Decoding the JSON]", \PEAR_LOG_DEBUG);

        //call json decode on the json
        $object = json_decode($json);

        //check that the decode worked ok
        if(!$object || $object == null)
            throw new \InvalidArgumentException("The JSON supplied did not descode.");

        $logger->log("Core::ServiceAPI::ContentServices::ContentServicesBase::ParseJSONTomaxVeracity [END: Decoding the JSON]", \PEAR_LOG_DEBUG);

        $logger->log("Core::ServiceAPI::ContentServices::ContentServicesBase::ParseJSONTomaxVeracity [START: Extracting required data]", \PEAR_LOG_DEBUG);

        $maxVeracity = (int) $object->maxVeracity;

        if(!$maxVeracity || !isset($maxVeracity) || $maxVeracity == null || !is_numeric($maxVeracity))
            throw new \InvalidArgumentException("The JSON supplied did not containt the required string field 'maxVeracity'.");

        $logger->log("Core::ServiceAPI::ContentServices::ContentServicesBase::ParseJSONTomaxVeracity [END: Extracting required data]", \PEAR_LOG_DEBUG);

        $logger->log("Core::ServiceAPI::ContentServices::ContentServicesBase::ParseJSONTomaxVeracity [Method finished]", \PEAR_LOG_DEBUG);

        return $maxVeracity;
    }

    public function ParseJSONToInacurateReason($json)
    {
        $logger = \Swiftriver\Core\Setup::GetLogger();
        $logger->log("Core::ServiceAPI::ContentServices::ContentServicesBase::ParseJSONToInacurateReason [Method invoked]", \PEAR_LOG_DEBUG);

        $logger->log("Core::ServiceAPI::ContentServices::ContentServicesBase::ParseJSONToInacurateReason [START: Decoding the JSON]", \PEAR_LOG_DEBUG);

        //call json decode on the json
        $object = json_decode($json);

        //check that the decode worked ok
        if(!$object || $object == null)
            throw new \InvalidArgumentException("The JSON supplied did not descode.");

        $logger->log("Core::ServiceAPI::ContentServices::ContentServicesBase::ParseJSONToInacurateReason [END: Decoding the JSON]", \PEAR_LOG_DEBUG);

        $logger->log("Core::ServiceAPI::ContentServices::ContentServicesBase::ParseJSONToInacurateReason [START: Extracting required data]", \PEAR_LOG_DEBUG);

        //Extract the required field ID
        $reason = $object->reason;

        //Check that the id is set and is a string
        if(!$reason || !isset($reason) || $reason == null || !is_string($reason))
            throw new \InvalidArgumentException("The JSON supplied did not containt the required string field 'reason'.");

        //check that this is a recognised reason
        if(!\Swiftriver\Core\StateTransition\StateController::IsValidInacurateReason($reason))
            throw new \InvalidArgumentException("The JSON supplied did not containt a valid 'reason'.");

        $logger->log("Core::ServiceAPI::ContentServices::ContentServicesBase::ParseJSONToInacurateReason [END: Extracting required data]", \PEAR_LOG_DEBUG);

        $logger->log("Core::ServiceAPI::ContentServices::ContentServicesBase::ParseJSONToInacurateReason [Method finished]", \PEAR_LOG_DEBUG);

        //return the id
        return $reason;
    }
}
?>
