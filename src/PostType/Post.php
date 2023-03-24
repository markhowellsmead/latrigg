<?php

namespace SayHello\Theme\PostType;

class Post
{


	public function run()
	{
		add_action('post_tag_edit_form_fields', [$this, 'addCheckboxToTagEditScreen'], 10, 2);
		add_action('edited_post_tag', [$this, 'saveTagExtraFields'], 10, 2);
		add_action('pre_get_posts', [$this, 'sortTagPosts']);
	}

	public function addCheckboxToTagEditScreen($tag)
	{
		$tag_id = $tag->term_id;
		$tag_meta = get_option("tag_$tag_id");
		$sort_asc = $tag_meta['sort_asc'] ?? '';
		$checked = ($sort_asc === 'on') ? 'checked' : '';
?>
		<tr class="form-field">
			<th scope="row" valign="top"><label for="tag_meta[sort_asc]"><?php _e('Sort by date ascending'); ?></label></th>
			<td>
				<input type="checkbox" name="tag_meta[sort_asc]" id="tag_meta[sort_asc]" <?php echo $checked; ?> />
				<p class="description"><?php _e('Sorts the posts by date ascending in the tag list view.'); ?></p>
			</td>
		</tr>
<?php
	}

	public function saveTagExtraFields($term_id)
	{
		if (isset($_POST['tag_meta'])) {
			$t_id = $term_id;
			$tag_meta = get_option("tag_$t_id");
			$tag_keys = array_keys($_POST['tag_meta']);
			foreach ($tag_keys as $key) {
				if (isset($_POST['tag_meta'][$key])) {
					$tag_meta[$key] = $_POST['tag_meta'][$key];
					$tag_meta[$key] = esc_html($tag_meta[$key]);
					$tag_meta[$key] = esc_sql($tag_meta[$key]);
				}
			}
			// Save the option array.
			update_option("tag_$t_id", $tag_meta);
		}
	}

	public function sortTagPosts()
	{
		if (is_tag()) {
			$tag = get_queried_object();
			$tag_id = $tag->term_id;
			$tag_meta = get_option("tag_$tag_id");
			$sort_asc = $tag_meta['sort_asc'] ?? '';
			if ($sort_asc === 'on') {
				set_query_var('order', 'ASC');
			}
		}
	}
}
