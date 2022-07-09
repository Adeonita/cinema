<?php
namespace App\Domain\Factories\UserUsecase;

use App\Domain\Repositories\UserRepository;
use App\Domain\Usecases\User\FindUserUsecase;
use App\Infra\Database\MySQL;

class FindUserUsecaseFactory {

    public static function create(): FindUserUsecase {
        $database = new MySQL();
        $userRepository = new UserRepository($database);
        $findUserUsecase = new FindUserUsecase($userRepository);

        return $findUserUsecase;
    }

}