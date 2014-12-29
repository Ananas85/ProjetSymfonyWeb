<?php
namespace ProjetWeb\ClassiqueBundle\Amazon;

use ApaiIO\Configuration\GenericConfiguration;
use ApaiIO\Operations\Search;
use ApaiIO\ApaiIO;
use Doctrine\ORM\EntityManager;
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

        $this->apioIO = new ApaiIO($conf);
        $this->search = new Search();
        $this->search->setCategory('Music');

    }

    public function search(Musicien $musicien)
    {

        $this->search->setKeywords("{$musicien->getNomMusicien()}");
        $formattedResponse = $this->apioIO->runOperation($this->search);

        return $formattedResponse;
    }
}