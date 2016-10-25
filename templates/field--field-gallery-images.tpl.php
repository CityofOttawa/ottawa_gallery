<?php
  global $language;
  $lang_code = $language->language;
?>
<?php foreach ($items as $delta => $item) : ?>
  <?php
    module_load_include('inc', 'pathauto', 'pathauto');
    $divid = pathauto_cleanstring($item['#item']['field_file_image_title_text']['und'][0]['value']);
  ?>
  <?php if(isset($item['#item']['uri'])): ?>
    <button type="button" class="toggle-button" data-toggle="modal" data-target="#<?php print $divid; ?>">
      <p class="image"><?php print theme('image', array('path' => $item['#item']['uri'])); ?></p>
    </button>
  <?php endif; ?>
  <div class="modal fade" id="<?php print $divid; ?>" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <?php if(isset($item['#item']['field_file_image_title_text'])): ?>
            <h4 class="modal-title"><?php print $item['#item']['field_file_image_title_text']['und'][0]['value']; ?></h4>
          <?php endif; ?>
        </div>
        <div class="modal-body">
          <?php if(isset($item['#item']['uri'])): ?>
            <p class="image"><?php print theme('image', array('path' => $item['#item']['uri'])); ?></p>
          <?php endif; ?>
          <?php if(isset($item['#item']['field_ott_image_caption'])): ?>
            <p><?php print $item['#item']['field_ott_image_caption'][$lang_code][0]['value']; ?></p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
