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
        return new Response('<h1>Čus</h1>');
    }


    /**
     * @Route("/custom/{name?}", name="custom")
     * @param Request $request
     * @return Response
     */
    public function customFunction(Request $request) {
        
        dump($request);//nefunguje sračka
        $name = $request->get('name');
        return new Response('<h1>Custom '.$name.'</h1>');
    }
}
