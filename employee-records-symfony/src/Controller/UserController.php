<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Model\Database;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{



    /**
     * UserController constructor.
     */
    public function __construct()
    {


    }


    /**
     * @Route("list/", name="user_list")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function actionList(Request $request)
    {
        $query = $request->get('query');

        $emploees = $this->getDoctrine()
            ->getRepository(Employee::class)
            ->findAll();

        return $this->render('employee/list.html.twig', [
            'employees' => $emploees,
            'query' => $query
        ]);
    }

    /**
     * @Route("show/{id}", name="user_detail", requirements={"id": "\d+"})
     *
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function actionDetail($id)
    {
        $emploee = $this->getDoctrine()
            ->getRepository(Employee::class)->find($id);

        if ($emploee === null)
            throw $this->createNotFoundException();
        return $this->render('employee/detail.html.twig', [
            'employee' => $emploee,
        ]);
    }

    /**
     * @Route("show/accounts/{id}", name="user_accounts", requirements={"id": "\d+"})
     *
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function actionDetailAccounts($id)
    {
        $emploee = $this->getDoctrine()
            ->getRepository(Employee::class)->find($id);

        if ($emploee === null)
            throw $this->createNotFoundException();
        return $this->render('employee/accounts.html.twig', [
            'employee' => $emploee,
        ]);
    }
}
