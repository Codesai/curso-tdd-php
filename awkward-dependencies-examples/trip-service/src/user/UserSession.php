<?php

namespace Codesai\TDD\TripService\user;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class UserSession
{
    private static ?UserSession $instance = null;
    private Client $httpClient;

    private function __construct()
    {
        $this->httpClient = new Client();
    }

    public static function getInstance(): UserSession
    {
        if (self::$instance === null) {
            self::$instance = new UserSession();
        }
        return self::$instance;
    }

    public function getLoggedUser(): ?User
    {
        try {
            $requestUri = "https://trip-service.nanana/client-2038/logged-user/";
            $response = $this->httpClient->get($requestUri);

            if ($response->getStatusCode() === 200) {
                $name = (string)$response->getBody();
                if (!empty($name)) {
                    return new User($name);
                }
            }

            return null;
        } catch (RequestException $e) {
            throw new \Exception("Unable to recover session: " . $e->getMessage(), $e->getCode(), $e);
        }
    }
}