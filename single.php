<?php get_header(); ?>

<?php global $wp;
$post_url = home_url($wp->request) ?>

<main class="single-post-template">
    <div class="container">

        <!-- Back Button -->
        <a href="<?php echo get_permalink(get_option('page_for_posts')) ?>" class="back-btn">
            <span class="icon">
             <svg width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M5.74824 9.8302L5.25276 10.3386C5.04296 10.5538 4.70372 10.5538 4.49615 10.3386L0.157349 5.88928C-0.0524488 5.67403 -0.0524488 5.32597 0.157349 5.11301L4.49615 0.661439C4.70595 0.446188 5.0452 0.446188 5.25276 0.661439L5.74824 1.1698C5.96027 1.38734 5.95581 1.74227 5.73932 1.95523L3.04988 4.58404L9.46435 4.58404C9.76119 4.58404 10 4.82906 10 5.13362L10 5.86638C10 6.17094 9.76119 6.41596 9.46435 6.41596L3.04988 6.41596L5.73932 9.04477C5.95804 9.25773 5.9625 9.61266 5.74824 9.8302Z"
                  fill="#27348B"/>
            </svg>
            </span>
            <span class="caption">
                Back to news overview
            </span>
        </a>

        <!-- Post Title -->
        <h1 class="h2 h2-small post-title">
			<?php the_title() ?>
        </h1>

        <div class="page-row">
            <div class="col-left">

                <div class="post-thumbnail">
					<?php the_post_thumbnail(); ?>
                    <div class="section-row">
                        <div class="left-part">
                            <div class="meta-item date"><?php echo get_the_date() ?></div>
                            <div class="meta-item author-name">
								<?php echo get_the_author_meta('display_name') ?>
                            </div>
                            <div class="meta-item time">
                                <div class="icon">
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 2.625C6 2.52554 5.96049 2.43016 5.89017 2.35984C5.81984 2.28951 5.72446 2.25 5.625 2.25C5.52554 2.25 5.43016 2.28951 5.35984 2.35984C5.28951 2.43016 5.25 2.52554 5.25 2.625V6.75C5.25002 6.8161 5.26751 6.88102 5.3007 6.93818C5.33389 6.99534 5.3816 7.04271 5.439 7.0755L8.064 8.5755C8.15014 8.62206 8.25108 8.63307 8.34524 8.60619C8.4394 8.57931 8.5193 8.51667 8.56789 8.43165C8.61647 8.34663 8.62987 8.24598 8.60522 8.15122C8.58058 8.05645 8.51984 7.97508 8.436 7.9245L6 6.5325V2.625Z"
                                              fill="black"/>
                                        <path d="M6 12C7.5913 12 9.11742 11.3679 10.2426 10.2426C11.3679 9.11742 12 7.5913 12 6C12 4.4087 11.3679 2.88258 10.2426 1.75736C9.11742 0.632141 7.5913 0 6 0C4.4087 0 2.88258 0.632141 1.75736 1.75736C0.632141 2.88258 0 4.4087 0 6C0 7.5913 0.632141 9.11742 1.75736 10.2426C2.88258 11.3679 4.4087 12 6 12V12ZM11.25 6C11.25 7.39239 10.6969 8.72774 9.71231 9.71231C8.72774 10.6969 7.39239 11.25 6 11.25C4.60761 11.25 3.27226 10.6969 2.28769 9.71231C1.30312 8.72774 0.75 7.39239 0.75 6C0.75 4.60761 1.30312 3.27226 2.28769 2.28769C3.27226 1.30312 4.60761 0.75 6 0.75C7.39239 0.75 8.72774 1.30312 9.71231 2.28769C10.6969 3.27226 11.25 4.60761 11.25 6V6Z"
                                              fill="black"/>
                                    </svg>
                                </div>
                                <div class="caption">
									<?php echo startlife_estimated_reading_time(get_post()) ?>
                                </div>
                            </div>
                        </div>
						<?php if (get_field('thumbnail_caption')): ?>
                            <div class="right-part">
                                <div class="img-caption"><?php the_field('thumbnail_caption'); ?></div>
                            </div>
						<?php endif; ?>
                    </div>
                </div>

                <!-- Content -->
                <div class="post-content section-text">
					<?php the_content(); ?>
                </div>

                <!-- Block Social share -->
                <div class="share-block">
                    <h4 class="share-block__title">Share on social media</h4>
                    <ul class="share-block__list">

                        <!-- Facebook -->
                        <li>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $post_url; ?>" target="_blank">
                                <svg
                                        width="8"
                                        height="16"
                                        viewBox="0 0 8 16"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M1.578 15.777H4.73325V7.8885H7.0755L7.36275 4.73325H4.85475V3.47175C4.85475 2.85675 5.265 2.71275 5.55225 2.71275H7.32225V0.00975037L4.88475 0C2.18025 0 1.56525 2.016 1.56525 3.3075V4.7325H0V7.8885H1.578V15.777Z"
                                            fill="white"
                                    />
                                </svg>
                            </a>
                        </li>

                        <!-- Twitter -->
                        <li>
                            <a href="https://twitter.com/intent/tweet?url=<?php echo $post_url; ?>&text=<?php the_title(); ?>" target="_blank">
                                <svg
                                        width="15"
                                        height="12"
                                        viewBox="0 0 15 12"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M14.1202 0.213763C13.5342 0.556256 12.8944 0.797154 12.228 0.926263C11.9474 0.632423 11.6099 0.39877 11.2361 0.239531C10.8623 0.0802917 10.46 -0.00120187 10.0538 1.33942e-05C8.409 1.33942e-05 7.07475 1.31251 7.07475 2.93251C7.07475 3.16201 7.10175 3.38551 7.152 3.60001C5.97185 3.54425 4.81628 3.24306 3.75905 2.71567C2.70182 2.18828 1.76615 1.44628 1.01175 0.537014C0.746794 0.982955 0.60689 1.49205 0.60675 2.01076C0.60675 3.02851 1.13475 3.92551 1.9335 4.45126C1.46088 4.43714 0.9983 4.31147 0.5835 4.08451V4.12201C0.5835 5.54251 1.611 6.72751 2.97375 6.99751C2.53465 7.11468 2.07486 7.13185 1.62825 7.04776C1.82349 7.6339 2.19621 8.14479 2.69476 8.50963C3.19332 8.87448 3.79302 9.07521 4.41075 9.08401C3.35071 9.90095 2.04931 10.3426 0.711 10.3395C0.4695 10.3395 0.23325 10.3253 0 10.2983C1.36698 11.1612 2.95093 11.6182 4.5675 11.616C10.047 11.616 13.0425 7.14751 13.0425 3.27226C13.0425 3.14476 13.041 3.01801 13.035 2.89276C13.6168 2.47917 14.1202 1.96512 14.5215 1.37476C13.977 1.61246 13.4002 1.76791 12.81 1.83601C13.43 1.47315 13.896 0.896206 14.1202 0.213763Z"
                                            fill="white"
                                    />
                                </svg>
                            </a>
                        </li>

                        <!-- LinkedIn -->
                        <li>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $post_url; ?>&title=<?php the_title(); ?>" target="_blank">
                                <svg
                                        width="14"
                                        height="13"
                                        viewBox="0 0 14 13"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                            fill-rule="evenodd"
                                            clip-rule="evenodd"
                                            d="M0.50075 12.621H3.446V4.20675H0.50075V12.621ZM1.97375 2.946C2.16719 2.9459 2.35871 2.9077 2.53739 2.83359C2.71606 2.75947 2.87839 2.65089 3.0151 2.51404C3.15181 2.37719 3.26023 2.21475 3.33416 2.036C3.4081 1.85725 3.4461 1.66569 3.446 1.47225C3.4459 1.27881 3.4077 1.08729 3.33359 0.908615C3.25947 0.72994 3.15089 0.567613 3.01404 0.430902C2.87719 0.294191 2.71475 0.185772 2.536 0.111838C2.35725 0.0379041 2.16569 -9.83062e-05 1.97225 1.90978e-07C1.58159 0.000199103 1.207 0.15558 0.930902 0.431962C0.654801 0.708343 0.499801 1.08309 0.5 1.47375C0.500199 1.86441 0.65558 2.239 0.931962 2.5151C1.20834 2.7912 1.58309 2.9462 1.97375 2.946ZM13.121 7.99725C13.121 5.727 12.6312 4.2075 9.9845 4.2075C8.7125 4.2075 7.859 4.68 7.5095 5.343H7.47425V4.2075H5.12825V12.621H7.58V8.451C7.58 7.3515 7.78775 6.28725 9.14825 6.28725C10.4885 6.28725 10.5965 7.54425 10.5965 8.52225V12.621H13.121V7.998V7.99725Z"
                                            fill="white"
                                    />
                                </svg>
                            </a>
                        </li>

                        <!-- Mail -->
                        <li>
                            <a href="mailto:?subject=<?php echo get_the_title() ?>&body=<?php echo $post_url ?>">
                                <svg
                                        width="15"
                                        height="11"
                                        viewBox="0 0 15 11"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                            d="M14.2348 3.63229C14.3414 3.54349 14.5 3.62656 14.5 3.76693V9.625C14.5 10.3841 13.9121 11 13.1875 11H1.8125C1.08789 11 0.5 10.3841 0.5 9.625V3.76979C0.5 3.62656 0.655859 3.54635 0.765234 3.63516C1.37773 4.13359 2.18984 4.76667 4.97891 6.88932C5.55586 7.33047 6.5293 8.25859 7.5 8.25286C8.47617 8.26146 9.46875 7.31328 10.0238 6.88932C12.8129 4.76667 13.6223 4.13073 14.2348 3.63229ZM7.5 7.33333C8.13438 7.34479 9.04766 6.49688 9.50703 6.1474C13.1355 3.3888 13.4117 3.14818 14.2484 2.46068C14.407 2.33177 14.5 2.13125 14.5 1.91927V1.375C14.5 0.615885 13.9121 0 13.1875 0H1.8125C1.08789 0 0.5 0.615885 0.5 1.375V1.91927C0.5 2.13125 0.592969 2.32891 0.751563 2.46068C1.58828 3.14531 1.86445 3.3888 5.49297 6.1474C5.95234 6.49688 6.86563 7.34479 7.5 7.33333Z"
                                            fill="white"
                                    />
                                </svg>
                            </a>
                        </li>

                    </ul>
                </div>

            </div>

            <div class="col-right">
                <div class="author">

                    <!-- Photo -->
                    <picture class="author-photo-wrap">
						<?php $author_id = get_the_author_meta('ID');
						echo wp_get_attachment_image(get_field('photo', 'user_' . $author_id), 'full') ?>
                        <svg class="el-1" viewBox="0 0 112 224" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M49.9932 -1.60571L-58.6094 248.373H3.86885L111.444 -1.60571H109.49H49.9932Z" fill="#3874B9"/>
                        </svg>
                        <svg class="el-2" viewBox="0 0 167 224" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M60.953 -1.60571H0.0761719L106.369 248.373H163.996H166.729L60.953 -1.60571Z" fill="#27348B"/>
                        </svg>
                    </picture>

                    <!-- Name -->
                    <div class="name"><?php echo get_the_author_meta('display_name') ?></div>

					<?php if (get_field('position', 'user_' . $author_id)): ?>
                        <!-- Position -->
                        <div class="position"><?php the_field('position', 'user_' . $author_id) ?></div>
					<?php endif; ?>

					<?php if (get_field('description', 'user_' . $author_id)): ?>
                        <!-- Description -->
                        <div class="section-text description">
							<?php the_field('description', 'user_' . $author_id); ?>
                        </div>
					<?php endif; ?>

                </div>
            </div>

        </div>
    </div>
</main>

<?php if (get_field('related_posts')): ?>
    <section class="section-related-posts">
        <div class="container">
            <h2 class="section-title">Related news</h2>

            <div class="layout-news-grid">
				<?php $posts_args = array(
					'post_type'      => 'post',
					'post_status'    => 'publish',
					'posts_per_page' => - 1,
					'post__in'       => get_field('related_posts'),
				);
				$posts_query      = new WP_Query($posts_args); ?>
				<?php if ($posts_query->have_posts()) : while ($posts_query->have_posts()) :
					$posts_query->the_post(); ?>

                    <!-- Post  -->
					<?php get_template_part('parts/blog-events/post-template') ?>

				<?php endwhile; endif;
				wp_reset_postdata(); ?>
            </div>

        </div>
    </section>
<?php endif; ?>


<?php get_template_part('parts/sections/section-newsletter') ?>

<?php get_footer(); ?>
