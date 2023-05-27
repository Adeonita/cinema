<?php
namespace App\Domain\Ports\Usecases;

interface FindUsecasePort 
{
    public function execute(int $id);

}