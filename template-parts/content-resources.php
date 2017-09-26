<section class="resource">
  <h2>Recommended Reading</h2>
  <?php the_field('intro_text'); ?>

  <?php
    $sections = get_field('reading_sections');
    if($sections) {
      foreach($sections as $section) {

        $resources = $section['resource'];
        if($resources) {

          echo '<div class="sub-section">';
            echo '<h1>'.$section['title'].'</h1>';

            echo '<div class="grid-me">';
            foreach($resources as $resource) {
                // get some variables to reuse
                $url = $resource['link'];
                $title = $resource['title'];
              ?>


              <div class="media">
                <div class="img">
                  <?php if($resource['image']) {
                      if($url) { echo '<a href="'.$url.'" target="_blank">'; } ?>
                      <img src="<?php echo $resource['image']['sizes']['medium']; ?>" alt="<?php echo $title; ?>">
                      <?php if($url) { echo '</a>'; } ?>
                  <?php } else { ?>
                    <img src="http://placehold.it/200x300" alt="Placeholder">
                  <?php } ?>
                </div>
                <h3 class="title"><?php echo $title; ?></h3>
                <div class="content">
                  <i><?php echo $resource['author']; ?></i><br />
                  <?php if($resource['description']){
                    echo $resource['description'];
                  } ?>

                  <?php
                    if($url){
                      $urlbits = parse_url($url);
                    ?>
                      Buy on: <a href="<?php echo $url; ?>" target="_blank">
                        <?php echo $urlbits['host']; ?>
                      </a>
                  <?php } ?>
                </div>

              </div>
          <?php  } // end if resources
            echo '</div>';
          echo '</div>';
        } // end if $resources
      } // end foreach $sections
    } // end if $sections
  ?>

</section>

<section class="resource">
  <h1>Character Studies</h1>
  <?php the_field('characterstudies_intro'); ?>

  <?php
        $resources = get_field('characterstudies_resources');
        if($resources) {
          echo '<div class="grid-me">';
          foreach($resources as $resource) { ?>
            <div class="media-holder">
              <h3 class="title"><?php echo $resource['title']; ?></h3>
              <div class="content">
                <?php echo $resource['description']; ?>
              </div>
              <div class="footer">
                <?php echo $resource['video']; ?>
              </div>
            </div>
          <?php
        } // end foreach resources
        echo '</div>';
      } // end if $resources
  ?>
</section>

<section class="resource">
  <h1>TED Talks</h1>
  <?php the_field('tedtalks_intro'); ?>

  <?php
        $resources = get_field('tedtalks_resources');
        if($resources) {
          echo '<div class="grid-me">';
          foreach($resources as $resource) { ?>
            <div class="media-holder">
              <h3 class="title"><?php echo $resource['title']; ?></h3>
              <div class="content">
                <?php echo $resource['description']; ?>
              </div>
              <div class="footer">
                <?php echo $resource['video']; ?>
              </div>
            </div>
          <?php
        } // end foreach resources
        echo '</div>';
      } // end if $resources
  ?>
</section>
