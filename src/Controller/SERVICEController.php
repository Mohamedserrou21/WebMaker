<?php

namespace App\Controller;

use App\Entity\SERVICE;
use App\Form\SERVICEType;
use App\Repository\SERVICERepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/service")
 */
class SERVICEController extends AbstractController
{
    /**
     * @Route("/", name="app_s_e_r_v_i_c_e_index", methods={"GET"})
     */
    public function index(SERVICERepository $sERVICERepository): Response
    {


        return $this->render('service/index.html.twig', [
            's_e_r_v_i_c_es' => $sERVICERepository->findAll(),

        ]);
    }

    /**
     * @Route("/new", name="app_s_e_r_v_i_c_e_new", methods={"GET", "POST"})
     */
    public function new(Request $request, SERVICERepository $sERVICERepository): Response
    {
        $sERVICE = new SERVICE();
        $form = $this->createForm(SERVICEType::class, $sERVICE);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sERVICERepository->add($sERVICE, true);

            return $this->redirectToRoute('app_s_e_r_v_i_c_e_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('service/new.html.twig', [
            's_e_r_v_i_c_e' => $sERVICE,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_s_e_r_v_i_c_e_show", methods={"GET"})
     */
    public function show(SERVICE $sERVICE): Response
    {
        return $this->render('service/show.html.twig', [
            's_e_r_v_i_c_e' => $sERVICE,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_s_e_r_v_i_c_e_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, SERVICE $sERVICE, SERVICERepository $sERVICERepository): Response
    {
        $form = $this->createForm(SERVICEType::class, $sERVICE);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sERVICERepository->add($sERVICE, true);

            return $this->redirectToRoute('app_s_e_r_v_i_c_e_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('service/edit.html.twig', [
            's_e_r_v_i_c_e' => $sERVICE,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_s_e_r_v_i_c_e_delete", methods={"POST"})
     */
    public function delete(Request $request, SERVICE $sERVICE, SERVICERepository $sERVICERepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $sERVICE->getId(), $request->request->get('_token'))) {
            $sERVICERepository->remove($sERVICE, true);
        }

        return $this->redirectToRoute('app_s_e_r_v_i_c_e_index', [], Response::HTTP_SEE_OTHER);
    }
}
