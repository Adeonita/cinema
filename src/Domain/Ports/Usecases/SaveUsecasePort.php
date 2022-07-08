<?php
namespace App\Domain\Entities\Ports\Usecases;

use App\Domain\Entities\BaseEntity;

interface CreateUsecasePort {
    
    public function execute(BaseEntity $entity);

}