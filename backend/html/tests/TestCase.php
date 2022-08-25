<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Aqui são definidos os tipos de testes que necessitam dados
     * para mock, como updates e stores tomando como base
     * a nomenclatura (correta) do arquivo
     * 
     * Calling Class (ModelNameTestNameTest)
    */
    private $returnableArrays = [
        // 'UpdateTest', 'StoreTest', 'ShowTest'
        'DeleteTest'
    ];

    /**
     * basendo-se no nome do arquivo que chamou a função
     * ele busca o modelo para gerar a primeira ocorrência
     * do banco, caso não exista ele gera um mock (IMPLEMENTAR)
     * 
     * Model ($primary_key = ??)
     * Calling Class (ModelNameTestNameTest)
    */
    private function getNameByModel($class)
    {
        $pattern = '/^([A-Z][a-z]+)(' . implode('|', $this->returnableArrays) . ')$/';
        preg_match($pattern, end($class), $matches);

        if (empty($matches)) {
            dd('O nome de classe não está em conformidade com os padrões definidos.');
        }

        return $matches;
    }

    /**
     * basendo-se no nome do arquivo que chamou a função
     * ele busca o modelo para gerar a primeira ocorrência
     * do banco, caso não exista ele gera um mock (IMPLEMENTAR)
     * 
     * Model ($primary_key = ??)
     * Calling Class (ModelNameTestNameTest)
    */
    protected function generateRandomOccurence()
    {
        $class = explode('\\', get_class($this));
        $matches = $this->getNameByModel($class);
        $realName = &$matches[1];
        $fullNamespace = 'App\\Models\\' . $realName;

        try {
            $this->model = new $fullNamespace;
            $key = $this->model->getKeyName();
        } catch (\Exception) {
            dd('Modelo não instanciável.');
        }

        if ($this->model::count() == 0) {
            return $this->mockedFirstEntry();
        }

        return $this->model::first()->$key;
    }

    private function mockedFirstEntry() {
        dd($this->model->getFillable());
        # call Factory here

        // Desenvolver lógica para criar uma entrada e retornar o objeto
        // ou criar uma entrada dentro de um banco temporário
        // ver na reunião
    }
    
    /**
     * basendo-se no nome do arquivo que chamou a função
     * ele busca o modelo para gerar dados usados no
     * teste a requisição
    */
    protected function generateData()
    {
        $class = explode('\\', get_class($this));
        $matches = $this->getNameByModel($class);
        $realName = &$matches[1];

        return $this->getDataDefinition($realName);
    }
}
