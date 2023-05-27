<?php
namespace App\Infra\Validators;

use App\Domain\Entities\Film;

class FilmValidator
{
  public function validateCreate()
  {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $duration = $_POST['duration'];
    $director = $_POST['director'];
    $ageRating = $_POST['ageRating'];
    $mainActor = $_POST['mainActor'];
    $hasIsThreeDimentions = isset($_POST['isThreeDimentions']);
    $isThreeDimentions = (int) $_POST['isThreeDimentions'];

    $requiredFileds = $title && $duration && $director && 
      $ageRating && $mainActor && $category && $hasIsThreeDimentions;

    if ($requiredFileds) {
      return new Film(
        null,
        $title,
        $duration,
        $director,
        $ageRating,
        $mainActor,
        $isThreeDimentions,
        $category
      );
    }

    throw new \Exception("Validation error: ". count($_POST) .implode(",", $_POST), 422);
  }

  public function validateUpdate() {
    $params = json_decode(file_get_contents("php://input"));

    if(
      $params->id &&
      $params->title &&
      $params->category &&
      $params->duration &&
      $params->director &&
      $params->ageRating &&
      $params->mainActor &&
      $params->isThreeDimentions
    ) {
        return new Film(
          $params->id,
          $params->title,
          $params->category,
          $params->duration,
          $params->director,
          $params->ageRating,
          $params->mainActor,
          $params->isThreeDimentions
        );
    }
            
    throw new \Exception("Validation error: ". count($_POST) .implode(",", $_POST), 422);
  }
}
