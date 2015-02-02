<?php
/**
 * Sets up the options for admin.php
 *
 * @package   Book_Reviews
 * @author    Chris Reynolds <hello@chrisreynolds.io>
 * @license   GPL-3.0
 * @link      http://chrisreynolds.io
 * @copyright 2013 Chris Reynolds
 */

/**
 * Book Reviews Options class
 * Handles the options and options page markup
 * @since 1.5.0
 */
class Book_Reviews_Options {

	/**
	 * Array of metaboxes/fields
	 * @var string
	 */
	protected $option_metabox = array();

	/**
	 * Options Page Title
	 * @var string
	 */
	protected $title = '';

	/**
	 * Options Page hook
	 * @var string
	 */
	protected $options_page = '';

	public function __construct() {

	}

	public function hooks() {}

	/**
	 * Default option settings (moved from book_review_option_defaults)
	 *
	 * @since 	1.0.0
	 * @return 	$defaults 	all the default settings (everything disabled)
	 */
	public function defaults() {
		$defaults = array(
			'review-author' => false,
			'reading-level' => false,
			'subject' => false,
			'illustrator' => false,
			'awards' => false,
			'series' => false,
			'rating' => false,
			'stock' => false,
			'roles' => false,
			'title-filter' => true,
			'comments' => false,
			'author-image' => false,
			'languages' => false,
			'format' => false,
			'publisher' => false,
			'thumbnail' => 'book-cover'
		);
		return $defaults;
	}

	/**
	 * Handles true/false settings
	 *
	 * @since  1.5.0
	 * @return array
	 */
	public function true_false() {
		return array(
			true  => __( 'Enabled', 'book-review-library' ),
			false => __( 'Disabled', 'book-review-library' )
		);
	}

	/**
	 * Handles book cover size settings
	 *
	 * @since  1.5.0
	 * @return array
	 */
	public function book_covers() {
		return array(
			'thumbnail'  => __( 'Use the post thumbnail size', 'book-review-library' ),
			'book-cover'  => __( 'Use 6:9 book cover size (133px x 200px)', 'book-review-library' )
		);
	}

}
$Book_Reviews_Options = new Book_Reviews_Options();
$Book_Reviews_Options->hooks();

/**
 * Wrapper function for cmb2_get_option to get specified Book Review
 * setting
 *
 * @since  1.5.0
 * @link   https://github.com/WebDevStudios/CMB2/wiki/Using-CMB-to-create-an-Admin-Theme-Options-Page
 * @param  string $key 	Options array key
 * @return mixed 		Option value
 */
function book_review_get_option( $key = '' ) {
	global $Book_Reviews_Options;
	return cmb2_get_option( $Book_Reviews_Options->key, $key );
}

/**
 * Review Author option
 * The HTML for Review Author
 *
 * @since 	1.0.0
 */
function book_reviews_review_author() {
	include_once(BOOK_REVIEWS_FUNC);
	$defaults = book_reviews_option_defaults();
	$options = get_option( 'book_reviews_settings', $defaults );
	?>
	<tr valign="top"><th scope="row"><?php _e( 'Review Authors', 'book-review-library' ); ?></th>
		<td>
			<select name="book_reviews_settings[review-author]" id="review-author">
			<?php
				$selected = $options['review-author'];
				foreach ( book_reviews_true_false() as $option ) {
					$label = $option['label'];
					$value = $option['value'];
					echo '<option value="' . $value . '" ' . selected( $selected, $value ) . '>' . $label . '</option>';
				} ?>
			</select><br />
			<label class="description" for="book_reviews_settings[review-author]"><?php _e( 'Enable this if the person adding the book review is not the original author of the review.', 'book-review-library' ); ?></label>
		</td>
	</tr>
	<?php
}

/**
 * Reading level option
 * The HTML for Reading level
 *
 * @since 	1.0.0
 */
function book_reviews_reading_level() {
	include_once(BOOK_REVIEWS_FUNC);
	$defaults = book_reviews_option_defaults();
	$options = get_option( 'book_reviews_settings', $defaults );
	?>
	<tr valign="top"><th scope="row"><?php _e( 'Reading Level', 'book-review-library' ); ?></th>
		<td>
			<select name="book_reviews_settings[reading-level]" id="reading-level">
			<?php
				$selected = $options['reading-level'];
				foreach ( book_reviews_true_false() as $option ) {
					$label = $option['label'];
					$value = $option['value'];
					echo '<option value="' . $value . '" ' . selected( $selected, $value ) . '>' . $label . '</option>';
				} ?>
			</select><br />
			<label class="description" for="book_reviews_settings[reading-level]"><?php _e( 'Enable this to display the reading level for the book.', 'book-review-library' ); ?></label>
		</td>
	</tr>
	<?php
}

