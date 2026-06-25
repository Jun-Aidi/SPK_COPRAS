<?php if($paginator->hasPages()): ?>
<nav>
    <div class="flex items-center gap-1">
        
        <?php if($paginator->onFirstPage()): ?>
        <span class="inline-flex items-center px-3 py-1.5 text-xs font-bold rounded-lg cursor-not-allowed"
              style="background:#F1F5F9; color:#CBD5E1; border:1px solid #E2E8F0;">
            <i class="fas fa-chevron-left"></i>
        </span>
        <?php else: ?>
        <a href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev"
           class="inline-flex items-center px-3 py-1.5 text-xs font-bold rounded-lg transition-all"
           style="background:#fff; color:#278EA5; border:1px solid rgba(39,142,165,0.35);"
           onmouseover="this.style.background='#EEF9F7'; this.style.color='#278EA5'; this.style.borderColor='#278EA5';"
           onmouseout="this.style.background='#fff'; this.style.color='#278EA5'; this.style.borderColor='rgba(39,142,165,0.35)';">
            <i class="fas fa-chevron-left"></i>
        </a>
        <?php endif; ?>

        
        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <?php if(is_string($element)): ?>
        <span class="inline-flex items-center px-3 py-1.5 text-xs font-bold"
              style="color:#94A3B8;"><?php echo e($element); ?></span>
        <?php endif; ?>

        
        <?php if(is_array($element)): ?>
        <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($page == $paginator->currentPage()): ?>
        <span class="inline-flex items-center px-3 py-1.5 text-xs font-black rounded-lg"
              style="background:linear-gradient(135deg,#278EA5,#21E6C1); color:#fff; border:1px solid transparent;"><?php echo e($page); ?></span>
        <?php else: ?>
        <a href="<?php echo e($url); ?>"
           class="inline-flex items-center px-3 py-1.5 text-xs font-bold rounded-lg transition-all"
           style="background:#fff; color:#64748B; border:1px solid #E2E8F0;"
           onmouseover="this.style.background='#EEF9F7'; this.style.color='#278EA5'; this.style.borderColor='#278EA5';"
           onmouseout="this.style.background='#fff'; this.style.color='#64748B'; this.style.borderColor='#E2E8F0';">
            <?php echo e($page); ?>

        </a>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        <?php if($paginator->hasMorePages()): ?>
        <a href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next"
           class="inline-flex items-center px-3 py-1.5 text-xs font-bold rounded-lg transition-all"
           style="background:#fff; color:#278EA5; border:1px solid rgba(39,142,165,0.35);"
           onmouseover="this.style.background='#EEF9F7'; this.style.color='#278EA5'; this.style.borderColor='#278EA5';"
           onmouseout="this.style.background='#fff'; this.style.color='#278EA5'; this.style.borderColor='rgba(39,142,165,0.35)';">
            <i class="fas fa-chevron-right"></i>
        </a>
        <?php else: ?>
        <span class="inline-flex items-center px-3 py-1.5 text-xs font-bold rounded-lg cursor-not-allowed"
              style="background:#F1F5F9; color:#CBD5E1; border:1px solid #E2E8F0;">
            <i class="fas fa-chevron-right"></i>
        </span>
        <?php endif; ?>
    </div>
</nav>
<?php endif; ?><?php /**PATH C:\laragon\www\SPK_COPRAS\resources\views/pagination/custom.blade.php ENDPATH**/ ?>