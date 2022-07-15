<?php 

// Class récupérant les articles et les classent par catégorie si besoin

// voir comment récupérer un blob, 

// une date est une string traitée avec DateTime

declare(strict_types=1);

Class Posts
{
    public string $date;
    public mixed $category_id;
    public string $title;
    public string $content;
    public mixed $projection;
    public int $public_share;


}