/**
 * subject option
 * The HTML for subject
 *
 * @since 	1.0.0
 */
function book_reviews_subject() {
	include_once(BOOK_REVIEWS_FUNC);
	$defaults = book_reviews_option_defaults();
	$options = get_option( 'book_reviews_settings', $defaults );
	?>
	<tr valign="top"><th scope="row"><?php _e( 'Subject', 'book-review-library' ); ?></th>
		<td>
			<select name="book_reviews_settings[subject]" id="subject">
			<?php
				$selected = $options['subject'];
				foreach ( book_reviews_true_false() as $option ) {
					$label = $option['label'];
					$value = $option['value'];
					echo '<option value="' . $value . '" ' . selected( $selected, $value ) . '>' . $label . '</option>';
				} ?>
			</select><br />
			<label class="description" for="book_reviews_settings[subject]"><?php _e( 'Enable this to tag the book with different subjects (unique from genres).', 'book-review-library' ); ?></label>
		</td>
	</tr>
	<?php
}

/**
 * Illustrator option
 * The HTML for Illustrator
 *
 * @since 	1.0.0
 */
function book_reviews_illustrator() {
	include_once(BOOK_REVIEWS_FUNC);
	$defaults = book_reviews_option_defaults();
	$options = get_option( 'book_reviews_settings', $defaults );
	?>
	<tr valign="top"><th scope="row"><?php _e( 'Illustrator', 'book-review-library' ); ?></th>
		<td>
			<select name="book_reviews_settings[illustrator]" id="illustrator">
			<?php
				$selected = $options['illustrator'];
				foreach ( book_reviews_true_false() as $option ) {
					$label = $option['label'];
					$value = $option['value'];
					echo '<option value="' . $value . '" ' . selected( $selected, $value ) . '>' . $label . '</option>';
				} ?>
			</select><br />
			<label class="description" for="book_reviews_settings[illustrator]"><?php _e( 'Enable this to add illustrators to book reviews.', 'book-review-library' ); ?></label>
		</td>
	</tr>
	<?php
}

/**
 * Awards option
 * The HTML for Awards
 *
 * @since 	1.0.0
 */
function book_reviews_awards() {
	include_once(BOOK_REVIEWS_FUNC);
	$defaults = book_reviews_option_defaults();
	$options = get_option( 'book_reviews_settings', $defaults );
	?>
	<tr valign="top"><th scope="row"><?php _e( 'Awards', 'book-review-library' ); ?></th>
		<td>
			<select name="book_reviews_settings[awards]" id="awards">
			<?php
				$selected = $options['awards'];
				foreach ( book_reviews_true_false() as $option ) {
					$label = $option['label'];
					$value = $option['value'];
					echo '<option value="' . $value . '" ' . selected( $selected, $value ) . '>' . $label . '</option>';
				} ?>
			</select><br />
			<label class="description" for="book_reviews_settings[awards]"><?php _e( 'Enable this to add awards the book has received.', 'book-review-library' ); ?></label>
		</td>
	</tr>
	<?php
}

/**
 * Series option
 * The HTML for Series
 *
 * @since 	1.0.0
 */
function book_reviews_series() {
	include_once(BOOK_REVIEWS_FUNC);
	$defaults = book_reviews_option_defaults();
	$options = get_option( 'book_reviews_settings', $defaults );
	?>
	<tr valign="top"><th scope="row"><?php _e( 'Series', 'book-review-library' ); ?></th>
		<td>
			<select name="book_reviews_settings[series]" id="series">
			<?php
				$selected = $options['series'];
				foreach ( book_reviews_true_false() as $option ) {
					$label = $option['label'];
					$value = $option['value'];
					echo '<option value="' . $value . '" ' . selected( $selected, $value ) . '>' . $label . '</option>';
				} ?>
			</select><br />
			<label class="description" for="book_reviews_settings[series]"><?php _e( 'Enable this to group books by series.', 'book-review-library' ); ?></label>
		</td>
	</tr>
	<?php
}

/**
 * Rating option
 * The HTML for Rating
 *
 * @since 	1.0.0
 */
function book_reviews_rating() {
	include_once(BOOK_REVIEWS_FUNC);
	$defaults = book_reviews_option_defaults();
	$options = get_option( 'book_reviews_settings', $defaults );
	?>
	<tr valign="top"><th scope="row"><?php _e( 'Ratings', 'book-review-library' ); ?></th>
		<td>
			<select name="book_reviews_settings[rating]" id="rating">
			<?php
				$selected = $options['rating'];
				foreach ( book_reviews_true_false() as $option ) {
					$label = $option['label'];
					$value = $option['value'];
					echo '<option value="' . $value . '" ' . selected( $selected, $value ) . '>' . $label . '</option>';
				} ?>
			</select><br />
			<label class="description" for="book_reviews_settings[rating]"><?php _e( 'Enable this for star ratings.', 'book-review-library' ); ?></label>
		</td>
	</tr>
	<?php
}

