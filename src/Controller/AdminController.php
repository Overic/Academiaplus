<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Etudiant;
use App\Form\UserFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/dash')]
#[IsGranted('ROLE_USER')]
class AdminController extends AbstractController
{
    
    #[Route('/{id}/edit', name: 'app_profilAdmin')]
    public function profilAdmin(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UserFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $image = $form->get('img')->getData();
            // dd($image);
            if ($image) {
                // Générez un nom de fichier unique
                $imageName = md5(uniqid()) . '.' . $image->guessExtension();

                $image->move(
                    $this->getParameter('image_directory'),
                    $imageName
                );
                $user->setImg($imageName);
            }

            $entityManager->persist($user); 
            $entityManager->flush();
            $this->addFlash('success', 'Le compte admin a été modifié avec succès.');
            return $this->redirectToRoute('app_etudiant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('admin/profileAdmin.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }
}
