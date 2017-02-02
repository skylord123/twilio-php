<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\IpMessaging\V1;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Version;

/**
 * @property string sid
 * @property string accountSid
 * @property string friendlyName
 * @property \DateTime dateCreated
 * @property \DateTime dateUpdated
 * @property string defaultServiceRoleSid
 * @property string defaultChannelRoleSid
 * @property string defaultChannelCreatorRoleSid
 * @property string readStatusEnabled
 * @property string reachabilityEnabled
 * @property string typingIndicatorTimeout
 * @property string consumptionReportInterval
 * @property array webhooks
 * @property string preWebhookUrl
 * @property string postWebhookUrl
 * @property string webhookMethod
 * @property string webhookFilters
 * @property array notifications
 * @property string url
 * @property array links
 */
class ServiceInstance extends InstanceResource {
    protected $_channels = null;
    protected $_roles = null;
    protected $_users = null;

    /**
     * Initialize the ServiceInstance
     * 
     * @param \Twilio\Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid The sid
     * @return \Twilio\Rest\IpMessaging\V1\ServiceInstance 
     */
    public function __construct(Version $version, array $payload, $sid = null) {
        parent::__construct($version);
        
        // Marshaled Properties
        $this->properties = array(
            'sid' => $payload['sid'],
            'accountSid' => $payload['account_sid'],
            'friendlyName' => $payload['friendly_name'],
            'dateCreated' => Deserialize::dateTime($payload['date_created']),
            'dateUpdated' => Deserialize::dateTime($payload['date_updated']),
            'defaultServiceRoleSid' => $payload['default_service_role_sid'],
            'defaultChannelRoleSid' => $payload['default_channel_role_sid'],
            'defaultChannelCreatorRoleSid' => $payload['default_channel_creator_role_sid'],
            'readStatusEnabled' => $payload['read_status_enabled'],
            'reachabilityEnabled' => $payload['reachability_enabled'],
            'typingIndicatorTimeout' => $payload['typing_indicator_timeout'],
            'consumptionReportInterval' => $payload['consumption_report_interval'],
            'webhooks' => $payload['webhooks'],
            'preWebhookUrl' => $payload['pre_webhook_url'],
            'postWebhookUrl' => $payload['post_webhook_url'],
            'webhookMethod' => $payload['webhook_method'],
            'webhookFilters' => $payload['webhook_filters'],
            'notifications' => $payload['notifications'],
            'url' => $payload['url'],
            'links' => $payload['links'],
        );
        
        $this->solution = array(
            'sid' => $sid ?: $this->properties['sid'],
        );
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     * 
     * @return \Twilio\Rest\IpMessaging\V1\ServiceContext Context for this
     *                                                    ServiceInstance
     */
    protected function proxy() {
        if (!$this->context) {
            $this->context = new ServiceContext(
                $this->version,
                $this->solution['sid']
            );
        }
        
        return $this->context;
    }

    /**
     * Fetch a ServiceInstance
     * 
     * @return ServiceInstance Fetched ServiceInstance
     */
    public function fetch() {
        return $this->proxy()->fetch();
    }

    /**
     * Deletes the ServiceInstance
     * 
     * @return boolean True if delete succeeds, false otherwise
     */
    public function delete() {
        return $this->proxy()->delete();
    }

    /**
     * Update the ServiceInstance
     * 
     * @param array|Options $options Optional Arguments
     * @return ServiceInstance Updated ServiceInstance
     */
    public function update($options = array()) {
        return $this->proxy()->update(
            $options
        );
    }

    /**
     * Access the channels
     * 
     * @return \Twilio\Rest\IpMessaging\V1\Service\ChannelList 
     */
    protected function getChannels() {
        return $this->proxy()->channels;
    }

    /**
     * Access the roles
     * 
     * @return \Twilio\Rest\IpMessaging\V1\Service\RoleList 
     */
    protected function getRoles() {
        return $this->proxy()->roles;
    }

    /**
     * Access the users
     * 
     * @return \Twilio\Rest\IpMessaging\V1\Service\UserList 
     */
    protected function getUsers() {
        return $this->proxy()->users;
    }

    /**
     * Magic getter to access properties
     * 
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name) {
        if (array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }
        
        if (property_exists($this, '_' . $name)) {
            $method = 'get' . ucfirst($name);
            return $this->$method();
        }
        
        throw new TwilioException('Unknown property: ' . $name);
    }

    /**
     * Provide a friendly representation
     * 
     * @return string Machine friendly representation
     */
    public function __toString() {
        $context = array();
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.IpMessaging.V1.ServiceInstance ' . implode(' ', $context) . ']';
    }
}