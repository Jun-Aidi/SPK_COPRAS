<?php if($paginator->hasPages()): ?>
<nav>
    <div class="flex items-center gap-1">
        
        <?php if($paginator->onFirstPage()): ?>
        <span class="inline-flex items-center px-3 py-1.5 text-xs font-bold rounded-lg cursor-not-allowed"
              style="background:rgba(255,255,255,0.04); color:rgba(255,255,255,0.2);">
            <i class="fas fa-chevron-left"></i>
        </span>
        <?php else: ?>
        <a href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev"
           class="inline-flex items-center px-3 py-1.5 text-xs font-bold rounded-lg transition-all"
           style="background:rgba(39,142,165,0.15); color:#278EA5; border:1px solid rgba(39,142,165,0.25);"
           onmouseover="this.style.background='rgba(39,142,165,0.3)'; this.style.color='#fff';"
           onmouseout="this.style.background='rgba(39,142,165,0.15)'; this.style.color='#278EA5';">
            <i class="fas fa-chevron-left"></i>
        </a>
        <?php endif; ?>

        
        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <?php if(is_string($element)): ?>
        <span class="inline-flex items-center px-3 py-1.5 text-xs font-bold"
              style="color:rgba(255,255,255,0.3);"><?php echo e($element); ?></span>
        <?php endif; ?>

        
        <?php if(is_array($element)): ?>
        <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($page == $paginator->currentPage()): ?>
        <span class="inline-flex items-center px-3 py-1.5 text-xs font-black rounded-lg"
              style="background:linear-gradient(135deg,#278EA5,#21E6C1); color:#071E3D;"><?php echo e($page); ?></span>
        <?php else: ?>
        <a href="<?php echo e($url); ?>"
           class="inline-flex items-center px-3 py-1.5 text-xs font-bold rounded-lg transition-all"
           style="background:rgba(255,255,255,0.05); color:rgba(255,255,255,0.55); border:1px solid rgba(255,255,255,0.08);"
           onmouseover="this.style.background='rgba(33,230,193,0.1)'; this.style.color='#21E6C1'; this.style.borderColor='rgba(33,230,193,0.25)';"
           onmouseout="this.style.background='rgba(255,255,255,0.05)'; this.style.color='rgba(255,255,255,0.55)'; this.style.borderColor='rgba(255,255,255,0.08)';">
            <?php echo e($page); ?>

        </a>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        <?php if($paginator->hasMorePages()): ?>
        <a href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next"
           class="inline-flex items-center px-3 py-1.5 text-xs font-bold rounded-lg transition-all"
           style="background:rgba(39,142,165,0.15); color:#278EA5; border:1px solid rgba(39,142,165,0.25);"
           onmouseover="this.style.background='rgba(39,142,165,0.3)'; this.style.color='#fff';"
           onmouseout="this.style.background='rgba(39,142,165,0.15)'; this.style.color='#278EA5';">
            <i class="fas fa-chevron-right"></i>
        </a>
        <?php else: ?>
        <span class="inline-flex items-center px-3 py-1.5 text-xs font-bold rounded-lg cursor-not-allowed"
              style="background:rgba(255,255,255,0.04); color:rgba(255,255,255,0.2);">
            <i class="fas fa-chevron-right"></i>
        </span>
        <?php endif; ?>
    </div>
</nav>
<?php endif; ?><?php /**PATH C:\laragon\www\SPK_COPRAS\resources\views/pagination/custom.blade.php ENDPATH**/ ?>