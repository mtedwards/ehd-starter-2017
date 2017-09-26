<section class="home-sections">
  <?php
    $sections = get_field('sections');
    if($sections) {
      foreach($sections as $section) {
        $image = $section['image'];
        ?>
        <div class="sub-section">
          <div class="sub-section-text">
            <?php echo $section['text']; ?>
          </div>
          <div class="sub-section-image">
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
          </div>
        </div>
    <?php
      } // end foreach $sections
    } // end if $sections
  ?>
</section>
