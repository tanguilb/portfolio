<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 18/03/17
 * Time: 10:09
 */

namespace TLB\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CoreController extends Controller
{
    public function indexAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository('TLBCoreBundle:Skills');
        $skills = $repository->findAll();
        $repo = $this->getDoctrine()->getRepository('TLBCoreBundle:School');
        $schools = $repo->findAll();
        return $this->render("TLBCoreBundle:Core:index.html.twig", array(
            'skills' => $skills,
            'schools' => $schools,
        ));
    }
    
    
}