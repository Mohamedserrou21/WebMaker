<?php

namespace App\Test\Controller;

use App\Entity\SERVICE;
use App\Repository\SERVICERepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SERVICEControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private SERVICERepository $repository;
    private string $path = '/s/e/r/v/i/c/e/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = (static::getContainer()->get('doctrine'))->getRepository(SERVICE::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('SERVICE index');

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
            's_e_r_v_i_c_e[titre]' => 'Testing',
            's_e_r_v_i_c_e[context]' => 'Testing',
            's_e_r_v_i_c_e[image]' => 'Testing',
            's_e_r_v_i_c_e[updatedAt]' => 'Testing',
        ]);

        self::assertResponseRedirects('/s/e/r/v/i/c/e/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new SERVICE();
        $fixture->setTitre('My Title');
        $fixture->setContext('My Title');
        $fixture->setImage('My Title');
        $fixture->setUpdatedAt('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('SERVICE');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new SERVICE();
        $fixture->setTitre('My Title');
        $fixture->setContext('My Title');
        $fixture->setImage('My Title');
        $fixture->setUpdatedAt('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            's_e_r_v_i_c_e[titre]' => 'Something New',
            's_e_r_v_i_c_e[context]' => 'Something New',
            's_e_r_v_i_c_e[image]' => 'Something New',
            's_e_r_v_i_c_e[updatedAt]' => 'Something New',
        ]);

        self::assertResponseRedirects('/s/e/r/v/i/c/e/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getTitre());
        self::assertSame('Something New', $fixture[0]->getContext());
        self::assertSame('Something New', $fixture[0]->getImage());
        self::assertSame('Something New', $fixture[0]->getUpdatedAt());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new SERVICE();
        $fixture->setTitre('My Title');
        $fixture->setContext('My Title');
        $fixture->setImage('My Title');
        $fixture->setUpdatedAt('My Title');

        $this->repository->add($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/s/e/r/v/i/c/e/');
    }
}
