<!-- Section: Startups / Corporates / Investors -->
<?php $startups_block = get_sub_field('startups_block') ?>
<?php $corporates_block = get_sub_field('corporates_block') ?>
<?php $investors_block = get_sub_field('investors_block') ?>

<?php $padding_top = get_sub_field('padding_top') ? get_sub_field('padding_top') : '0' ?>
<?php $padding_bottom = get_sub_field('padding_bottom') ? get_sub_field('padding_bottom') : '0' ?>


<div class="section-startups-corporates-investors acf-section"
     data-pt="<?php echo $padding_top ?>"
     data-pb="<?php echo $padding_bottom ?>"
>
    <div class="container">
        <div class="blocks-grid">

            <!-- Startups -->
            <div class="block-item startups-block">
                <div class="info">
                    <p class="block-item__caption"><?php echo $startups_block['caption'] ?></p>
                    <h2 class="h3 block-item__title"><?php echo $startups_block['title'] ?></h2>
                    <p class="block-item__subtitle"><?php echo $startups_block['subtitle'] ?></p>
                </div>
                <div class="btn-wrap">
					<?php if ($startups_block['button']): ?>
                        <a href="<?php echo $startups_block['button']['url'] ?>" target="<?php echo $startups_block['button']['target'] ?>" class="btn-cta btn btn-primary">
                            <span class="caption"><?php echo $startups_block['button']['title'] ?></span>
                            <span class="icon">
        <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.37764 1.06558L7.12086 0.256833C7.43555 -0.0856111 7.94443 -0.0856111 8.25578 0.256833L14.764 7.33523C15.0787 7.67768 15.0787 8.23142 14.764 8.57022L8.25578 15.6523C7.94108 15.9947 7.43221 15.9947 7.12086 15.6523L6.37764 14.8435C6.05959 14.4974 6.06629 13.9328 6.39103 13.5939L10.4252 9.41176H0.803482C0.358219 9.41176 0 9.02195 0 8.53743V7.37166C0 6.88714 0.358219 6.49734 0.803482 6.49734H10.4252L6.39103 2.31514C6.06294 1.97634 6.05624 1.41167 6.37764 1.06558Z"
      fill="white"/>
</svg>
    </span>
                        </a>
					<?php endif; ?>
                </div>
            </div>

            <!-- Corporate -->
            <div class="block-item corporate-block">
                <div class="info">
                    <p class="block-item__caption"><?php echo $corporates_block['caption'] ?></p>
                    <h2 class="h3 block-item__title"><?php echo $corporates_block['title'] ?></h2>
                    <p class="block-item__subtitle"><?php echo $corporates_block['subtitle'] ?></p>
                </div>
                <div class="btn-wrap">
					<?php if ($corporates_block['button']): ?>
                        <a href="<?php echo $corporates_block['button']['url'] ?>" target="<?php echo $corporates_block['button']['target'] ?>" class="btn-cta btn btn-blue">
                            <span class="caption"><?php echo $corporates_block['button']['title'] ?></span>
                            <span class="icon">
        <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.37764 1.06558L7.12086 0.256833C7.43555 -0.0856111 7.94443 -0.0856111 8.25578 0.256833L14.764 7.33523C15.0787 7.67768 15.0787 8.23142 14.764 8.57022L8.25578 15.6523C7.94108 15.9947 7.43221 15.9947 7.12086 15.6523L6.37764 14.8435C6.05959 14.4974 6.06629 13.9328 6.39103 13.5939L10.4252 9.41176H0.803482C0.358219 9.41176 0 9.02195 0 8.53743V7.37166C0 6.88714 0.358219 6.49734 0.803482 6.49734H10.4252L6.39103 2.31514C6.06294 1.97634 6.05624 1.41167 6.37764 1.06558Z"
      fill="white"/>
</svg>
    </span>
                        </a>
					<?php endif; ?>
                </div>
            </div>

            <!-- Investors -->
            <div class="block-item investors-block">
                <div class="info">
                    <p class="block-item__caption"><?php echo $investors_block['caption'] ?></p>
                    <h2 class="h3 block-item__title"><?php echo $investors_block['title'] ?></h2>
                    <p class="block-item__subtitle"><?php echo $investors_block['subtitle'] ?></p>
                </div>
                <div class="btn-wrap">
					<?php if ($investors_block['button']): ?>
                        <a href="<?php echo $investors_block['button']['url'] ?>" target="<?php echo $investors_block['button']['target'] ?>" class="btn-cta btn btn-orange">
                            <span class="caption"><?php echo $investors_block['button']['title'] ?></span>
                            <span class="icon">
        <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6.37764 1.06558L7.12086 0.256833C7.43555 -0.0856111 7.94443 -0.0856111 8.25578 0.256833L14.764 7.33523C15.0787 7.67768 15.0787 8.23142 14.764 8.57022L8.25578 15.6523C7.94108 15.9947 7.43221 15.9947 7.12086 15.6523L6.37764 14.8435C6.05959 14.4974 6.06629 13.9328 6.39103 13.5939L10.4252 9.41176H0.803482C0.358219 9.41176 0 9.02195 0 8.53743V7.37166C0 6.88714 0.358219 6.49734 0.803482 6.49734H10.4252L6.39103 2.31514C6.06294 1.97634 6.05624 1.41167 6.37764 1.06558Z"
      fill="white"/>
</svg>
    </span>
                        </a>
					<?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>