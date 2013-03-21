<?php

use Symfony\Component\ClassLoader\ApcClassLoader;
use Symfony\Component\HttpFoundation\Request;


xhprof_enable();

$loader = require_once __DIR__.'/../app/bootstrap.php.cache';

// Use APC for autoloading to improve performance
// Change 'sf2' by the prefix you want in order to prevent key conflict with another application
$loader = new ApcClassLoader('sf2', $loader);
$loader->register(true);

require_once __DIR__.'/../app/AppKernel.php';
require_once __DIR__.'/../app/AppCache.php';

$kernel = new AppKernel('prod', false);
$kernel->loadClassCache();
$kernel = new AppCache($kernel);
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);

// stop profiler
$xhprof_data = xhprof_disable();

//
// Saving the XHProf run
// using the default implementation of iXHProfRuns.
//
include_once "/var/www/xhgui/xhprof_lib/utils/xhprof_lib.php";
include_once "/var/www/xhgui/xhprof_lib/utils/xhprof_runs.php";

$xhprof_runs = new XHProfRuns_Default();

// Save the run under a namespace "xhprof_foo".
//
// **NOTE**:
// By default save_run() will automatically generate a unique
// run id for you. [You can override that behavior by passing
// a run id (optional arg) to the save_run() method instead.]
//
$xhprof_runs->save_run($xhprof_data, "xhprof_foo");

