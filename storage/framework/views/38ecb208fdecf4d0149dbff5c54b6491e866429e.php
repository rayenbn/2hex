<div class="m-widget5__item">
    <div class="m-widget5__content">
        <div class="m-widget5__pic">
            <img class="m-widget7__img" src="<?php echo e($article->image); ?>" alt="2HEX experience">
        </div>
        <div class="m-widget5__section">
            <h4 class="m-widget5__title">
                <a href="<?php echo e(route('blog.show', $article->slug)); ?>"><?php echo e($article->title); ?></a>
            </h4>
            <span class="m-widget5__desc">
                <?php echo e(str_limit(strip_tags(html_entity_decode($article->content)), 60,'...')); ?>

            </span>
            <div class="m-widget5__info">
                <span class="m-widget5__author">
                    Author:
                </span>
                <span class="m-widget5__info-author m--font-info">
                    <?php echo e($article->author->name); ?>

                </span>
                <span class="m-widget5__info-label">
                    Released:
                </span>
                <span class="m-widget5__info-date m--font-info">
                    <?php echo e(date('d.m.Y', strtotime($article->created_at))); ?>

                </span>
            </div>
        </div>
    </div>
    <div class="m-widget5__content">
        <?php if(auth()->check() && auth()->user()->isAdmin()): ?>
            <form action="<?php echo e(route('blog.destroy', $article->id)); ?>" method="POST">
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('DELETE')); ?>

                <a href="<?php echo e(route('blog.edit', $article->id)); ?>" class="btn btn-outline-warning">Edit</a>
                <button type="submit" class="btn btn-outline-danger">Remove</button>
            </form>
        <?php endif; ?>
    </div>
</div>
