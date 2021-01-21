<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    //Tutorial: https://www.youtube.com/watch?v=Bo0guUbL5uo&t=5906s



    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('main/index.html.twig');
    }

    /**
     * @Route("/o_mne", name="about")
     */
    public function about(): Response
    {
        return $this->render('main/index.html.twig');
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
        return $this->render('main/custom.html.twig', ['name' => $name]);
    }
}
