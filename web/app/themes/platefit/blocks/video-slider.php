<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
  'key' => 'group_5f3313eaec550',
  'title' => 'Video Slider',
  'fields' => array(
    array(
      'key' => 'field_5f33144f5de9c',
      'label' => 'Video Slides',
      'name' => 'video_slides',
      'type' => 'repeater',
      'instructions' => '',
      'required' => 0,
      'conditional_logic' => 0,
      'wrapper' => array(
        'width' => '',
        'class' => '',
        'id' => '',
      ),
      'collapsed' => '',
      'min' => 0,
      'max' => 0,
      'layout' => 'block',
      'button_label' => 'Add Slide',
      'sub_fields' => array(
        array(
          'key' => 'field_5f33146c5de9d',
          'label' => 'Title',
          'name' => 'title',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_5f3314715de9e',
          'label' => 'Description',
          'name' => 'description',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_5f33147a5de9f',
          'label' => 'Button URL',
          'name' => 'button_url',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_5f3314875dea0',
          'label' => 'Button Text',
          'name' => 'button_text',
          'type' => 'text',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'default_value' => '',
          'placeholder' => '',
          'prepend' => '',
          'append' => '',
          'maxlength' => '',
        ),
        array(
          'key' => 'field_5f33148d5dea1',
          'label' => 'Image',
          'name' => 'image',
          'type' => 'image',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'return_format' => 'url',
          'preview_size' => 'medium',
          'library' => 'all',
          'min_width' => '',
          'min_height' => '',
          'min_size' => '',
          'max_width' => '',
          'max_height' => '',
          'max_size' => '',
          'mime_types' => '',
        ),
        array(
          'key' => 'field_5f3314975dea2',
          'label' => 'Video',
          'name' => 'video',
          'type' => 'file',
          'instructions' => '',
          'required' => 0,
          'conditional_logic' => 0,
          'wrapper' => array(
            'width' => '',
            'class' => '',
            'id' => '',
          ),
          'return_format' => 'url',
          'library' => 'all',
          'min_size' => '',
          'max_size' => '',
          'mime_types' => '',
        ),
      ),
    ),
  ),
  'location' => array(
    array(
      array(
        'param' => 'block',
        'operator' => '==',
        'value' => 'acf/video-slider',
      ),
    ),
  ),
  'menu_order' => 0,
  'position' => 'normal',
  'style' => 'default',
  'label_placement' => 'top',
  'instruction_placement' => 'label',
  'hide_on_screen' => '',
  'active' => true,
  'description' => '',
));

endif;


/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'videoslider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'videoslider';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$video_slides = get_field('video_slides');

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

<?php if( $video_slides ) { ?>
<div class="owl-carousel owl-theme video-slider-custom">
  <?php foreach( $video_slides as $slide ) { ?>

    <div class="item">
      <div class="slider-container">
        <div class="slider-item">
              <div class="col-left-slide">
                <div class="slider-image">
                  <img src="<?php echo $slide['image']; ?>">
                </div>
                <div class="slider-content">
                        <h1 class="hero__title"><?php echo $slide['title']; ?></h1>
                        <?php if($slide['description']): ?>
                        <div class="description"><?php echo $slide['description']; ?></div>
                        <?php endif; ?>
                        <?php if($slide['button_text']): ?>
                          <a class="btn btn--arrow" href="<?php echo $slide['button_url']; ?>"><?php echo $slide['button_text']; ?><svg><use href="#arrow"></use></svg>
                          </a>
                        <?php endif; ?>
                  </div>
              </div>
              <div class="col-right-slide">
                  <?php if($slide['video']): ?>
                    <video autoplay muted loop>                        
                      <source src="<?php echo $slide['video']; ?>" type=video/mp4>
                    </video>
                  <?php else: ?>
                    <img src="<?php echo $slide['image']; ?>">
                  <?php endif; ?>
              </div>
        </div>        
      </div>
    </div>
    <?php } ?>

    
</div>
<?php } ?>
</div>
