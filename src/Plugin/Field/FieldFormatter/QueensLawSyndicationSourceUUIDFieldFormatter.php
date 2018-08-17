<?php

namespace Drupal\queenslaw_syndication_source\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'queenslaw_syndication_source_uuid' formatter.
 *
 * There's no default formatter for UUID, so provide a simple plain text formatter.
 *
 * @FieldFormatter(
 *   id = "queenslaw_syndication_source_uuid",
 *   label = @Translation("Queen's Law uuid"),
 *   field_types = {
 *     "uuid"
 *   }
 * )
 */

class QueensLawSyndicationSourceUUIDFieldFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = [];
    foreach ($items as $delta => $item) {
      $element[$delta] = [
        '#theme' => 'queenslaw_syndication_source_uuid',
        '#text' => $item->value,
      ];
    }
    return $element;
  }

}
