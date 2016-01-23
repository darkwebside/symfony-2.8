<?php

// src/AppBundle/Controller/LoadCsvController.php
namespace AppBundle\Controller;

use Ddeboer\DataImport\Result;
use Ddeboer\DataImport\Workflow;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Response;
use Ddeboer\DataImport\Reader\CsvReader;
use Ddeboer\DataImport\Writer\DoctrineWriter;
use Ddeboer\DataImport\ValueConverter\DateTimeValueConverter;



class LoadCsvController extends Controller
{
    private $filepath;

    private $workflow;

    private $writer;

    private $converter;

    private $resultado;

    /**
     * @Route("/cargadatos", name="cargador_deudores")
     */
    public function indexAction()
    {

        // Inicializamos el objeto file

        try {
            $this->filepath = $this->getFilePath();
            $file = new \SplFileObject($this->filepath);
        } catch (\Exception $e) {

            echo " Se ha producido una Excepción: ", $e->getMessage(), "\n";
        }

        //Declaramos el reader

        $reader = new CsvReader($file);
        //$reader->setStrict(false);
        $reader->setHeaderRowNumber(0);

        // Necesitamos un logger
        $logger = $this->get('logger');
        //Declaramos el Flujo de Trabajo

        // Declaramos el writer

        // Conseguimos el manager de Doctrine
        $em = $this->getDoctrine()->getManager();

        // Generamos el Writter de Doctrine
        $this->writer = new DoctrineWriter($em, 'AppBundle:Deudores');

        // Generamos el converter

        $this->converter = new DateTimeValueConverter('Y-m-d H:i');

        $this->workflow = new Workflow($reader, $logger, 'Importación CSV');

        $this->resultado = $this->workflow
            ->addWriter($this->writer)
            ->setSkipItemOnFailure(true)
            ->addValueConverter('fechaInclusion', $this->converter)
            ->process();
        //  Procesamos el workflow
        //$this->workflow->process();

        $data = array();

        $data['Nombre']=$this->resultado->getName();
        //$data['Total Datos Importados']=$this->resultado->getSuccessCount();
        $data['Fecha Inicio']=$this->resultado->getStartTime();
        $data['Fecha Fin']=$this->resultado->getEndTime();
        $data['Duración']=$this->resultado->getElapsed();
        $data['Número de Errores']=$this->resultado->getErrorCount();
        $data['Tiene Errores']=$this->resultado->hasErrors();
        $data['Tiene Excepciones']=$this->resultado->getExceptions();


         // Finalmente presentamos los datos

        $engine = $this->container->get('templating');
        $content = $engine->render('dataimport/index.html.twig',array('data'=>$data));


        return new Response($content);
    }

    /**
     * Return file path to csv data
     */
    public function getFilePath()
    {
        $finder = new Finder();

        $iterator = $finder
            ->files()
            ->name('*.csv')
            ->depth(0)
            ->size('>= 1K')
            ->in("../app/Resources/excel/");

        foreach ($iterator as $file) {

            $filepath = $file->getRealpath();

        }

        if ($filepath !== "") {
            return $filepath;
        }
        else{
            return false;
        }

    }
}
