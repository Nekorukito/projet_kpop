<?php

namespace App\Controller;

use App\Entity\Album;
use App\Entity\Artiste;
use App\Entity\Chanson;
use App\Entity\Groupe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $albums = $em->getRepository(Album::class)->findByAccueil();
        $groupes = $em->getRepository(Groupe::class)->findByAccueil();
        return $this->render('default/index.html.twig', [
            'groupes'=>$groupes,
            'albums'=>$albums,
        ]);
    }

    /**
     * @Route("/groupes", name="groupes")
     */
    public function groupes()
    {
        $em = $this->getDoctrine()->getManager();
        $groupes = $em->getRepository(Groupe::class)->findAll();
        return $this->render('default/groupes.html.twig', [
            'groupes' =>$groupes,
        ]);
    }

    /**
     * @Route("/groupe/{id}", name="groupe")
     */
    public function groupe(Groupe $groupe)
    {
        $em = $this->getDoctrine()->getManager();
        $groupe = $em->getRepository(Groupe::class)->find($groupe);
        return $this->render('default/groupe.html.twig', [
            'groupe' =>$groupe,
        ]);
    }

    /**
     * @Route("/artistes", name="artistes")
     */
    public function artistes()
    {
        $em = $this->getDoctrine()->getManager();
        $artistes = $em->getRepository(Artiste::class)->findAll();
        return $this->render('default/artistes.html.twig', [
            'artistes' =>$artistes,
        ]);
    }
    /**
     * @Route("/artiste/{id}", name="artiste")
     */
    public function artiste(Artiste $artiste)
    {
        $em = $this->getDoctrine()->getManager();
        $artiste = $em->getRepository(Artiste::class)->find($artiste);
        return $this->render('default/artiste.html.twig', [
            'artiste' =>$artiste,
        ]);
    }

    /**
     * @Route("/albums", name="albums")
     */
    public function albums()
    {
        $em = $this->getDoctrine()->getManager();
        $albums = $em->getRepository(Album::class)->findAll();
        return $this->render('default/albums.html.twig', [
            'albums' =>$albums,
        ]);
    }
    /**
     * @Route("/album/{id}", name="album")
     */
    public function album(Album $album)
    {
        $em = $this->getDoctrine()->getManager();
        $album = $em->getRepository(Album::class)->find($album);
        return $this->render('default/album.html.twig', [
            'album' =>$album,
        ]);
    }

    /**
     * @Route("/chanson/{id}", name="chanson")
     */
    public function chanson(Chanson $chanson)
    {
        $em = $this->getDoctrine()->getManager();
        $chanson = $em->getRepository(Chanson::class)->find($chanson);
        return $this->render('default/chanson.html.twig', [
            'chanson' =>$chanson,
        ]);
    }
}
