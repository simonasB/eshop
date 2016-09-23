<?php

namespace PrekeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use PrekeBundle\Entity\Preke;
use PrekeBundle\Form\PrekeType;

/**
 * Preke controller.
 *
 * @Route("/preke")
 */
class PrekeController extends Controller
{
    /**
     * Lists all Preke entities.
     *
     * @Route("/", name="preke_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $prekes = $em->getRepository('PrekeBundle:Preke')->findAll();

        return $this->render('preke/index.html.twig', array(
            'prekes' => $prekes,
        ));
    }

    /**
     * Creates a new Preke entity.
     *
     * @Route("/new", name="preke_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $preke = new Preke();
        $form = $this->createForm('PrekeBundle\Form\PrekeType', $preke);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($preke);
            $em->flush();

            return $this->redirectToRoute('preke_show', array('id' => $preke->getId()));
        }

        return $this->render('preke/new.html.twig', array(
            'preke' => $preke,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Preke entity.
     *
     * @Route("/{id}", name="preke_show")
     * @Method("GET")
     */
    public function showAction(Preke $preke)
    {
        $deleteForm = $this->createDeleteForm($preke);

        return $this->render('preke/show.html.twig', array(
            'preke' => $preke,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Preke entity.
     *
     * @Route("/{id}/edit", name="preke_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Preke $preke)
    {
        $deleteForm = $this->createDeleteForm($preke);
        $editForm = $this->createForm('PrekeBundle\Form\PrekeType', $preke);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($preke);
            $em->flush();

            return $this->redirectToRoute('preke_edit', array('id' => $preke->getId()));
        }

        return $this->render('preke/edit.html.twig', array(
            'preke' => $preke,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Preke entity.
     *
     * @Route("/{id}", name="preke_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Preke $preke)
    {
        $form = $this->createDeleteForm($preke);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($preke);
            $em->flush();
        }

        return $this->redirectToRoute('preke_index');
    }

    /**
     * Creates a form to delete a Preke entity.
     *
     * @param Preke $preke The Preke entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Preke $preke)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('preke_delete', array('id' => $preke->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
