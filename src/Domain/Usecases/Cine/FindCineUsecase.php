<?php
namespace App\Domain\Usecases\Cine;

use App\Domain\Entities\Cine;
use App\Domain\Ports\Repositories\Repository;
use App\Domain\Ports\Usecases\DeleteUsecasePort;

class FindCineUsecase implements DeleteUsecasePort {

    private $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }
    
    public function execute($id): Cine
    {
        return $this->repository->find($id);
    }

}