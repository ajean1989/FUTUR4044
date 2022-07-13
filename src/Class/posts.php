<?php 

// Class récupérant les articles et les classent par catégorie si besoin

// voir comment récupérer un blob, une date

declare(strict_types=1);

Class Posts
{
    public string $date;
    public int $category_id;
    public string $title;
    public string $content;
    public int $projection;
    public int $public_share;
}