<?php
namespace YourNamespace\Entity;

/**
 * OAuthAccessToken
 */
class OAuthAccessToken
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $client_id;

    /**
     * @var string
     */
    private $user_id;

    /**
     * @var \DateTime
     */
    private $expires;

    /**
     * @var string
     */
    private $scope;

    /**
     * @var \YourNamespace\Entity\OAuthClient
     */
    private $client;

    /**
     * @var \YourNamespace\Entity\OAuthUser
     */
    private $user;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set token
     *
     * @param string $token
     * @return OAuthAccessToken
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set client_id
     *
     * @param string $clientId
     * @return OAuthAccessToken
     */
    public function setClientId($clientId)
    {
        $this->client_id = $clientId;
        return $this;
    }

    /**
     * Get client_id
     *
     * @return string
     */
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * Set user_id
     *
     * @param string $userIdentifier
     * @return OAuthAccessToken
     */
    public function setUserId($userId)
    {
        $this->user_id = $userId;
        return $this;
    }

    /**
     * Get user_identifier
     *
     * @return string
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set expires
     *
     * @param \DateTime $expires
     * @return OAuthAccessToken
     */
    public function setExpires($expires)
    {
        $this->expires = $expires;
        return $this;
    }

    /**
     * Get expires
     *
     * @return \DateTime
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * Set scope
     *
     * @param string $scope
     * @return OAuthAccessToken
     */
    public function setScope($scope)
    {
        $this->scope = $scope;
        return $this;
    }

    /**
     * Get scope
     *
     * @return string
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * Set client
     *
     * @param \YourNamespace\Entity\OAuthClient $client
     * @return OAuthAccessToken
     */
    public function setClient(\YourNamespace\Entity\OAuthClient $client = null)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * Get client
     *
     * @return \YourNamespace\Entity\OAuthClient
     */
    public function getClient()
    {
        return $this->client;
    }

    public static function fromArray($params)
    {
        $token = new self();
        foreach ($params as $property => $value) {
            $token->$property = $value;
        }
        return $token;
    }

    /**
     * Set user
     *
     * @param \YourNamespace\Entity\OAuthUser $user
     * @return OAuthRefreshToken
     */
    public function setUser(\YourNamespace\Entity\OAuthUser $user = null)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Get user
     *
     * @return \YourNamespace\Entity\OAuthUser
     */
    public function getUser()
    {
        return $this->client;
    }

    public function toArray()
    {
        return [
            'token' => $this->token,
            'client_id' => $this->client_id,
            'user_id' => $this->user_id,
            'expires' => $this->expires,
            'scope' => $this->scope,
        ];
    }
}