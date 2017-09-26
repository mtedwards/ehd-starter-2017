jQuery(document).ready(function( $ ) {
  fitvids('.entry-content', {
    players: ['iframe[src*="embed.ted.com"]', 'iframe[src*="www.google.com"]']
  });

  $(".shows").slick({
    // normal options...
    infinite: true,
    autoplay: true,

  });
});
