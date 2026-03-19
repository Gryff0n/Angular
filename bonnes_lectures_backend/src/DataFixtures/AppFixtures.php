<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $books = [
            ['title' => 'Les Misérables', 'publisher' => 'Gallimard', 'year' => 1862, 'isbn' => '9782070409228', 'backcover' => 'Dans un Paris du XIXe siècle, Jean Valjean, ancien forçat, tente de se racheter tandis que l\'inspecteur Javert le traque sans relâche.'],
            ['title' => 'Le Petit Prince', 'publisher' => 'Gallimard', 'year' => 1943, 'isbn' => '9782070612758', 'backcover' => 'Un aviateur échoué dans le désert rencontre un petit prince venu d\'une autre planète, porteur d\'une sagesse universelle.'],
            ['title' => 'L\'Étranger', 'publisher' => 'Gallimard', 'year' => 1942, 'isbn' => '9782070360024', 'backcover' => 'Meursault, un homme indifférent au monde, commet un meurtre absurde et affronte la justice sans émotion apparente.'],
            ['title' => 'Harry Potter à l\'école des sorciers', 'publisher' => 'Gallimard Jeunesse', 'year' => 1998, 'isbn' => '9782070541270', 'backcover' => 'Harry Potter, orphelin élevé par des oncle et tante, découvre à ses 11 ans qu\'il est un sorcier et rejoint Poudlard.'],
            ['title' => 'Dune', 'publisher' => 'Robert Laffont', 'year' => 1965, 'isbn' => '9782221252055', 'backcover' => 'Sur la planète désertique Arrakis, Paul Atréides affronte complots politiques et pouvoirs mystiques dans une saga de science-fiction légendaire.'],
            ['title' => 'Le Seigneur des Anneaux', 'publisher' => 'Christian Bourgois', 'year' => 1954, 'isbn' => '9782267011920', 'backcover' => 'Frodon Sacquet entreprend un périlleux voyage pour détruire l\'Anneau Unique et sauver la Terre du Milieu des griffes de Sauron.'],
            ['title' => '1984', 'publisher' => 'Gallimard', 'year' => 1949, 'isbn' => '9782070368228', 'backcover' => 'Dans un futur totalitaire, Winston Smith tente de résister au régime omniscient du Grand Frère qui contrôle pensées et réalité.'],
            ['title' => 'Fahrenheit 451', 'publisher' => 'Denoël', 'year' => 1953, 'isbn' => '9782207500047', 'backcover' => 'Dans une société où les livres sont interdits et brûlés, un pompier-pyromane remet en question sa mission et son existence.'],
            ['title' => 'Crime et Châtiment', 'publisher' => 'Actes Sud', 'year' => 1866, 'isbn' => '9782742748342', 'backcover' => 'Raskolnikov, étudiant désargenté, commet un meurtre qu\'il croit justifié et sombre progressivement dans la culpabilité.'],
            ['title' => 'Le Comte de Monte-Cristo', 'publisher' => 'Gallimard', 'year' => 1844, 'isbn' => '9782070409136', 'backcover' => 'Edmond Dantès, injustement emprisonné, s\'évade et ourdit une vengeance méthodique contre ceux qui l\'ont trahi.'],
            ['title' => 'Madame Bovary', 'publisher' => 'Gallimard', 'year' => 1857, 'isbn' => '9782070413119', 'backcover' => 'Emma Bovary, épouse d\'un médecin de campagne, rêve d\'une vie romanesque et s\'enlise dans des aventures ruineuses.'],
            ['title' => 'Don Quichotte', 'publisher' => 'Gallimard', 'year' => 1605, 'isbn' => '9782070413874', 'backcover' => 'Un hidalgo espagnol, ayant trop lu de romans de chevalerie, part en quête d\'aventures avec son fidèle écuyer Sancho Pança.'],
            ['title' => 'Orgueil et Préjugés', 'publisher' => 'Gallimard', 'year' => 1813, 'isbn' => '9782072762930', 'backcover' => 'Elizabeth Bennet et Mr Darcy naviguent entre préjugés sociaux et malentendus avant de reconnaître leur amour mutuel.'],
            ['title' => 'L\'Alchimiste', 'publisher' => 'Anne Carrière', 'year' => 1988, 'isbn' => '9782843371867', 'backcover' => 'Santiago, jeune berger andalou, traverse le désert africain à la recherche d\'un trésor et de sa Légende Personnelle.'],
            ['title' => 'Fondation', 'publisher' => 'Gallimard', 'year' => 1951, 'isbn' => '9782070360482', 'backcover' => 'Hari Seldon crée la psychohistoire pour préserver la civilisation galactique face à l\'effondrement de l\'Empire.'],
            ['title' => 'Le Meilleur des Mondes', 'publisher' => 'Plon', 'year' => 1932, 'isbn' => '9782266280890', 'backcover' => 'Dans un futur dystopique où les humains sont fabriqués en série, un individu ose remettre en question le bonheur artificiel imposé.'],
            ['title' => 'Neuromancien', 'publisher' => 'J\'ai Lu', 'year' => 1984, 'isbn' => '9782290300985', 'backcover' => 'Case, un hacker déchu, est recruté pour mener une ultime mission dans le cyberespace, aux frontières de l\'intelligence artificielle.'],
            ['title' => 'Les Fleurs du Mal', 'publisher' => 'Gallimard', 'year' => 1857, 'isbn' => '9782070410521', 'backcover' => 'Recueil poétique de Baudelaire explorant la beauté, le vice, la mort et la quête d\'idéal à travers une langue somptueuse.'],
            ['title' => 'Voyage au bout de la nuit', 'publisher' => 'Gallimard', 'year' => 1932, 'isbn' => '9782070360550', 'backcover' => 'Ferdinand Bardamu traverse la guerre, la colonisation et la misère humaine dans un roman sombre et visionnaire de Céline.'],
            ['title' => 'La Peste', 'publisher' => 'Gallimard', 'year' => 1947, 'isbn' => '9782070360406', 'backcover' => 'Dans la ville d\'Oran frappée par une épidémie de peste, des hommes ordinaires font face à l\'absurde et à la solidarité.'],
        ];

        foreach ($books as $data) {
            $book = new Book();
            $book->setTitle($data['title']);
            $book->setPublisher($data['publisher']);
            $book->setYear(new \DateTime($data['year'] . '-01-01'));
            $book->setIsbn($data['isbn']);
            $book->setBackcover($data['backcover']);
            $manager->persist($book);
        }

        $manager->flush();
    }
}