<?php

namespace App\Test\Controller;

use App\Entity\Demande;
use App\Repository\DemandeRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DemandeControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private DemandeRepository $repository;
    private string $path = '/demande/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = (static::getContainer()->get('doctrine'))->getRepository(Demande::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Demande index');

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
            'demande[societe]' => 'Testing',
            'demande[fullname]' => 'Testing',
            'demande[secteur]' => 'Testing',
            'demande[ville]' => 'Testing',
            'demande[tele]' => 'Testing',
            'demande[email]' => 'Testing',
            'demande[message]' => 'Testing',
            'demande[service]' => 'Testing',
        ]);

        self::assertResponseRedirects('/demande/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Demande();
        $fixture->setSociete('My Title');
        $fixture->setFullname('My Title');
        $fixture->setSecteur('My Title');
        $fixture->setVille('My Title');
        $fixture->setTele('My Title');
        $fixture->setEmail('My Title');
        $fixture->setMessage('My Title');
        $fixture->setService('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Demande');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Demande();
        $fixture->setSociete('My Title');
        $fixture->setFullname('My Title');
        $fixture->setSecteur('My Title');
        $fixture->setVille('My Title');
        $fixture->setTele('My Title');
        $fixture->setEmail('My Title');
        $fixture->setMessage('My Title');
        $fixture->setService('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'demande[societe]' => 'Something New',
            'demande[fullname]' => 'Something New',
            'demande[secteur]' => 'Something New',
            'demande[ville]' => 'Something New',
            'demande[tele]' => 'Something New',
            'demande[email]' => 'Something New',
            'demande[message]' => 'Something New',
            'demande[service]' => 'Something New',
        ]);

        self::assertResponseRedirects('/demande/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getSociete());
        self::assertSame('Something New', $fixture[0]->getFullname());
        self::assertSame('Something New', $fixture[0]->getSecteur());
        self::assertSame('Something New', $fixture[0]->getVille());
        self::assertSame('Something New', $fixture[0]->getTele());
        self::assertSame('Something New', $fixture[0]->getEmail());
        self::assertSame('Something New', $fixture[0]->getMessage());
        self::assertSame('Something New', $fixture[0]->getService());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Demande();
        $fixture->setSociete('My Title');
        $fixture->setFullname('My Title');
        $fixture->setSecteur('My Title');
        $fixture->setVille('My Title');
        $fixture->setTele('My Title');
        $fixture->setEmail('My Title');
        $fixture->setMessage('My Title');
        $fixture->setService('My Title');

        $this->repository->add($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/demande/');
    }
}
