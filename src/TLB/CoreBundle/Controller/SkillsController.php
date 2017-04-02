<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 19/03/17
 * Time: 09:25
 */

namespace TLB\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;
use TLB\CoreBundle\Entity\Skills;

class SkillsController extends Controller
{
    public function newAction(Request $request)
    {
        $skill = new Skills();
        $form = $this->createForm('TLBCoreBundle\Form\SkillsType', $skill);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($skill);
            $em->flush($skill);

            return $this->redirectToRoute('core_homepage');
        }

        return $this->render(':skills:new.html.twig', array(
            'form' => $form->createView(),
            'skill' => $skill,
        ));
    }


}