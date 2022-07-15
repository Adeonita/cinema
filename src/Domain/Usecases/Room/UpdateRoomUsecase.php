<?php
namespace App\Domain\Usecases\Room;

use App\Domain\Entities\Room;
use App\Domain\Ports\Entities\BaseEntity;
use App\Domain\Ports\Repositories\Repository;

class UpdateRoomUsecase
{

    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }
    
    public function execute(BaseEntity $entity): Room
    {
        $this->repository->update($entity);
        return $this->repository->find($entity->id);
    }

}