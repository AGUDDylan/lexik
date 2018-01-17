<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class UserController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/", name="userlist")
     */
    public function listAction(Request $request)
    {
    $groups = $this->get('app.usergroup.manager')->getAllGroups();
    return $this->render(':user:list.html.twig',[
        'groups' => $groups,
    ]);
    }



}