<?php
namespace App\Domain\Entities;

use App\Domain\Ports\Entities\BaseEntity;

class Film implements BaseEntity
{
    public  $id;
    public $title;
    public $duration;
    public $director;
    public $ageRating;
    public $mainActor;
    public $isThreeDimentions;
    public $category; //(ação, comédia, infantil, suspense ou terror)

    public function __construct(
        $id = null, 
        $title,
        $duration,
        $director,
        $ageRating,
        $mainActor,
        $isThreeDimentions,
        $category
    )
    {
        $this->id = $id;
        $this->title = $title;
        $this->duration = $duration;
        $this->director = $director;
        $this->ageRating = $ageRating;
        $this->mainActor = $mainActor;
        $this->isThreeDimentions = $isThreeDimentions;
        $this->category = $category;
    }

    public function toPersistentArray(): array
    {
        return [
            $this->title,
            $this->director,
            $this->duration,
            $this->category,
            $this->ageRating,
            $this->mainActor,
            $this->isThreeDimentions,
        ];
    }

    public static function fromPersistentObject($filmObj): BaseEntity 
    {
        return new Film(
            $filmObj->id,
            $filmObj->title,
            $filmObj->duration,
            $filmObj->director,
            $filmObj->age_rating,
            $filmObj->main_actor,
            $filmObj->is_three_dimentions ? true : false,
            $filmObj->category,
        );
    }
}
