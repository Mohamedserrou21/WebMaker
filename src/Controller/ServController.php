<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\SERVICE;
use App\Form\SERVICEType;
use App\Repository\SERVICERepository;
use App\Repository\PortofolioRepository;
use App\Repository\ContactRepository;
use App\Entity\Contact;
use Symfony\Component\HttpFoundation\Request;


use App\Form\ContactType;

class ServController extends AbstractController
{
    /**
     * @Route("/", name="app_serv")
     */
    public function index(SERVICERepository $sERVICERepository, PortofolioRepository $portofolioRepository): Response
    {

        $i = 0;
        return $this->render('serv/index.html.twig', [
            's_e_r_v_i_c_es' => $sERVICERepository->findAll(),
            'portofolios' => $portofolioRepository->findAll(),

            'i' => $i,

        ]);
    }
}
