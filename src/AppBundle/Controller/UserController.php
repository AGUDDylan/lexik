<?php

namespace AppBundle\Controller;

use AppBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\User;


class UserController extends Controller
{

    /**
     * @return \AppBundle\Manager\UserManager|object
     */
    private function getUserManager()
    {
        return $this->get('app.user.manager');
    }
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
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @Route("/adduser", name="adduser")
     */
    public function newAction(Request $request)
    {

        $userManager = $this->getUserManager();

        $user = $userManager->create();

        $form = $this->createForm(UserType::class,$user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $userManager->save($user);
            return $this->redirectToRoute('userlist');
        }
        return $this->render(':user:new.html.twig',[
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/research", name="research")
     */
    public function searchAction(Request $request)
    {

        $userManager = $this->getUserManager();
        $users = $userManager->find($request->query->get('research'));

        $usergroupManager = $this->get('app.usergroup.manager');
        $groupes = $usergroupManager->find($request->query->get('research'));
        return $this->render(':user:research.html.twig',[
            'users' => $users,
            'groups' =>$groupes,
        ]);
    }

    /**
     * @param User $user
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("/deluser/{id}", name="deluser")
     */
    public function deleteAction(User $user, Request $request)
    {

        $userManager = $this->getUserManager();

        $userManager->delete($user);
        return $this->redirectToRoute('userlist');
    }





}