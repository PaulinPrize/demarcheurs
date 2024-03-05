<?php

namespace App\Repositories;
use App\Models\Category;

class CategorieRepository extends ResourceRepository
{
    public function __construct(Category $categorie)
    {
        $this->model = $categorie;
    }

    // Supprimer une catégorie
    public function delete($categorie)
    {
        $categorie->delete();
    }
}






