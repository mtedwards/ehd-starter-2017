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
            echo '<h3>'.$section['title'].'</h3>';
            foreach($resources as $resource) {
              echo '<a href="'.$resource['link'].'">';
                echo $resource['title'] . ' ('.$resource['author'].').';
              echo '</a>';

            } // end if resources
          echo '</div>';
        } // end if $resources
      } // end foreach $sections
    } // end if $sections
  ?>
</section>

<section class="resource">
  <h2>Character Studies</h2>
  <?php the_field('characterstudies_intro'); ?>

  <?php
        $resources = get_field('characterstudies_resources');
        if($resources) {
          foreach($resources as $resource) {
            echo '<div class="sub-section">';
              echo '<h3>'.$resource['title'].'</h3>';

              echo '<div class="description">';
                echo $resource['description'];
              echo '</div>';

              echo '<div class="video">';
                echo $resource['video'];
              echo '</div>';
            echo '</div>';
          } // end if resources
        } // end if $resources
  ?>
</section>

<section class="resource">
  <h2>TED Talks</h2>
  <?php the_field('tedtalks_intro'); ?>

  <?php
        $resources = get_field('tedtalks_resources');
        if($resources) {
          foreach($resources as $resource) {
            echo '<div class="sub-section">';
              echo '<h3>'.$resource['title'].'</h3>';

              echo '<div class="description">';
                echo $resource['description'];
              echo '</div>';

              echo '<div class="video">';
                echo $resource['video'];
              echo '</div>';
            echo '</div>';
          } // end if resources
        } // end if $resources
  ?>
</section>
