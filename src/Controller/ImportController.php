<?php

namespace App\Controller;

use App\Entity\FileObject;
use ApiPlatform\Core\Api\IriConverterInterface;
// use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

use \PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;



class ImportController extends AbstractController
{
    public function _construct(){
        
    }
    public function __invoke(Request $request): FileObject
    {
        $uploadedFile = $request->files->get('file');
        if (!$uploadedFile) {
            throw new BadRequestHttpException('"file" is required');
        }

        $fileObject = new FileObject();
        $fileObject->file = $uploadedFile;
        return $fileObject;
    }
}
