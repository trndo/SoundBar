<?php
/**
 * Created by PhpStorm.
 * User: vel-vet
 * Date: 03.08.18
 * Time: 15:04
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LogInController extends AbstractController
{
    /**
     * @Route("/login", name="loginAction")
     */
    public function loginAction(Request $request, AuthenticationUtils $authUtils)
    {
        $error = $authUtils->getLastAuthenticationError();

        $lastUsername = $authUtils->getLastUsername();
        return $this->render('authorization/login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);

    }

}

