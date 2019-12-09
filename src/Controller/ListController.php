<?php

namespace App\Controller;

use App\Entity\LList;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\LListRepository;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Request\ParamFetcher;

class ListController extends AbstractFOSRestController
{

    private $listRepository;
    private $entityManager;

    public function __construct(LListRepository $listRepository, EntityManagerInterface $entityManager)
    {
        $this->listRepository = $listRepository;
        $this->entityManager = $entityManager;
    }

    /**
     * @Rest\Get("/lists", name="get_lists")
     */
    public function getLists()
    {
        $data = $this->listRepository->findAll();
        return $this->view($data, Response::HTTP_OK);
    }

    /**
     * @Rest\Post("/list/add")\RequestParam(name="title", description="Title of List", nullable=false)
     */
    public function addList(ParamFetcher $paramFetcher)
    {
        $title = $paramFetcher->get('title');
        if(!$title){
            return $this->view(['error' => 'title cannot be empty'], Response::HTTP_BAD_REQUEST);
        }
        $list = new LList;
        $list->setTitle('Test List');
        $this->entityManager->persist($list);
        $this->entityManager->flush();

        return $this->view($list, Response::HTTP_CREATED);
    }

}
