<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class ArticleController extends AbstractController
{
    /**
     * @Route("/profile/add_article", name="add_article")
     */
    public function add_article(Request $request): Response
    {
        $response = new Response();
        
        if($request->isXmlHttpRequest()){
            $files_in_request = $request->files;
            
            $images = $files_in_request->get('file_images');
            $fichiers = $files_in_request->get('file_files');
            
            $result = "ok";
            $tab_ext_image = ["jpg", "JPG", "jpeg", "png", "PNG"];
            $tab_ext_fichier = ["txt", "pdf", "doc", "docm", "docx", "html", "xml"];
            $tab_ext_video = ["avi", "mov", "mkv", "mp4", "3gp", "AVI", "MOV", "MP4"];
            if ($images) {
                foreach($images as $image){
                    if(in_array($image->guessExtension(), $tab_ext_image)){
                        $originalFilename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
               
                        $newFilename = uniqid() . '.' . $image->guessExtension();

                        try {
                            $image->move(
                                $this->getParameter('images_article'),
                                $newFilename
                            );
                            $data = $newFilename;
                        } catch (FileException $e) {
                            $data = "error";
                        }
                    }
                }
                $result = $data;
            }

            if ($fichiers) {
                foreach($fichiers as $fichier){
                    
                    if(in_array($fichier->guessExtension(), $tab_ext_fichier)){
                        $originalFilename = pathinfo($fichier->getClientOriginalName(), PATHINFO_FILENAME);
               
                        $newFilename = uniqid() . '.' . $fichier->guessExtension();

                        try {
                            $fichier->move(
                                $this->getParameter('fichiers_article'),
                                $newFilename
                            );
                            $data = $newFilename;
                        } catch (FileException $e) {
                            $data = "error";
                        }
                    }
                }
                $result = $data;
            }
            
            $data = json_encode($result);
            $response->headers->set('Content-Type', 'application/json');
            $response->setContent($data);
        }
        
        return $response;
    }
}
