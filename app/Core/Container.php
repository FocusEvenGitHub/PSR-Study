<?php

namespace App\Core;

use App\Interfaces\FilterInterface;
use App\Interfaces\ValidatorInterface;
use RuntimeException;
use ReflectionClass;

class Container
{
    private array $instances = [];

    /**
     * Mapa de interfaces para implementações concretas
     * @var array<string,string>
     */
    private array $bindings = [
        FilterInterface::class    => \App\Validation\LeadFilter::class,
        ValidatorInterface::class => \App\Validation\LeadValidator::class,
    ];

    /**
     * Resolve a classe ou interface solicitada
     *
     * @param string $class
     * @return object
     */
    public function get(string $class)
    {
        // Se for uma interface mapeada, troca pela implementação concreta
        if (isset($this->bindings[$class])) {
            $class = $this->bindings[$class];
        }

        // Se já instanciamos, retorna singleton local
        if (isset($this->instances[$class])) {
            return $this->instances[$class];
        }

        $reflection = new ReflectionClass($class);
        if (!$reflection->isInstantiable()) {
            throw new RuntimeException("Classe {$class} não pode ser instanciada.");
        }

        $constructor = $reflection->getConstructor();
        if (!$constructor) {
            return $this->instances[$class] = new $class;
        }

        $dependencies = [];
        foreach ($constructor->getParameters() as $param) {
            $paramClass = $param->getClass();
            if (!$paramClass) {
                throw new RuntimeException("Não é possível resolver a dependência \${$param->name}.");
            }
            $dependencies[] = $this->get($paramClass->getName());
        }

        return $this->instances[$class] = $reflection->newInstanceArgs($dependencies);
    }
}
