<?php
namespace App\Domain\Ports\Usecases;

use App\Domain\Ports\Repositories\Repository;
use App\Domain\Ports\Entities\BaseEntity;

interface SaveUsecasePort {
    
    public function __construct(Repository $repository);
    public function execute(BaseEntity $entity);

}