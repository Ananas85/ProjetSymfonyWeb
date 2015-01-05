<?php
namespace ProjetWeb\ClassiqueBundle\Amazon;

use ApaiIO\Configuration\GenericConfiguration;
use ApaiIO\Operations\Search;
use ApaiIO\ApaiIO;
use Doctrine\ORM\EntityManager;
use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Pagerfanta;
use ProjetWeb\ClassiqueBundle\Entity\Musicien;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Dump\Container;

class AmazonMusicSearch
{

    private $apioIO;

    private $search;

    private $serviceContainer;

    private $entityManager;

    public function __construct(ContainerInterface $container, EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->serviceContainer = $container;
        $country = $this->serviceContainer->getParameter('locale');
        $amazonAPIKEY = $this->serviceContainer->getParameter('amazon_api_key');
        $amazonSecretKey = $this->serviceContainer->getParameter('amazon_api_secret_key');
        $associatetag = $this->serviceContainer->getParameter('amazon_api_associate_tag');

        $conf = new GenericConfiguration();
        $conf->setCountry("{$country}");
        $conf->setAccessKey($amazonAPIKEY);
        $conf->setSecretKey($amazonSecretKey);
        $conf->setAssociateTag($associatetag);
        $conf->setRequest('\ApaiIO\Request\Soap\Request');
        $conf->setResponseTransformer('\ApaiIO\ResponseTransformer\ObjectToArray');

        $this->apioIO = new ApaiIO($conf);
        $this->search = new Search();
        $this->search->setCategory('Music');
    }

    public function search(Musicien $musicien)
    {
        $this->search->setKeywords("{$musicien->getNomPrenomMusicien()}")->setPage(1);
        $formattedResponse = $this->apioIO->runOperation($this->search);

        $res = $formattedResponse['Items']['Item'];

        $maxPages = $formattedResponse['Items']['TotalPages'];
        if ($maxPages > 10)
            $maxPages = 10;

        //exit(var_dump($res));

        for ($page = 2; $page <= $maxPages; $page++) {
            $this->search->setKeywords("{$musicien->getNomPrenomMusicien()}")->setPage($page);
            $formattedResponse = $this->apioIO->runOperation($this->search);

            $res = array_merge($res, $formattedResponse['Items']['Item']);
        }

        $items = [];

        foreach ($res as $rawItem) {
            $item = new \stdClass;
            $item->asin = $rawItem['ASIN'];
            $item->url = $rawItem['DetailPageURL'];
            $item->title = $rawItem['ItemAttributes']['Title'];
            $items[] = $item;
        }

        return $items;
    }
}