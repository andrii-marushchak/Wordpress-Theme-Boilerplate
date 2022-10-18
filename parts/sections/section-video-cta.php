<!-- Section: Video CTA -->
<?php $video = get_sub_field('video') ?>
<?php $video_poster = get_sub_field('video_poster') ?>
<?php $section_title = get_sub_field('section_title') ?>
<?php $section_content = get_sub_field('section_content') ?>
<?php $button = get_sub_field('button') ?>

<?php $padding_top = get_sub_field('padding_top') ? get_sub_field('padding_top') : '0' ?>
<?php $padding_bottom = get_sub_field('padding_bottom') ? get_sub_field('padding_bottom') : '0' ?>

<section class="section-video-cta acf-section"
         data-pt="<?php echo $padding_top ?>"
         data-pb="<?php echo $padding_bottom ?>"
>
    <div class="container">

        <video class="video"
               autoplay="autoplay"
               playsinline
               loop
               src="<?php echo $video['url'] ?>"
			<?php if ($video_poster) { ?>
                poster="<?php echo wp_get_attachment_image_url($video_poster, 'full') ?>"
			<?php } ?>
        ></video>

        <div class="content-block">
			<?php if ($section_title): ?>
                <h2 class="h1 section-title"><?php echo $section_title ?></h2>
			<?php endif; ?>

			<?php if ($section_content): ?>
                <div class="content section-text"><?php echo $section_content ?></div>
			<?php endif; ?>

            <div class="content-block__actions">

				<?php if ($button): ?>
                    <a href="<?php echo $button['url'] ?>" target="<?php echo $button['target'] ?>" class="btn-cta btn btn-grey-white">
                        <span class="caption"><?php echo $button['title'] ?></span>
                        <span class="icon">
        <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.37764 1.06558L7.12086 0.256833C7.43555 -0.0856111 7.94443 -0.0856111 8.25578 0.256833L14.764 7.33523C15.0787 7.67768 15.0787 8.23142 14.764 8.57022L8.25578 15.6523C7.94108 15.9947 7.43221 15.9947 7.12086 15.6523L6.37764 14.8435C6.05959 14.4974 6.06629 13.9328 6.39103 13.5939L10.4252 9.41176H0.803482C0.358219 9.41176 0 9.02195 0 8.53743V7.37166C0 6.88714 0.358219 6.49734 0.803482 6.49734H10.4252L6.39103 2.31514C6.06294 1.97634 6.05624 1.41167 6.37764 1.06558Z"
      fill="white"/>
</svg>
    </span>
                    </a>
				<?php endif; ?>

				<?php if ($video): ?>
                    <button class="video-link">
                    <span class="icon">
                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M8.5 0.5C4.08065 0.5 0.5 4.08065 0.5 8.5C0.5 12.9194 4.08065 16.5 8.5 16.5C12.9194 16.5 16.5 12.9194 16.5 8.5C16.5 4.08065 12.9194 0.5 8.5 0.5ZM12.2323 9.27419L6.55484 12.5323C6.04516 12.8161 5.40323 12.4516 5.40323 11.8548V5.14516C5.40323 4.55161 6.04194 4.18387 6.55484 4.46774L12.2323 7.91935C12.7613 8.21613 12.7613 8.98065 12.2323 9.27419Z"
      fill="white"/>
</svg>
                    </span>
                        <span class="caption">Play full video</span>
                    </button>
				<?php endif; ?>

            </div>

        </div>

    </div>
</section>


<?php if ($video): ?>
    <div class="video-modal">
        <video class="video" controls playsinline src="<?php echo $video['url'] ?>"
			<?php if ($video_poster) { ?>
                poster="<?php echo wp_get_attachment_image_url($video_poster, 'full') ?>"
			<?php } ?>
        ></video>
    </div>
<?php endif; ?>
