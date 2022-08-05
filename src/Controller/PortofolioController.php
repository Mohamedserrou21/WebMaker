<?php

namespace App\Controller;

use App\Entity\Portofolio;
use App\Form\PortofolioType;
use App\Repository\PortofolioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/portofolio")
 */
class PortofolioController extends AbstractController
{
    /**
     * @Route("/", name="app_portofolio_index", methods={"GET"})
     */
    public function index(PortofolioRepository $portofolioRepository): Response
    {
        return $this->render('portofolio/index.html.twig', [
            'portofolios' => $portofolioRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_portofolio_new", methods={"GET", "POST"})
     */
    public function new(Request $request, PortofolioRepository $portofolioRepository): Response
    {
        $portofolio = new Portofolio();
        $form = $this->createForm(PortofolioType::class, $portofolio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $portofolioRepository->add($portofolio, true);

            return $this->redirectToRoute('app_portofolio_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('portofolio/new.html.twig', [
            'portofolio' => $portofolio,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_portofolio_show", methods={"GET"})
     */
    public function show(Portofolio $portofolio): Response
    {
        return $this->render('portofolio/show.html.twig', [
            'portofolio' => $portofolio,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_portofolio_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Portofolio $portofolio, PortofolioRepository $portofolioRepository): Response
    {
        $form = $this->createForm(PortofolioType::class, $portofolio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $portofolioRepository->add($portofolio, true);

            return $this->redirectToRoute('app_portofolio_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('portofolio/edit.html.twig', [
            'portofolio' => $portofolio,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_portofolio_delete", methods={"POST"})
     */
    public function delete(Request $request, Portofolio $portofolio, PortofolioRepository $portofolioRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$portofolio->getId(), $request->request->get('_token'))) {
            $portofolioRepository->remove($portofolio, true);
        }

        return $this->redirectToRoute('app_portofolio_index', [], Response::HTTP_SEE_OTHER);
    }
}
