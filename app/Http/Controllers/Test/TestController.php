<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use PhpOffice\PhpPresentation\PhpPresentation;
use PhpOffice\PhpPresentation\IOFactory;
use PhpOffice\PhpPresentation\Style\Color;
use PhpOffice\PhpPresentation\Style\Alignment;

class TestController extends Controller
{
    public function ppt()
    {
        $objPHPPowerPoint = new PhpPresentation();

// Create slide
        $currentSlide = $objPHPPowerPoint->getActiveSlide();

// Create a shape (drawing)
        $shape = $currentSlide->createDrawingShape();
        $shape
//            ->setName('PHPPresentation logo')
//            ->setDescription('PHPPresentation logo')
            ->setPath(public_path('image\icanfly.jpg'))
            ->setHeight(36)
            ->setOffsetX(10)
            ->setOffsetY(10);
        $shape->getShadow()->setVisible(true)
            ->setDirection(45)
            ->setDistance(10);

// Create a shape (text)
        $shape = $currentSlide->createRichTextShape()
            ->setHeight(300)
            ->setWidth(600)
            ->setOffsetX(170)
            ->setOffsetY(180);
        $shape->getActiveParagraph()->getAlignment()->setHorizontal( Alignment::HORIZONTAL_CENTER );
        $textRun = $shape->createTextRun('Thank you for using PHPPresentation!');
        $textRun->getFont()->setBold(true)
            ->setSize(12)
            ->setColor( new Color( 'FFE06B20' ) );

        // Create slide
        $tableSlide = $objPHPPowerPoint->createSlide();

        $oWriterPPTX = IOFactory::createWriter($objPHPPowerPoint, 'PowerPoint2007');
        $oWriterPPTX->save(__DIR__ . "/sample.pptx");
    }
}