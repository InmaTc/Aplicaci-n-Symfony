<?php

namespace App\Factory;

use App\Entity\Cinta;
use App\Repository\CintaRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Cinta>
 *
 * @method static Cinta|Proxy createOne(array $attributes = [])
 * @method static Cinta[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Cinta|Proxy find(object|array|mixed $criteria)
 * @method static Cinta|Proxy findOrCreate(array $attributes)
 * @method static Cinta|Proxy first(string $sortedField = 'id')
 * @method static Cinta|Proxy last(string $sortedField = 'id')
 * @method static Cinta|Proxy random(array $attributes = [])
 * @method static Cinta|Proxy randomOrCreate(array $attributes = [])
 * @method static Cinta[]|Proxy[] all()
 * @method static Cinta[]|Proxy[] findBy(array $attributes)
 * @method static Cinta[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Cinta[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static CintaRepository|RepositoryProxy repository()
 * @method Cinta|Proxy create(array|callable $attributes = [])
 */
final class CintaFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            // TODO add your default values here (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories)
            'numero' => self::faker()->numberBetween(1,9),
            'grupoCintas' => self::faker()->numberBetween(1,3),
            'disponible' => self::faker()->boolean() ? 1 : 0,
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Cinta $cinta): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Cinta::class;
    }
}
