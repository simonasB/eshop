<?php
/**
 * Created by PhpStorm.
 * User: simonas_b
 * Date: 9/23/2016
 * Time: 5:58 PM
 */

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use VartotojasBundle\Entity\Vartotojas;
use VartotojasBundle\Form\RegisterFormType;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class RegisterController extends Controller
{
    /**
     * @Route("/register", name="user_register")
     * @Template
     */
    public function registerAction(Request $request)
    {
        $user = new User();
        $user->setUsername('Leia');

        $form = $this->createForm(new RegisterFormType(), $user);

        $form->handleRequest($request);
        if ($form->isValid()) {
            $user = $form->getData();

            $user->setPassword(
                $this->encodePassword($user, $user->getPlainPassword())
            );

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $request->getSession()
                ->getFlashBag()
                ->add('success', 'Welcome to the Death Star! Have a magical day!')
            ;

            $this->authenticateUser($user);

            $url = $this->generateUrl('event');

            return $this->redirect($url);
        }

        return array('form' => $form->createView());
    }

    private function encodePassword(Vartotojas $vartotojas, $plainPassword)
    {
        $encoder = $this->container->get('security.encoder_factory')
            ->getEncoder($vartotojas);

        return $encoder->encodePassword($plainPassword, $vartotojas->getSalt());
    }

    private function authenticateUser(User $user)
    {
        $providerKey = 'secured_area'; // your firewall name
        $token = new UsernamePasswordToken($user, null, $providerKey, $user->getRoles());

        $this->container->get('security.context')->setToken($token);
    }
}