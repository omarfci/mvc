<?php

//use an auto loader
require 'libs/Bootstrap.php';
require 'libs/Controller.php';
require 'libs/Model.php';
require 'libs/View.php';

require 'libs/Session.php';

//database
require 'libs/Database.php';



require 'config/path.php';
require 'config/database.php';


$app = new Bootstrap();

