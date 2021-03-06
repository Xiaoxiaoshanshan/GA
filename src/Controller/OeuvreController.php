<?php

namespace App\Controller;

use App\Entity\Oeuvre;
use App\Form\OeuvreType;
use App\Repository\OeuvreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Service\FileUploader;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @Route("/oeuvre")
 */
class OeuvreController extends AbstractController
{
    /**
     * @Route("/", name="oeuvre_index", methods={"GET"})
     */
    public function index(OeuvreRepository $oeuvreRepository): Response
    {
        return $this->render('oeuvre/index.html.twig', [
            'oeuvres' => $oeuvreRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="oeuvre_new", methods={"GET","POST"})
     */
    public function new(Request $request, FileUploader $fileUploader): Response
    {
        $oeuvre = new Oeuvre();
        $form = $this->createForm(OeuvreType::class, $oeuvre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $oeuvre->setImg($fileUploader->upload($form['img']->getData()));

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($oeuvre);
            $entityManager->flush();

            return $this->redirectToRoute('oeuvre_index');
        }

        return $this->render('oeuvre/new.html.twig', [
            'oeuvre' => $oeuvre,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="oeuvre_show", methods={"GET"})
     */
    public function show(Oeuvre $oeuvre): Response
    {
        return $this->render('oeuvre/show.html.twig', [
            'oeuvre' => $oeuvre,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="oeuvre_edit", methods={"GET","POST"})
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     */
    public function edit(Request $request, Oeuvre $oeuvre, FileUploader $fileUploader): Response
    {  
        
        $current_img = $oeuvre->getImg();
        $oeuvre->setImg(
            new File($this->getParameter('img_directory') . '/' . $oeuvre->getImg())
        );
       
        $form = $this->createForm(OeuvreType::class, $oeuvre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            if (is_null($oeuvre->getImg())) {
                $oeuvre->setImg($current_img);
            }

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('oeuvre_index', [
                'id' => $oeuvre->getId(),
            ]);

        }

        return $this->render('oeuvre/edit.html.twig', [
            'oeuvre' => $oeuvre,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="oeuvre_delete", methods={"DELETE"})
        * @IsGranted("IS_AUTHENTICATED_FULLY")
     */
    public function delete(Request $request, Oeuvre $oeuvre): Response
    { 
       
        if ($this->isCsrfTokenValid('delete'.$oeuvre->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($oeuvre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('oeuvre_index');
    }
}
