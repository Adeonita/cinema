<?php
namespace App\Domain\Ports\Usecases;

interface DeleteUsecasePort
{
    public function execute(int $id);
}