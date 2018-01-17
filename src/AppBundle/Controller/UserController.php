<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\User;


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

    /**
     * @param User $user
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/detail/{id}",name="userdetail")
     */
    public function detailAction(User $user,Request $request)
    {
        return $this->render(':user:detail.html.twig',[
            'user' => $user,
        ]);
    }



}