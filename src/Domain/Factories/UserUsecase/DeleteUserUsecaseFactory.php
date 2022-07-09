<?php
namespace App\Domain\Factories\UserUsecase;

use App\Domain\Repositories\UserRepository;
use App\Domain\Usecases\User\DeleteUserUsecase;
use App\Infra\Database\MySQL;

class DeleteUserUsecaseFactory {

    public static function create(): DeleteUserUsecase {
        $database = new MySQL();
        $userRepository = new UserRepository($database);
        $deleteUserUsecase = new DeleteUserUsecase($userRepository);

        return $deleteUserUsecase;
    }

}