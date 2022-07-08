<?php
namespace App\Domain\Entities\Ports\Usecases;

interface DeleteUsecasePort {

    public function execute(int $id);
    
}