<?php

namespace App\Controller;

use App\Entity\Knight;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use FOS\RestBundle\Request\ParamFetcher;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class KnightController extends AbstractFOSRestController
{
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    /**
     * @Get("/knights")
     *
     * @return JsonResponse
     */
    public function getKnightsAction()
    {
        $knights = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Knight')
            ->findAll();

        return new JsonResponse($knights);
    }

    /**
     * @Get("/knight/{id}")
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function getKnightAction(Request $request)
    {
        $id = $request->get('id');
        $knight = $this->get('doctrine.orm.entity_manager')
            ->getRepository('App:Knight')
            ->find($id);

        if (!$knight) {
            throw new NotFoundHttpException(sprintf('knight #%d not found.', $id));
        }

        return new JsonResponse($knight);
    }

    /**
     * @Post("/knight")
     * @QueryParam(name="name", requirements="\[^a-zA-Z]+", description="Knight's name.")
     * @QueryParam(name="strength", requirements="\d+", description="Knight's strength.")
     * @QueryParam(name="weaponPower", requirements="\d+", description="Knight's weapon power.")
     * @param ParamFetcher $paramFetcher
     * @return JsonResponse
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function CreateKnight(ParamFetcher $paramFetcher)
    {
        $knight = new Knight();
        $knight->setName($paramFetcher->get('name'));
        $knight->setStrength($paramFetcher->get('strength'));
        $knight->setWeaponPower($paramFetcher->get('weaponPower'));

        $this->em->persist($knight);
        $this->em->flush();

        return new JsonResponse($knight, Response::HTTP_CREATED);
    }
}
