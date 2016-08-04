<?php
require_once __DIR__.'/App/bootstrap.php';

$twig = $container->get("twig.environment");
$data = [];
$template = 'page.html.twig';

ob_start();
dynamic_sidebar('footer_1');
$data['footer_1'] = ob_get_clean();
ob_start();
dynamic_sidebar('footer_2');
$data['footer_2'] = ob_get_clean();
ob_start();
dynamic_sidebar('footer_3');
$data['footer_3'] = ob_get_clean();

setup_postdata($post);
$flexibleContent = [];
while(have_rows('content')) {
    the_row();
    switch($layout = get_row_layout()) {
        case 'large_header':
           $data['header_layout'] = "large";
           $flexibleContent[] = $twig->render('modules/hero-header.html.twig', $data);
           break;
        case 'small_header':
           $data['header_layout'] = "small";
           $flexibleContent[] = $twig->render('modules/hero-header.html.twig', $data);
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
        case 'before_after_slider':
            $flexibleContent[] = $twig->render('modules/before-after.html.twig', $data);
            break;
        case 'generic_content':
            $flexibleContent[] = $twig->render('modules/content.html.twig', $data);
            break;
        case 'team_members':
            $flexibleContent[] = $twig->render('modules/team-members.html.twig', $data);
            break;
        default:
            throw new Exception('Could not render layout for '.$layout);
            break;
    }
}
$data['flexible_content'] = $flexibleContent;

echo $twig->render($template, $data);
