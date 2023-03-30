<?php

namespace App\Interfaces;

interface EloquentRepositoryInterface 
{
    public function getQuestions();
    public function nextQuestions(array $request);
    public function skipQuestions($question);
    public function results(array $request);
    public function getById($Id);
    public function delete($Id);
    public function create(array $request);
    public function update($Id, array $newRequest);
    

}
