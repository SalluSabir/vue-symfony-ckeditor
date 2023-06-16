<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest;


class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="default")
     */
    public function index(): Response
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * Upload Image
     *
     * @Rest\Post("/api/articles-upload-file-image", name="api_article_upload_file_image")
     *
     * @param Request $request
     *
     * @return JsonResponse
     * @throws \Exception
     */
    public function uploadFileImage(Request $request): JsonResponse
    {
        $photo = $request->files->get('upload');
        if ($photo instanceof UploadedFile) {
            $uri = $this->uploadPhoto($photo, $request);
            return new JsonResponse([
                'uploaded' => true,
                'url' => $uri,
            ]);
        }
        return new JsonResponse([
            'uploaded' => false,
            'error' => [
                'message' => 'Image was not uploaded',
            ]
        ]);
    }

    private function uploadPhoto(UploadedFile $photo, $request){
        $file = $photo->move($this->getParameter('upload_path'), uniqid().'.'.$photo->guessExtension());

        return $request->getSchemeAndHttpHost() . $this->getParameter('upload_dir') . $file->getFilename();
    }
}
