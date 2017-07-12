<?php

namespace TLB\CoreBundle\Controller;

use TLB\CoreBundle\Entity\School;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * School controller.
 *
 * @Route("school")
 */
class SchoolController extends Controller
{
    /**
     * Lists all school entities.
     *
     * @Route("/", name="school_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $schools = $em->getRepository('TLBCoreBundle:School')->findAll();

        return $this->render('school/index.html.twig', array(
            'schools' => $schools,
        ));
    }

    /**
     * Creates a new school entity.
     *
     * @Route("/new", name="school_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $school = new School();
        $form = $this->createForm('TLB\CoreBundle\Form\SchoolType', $school);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($school);
            $em->flush($school);

            return $this->redirectToRoute('school_show', array('id' => $school->getId()));
        }

        return $this->render('TLBCoreBundle:school:new.html.twig', array(
            'school' => $school,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a school entity.
     *
     * @Route("/{id}", name="school_show")
     * @Method("GET")
     */
    public function showAction(School $school)
    {
        $deleteForm = $this->createDeleteForm($school);

        return $this->render('TLBCoreBundle:school:show.html.twig', array(
            'school' => $school,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing school entity.
     *
     * @Route("/{id}/edit", name="school_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, School $school)
    {
        $deleteForm = $this->createDeleteForm($school);
        $editForm = $this->createForm('TLB\CoreBundle\Form\SchoolType', $school);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('school_edit', array('id' => $school->getId()));
        }

        return $this->render('school/edit.html.twig', array(
            'school' => $school,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a school entity.
     *
     * @Route("/{id}", name="school_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, School $school)
    {
        $form = $this->createDeleteForm($school);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($school);
            $em->flush($school);
        }

        return $this->redirectToRoute('school_index');
    }

    /**
     * Creates a form to delete a school entity.
     *
     * @param School $school The school entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(School $school)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('school_delete', array('id' => $school->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
