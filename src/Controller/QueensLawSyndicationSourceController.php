<?php

namespace Drupal\queenslaw_syndication_source\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Controller routines for Queen's University Faculty of Law JSON API routes.
 */
class QueensLawSyndicationSourceController extends ControllerBase {

  public function data($type, $parameters) {
    $parameters_string = $parameters;
    $parameters = [];
    $parameters_items = explode(';', $parameters_string);
    foreach ($parameters_items as $parameters_item) {
      $parameters_item_parts = explode(':', $parameters_item);
      if (count($parameters_item_parts) == 2) {
        $key = trim(array_shift($parameters_item_parts));
        $parameters[$key] = array_pop($parameters_item_parts);
      }
    }
    $response = new Response();
    $response->headers->set('Content-Type', 'application/json');
    if ($data = _queenslaw_syndication_source_data($type, $parameters)) $response->setContent(json_encode($data));
    return $response;
  }

}
