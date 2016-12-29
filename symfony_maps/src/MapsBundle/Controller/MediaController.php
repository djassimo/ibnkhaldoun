<?php

namespace MapsBundle\Controller;

use MapsBundle\Entity\Media;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Medium controller.
 *
 * @Route("media")
 */
class MediaController extends Controller
{
    /**
     * Lists all medium entities.
     *
     * @Route("/", name="media_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $media = $em->getRepository('MapsBundle:Media')->findAll();

        return $this->render('media/index.html.twig', array(
            'media' => $media,
        ));
    }

    /**
     * Creates a new medium entity.
     *
     * @Route("/new", name="media_sub")
     * @Route("/new/{id}", name="media_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $id =null)
    {
        $em = $this->getDoctrine()->getManager();
        $media = new Media();
        $form = $this->createForm('MapsBundle\Form\MediaType', $media);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $media->getImage();
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('files_directory'),
                $fileName
            );

            $media->setImage($fileName);
            $em->persist($media);
            $em->flush($media);

            return $this->redirectToRoute('media_new', array('id' => $id));
        }

        // tous les média de l'article en cours
        $medias = $em->getRepository('MapsBundle:Media')->findBy(array('articleid'=>$id));

        return $this->render('media/new.html.twig', array(
            'media' => $media,
            'form' => $form->createView(),
            'id'=> $id,
            'medias' => $medias,
        ));
    }

    /**
     * Finds and displays a medium entity.
     *
     * @Route("/{id}", name="media_show")
     * @Method("GET")
     */
    public function showAction(Media $media)
    {
        $deleteForm = $this->createDeleteForm($media);

        return $this->render('media/show.html.twig', array(
            'media' => $media,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing medium entity.
     *
     * @Route("/{id}/edit", name="media_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Media $media)
    {
        $deleteForm = $this->createDeleteForm($media);
        $editForm = $this->createForm('MapsBundle\Form\MediaType', $media);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('media_edit', array('id' => $media->getId()));
        }

        return $this->render('media/edit.html.twig', array(
            'media' => $media,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a medium entity.
     *
     * @Route("/{id}", name="media_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Media $media)
    {
        $form = $this->createDeleteForm($media);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($media);
            $em->flush($media);
        }

        return $this->redirectToRoute('media_index');
    }

    /**
     * Creates a form to delete a medium entity.
     *
     * @param Media $medium The medium entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Media $media)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('media_delete', array('id' => $media->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
