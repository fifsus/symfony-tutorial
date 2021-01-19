<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }

    /**
     * @Route("/o_mne", name="about")
     */
    public function about(): Response
    {
        return $this->render('home/index.html.twig');
    }


    /**
     * @Route("/projekty/{project?}", name="projects")
     */
    public function projects(Request $request)
    {
        $project = $request->get('project');
        return $this->render('projects/projects.html.twig');
    }

    /**
     * @Route("/custom/{name?}", name="custom")
     * @param Request $request
     * @return Response
     */
    public function customFunction(Request $request) {
        
        dump($request);//nefunguje sračka
        $name = $request->get('name');
        return $this->render('home/custom.html.twig', ['name' => $name]);
    }
}
