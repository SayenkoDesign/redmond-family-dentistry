<?php
require_once __DIR__.'/App/bootstrap.php';

$twig = $container->get("twig.environment");
$data = [];
$template = 'page.html.twig';

setup_postdata($post);
$flexibleContent = [];
while(have_rows('content')) {
    the_row();
    switch($layout = get_row_layout()) {
        case 'large_header':
            $flexibleContent[] = $twig->render('modules/large-header.html.twig', $data);
            break;
        case 'title_section':
            $flexibleContent[] = $twig->render('modules/title-section.html.twig', $data);
            break;
        case 'icon_columns':
            $flexibleContent[] = $twig->render('modules/icon-columns.html.twig', $data);
            break;
        case 'partners':
            $flexibleContent[] = $twig->render('modules/partners.html.twig', $data);
            break;
        case 'call_to_action':
            $flexibleContent[] = $twig->render('modules/call-to-action.html.twig', $data);
            break;
        case 'comparison_table':
            $flexibleContent[] = $twig->render('modules/table.html.twig', $data);
            break;
        case 'testimonial_slider':
            $flexibleContent[] = $twig->render('modules/reviews-slider.html.twig', $data);
            break;
        default:
            throw new Exception('Could not render layout for '.$layout);
            break;
    }
}
$data['flexible_content'] = $flexibleContent;

echo $twig->render($template, $data);
