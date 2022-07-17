<?php

$Db = new Db;

$Db->addPost();

$Db->getPost('*','WHERE title = ' . '"five"' . ' ;');

