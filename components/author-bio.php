<?php
/**
 * Author Bio Component
 *
 * Displays the author's biography, avatar, and social links.
 * This component is designed to be included in single post templates or style guides.
 * It dynamically fetches information about the current post's author.
 */

// Get the author data from the current post
$author_id = get_the_author_meta('ID');
$author_display_name = get_the_author_meta('display_name', $author_id);
$author_description = get_the_author_meta('description', $author_id);
$author_avatar = get_avatar($author_id, 80); // 80px avatar size
$author_website = get_the_author_meta('user_url', $author_id);

// Example social links (these would typically come from user meta or theme options)
// For demonstration, we'll use placeholder social links if author meta doesn't provide them.
$author_github = get_the_author_meta('github', $author_id); // Assuming 'github' custom user meta
$author_linkedin = get_the_author_meta('linkedin', $author_id); // Assuming 'linkedin' custom user meta

// Fallback for demo in styleguide
if ( empty($author_display_name) ) {
    $author_display_name = 'Reign';
    $author_description = 'A senior full-stack engineer and systems architect with expertise in Java, Spring Boot, Vue, Docker, networking, cloud infrastructure, security, and DDD. Operator of NemesisNet, a full-spectrum technical ecosystem.';
    $author_avatar = '<img alt="" src="https://picsum.photos/seed/reign/80/80" srcset="https://picsum.photos/seed/reign/80/80 2x" class="avatar avatar-80 photo" height="80" width="80" loading="lazy" decoding="async">';
    $author_github = '#';
    $author_linkedin = '#';
}

if ( ! empty($author_display_name) ) :
?>
<div class="author-bio">
    <div class="author-avatar">
        <?php echo $author_avatar; ?>
    </div>
    <div class="author-info">
        <h3 class="author-name"><?php echo esc_html($author_display_name); ?></h3>
        <?php if ( ! empty($author_description) ) : ?>
            <p class="author-description"><?php echo esc_html($author_description); ?></p>
        <?php endif; ?>

        <?php if ( ! empty($author_github) || ! empty($author_linkedin) || ! empty($author_website) ) : ?>
            <div class="author-social">
                <?php if ( ! empty($author_github) ) : ?>
                    <a href="<?php echo esc_url($author_github); ?>" target="_blank" rel="noopener noreferrer" aria-label="GitHub"><i class="fab fa-github"></i></a>
                <?php endif; ?>
                <?php if ( ! empty($author_linkedin) ) : ?>
                    <a href="<?php echo esc_url($author_linkedin); ?>" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                <?php endif; ?>
                <?php if ( ! empty($author_website) ) : ?>
                    <a href="<?php echo esc_url($author_website); ?>" target="_blank" rel="noopener noreferrer" aria-label="Website"><i class="fas fa-globe"></i></a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php
endif;
