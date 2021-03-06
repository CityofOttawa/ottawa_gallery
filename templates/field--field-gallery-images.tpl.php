<?php
global $language;
$lang_code = $language->language;
module_load_include('inc', 'pathauto', 'pathauto');
$nid = $element['#object']->nid;
?>

<?php foreach ($items as $delta => $item) : ?>
  <?php
  $image_target = $nid . '-' . $delta;
  ?>
  <?php if (isset($item['#item']['uri'])): ?>
        <button type="button" class="toggle-button" data-toggle="modal"
                data-target="#<?php print $image_target; ?>">
          <?php
          try {
            print theme(
              'image',
              [
                'alt' => $item['#item']['alt'],
                'title' => $item['#item']['title'],
                'path' => $item['#item']['uri'],
              ]
            );
          } catch (Exception $exception) {
            watchdog_exception('ottawa_gallery', $exception);
          }
          ?>
        </button>
  <?php endif; ?>
    <div class="modal fade" id="<?php print $image_target; ?>" tabindex="-1"
         role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            <?php print 'aria-label="Close the ' . $item['#item']['title'] . " article" . '"' ?>aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                  <?php if (isset($item['#item']['field_file_image_title_text']['und'][0]['value'])): ?>
                      <h4 class="modal-title">
                        <?php print $item['#item']['field_file_image_title_text']['und'][0]['value']; ?>
                      </h4>
                  <?php endif; ?>
                </div>
                <div class="modal-body">
                  <?php if (isset($item['#item']['uri'])): ?>
                      <p class="image">
                        <?php
                        try {
                          print theme('image', [
                            'alt' => $item['#item']['alt'],
                            'title' => $item['#item']['title'],
                            'path' => $item['#item']['uri'],
                          ]);
                        } catch (Exception $exception) {
                          watchdog_exception('ottawa_gallery', $exception);
                        }
                        ?>
                      </p>
                  <?php endif; ?>
                  <?php if (isset($item['#item']['field_ottawa_image_caption']['und'][0]['value'])): ?>
                      <p><?php print $item['#item']['field_ottawa_image_caption']['und'][0]['value']; ?></p>
                  <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
