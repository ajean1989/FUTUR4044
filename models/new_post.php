<?php

$Db = new Db;

$Posts = new Posts;

$Posts->addPost();

$Posts->getPost('*','WHERE title = "' . $Posts->inputTitle .'"');

