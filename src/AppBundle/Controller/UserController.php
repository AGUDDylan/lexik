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

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/research", name="research")
     */
    public function searchAction(Request $request)
    {

        $userManager = $this->get('app.user.manager');
        $users = $userManager->find($request->query->get('research'));

        $usergroupManager = $this->get('app.usergroup.manager');
        $groupes = $usergroupManager->find($request->query->get('research'));
        return $this->render(':user:research.html.twig',[
            'users' => $users,
            'groups' =>$groupes,
        ]);
    }



}