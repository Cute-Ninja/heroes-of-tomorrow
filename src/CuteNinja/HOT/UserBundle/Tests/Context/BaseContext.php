<?php

namespace CuteNinja\HOT\UserBundle\Tests\Context;

use CuteNinja\ParabolaBundle\Tests\Feature\Context\BaseContext as ParabolaBaseContext;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

/**
 * Class BaseContext
 *
 * @package CuteNinja\HOT\UserBundle\Tests\Context
 */
class BaseContext extends ParabolaBaseContext
{
    /**
     * @var string
     *
     * @ToRemind: On change of this value remember to update User fixtures
     */
    const DEFAULT_PASSWORD = 'Jp1vn7x6sq';

    /**
     * @var string
     */
    private $authorizationHeaderPrefix = 'Bearer';

    /**
     * {@inheritdoc}
     */
    protected static function createKernel(array $options = [])
    {
        return new \AppKernel('test', false);
    }

    /**
     * @param string $username
     *
     * @Given I am the Player named :username
     */
    public function iAmAPlayerOfHOT($username)
    {
        $this->buildAuthenticatedUser($username);
    }

    /**
     * @Then the response should contain :value
     */
    public function responseShouldContain($value)
    {
        $this->assertContains($value, $this->response->getContent());
    }

    /**
     * @param string $username
     */
    private function buildAuthenticatedUser($username)
    {
        $authenticationClient = static::createClient();
        $authenticationClient->request(
            'POST',
            $this->generateUrl('api_login_check'),
            [
                'username'    => $username,
                'password' => self::DEFAULT_PASSWORD,
            ]
        );

        $response = $authenticationClient->getResponse();
        if ($response->getStatusCode() !== Response::HTTP_OK) {
            throw new AuthenticationException($response->getContent());
        }

        $data         = json_decode($response->getContent(), true);
        $this->client = static::createClient(
            [],
            ['HTTP_Authorization' => sprintf('%s %s', $this->authorizationHeaderPrefix, $data['token'])]
        );

        $this->response = $this->client->getResponse();
    }

    /**
     * @param string $route
     * @param array  $parameters
     * @param int    $referenceType
     *
     * @return string
     */
    protected function generateUrl($route, array $parameters = [], $referenceType = UrlGeneratorInterface::ABSOLUTE_PATH)
    {
        return $this->getContainer()->get('router')->generate($route, $parameters, $referenceType);
    }
}
