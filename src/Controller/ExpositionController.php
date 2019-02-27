<?php

namespace App\Controller;

use App\Entity\Exposition;
use App\Form\ExpositionType;
use App\Repository\ExpositionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Service\FileUploader;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @Route("/exposition")
 */
class ExpositionController extends AbstractController
{
    /**
     * @Route("/", name="exposition_index", methods={"GET"})
     */
    public function index(ExpositionRepository $expositionRepository): Response
    {
        return $this->render('exposition/index.html.twig', [
            'expositions' => $expositionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="exposition_new", methods={"GET","POST"})
     */
    public function new(Request $request, FileUploader $fileUploader): Response
    {
        $exposition = new Exposition();
        $form = $this->createForm(ExpositionType::class, $exposition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $exposition->setPoster($fileUploader->upload($form['poster']->getData()));

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($exposition);
            $entityManager->flush();

            return $this->redirectToRoute('exposition_index');
        }

        return $this->render('exposition/new.html.twig', [
            'exposition' => $exposition,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="exposition_show", methods={"GET"})
     */
    public function show(Exposition $exposition): Response
    {
        return $this->render('exposition/show.html.twig', [
            'exposition' => $exposition,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="exposition_edit", methods={"GET","POST"})
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     */
    public function edit(Request $request, Exposition $exposition, FileUploader $fileUploader): Response
    {
        $current_poster = $exposition->getPoster();

        $exposition->setPoster(
            new File($this->getParameter('img_directory') . '/' . $exposition->getPoster())
        );

        $form = $this->createForm(ExpositionType::class, $exposition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if (is_null($exposition->getPoster())) {
                $exposition->setPoster($current_poster);
            }

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('exposition_index', [
                'id' => $exposition->getId(),
            ]);
        }

        return $this->render('exposition/edit.html.twig', [
            'exposition' => $exposition,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="exposition_delete", methods={"DELETE"})
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     */
    public function delete(Request $request, Exposition $exposition): Response
    {
        if ($this->isCsrfTokenValid('delete'.$exposition->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($exposition);
            $entityManager->flush();
        }

        return $this->redirectToRoute('exposition_index');
    }
}
