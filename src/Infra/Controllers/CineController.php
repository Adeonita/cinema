<?php
namespace App\Infra\Controllers;

use App\Domain\Factories\CineUsecase\CreateCineUsecaseFactory;
use App\Domain\Factories\CineUsecase\DeleteCineUsecaseFactory;
use App\Domain\Factories\CineUsecase\FindCineUsecaseFactory;
use App\Domain\Factories\CineUsecase\UpdateCineUsecaseFactory;
use App\Infra\Validators\CineValidator;

class CineController extends Controller
{
    public function create()
    {
        $validator = new CineValidator();
        $cineEntity = $validator->validateCreate();
        $usecase = CreateCineUsecaseFactory::create();
        $createdCine = $usecase->execute($cineEntity);
        
        return $this->jsonResponse($createdCine, 201); # Se quiser esconder alguma propriedade do usuário pode criar um método lá no entity toJsonResponse e returna um array
    }

    public function find($id)
    {
        try {
            $findUsecase = FindCineUsecaseFactory::create();
            $cineEntity = $findUsecase->execute($id);
    
            return $this->jsonResponse($cineEntity);
        } catch(\Exception $e) {
            $this->jsonResponse($e->getMessage(), $e->getCode());
        }
    }

    public function delete($id)
    {
        try {
            $deleteUsecase = DeleteCineUsecaseFactory::create();
            $deleteUsecase->execute($id);
        } catch(\Exception $e) {
            return $this->jsonResponse($e->getMessage(), $e->getCode());
        }
    }

    public function update()
    {
        try {
            $validator = new CineValidator();
            $usecase = UpdateCineUsecaseFactory::create();
            $updated = $usecase->execute($validator->validateUpdate());

            return $this->jsonResponse($updated);
        } catch(\Exception $e) {
            return $this->jsonResponse($e->getMessage(), $e->getCode());
        }
    }
}