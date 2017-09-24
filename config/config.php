<?php

/*
  +----------------------------------------------------------------------+
  | PHP QA GCOV Website                                                  |
  +----------------------------------------------------------------------+
  | Copyright (c) 2008-2009 The PHP Group                                |
  +----------------------------------------------------------------------+
  | This source file is subject to version 3.01 of the PHP license,      |
  | that is bundled with this package in the file LICENSE, and is        |
  | available through the world-wide-web at the following url:           |
  | http://www.php.net/license/3_01.txt                                  |
  | If you did not receive a copy of the PHP license and are unable to   |
  | obtain it through the world-wide-web, please send a note to          |
  | license@php.net so we can mail you a copy immediately.               |
  +----------------------------------------------------------------------+
  | Author: Emir Karşıyakalı <emirkarsiyakali@gmail.com>                 |
  +----------------------------------------------------------------------+
*/

return [
    /**
     * Analyzed PHP versions
     */
    'versions' => [
        'PHP_HEAD' => 'HEAD',
        'PHP_7_2' => '7.2',
        'PHP_7_1' => '7.1',
        'PHP_7_0' => '7.0',
        'PHP_5_6' => '5.6',
    ],

    /**
     * Key value pair of menu items.
     *
     * key *or index* => URL (Keeping consistency on old urls)
     * value => Menu Item
     */
    'menus' => [
        'lcov' => 'Coverage',
        'compile_results' => 'Compile Results',
        'graph' => 'Graphs',
        'params' => 'Parameter Parsing',
        'tests' => 'Test Failures',
        'expected_tests' => 'Expected Test Failures',
        'valgrind' => 'Valgrind',
        'skip' => 'Skipped Tests',
        'tested_functions' => 'Tested Functions',
        'system' => 'System',
    ],

    /**
     * Database
     */
    'database' => [
        'DB_HOST' => 'localhost',
        'DB_NAME' => 'phpqagcov',
        'DB_USER' => 'phpgcov',
        'DB_PASSWORD' => 'phpfi',
    ],
];