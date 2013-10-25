<?php
/**
 * ModCore Panels Layout
 *
 * @file
 * Template for a 3 column panel layout.
 *
 * This template provides a three column panel display layout, with
 * each column roughly equal in width.
 *
 * Variables:
 * - $id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 *   panel of the layout. This layout supports the following sections:
 *   - $content['left']: Content in the left column.
 *   - $content['middle']: Content in the middle column.
 *   - $content['right']: Content in the right column.
 */
?>
<?php if (path_is_admin(current_path())) : ?>
<div class="grid">
<?php endif; ?>
<div <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?> class="row">
	<div class="g8">
		<?php print $content['left']; ?>
	</div>
	<div class="g4">
		<?php print $content['right']; ?>
	</div>
</div>
<?php if (path_is_admin(current_path())) : ?>
</div>
<?php endif; ?>