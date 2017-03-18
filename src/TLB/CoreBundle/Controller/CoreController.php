<?php
/**
 * Created by PhpStorm.
 * User: tangui
 * Date: 18/03/17
 * Time: 10:09
 */

namespace TLB\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CoreController extends Controller
{
    public function indexAction()
    {
        return $this->render("TLBCoreBundle:Core:index.html.twig");
    }
}