/**
 * In stock option
 * The HTML for In stock
 *
 * @since 	1.0.0
 */
function book_reviews_stock() {
	include_once(BOOK_REVIEWS_FUNC);
	$defaults = book_reviews_option_defaults();
	$options = get_option( 'book_reviews_settings', $defaults );
	?>
	<tr valign="top"><th scope="row"><?php _e( 'Stock', 'book-review-library' ); ?></th>
		<td>
			<select name="book_reviews_settings[stock]" id="stock">
			<?php
				$selected = $options['stock'];
				foreach ( book_reviews_true_false() as $option ) {
					$label = $option['label'];
					$value = $option['value'];
					echo '<option value="' . $value . '" ' . selected( $selected, $value ) . '>' . $label . '</option>';
				} ?>
			</select><br />
			<label class="description" for="book_reviews_settings[stock]"><?php _e( 'Enable this to display "In Stock"/"Out of Stock" information with the book review.', 'book-review-library' ); ?></label>
		</td>
	</tr>
	<?php
}

/**
 * Author in title option
 * enables/disables the_title filter for author
 *
 * @since 1.1.0
 */
function book_reviews_title() {
	include_once(BOOK_REVIEWS_FUNC);
	$defaults = book_reviews_option_defaults();
	$options = get_option( 'book_reviews_settings', $defaults );
	?>
	<tr valign="top"><th scope="row"><?php _e( 'Display author with title', 'book-review-library' ); ?></th>
		<td>
			<select name="book_reviews_settings[title-filter]" id="title-filter">
			<?php
				$selected = $options['title-filter'];
				foreach ( book_reviews_title_filter() as $option ) {
					$label = $option['label'];
					$value = $option['value'];
					echo '<option value="' . $value . '" ' . selected( $selected, $value ) . '>' . $label . '</option>';
				} ?>
			</select><br />
			<label class="description" for="book_reviews_settings[title-filter]"><?php _e( '<strong>With the title</strong> displays the author on the same line as the book title. <strong>On a new line</strong> adds a line break before displaying the author. <strong>Disabled</strong> removes the author from the title entirely.', 'book-review-library' ); ?></label>
		</td>
	</tr>
	<?php
}

/**
 * Comments option
 * enables/disables comments on book review posts
 *
 * @since 1.2.0
 */
function book_reviews_comments() {
	include_once(BOOK_REVIEWS_FUNC);
	$defaults = book_reviews_option_defaults();
	$options = get_option( 'book_reviews_settings', $defaults );
	?>
	<tr valign="top"><th scope="row"><?php _e( 'Comments on book reviews', 'book-review-library' ); ?></th>
		<td>
			<select name="book_reviews_settings[comments]" id="comments">
			<?php
				$selected = $options['comments'];
				foreach ( book_reviews_true_false() as $option ) {
					$label = $option['label'];
					$value = $option['value'];
					echo '<option value="' . $value . '" ' . selected( $selected, $value ) . '>' . $label . '</option>';
				} ?>
			</select><br />
			<label class="description" for="book_reviews_settings[comments]"><?php _e( 'If enabled, allows visitors to comment on book reviews.', 'book-review-library' ); ?></label>
		</td>
	</tr>
	<?php
}

/**
 * Book cover option
 * allows user to set the book cover thumbnail option
 *
 * @since 1.4.11
 */
function book_reviews_thumbnail() {
	include_once(BOOK_REVIEWS_FUNC);
	$defaults = book_reviews_option_defaults();
	$options = get_option( 'book_reviews_settings', $defaults );
	?>
	<tr valign="top"><th scope="row"><?php _e( 'Book cover size', 'book-review-library' ); ?></th>
		<td>
			<select name="book_reviews_settings[thumbnail]" id="thumbnail">
			<?php
				$selected = $options['thumbnail'];
				foreach ( book_reviews_image_size() as $option ) {
					$label = $option['label'];
					$value = $option['value'];
					echo '<option value="' . $value . '" ' . selected( $selected, $value ) . '>' . $label . '</option>';
				} ?>
			</select><br />
			<label class="description" for="book_reviews_settings[thumbnail]"><?php _e( 'If covers are displayed, this controls how they are sized. Either uses the theme setting for thumbnails (which may be controlled by the theme or the Thumbnail setting on the Media Settings page) or a Book Review Library standard book cover size.', 'book-review-library' ); ?></label>
		</td>
	</tr>
	<?php
}

