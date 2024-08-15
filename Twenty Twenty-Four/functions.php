/**
 * Custom Page Title
 * Custom Fields: seo_title = "Mehmet Karaca kimdir? – Özgeçmişi, deneyimleri, iletişim bilgileri"
 */

function custom_document_title($title) {
    if (is_page()) {
        global $post;
        $seo_title = get_post_meta($post->ID, 'seo_title', true);

        if (!empty($seo_title)) {
            $title['title'] = $seo_title;
        }

        unset($title['site']); 
    }
    return $title;
}
add_filter('document_title_parts', 'custom_document_title');


/**
 * Custom Page Canonical URL
 * Custom Fields: seo_canonical = "https://mkaraca.com/hakkinda/"
 */

function custom_canonical_url( $canonical_url, $post ) {
  if (is_page()) {
    $seo_canonical = get_post_meta($post->ID, 'seo_canonical', true);

    if (!empty($seo_canonical)) {
      $canonical_url = esc_url($seo_canonical);
    }
  }
  return $canonical_url;
}
add_filter('get_canonical_url', 'custom_canonical_url', 10, 2);
