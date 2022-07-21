<?php

declare(strict_types=1);

$Db = new DB;

$Posts = new Posts;

$Posts->getPostsByCategory($category);