<?php

declare(strict_types=1);


$Category = new Category;

$categoryQuery = 'SELECT name FROM category';

$listCategory = Db::fetchall($categoryQuery, 'Category');