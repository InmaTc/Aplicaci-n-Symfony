<?php

namespace App\DataFixtures;

use App\Factory\AccesoFactory;
use App\Factory\CintaFactory;
use App\Factory\EmpleadoFactory;
use App\Factory\SocioFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $cinta1 = CintaFactory::new()->create([
                                    'numero' => 1,
                                    'grupoCintas' => 1,
                                    'disponible' => true
        ]);

        $cinta2 = CintaFactory::new()->create([
                                    'numero' => 2,
                                    'grupoCintas' => 1,
                                    'disponible' => false
        ]);

        $cinta3 = CintaFactory::new()->create([
                                    'numero' => 3,
                                    'grupoCintas' => 1,
                                    'disponible' => true
        ]);

        $cinta4 = CintaFactory::new()->create([
                                    'numero' => 4,
                                    'grupoCintas' => 2,
                                    'disponible' => true
        ]);
        $cinta5 = CintaFactory::new()->create([
                                    'numero' => 5,
                                    'grupoCintas' => 2,
                                    'disponible' => true
        ]);

        $cinta6 = CintaFactory::new()->create([
                                    'numero' => 6,
                                    'grupoCintas' => 2,
                                    'disponible' => true
        ]);

        $cinta7 = CintaFactory::new()->create([
                                    'numero' => 7,
                                    'grupoCintas' => 3,
                                    'disponible' => true
        ]);

        $cinta8 = CintaFactory::new()->create([
                                    'numero' => 8,
                                    'grupoCintas' => 3,
                                    'disponible' => true,
        ]);

        $cinta9 = CintaFactory::new()->create([
                                    'numero' => 9,
                                    'grupoCintas' => 3,
                                    'disponible' => true,
        ]);

        SocioFactory::createMany(150, function (){
            return [
                'cintas' => CintaFactory::randomRange(1,3),
            ];
        });

        EmpleadoFactory::createMany(30);

        AccesoFactory::createMany(50);

        $manager->flush();
    }
}
