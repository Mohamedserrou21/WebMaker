<?php

namespace App\Test\Controller;

use App\Entity\Portofolio;
use App\Repository\PortofolioRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PortofolioControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private PortofolioRepository $repository;
    private string $path = '/portofolio/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = (static::getContainer()->get('doctrine'))->getRepository(Portofolio::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Portofolio index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'portofolio[titre]' => 'Testing',
            'portofolio[demo]' => 'Testing',
            'portofolio[image]' => 'Testing',
            'portofolio[updatedAt]' => 'Testing',
        ]);

        self::assertResponseRedirects('/portofolio/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Portofolio();
        $fixture->setTitre('My Title');
        $fixture->setDemo('My Title');
        $fixture->setImage('My Title');
        $fixture->setUpdatedAt('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Portofolio');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Portofolio();
        $fixture->setTitre('My Title');
        $fixture->setDemo('My Title');
        $fixture->setImage('My Title');
        $fixture->setUpdatedAt('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'portofolio[titre]' => 'Something New',
            'portofolio[demo]' => 'Something New',
            'portofolio[image]' => 'Something New',
            'portofolio[updatedAt]' => 'Something New',
        ]);

        self::assertResponseRedirects('/portofolio/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getTitre());
        self::assertSame('Something New', $fixture[0]->getDemo());
        self::assertSame('Something New', $fixture[0]->getImage());
        self::assertSame('Something New', $fixture[0]->getUpdatedAt());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Portofolio();
        $fixture->setTitre('My Title');
        $fixture->setDemo('My Title');
        $fixture->setImage('My Title');
        $fixture->setUpdatedAt('My Title');

        $this->repository->add($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/portofolio/');
    }
}
