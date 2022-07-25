<?php $__env->startSection('content'); ?>
<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl">
            Blog Posts
        </h1>
    </div>
</div>
<?php if(session()->has('message')): ?>
    <div class="w-4/5 m-auto mt-10 pl-2">
        <p class="w-1/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
            <?php echo e(session()->get('message')); ?>


        </p>
    </div>
<?php endif; ?>
<?php if(Auth::check()): ?>
    <div class="pt-15 w-r/5 m-auto">
        <a
            href="/blog/create"
            class="bg-blue-500 uppercase bg-transparent text-gray-100
            text-xs font-extrabold py-3 px-5 rounded-3xl">
            Create post
        </a>

    </div>
<?php endif; ?>
<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-grad-200">
        <div>
            <img src="https://media.istockphoto.com/photos/plate-of-dragon-sushi-rolls-with-eel-and-empty-notebook-on-black-picture-id1304276486?s=612x612" alt="">
        </div>
        <div>
        <h2 class="text-gray-700 font-bold text-5xl pb-4">
            <?php echo e($post->title); ?>

            </h2> 

            <span class="text-gray-500">
                By <span class="font-bold italic text-gray-800"><?php echo e($post->user->name); ?></span><span>
                    , Created on <?php echo e(date('jS M Y',strtotime($post->update_at))); ?>

            </span>
            <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
                <?php echo e($post->description); ?>

            </p>
            <a href="/blog/<?php echo e($post->slug); ?>" class="uppercase bg-blue-500 text-gray-100 text-lg
            font-extrabold py-4 px-8 rounded-3xl">
                Keep Reading
            </a>

            <?php if(isset(Auth::user()->id) && Auth::user() ->id == $post->user_id): ?>
                <span class='float-right'>
                        <a
                            href="/blog/<?php echo e($post->slug); ?>/edit"
                            class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
                            Edit
                        </a>
                </span>
            <?php endif; ?>
        </div>
        

    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ruijun/Documents/workspace/laraval_blog/resources/views/blog/index.blade.php ENDPATH**/ ?>