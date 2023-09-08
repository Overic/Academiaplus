<?php

namespace App\DataFixtures;

use App\Entity\Filiere;
use App\Entity\Niveau;
use App\Entity\Specialite;
use App\Entity\User;
use App\Entity\Sexe;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $user = new User();
        $user->setEmail('admin@gmail.com');
        $user->setPlainPassword('password');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setNom('Specter');
        $user->setPrenom('Harver');
        $manager->persist($user);

        // $Tabfiliere = [
        //     [
        //         'Comptabilité,contole et audit',
        //         'Informatique,réseaux et télécommunication',
        //         'Management international',
        //         'Gestion de projet'
        //     ],
        //     [
        //         'CCA',
        //         'IRT',
        //         'MI',
        //         'GP'
        //     ]

        // ];
        // $fils[]= [];

        // foreach ($Tabfiliere as $nomfil) {
        // for ($i = 0; $i < count($Tabfiliere[0]); $i++) {
        //     $filiere = new Filiere();
        //     $filiere->setNom($Tabfiliere[0][$i]);
        //     $filiere->setSigle($Tabfiliere[1][$i]);
        //     $fils[]= $filiere;
        //     $manager->persist($filiere);
        // }

        /**
         * Niveau
         */

        $Tabniveau = [
            [
                'Licence 1',
                'Licence 2',
                'Licence 3',
                'Master 1',
                'Master 2',
            ],
            [
                'L1',
                'L2',
                'L3',
                'M1',
                'M2'
            ]

        ];

        // foreach ($Tabfiliere as $nomfil) {
        for ($i = 0; $i < count($Tabniveau[0]); $i++) {
            $cycle = new Niveau();
            $cycle->setNom($Tabniveau[0][$i]);
            $cycle->setSigle($Tabniveau[1][$i]);
            $manager->persist($cycle);
        }


        /**
         * specialite
         */

        $Tabspecialite1 = [
            [
                'Architecture logicielle',
                'Systeme, reseau certifié',
                'Sécurité informatique',
            ],
            [
                'AL',
                'SRC',
                'SI',
            ],
        ];

        $Tabspecialite2 =[
            [
                'Gestion comptable',
                'Audit certifié',
                'Comptabilité et controle',
            ],
            [
                'GC',
                'AC',
                'CC',
            ],
        ];
        
        // foreach ($Tabfiliere as $nomfil) {
        for ($i = 0; $i < count($Tabspecialite1[0]); $i++) {
            $specialite = new Specialite;
            $specialite->setNom($Tabspecialite1[0][$i]);
            $specialite->setSigle($Tabspecialite1[1][$i]);
            // $specialite->setFiliere($fils[2]);
            $manager->persist($specialite);
        }

        for ($i = 0; $i < count($Tabspecialite2[0]); $i++) {
            $specialite = new specialite();
            $specialite->setNom($Tabspecialite2[0][$i]);
            $specialite->setSigle($Tabspecialite2[1][$i]);
            // $specialite->setFiliere($fils[1]);
            $manager->persist($specialite);
        }

        /**
         * Sexe
         */
        $Tabsexe = [
            [
                'Masculin',
                'Féminin',
            ],
            [
                'M',
                'F',
            ],
        ];

    for($i = 0; $i < count($Tabsexe[0]); $i++){
        $sexe = new Sexe();
        $sexe->setNom($Tabsexe[0][$i]);
        $sexe->setSigle($Tabsexe[1][$i]);
        $manager->persist($sexe);
    }
    
        $manager->flush();
    }
}