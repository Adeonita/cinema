<?php
namespace App\Domain\Usecases\Cine;

use App\Domain\Entities\Cine;
use App\Domain\Ports\Repositories\Repository;
use App\Domain\Ports\Usecases\FindUsecasePort;

class FindCineUsecase implements FindUsecasePort
{

    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }
    
    public function execute(int $id)
    {
        return $this->repository->find($id);
    }

}