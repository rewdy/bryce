<?php

/**
 * Bryce Theme
 * Custom View Unformatted File
 * ---
 */
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<?php foreach ($rows as $id => $row): ?>
<?php

// whether or not to show wrapping div (and classes)
$showDiv = $classes_array[$id];

?>
  <?php if ($showDiv) : ?>
  <div <?php print 'class="' . $classes_array[$id] .'"'; ?>>
  <?php endif; ?>
    <?php print $row; ?>
  <?php if ($showDiv) : ?>
  </div>
  <?php endif; ?>
<?php endforeach; ?>
