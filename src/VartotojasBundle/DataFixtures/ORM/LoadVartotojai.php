<?php
/**
 * Created by PhpStorm.
 * User: simonas_b
 * Date: 9/23/2016
 * Time: 5:34 PM
 */

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use VartotojasBundle\Entity\Vartotojas;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUsers implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function load(ObjectManager $manager)
    {
        $vartotojas = new Vartotojas();
        $vartotojas->setPrisijungimoVardas('darth');
        $vartotojas->setSlaptazodis($this->encodePassword($vartotojas, 'darthpass'));
        $vartotojas->setElPastas('darth@deathstar.com');
        $vartotojas->setAdresas('Taikos pr. 77-6');
        $vartotojas->setTelefonas('+37063931471');
        $vartotojas->setVardas('Vardas');
        $vartotojas->setPavarde('Pavardis');
        $manager->persist($vartotojas);

        // the queries aren't done until now
        $manager->flush();
    }

    private function encodePassword(Vartotojas $vartotojas, $plainPassword)
    {
        $encoder = $this->container->get('security.encoder_factory')
            ->getEncoder($vartotojas)
        ;

        return $encoder->encodePassword($plainPassword, $vartotojas->getSalt());
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function getOrder()
    {
        return 10;
    }
}