/**
 * Author Image
 * enables/disables author image uploads
 *
 * @since 1.5.0
 */
function book_reviews_author_image() {
	include_once(BOOK_REVIEWS_FUNC);
	$defaults = book_reviews_option_defaults();
	$options = get_option( 'book_reviews_settings', $defaults );
	?>
	<tr valign="top"><th scope="row"><?php _e( 'Author Image', 'book-review-library' ); ?></th>
		<td>
			<select name="book_reviews_settings[author-image]" id="author-image">
			<?php
				$selected = $options['author-image'];
				foreach ( book_reviews_true_false() as $option ) {
					$label = $option['label'];
					$value = $option['value'];
					echo '<option value="' . $value . '" ' . selected( $selected, $value ) . '>' . $label . '</option>';
				} ?>
			</select><br />
			<label class="description" for="book_reviews_settings[author-image]"><?php _e( 'Enable to allow uploads for an author image to display with the book review.', 'book-review-library' ); ?></label>
		</td>
	</tr>
	<?php
}

/**
 * Languages
 * enables/disables the language taxonomy
 *
 * @since 1.5.0
 */
function book_reviews_languages() {
	include_once(BOOK_REVIEWS_FUNC);
	$defaults = book_reviews_option_defaults();
	$options = get_option( 'book_reviews_settings', $defaults );
	?>
	<tr valign="top"><th scope="row"><?php _e( 'Languages', 'book-review-library' ); ?></th>
		<td>
			<select name="book_reviews_settings[languages]" id="languages">
			<?php
				$selected = $options['languages'];
				foreach ( book_reviews_true_false() as $option ) {
					$label = $option['label'];
					$value = $option['value'];
					echo '<option value="' . $value . '" ' . selected( $selected, $value ) . '>' . $label . '</option>';
				} ?>
			</select><br />
			<label class="description" for="book_reviews_settings[languages]"><?php _e( 'When enabled, allow books to be grouped by language.', 'book-review-library' ); ?></label>
		</td>
	</tr>
	<?php
}

/**
 * Format
 * enables/disables format option
 *
 * @since 1.5.0
 */
function book_reviews_format() {
	include_once(BOOK_REVIEWS_FUNC);
	$defaults = book_reviews_option_defaults();
	$options = get_option( 'book_reviews_settings', $defaults );
	?>
	<tr valign="top"><th scope="row"><?php _e( 'Format', 'book-review-library' ); ?></th>
		<td>
			<select name="book_reviews_settings[format]" id="format">
			<?php
				$selected = $options['format'];
				foreach ( book_reviews_true_false() as $option ) {
					$label = $option['label'];
					$value = $option['value'];
					echo '<option value="' . $value . '" ' . selected( $selected, $value ) . '>' . $label . '</option>';
				} ?>
			</select><br />
			<label class="description" for="book_reviews_settings[format]"><?php _e( 'Group books by formats (eBook, audiobook, etc).', 'book-review-library' ); ?></label>
		</td>
	</tr>
	<?php
}

/**
 * Publisher
 * enables/disables Publisher taxonomy
 *
 * @since 1.5.0
 */
function book_reviews_publisher() {
	include_once(BOOK_REVIEWS_FUNC);
	$defaults = book_reviews_option_defaults();
	$options = get_option( 'book_reviews_settings', $defaults );
	?>
	<tr valign="top"><th scope="row"><?php _e( 'Publisher', 'book-review-library' ); ?></th>
		<td>
			<select name="book_reviews_settings[publisher]" id="publisher">
			<?php
				$selected = $options['publisher'];
				foreach ( book_reviews_true_false() as $option ) {
					$label = $option['label'];
					$value = $option['value'];
					echo '<option value="' . $value . '" ' . selected( $selected, $value ) . '>' . $label . '</option>';
				} ?>
			</select><br />
			<label class="description" for="book_reviews_settings[publisher]"><?php _e( 'Group books by their publisher.', 'book-review-library' ); ?></label>
		</td>
	</tr>
	<?php
}

/**
 * DO ALL THE THINGS!
 *
 * @since 	1.0.0
 */
function book_reviews_do_options() {
	$options_before = '<table class="form-table">';
	$options_after = '</table>';

	// do stuff
	echo $options_before;
	book_reviews_review_author();
	book_reviews_reading_level();
	book_reviews_subject();
	book_reviews_illustrator();
	book_reviews_awards();
	book_reviews_series();
	book_reviews_rating();
	book_reviews_languages();
	book_reviews_format();
	book_reviews_publisher();
	book_reviews_thumbnail();
	book_reviews_stock();
	book_reviews_author_image();
	book_reviews_title();
	book_reviews_comments();
	echo $options_after;
}