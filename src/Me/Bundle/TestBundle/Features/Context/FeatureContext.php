<?php

namespace Me\Bundle\TestBundle\Features\Context;

use Symfony\Component\HttpKernel\KernelInterface;
use Behat\Symfony2Extension\Context\KernelAwareInterface;
use Behat\MinkExtension\Context\MinkContext;

use Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

use Behat\Behat\Event\StepEvent;



/**
 * Feature context.
 */
class FeatureContext extends MinkContext implements KernelAwareInterface
{
    protected $kernel;
    private $parameters;

    /**
     * Initializes context with parameters from behat.yml.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * Sets HttpKernel instance.
     * This method will be automatically called by Symfony2Extension ContextInitializer.
     *
     * @param KernelInterface $kernel
     */
    public function setKernel(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /** @AfterStep */
    public function afterStep(StepEvent $event)
    {
        //time_nanosleep(0, 100000000);
    }

    /** @AfterScenario */
    public function afterScenario($event)
    {
        sleep(2);
    }

    /**
     * @Then /^I should get an email on "([^"]*)"$/
     */
    public function iShouldGetAnEmailOn($email)
    {

        $profile = $this->getSession()->getDriver()->getClient()->getProfile();

        $collector = $profile->getCollector('swiftmailer');

        foreach ($collector->getMessages('default') as $message) {

            if (array_key_exists($email, $message->getTo())) {

                return ;
            }

        }

        throw new \Exception(sprintf('no email to %s', $email));
    }


}
