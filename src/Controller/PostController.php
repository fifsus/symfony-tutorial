<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
     * @Route("/post", name="post.")
     */

class PostController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findAll();
        return $this->render('post/index.html.twig', [
            'posts' => $posts,
        ]);
    }
    /**
     * @Route("/show/{id}", name="show")
     */
    public function show(Post $post)//je nějaký param convertor, v twigu jsem sem hodil ID, a ono si to samo dohledá příslušný post - nevím jak
    {
        return $this->render('post/show.html.twig', [
            'post' => $post,
        ]);
    }
    /**
     * @Route("/create", name="create")
     */
    public function create(){
        //vytvořit příspěvek
        $post = new Post(); //Ctrl + Space to choose class
        $form = $this->createForm(PostType::class, $post);



        //entity manager
        // $em = $this->getDoctrine()->getManager();
        // $em->persist($post);
        // $em->flush();

        //response 
        return $this->render(('post/create.html.twig'), [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/remove/{id}", name="remove")
     */
    public function remove(Post $post){
        $em = $this->getDoctrine()->getManager();
        $em->remove($post);
        $em->flush();

        $this->addFlash('success', 'Záznam byl odstraněn');

        return $this->redirect($this->generateUrl('post.index'));
    }
}
