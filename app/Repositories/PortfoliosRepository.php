<?php
namespace App\Repositories;
use App\Models\Portfolio;

Class PortfoliosRepository extends Repository{
    public function __construct(Portfolio $portfolio)
    {
        $this->model = $portfolio;
    }
}
