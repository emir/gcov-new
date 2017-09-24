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

namespace PHP\Gcov;

final class Navigation
{
    /**
     * @var string
     */
    private $page;

    /**
     * @var string
     */
    private $phpVersion;

    /**
     * Navigation constructor.
     * @param null|string $page
     * @param null|string $phpVersion
     */
    public function __construct(?string $page, ?string $phpVersion)
    {
        $this->page = $page ?? 'index';
        $this->phpVersion = $phpVersion ?? null;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        $title = $this->pageInfo()[$this->page]['title'];

        return sprintf($title, $this->phpVersion);
    }

    /**
     * @return string
     */
    public function getHead(): string
    {
        $head = $this->pageInfo()[$this->page]['head'];

        return sprintf($head, $this->phpVersion);
    }

    /**
     * @return array
     */
    private function pageInfo(): array
    {
        return [
            'compile_results' => [
                'title' => 'PHP: Compile Results for %s',
                'head' => 'Compile Results'
            ],
            'graph' => [
                'title' => 'PHP: %s Graphs',
                'head' => 'Graphs'
            ],
            'lcov' => [
                'title' => 'PHP: %s Code Coverage Report',
                'head' => '%s: Code Coverage Report'
            ],
            'params' => [
                'title' => 'PHP: Parameter Parsing Report for %s',
                'head' => 'Parameter Parsing Report'
            ],
            'skip' => [
                'title' => 'PHP: Skipped tests for %s',
                'head' => 'Skipped Tests'
            ],
            'stats' => [
                'title' => 'Overview of %s',
                'head' => 'Overview of %s'
            ],
            'system' => [
                'title' => 'PHP: System Info',
                'head' => 'System Info'
            ],
            'tested_functions' => [
                'title' => 'PHP: Tested Funtions for %s',
                'head' => 'Tested Functions'
            ],
            'tests' => [
                'title' => 'PHP: Test Failures for %s',
                'head' => 'Test Failures'
            ],
            'expected_tests' => [
                'title' => 'PHP: Expected Test Failures for %s',
                'head' => 'Expected Test Failures'
            ],
            'valgrind' => [
                'title' => 'PHP: Valgrind Reports for %s',
                'head' => 'Valgrind Reports'
            ],
            'index' => [
                'title' => 'PHP: Test and Code Coverage Analysis',
                'head' => 'PHP: Test and Code Coverage Analysis'
            ]
        ];
    }
}