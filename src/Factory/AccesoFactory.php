<?php

namespace App\Factory;

use App\Entity\Acceso;
use App\Repository\AccesoRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Acceso>
 *
 * @method static Acceso|Proxy createOne(array $attributes = [])
 * @method static Acceso[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Acceso|Proxy find(object|array|mixed $criteria)
 * @method static Acceso|Proxy findOrCreate(array $attributes)
 * @method static Acceso|Proxy first(string $sortedField = 'id')
 * @method static Acceso|Proxy last(string $sortedField = 'id')
 * @method static Acceso|Proxy random(array $attributes = [])
 * @method static Acceso|Proxy randomOrCreate(array $attributes = [])
 * @method static Acceso[]|Proxy[] all()
 * @method static Acceso[]|Proxy[] findBy(array $attributes)
 * @method static Acceso[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Acceso[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static AccesoRepository|RepositoryProxy repository()
 * @method Acceso|Proxy create(array|callable $attributes = [])
 */
final class AccesoFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services)
    }

    protected function getDefaults(): array
    {
        $horaSalida = self::faker()->dateTimeBetween('-1 year', '-1 months');
        $horaEntrada =  self::faker()->dateTimeBetween('-13 months', $horaSalida);

        return [
            // TODO add your default values here (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories)
            'horaEntrada' => \DateTimeImmutable::createFromMutable($horaEntrada),
            'horaSalida' => \DateTimeImmutable::createFromMutable($horaSalida),
            'peso' => self::faker()->boolean() ? self::faker()->numberBetween(0, 8000) : null,
            'cintaAccede' => CintaFactory::random(),
            'supervisadaPor' => EmpleadoFactory::random(),
            'socioAccede' => SocioFactory::random(),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Acceso $acceso): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Acceso::class;
    }
}
