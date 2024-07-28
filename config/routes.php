<?php
/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;
/*
 * This file is loaded in the context of the `Application` class.
  * So you can use  `$this` to reference the application class instance
  * if required.
 */
return function (RouteBuilder $routes): void {
    /*
     * The default class to use for all routes
     *
     * The following route classes are supplied with CakePHP and are appropriate
     * to set as the default:
     *
     * - Route
     * - InflectedRoute
     * - DashedRoute
     *
     * If no call is made to `Router::defaultRouteClass()`, the class used is
     * `Route` (`Cake\Routing\Route\Route`)
     *
     * Note that `Route` does not do any inflections on URLs which will result in
     * inconsistently cased URLs when used with `{plugin}`, `{controller}` and
     * `{action}` markers.
     */
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder): void {
        /*
         * Here, we are connecting '/' (base path) to a controller called 'Pages',
         * its action called 'display', and we pass a param to select the view file
         * to use (in this case, templates/Pages/home.php)...
         */

        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
        $builder->connect('/home', ['plugin'=>null,'controller' => 'Pages', 'action' => 'display', 'home']);
        $builder->connect('/shorts', ['plugin'=>null,'controller' => 'Shorts', 'action' => 'index', 'short']);
        $builder->connect('/about', ['plugin'=>'Lms','controller' => 'Homes', 'action' => 'about', 'about']);
        $builder->connect('/comming-lms', ['plugin'=>'Lms','controller' => 'Homes', 'action' => 'comming', 'comming-lms']);
        $builder->connect('/contact', ['plugin'=>'Lms','controller' => 'Homes', 'action' => 'contact', 'contact']);
        $builder->connect('/courses', ['plugin'=>'Lms','controller' => 'Homes', 'action' => 'courses', 'courses']);
        $builder->connect('/list-courses', ['plugin'=>'Lms','controller' => 'Courses', 'action' => 'index', 'list-courses']);
        $builder->connect('/learning-paths', ['controller' => 'learningpaths', 'action' => 'index', 'learning-paths']);
        $builder->connect('/login', ['plugin'=> null,'controller' => 'Users', 'action' => 'login', 'login']);
        $builder->connect('/logout', ['plugin'=> null,'controller' => 'Users', 'action' => 'Logout', 'logout']);
        $builder->connect('/create', ['plugin'=> null,'controller' => 'Users', 'action' => 'create', 'create']);
        $builder->connect('/profile', ['plugin'=> 'Lms','controller' => 'Homes', 'action' => 'profile', 'profile']);
        $builder->connect('/course/watch/:id', ['plugin'=> 'Lms','controller' => 'Courses', 'action' => 'watch', 'watch']);
        $builder->connect('/dashboard', ['plugin'=> 'Lms','controller' => 'Homes', 'action' => 'dashboard', 'dashboard']);
        $builder->connect('/payment', ['plugin'=>'Lms','controller' => 'Homes', 'action' => 'payment', 'payment']);
        $builder->connect('/add-lesson', ['plugin'=> 'Lms','controller' => 'Lessons', 'action' => 'add', 'add-lesson']);
        $builder->connect('/edit-lesson', ['plugin'=> 'Lms','controller' => 'Lessons', 'action' => 'edit', 'edit-lesson']);
        $builder->connect('/edit-chapter', ['plugin'=> 'Lms','controller' => 'Chapters', 'action' => 'edit', 'edit-chapter']);
        $builder->connect('/add-chapter', ['plugin'=> 'Lms','controller' => 'Chapters', 'action' => 'add', 'add-chapter']);
        $builder->connect('/admin', ['controller' => 'Pages', 'action' => 'dashboard', 'admin']);
        $builder->connect('/playwithgato', ['controller' => 'Pages', 'action' => 'play', 'playwithgato']);
        $builder->connect('/generate', ['controller' => 'Assistants', 'action' => 'generate']);
        $builder->connect('/select_topic', ['controller' => 'Assistants', 'action' => 'selectTopic']);
        $builder->connect('/next_question', ['controller' => 'Assistants', 'action' => 'nextQuestion']);


        /*
         * ...and connect the rest of 'Pages' controller's URLs.
         */
        $builder->connect('/pages/*', 'Pages::display');

        /*
         * Connect catchall routes for all controllers.
         *
         * The `fallbacks` method is a shortcut for
         *
         * ```
         * $builder->connect('/{controller}', ['action' => 'index']);
         * $builder->connect('/{controller}/{action}/*', []);
         * ```
         *
         * You can remove these routes once you've connected the
         * routes you want in your application.
         */
        $builder->fallbacks();
    });



    $routes->scope('/api', function (RouteBuilder $builder) {
      $builder->connect('/quiz/check-answer', ['controller' => 'Quiz', 'action' => 'checkAnswer', 'prefix' => 'Api']);
      $builder->connect('/assistant/get-response', ['controller' => 'Assistant', 'action' => 'getAssistant', 'prefix' => 'Api']);
      $builder->fallbacks(DashedRoute::class);
  });
  
};