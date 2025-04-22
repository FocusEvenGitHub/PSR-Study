<?php

namespace App\Core;

class Container
{
    private array $instances = [];

    public function get(string $class)
    {
        if (isset($this->instances[$class])) {
            return $this->instances[$class];
        }

        $reflection = new \ReflectionClass($class);

        if (!$reflection->isInstantiable()) {
            throw new \Exception("Classe {$class} não pode ser instanciada.");
        }

        $constructor = $reflection->getConstructor();
        if (!$constructor) {
            return $this->instances[$class] = new $class;
        }

        $parameters = $constructor->getParameters();
        $dependencies = [];

        foreach ($parameters as $parameter) {
            $dependencyClass = $parameter->getClass();
            if (!$dependencyClass) {
                throw new \Exception("Não é possível resolver a dependência {$parameter->name}.");
            }
            $dependencies[] = $this->get($dependencyClass->getName());
        }

        return $this->instances[$class] = $reflection->newInstanceArgs($dependencies);
    }
}
