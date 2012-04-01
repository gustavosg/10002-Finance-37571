<?php
// bootstrap.php

// include entities
require_once 'entities/accounts.php';
require_once 'entities/budget_Records.php';
require_once 'entities/budgets.php';
require_once 'entities/categories.php';
require_once 'entities/expenditure.php';
require_once 'entities/sub_Categories.php';

// include functions

require_once 'functions/accounts.php';
require_once 'functions/budgetRecords.php';
require_once 'functions/budgets.php';
require_once 'functions/categories.php';
require_once 'functions/expenditure.php';
require_once 'functions/pageMaker.php';
require_once 'functions/sub_Categories.php';


// include bootstrap_doctrine
require_once 'bootstrap_doctrine.php';
?>