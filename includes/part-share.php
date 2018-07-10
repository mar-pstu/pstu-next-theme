<?php

/**
 *  Блок поделиться
 */

if ( ! defined( 'ABSPATH' ) ) { exit; };


if ( get_theme_mod( 'share_flag', true ) ) {

  echo "<div class=\"share\" id=\"share\">\r\n";
  echo "  <ul class=\"rrssb-buttons clearfix list-unstyled\" id=\"rrssb-buttons\">\r\n";

  $share_links = get_theme_mod( 'share_links', array() );

  $page_info = get_pstu_rrssb_page_info();

  foreach ( array( 'email', 'facebook', 'instagram', 'linkedin', 'xing', 'twitter', 'googleplus', 'pocket', 'youtube', 'github', 'print', 'whatsapp' ) as $slug ) {

    $share_links[ $slug ] = ( ( isset( $share_links[ $slug ] ) ) ) ? $share_links[ $slug ] : true;

    if ( ! $share_links[ $slug ] ) continue;
    
    switch ( $slug ) {

      case 'email':
        echo "<li class=\"rrssb-email\">\r\n";
        echo "  <a href=\"mailto:?Subject=" . esc_url_raw( $page_info[ 'title' ] ) . "\">\r\n";
        echo "    <span class=\"rrssb-icon\">\r\n";
        echo "      <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\">\r\n";
        echo "        <path d=\"M21.386 2.614H2.614A2.345 2.345 0 0 0 .279 4.961l-.01 14.078a2.353 2.353 0 0 0 2.346 2.347h18.771a2.354 2.354 0 0 0 2.347-2.347V4.961a2.356 2.356 0 0 0-2.347-2.347zm0 4.694L12 13.174 2.614 7.308V4.961L12 10.827l9.386-5.866v2.347z\"/>\r\n";
        echo "      </svg>\r\n";
        echo "    </span>\r\n";
        echo "    <span class=\"rrssb-text\">" . __( 'Email', 'pstu-profcom-theme' ) . "</span>\r\n";
        echo "  </a>\r\n";
        echo "</li>\r\n";
        break;

      case 'facebook':
        echo "<li class=\"rrssb-facebook\">\r\n";
        echo "  <a class=\"popup\" href=\"https://www.facebook.com/sharer/sharer.php?u=http://rrssb.ml\">\r\n";
        echo "    <span class=\"rrssb-icon\">\r\n";
        echo "      <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 29 29\">\r\n";
        echo "        <path d=\"M26.4 0H2.6C1.714 0 0 1.715 0 2.6v23.8c0 .884 1.715 2.6 2.6 2.6h12.393V17.988h-3.996v-3.98h3.997v-3.062c0-3.746 2.835-5.97 6.177-5.97 1.6 0 2.444.173 2.845.226v3.792H21.18c-1.817 0-2.156.9-2.156 2.168v2.847h5.045l-.66 3.978h-4.386V29H26.4c.884 0 2.6-1.716 2.6-2.6V2.6c0-.885-1.716-2.6-2.6-2.6z\"/>\r\n";
        echo "      </svg>\r\n";
        echo "    </span>\r\n";
        echo "    <span class=\"rrssb-text\">" . __( 'Facebook', 'pstu-profcom-theme' ) . "</span>\r\n";
        echo "  </a>\r\n";
        echo "</li>\r\n";
        break;

      case 'value':
        echo "<li class=\"rrssb-instagram\">\r\n";
        echo "  <a href=\"http://instagram.com/dbox\">\r\n";
        echo "    <span class=\"rrssb-icon\">\r\n";
        echo "      <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"864\" height=\"864\" viewBox=\"0 0 864 864\">\r\n";
        echo "        <path d=\"M860.079 254.436c-2.091-45.841-9.371-77.147-20.019-104.542-11.007-28.32-25.731-52.338-49.673-76.28-23.943-23.943-47.962-38.669-76.282-49.675C686.711 13.292 655.404 6.013 609.564 3.92 563.628 1.824 548.964 1.329 432 1.329s-131.63.495-177.564 2.591c-45.841 2.093-77.147 9.372-104.542 20.019-28.319 11.006-52.338 25.731-76.28 49.675-23.943 23.942-38.669 47.96-49.675 76.28C13.292 177.288 6.013 208.595 3.92 254.436 1.824 300.37 1.329 315.036 1.329 432s.495 131.628 2.591 177.564c2.093 45.84 9.372 77.146 20.019 104.541 11.006 28.319 25.731 52.339 49.675 76.282 23.942 23.941 47.961 38.666 76.28 49.673 27.395 10.647 58.701 17.927 104.542 20.019 45.935 2.096 60.601 2.592 177.564 2.592s131.628-.496 177.564-2.592c45.84-2.092 77.146-9.371 104.541-20.019 28.32-11.007 52.339-25.731 76.282-49.673 23.941-23.943 38.666-47.962 49.673-76.282 10.647-27.395 17.928-58.701 20.019-104.541 2.096-45.937 2.592-60.601 2.592-177.564s-.496-131.63-2.592-177.564zm-77.518 351.591c-1.915 41.99-8.932 64.793-14.828 79.969-7.812 20.102-17.146 34.449-32.216 49.521-15.071 15.07-29.419 24.403-49.521 32.216-15.176 5.896-37.979 12.913-79.969 14.828-45.406 2.072-59.024 2.511-174.027 2.511s-128.622-.438-174.028-2.511c-41.988-1.915-64.794-8.932-79.97-14.828-20.102-7.812-34.448-17.146-49.518-32.216-15.071-15.071-24.405-29.419-32.218-49.521-5.897-15.176-12.912-37.979-14.829-79.968-2.071-45.413-2.51-59.034-2.51-174.028s.438-128.615 2.51-174.028c1.917-41.988 8.932-64.794 14.829-79.97 7.812-20.102 17.146-34.448 32.216-49.518 15.071-15.071 29.418-24.405 49.52-32.218 15.176-5.897 37.981-12.912 79.97-14.829 45.413-2.071 59.034-2.51 174.028-2.51s128.615.438 174.027 2.51c41.99 1.917 64.793 8.932 79.969 14.829 20.102 7.812 34.449 17.146 49.521 32.216 15.07 15.071 24.403 29.418 32.216 49.52 5.896 15.176 12.913 37.981 14.828 79.97 2.071 45.413 2.511 59.034 2.511 174.028s-.44 128.615-2.511 174.027z\"></path>\r\n";
        echo "        <path d=\"M432 210.844c-122.142 0-221.156 99.015-221.156 221.156S309.859 653.153 432 653.153 653.153 554.14 653.153 432c0-122.142-99.012-221.156-221.153-221.156zm0 364.713c-79.285 0-143.558-64.273-143.558-143.557 0-79.285 64.272-143.558 143.558-143.558 79.283 0 143.557 64.272 143.557 143.558 0 79.283-64.274 143.557-143.557 143.557z\"></path>\r\n";
        echo "        <circle cx=\"661.893\" cy=\"202.107\" r=\"51.68\"></circle>\r\n";
        echo "      </svg>\r\n";
        echo "    </span>\r\n";
        echo "    <span class=\"rrssb-text\">" . __( 'Instagram', 'pstu-profcom-theme' ) . "</span>\r\n";
        echo "  </a>\r\n";
        echo "</li>\r\n";
        break;

      case 'linkedin':
        echo "<li class=\"rrssb-linkedin\">\r\n";
        echo "  <a class=\"popup\" href=\"http://www.linkedin.com/shareArticle?mini=true&amp;amp;url=http://rrssb.ml&amp;amp;title=Ridiculously%20Responsive%20Social%20Sharing%20Buttons&amp;amp;summary=Responsive%20social%20icons%20by%20KNI%20Labs\">\r\n";
        echo "    <span class=\"rrssb-icon\">\r\n";
        echo "      <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 28 28\">\r\n";
        echo "        <path d=\"M25.424 15.887v8.447h-4.896v-7.882c0-1.98-.71-3.33-2.48-3.33-1.354 0-2.158.91-2.514 1.802-.13.315-.162.753-.162 1.194v8.216h-4.9s.067-13.35 0-14.73h4.9v2.087c-.01.017-.023.033-.033.05h.032v-.05c.65-1.002 1.812-2.435 4.414-2.435 3.222 0 5.638 2.106 5.638 6.632zM5.348 2.5c-1.676 0-2.772 1.093-2.772 2.54 0 1.42 1.066 2.538 2.717 2.546h.032c1.71 0 2.77-1.132 2.77-2.546C8.056 3.593 7.02 2.5 5.344 2.5h.005zm-2.48 21.834h4.896V9.604H2.867v14.73z\"/>\r\n";
        echo "      </svg>\r\n";
        echo "    </span>\r\n";
        echo "    <span class=\"rrssb-text\">linkedin</span>\r\n";
        echo "  </a>\r\n";
        echo "</li>\r\n";
        break;

      case 'xing':
        echo "<li class=\"rrssb-xing\">\r\n";
        echo "  <a class=\"popup\" href=\"https://www.xing.com/spi/shares/new?url=http://rrssb.ml\">\r\n";
        echo "    <span class=\"rrssb-icon\">\r\n";
        echo "      <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 28 28\">\r\n";
        echo "        <path d=\"M18.89,30.708L12.023,18.67L22.681,0h7.173L19.197,18.669l6.867,12.038L18.89,30.708L18.89,30.708z M7.617,21.422l5.328-8.771L8.949,5.612H2.186l3.995,7.039l-5.327,8.771H7.617z\"/>\r\n";
        echo "      </svg>\r\n";
        echo "    </span>\r\n";
        echo "    <span class=\"rrssb-text\">xing</span>\r\n";
        echo "  </a>\r\n";
        echo "</li>\r\n";
        break;

      case 'twitter':
        echo "<li class=\"rrssb-twitter\">\r\n";
        echo "  <a class=\"popup\" href=\"https://twitter.com/intent/tweet?text=http://rrssb.ml\">\r\n";
        echo "    <span class=\"rrssb-icon\">\r\n";
        echo "      <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 28 28\">\r\n";
        echo "        <path d=\"M24.253 8.756C24.69 17.08 18.297 24.182 9.97 24.62a15.093 15.093 0 0 1-8.86-2.32c2.702.18 5.375-.648 7.507-2.32a5.417 5.417 0 0 1-4.49-3.64c.802.13 1.62.077 2.4-.154a5.416 5.416 0 0 1-4.412-5.11 5.43 5.43 0 0 0 2.168.387A5.416 5.416 0 0 1 2.89 4.498a15.09 15.09 0 0 0 10.913 5.573 5.185 5.185 0 0 1 3.434-6.48 5.18 5.18 0 0 1 5.546 1.682 9.076 9.076 0 0 0 3.33-1.317 5.038 5.038 0 0 1-2.4 2.942 9.068 9.068 0 0 0 3.02-.85 5.05 5.05 0 0 1-2.48 2.71z\"/>\r\n";
        echo "      </svg>\r\n";
        echo "    </span>\r\n";
        echo "    <span class=\"rrssb-text\">" . __( 'Twitter', 'pstu-profcom-theme' ) . "</span>\r\n";
        echo "  </a>\r\n";
        echo "</li>\r\n";
        break;

      case 'googleplus':
        echo "<li class=\"rrssb-googleplus\">\r\n";
        echo "  <a class=\"popup\" href=\"https://plus.google.com/share?url=http://rrssb.ml\">\r\n";
        echo "    <span class=\"rrssb-icon\">\r\n";
        echo "      <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\">\r\n";
        echo "        <path d=\"M21 8.29h-1.95v2.6h-2.6v1.82h2.6v2.6H21v-2.6h2.6v-1.885H21V8.29zM7.614 10.306v2.925h3.9c-.26 1.69-1.755 2.925-3.9 2.925-2.34 0-4.29-2.016-4.29-4.354s1.885-4.353 4.29-4.353c1.104 0 2.014.326 2.794 1.105l2.08-2.08c-1.3-1.17-2.924-1.883-4.874-1.883C3.65 4.586.4 7.835.4 11.8s3.25 7.212 7.214 7.212c4.224 0 6.953-2.988 6.953-7.082 0-.52-.065-1.104-.13-1.624H7.614z\"/>\r\n";
        echo "      </svg>\r\n";
        echo "    </span>\r\n";
        echo "    <span class=\"rrssb-text\">" . __( 'Google+', 'pstu-profcom-theme' ) . "</span>\r\n";
        echo "  </a>\r\n";
        echo "</li>\r\n";
        break;

      case 'pocket':
        echo "<li class=\"rrssb-pocket\">\r\n";
        echo "  <a href=\"https://getpocket.com/save?url=http://rrssb.ml\">\r\n";
        echo "    <span class=\"rrssb-icon\">\r\n";
        echo "      <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 32 32\">\r\n";
        echo "        <path d=\"M28.782.002c2.03.002 3.193 1.12 3.182 3.106-.022 3.57.17 7.16-.158 10.7-1.09 11.773-14.588 18.092-24.6 11.573C2.72 22.458.197 18.313.057 12.937c-.09-3.36-.05-6.72-.026-10.08C.04 1.113 1.212.016 3.02.008 7.347-.006 11.678.004 16.006.002c4.258 0 8.518-.004 12.776 0zM8.65 7.856c-1.262.135-1.99.57-2.357 1.476-.392.965-.115 1.81.606 2.496a746.818 746.818 0 0 0 7.398 6.966c1.086 1.003 2.237.99 3.314-.013a700.448 700.448 0 0 0 7.17-6.747c1.203-1.148 1.32-2.468.365-3.426-1.01-1.014-2.302-.933-3.558.245-1.596 1.497-3.222 2.965-4.75 4.526-.706.715-1.12.627-1.783-.034a123.71 123.71 0 0 0-4.93-4.644c-.47-.42-1.123-.647-1.478-.844z\"/>\r\n";
        echo "      </svg>\r\n";
        echo "    </span>\r\n";
        echo "    <span class=\"rrssb-text\">" . __( 'Pocket', 'pstu-profcom-theme' ) . "</span>\r\n";
        echo "  </a>\r\n";
        echo "</li>\r\n";
        break;

      case 'github':
        echo "<li class=\"rrssb-github\">\r\n";
        echo "  <a href=\"https://github.com/kni-labs/rrssb\">\r\n";
        echo "    <span class=\"rrssb-icon\">\r\n";
        echo "      <svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 28 28\">\r\n";
        echo "        <path d=\"M13.97 1.57c-7.03 0-12.733 5.703-12.733 12.74 0 5.622 3.636 10.393 8.717 12.084.637.13.87-.277.87-.615 0-.302-.013-1.103-.02-2.165-3.54.77-4.29-1.707-4.29-1.707-.578-1.473-1.413-1.863-1.413-1.863-1.154-.79.09-.775.09-.775 1.276.104 1.96 1.316 1.96 1.312 1.135 1.936 2.99 1.393 3.712 1.06.116-.823.445-1.384.81-1.704-2.83-.32-5.802-1.414-5.802-6.293 0-1.39.496-2.527 1.312-3.418-.132-.322-.57-1.617.123-3.37 0 0 1.07-.343 3.508 1.305A12.22 12.22 0 0 1 14 7.732c1.082 0 2.167.156 3.198.44 2.43-1.65 3.498-1.307 3.498-1.307.695 1.754.258 3.043.13 3.37a4.968 4.968 0 0 1 1.314 3.43c0 4.893-2.978 5.97-5.814 6.286.458.388.876 1.16.876 2.358 0 1.703-.016 3.076-.016 3.482 0 .334.232.748.877.61 5.056-1.687 8.7-6.456 8.7-12.08-.055-7.058-5.75-12.757-12.792-12.75z\"/>\r\n";
        echo "      </svg>\r\n";
        echo "    </span>\r\n";
        echo "    <span class=\"rrssb-text\">" . __( 'Github', 'pstu-profcom-theme' ) . "</span>\r\n";
        echo "  </a>\r\n";
        echo "</li>\r\n";
        break;

      case 'print':
        echo "<li class=\"rrssb-print\">\r\n";
        echo "  <a href=\"javascript:window.print()\">\r\n";
        echo "    <span class=\"rrssb-icon\">\r\n";
        echo "      <svg viewbox=\"0 0 24 24\">\r\n";
        echo "        <path fill=\"#000000\" d=\"M18,3H6V7H18M19,12A1,1 0 0,1 18,11A1,1 0 0,1 19,10A1,1 0 0,1 20,11A1,1 0 0,1 19,12M16,19H8V14H16M19,8H5A3,3 0 0,0 2,11V17H6V21H18V17H22V11A3,3 0 0,0 19,8Z\"></path>\r\n";
        echo "      </svg>\r\n";
        echo "    </span>\r\n";
        echo "    <span class=\"rrssb-text\">" . __( 'Распечатать', 'pstu-profcom-theme' ) . "</span>\r\n";
        echo "  </a>\r\n";
        echo "</li>\r\n";
        break;

      case 'whatsapp':
        if ( ! wp_is_mobile() ) continue;
        echo "<li class=\"rrssb-whatsapp\">\r\n";
        echo "  <a href=\"whatsapp://send?text=Ridiculously%20Responsive%20Social%20Sharing%20Buttons%3A%20http%3A%2F%2Frrssb.ml%20%7C%20http%3A%2F%2Frrssb.ml%2Frrssb-preview.png\" data-action=\"share/whatsapp/share\">\r\n";
        echo "    <span class=\"rrssb-icon\">\r\n";
        echo "      <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"90\" height=\"90\" viewBox=\"0 0 90 90\">\r\n";
        echo "        <path d=\"M90 43.84c0 24.214-19.78 43.842-44.182 43.842a44.256 44.256 0 0 1-21.357-5.455L0 90l7.975-23.522a43.38 43.38 0 0 1-6.34-22.637C1.635 19.63 21.415 0 45.818 0 70.223 0 90 19.628 90 43.84zM45.818 6.983c-20.484 0-37.146 16.535-37.146 36.86 0 8.064 2.63 15.533 7.076 21.61l-4.64 13.688 14.274-4.537A37.122 37.122 0 0 0 45.82 80.7c20.48 0 37.145-16.533 37.145-36.857S66.3 6.983 45.818 6.983zm22.31 46.956c-.272-.447-.993-.717-2.075-1.254-1.084-.537-6.41-3.138-7.4-3.495-.993-.36-1.717-.54-2.438.536-.72 1.076-2.797 3.495-3.43 4.212-.632.72-1.263.81-2.347.27-1.082-.536-4.57-1.672-8.708-5.332-3.22-2.848-5.393-6.364-6.025-7.44-.63-1.076-.066-1.657.475-2.192.488-.482 1.084-1.255 1.625-1.882.543-.628.723-1.075 1.082-1.793.363-.718.182-1.345-.09-1.884-.27-.537-2.438-5.825-3.34-7.977-.902-2.15-1.803-1.793-2.436-1.793-.63 0-1.353-.09-2.075-.09-.722 0-1.896.27-2.89 1.344-.99 1.077-3.788 3.677-3.788 8.964 0 5.288 3.88 10.397 4.422 11.113.54.716 7.49 11.92 18.5 16.223 11.01 4.3 11.01 2.866 12.996 2.686 1.984-.18 6.406-2.6 7.312-5.107.9-2.513.9-4.664.63-5.112z\"/>\r\n";
        echo "      </svg>\r\n";
        echo "    </span>\r\n";
        echo "    <span class=\"rrssb-text\">" . __( 'WhatsApp', 'pstu-profcom-theme' ) . "</span>\r\n";
        echo "  </a>\r\n";
        echo "</li>\r\n";
        break;
      
      default:
        break;

    } // switch

  } // foreach

  unset( $share_links );
  unset( $page_info );

  echo "  </ul>\r\n";
  echo "</div>\r\n";

} // if


?>