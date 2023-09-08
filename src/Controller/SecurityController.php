<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    private $security;
    public function __construct(Security $security) {
        $this->security = $security;
    }
   /**
     * Connexion
     *
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    #[Route('/', name: 'security.login', methods: ['GET', 'POST'])]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {

        if($this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('app_etudiant_index');
        }

        return $this->render('security/login.html.twig', [
            'last_username' => $authenticationUtils->getLastUsername(),
            'error' => $authenticationUtils->getLastAuthenticationError()
        ]);

    }

    
    #[Route('/deconnexion', name: 'security.logout')]
    public function logout()
    {
        
    }
}
