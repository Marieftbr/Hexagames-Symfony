<?php


namespace App\Service;


use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
    private $uploadDir;

    public function __construct(ParameterBagInterface $parameterBag)
    {
        $this->uploadDir = $parameterBag->get('kernel.project_dir').'/public/uploads';
    }

    public function upload(UploadedFile $uploadedFile)
    {
        $filename = uniqid().'.'.$uploadedFile->guessExtension();
        $uploadedFile->move($this->uploadDir, $filename);

        return '/uploads/'.$filename;
    }
}