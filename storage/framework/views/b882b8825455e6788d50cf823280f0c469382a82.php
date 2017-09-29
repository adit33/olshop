<?php $__env->startPush('styles'); ?>
<style type="text/css">
  .button{
    border-radius: 0;
  }
  .hover{
    transform: scale(1.05,1.05);
  }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
  <article class="tile is-child box">
        <!-- Put any content you want -->
<div class="columns is-desktop">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="column">
           <div class="card"  v-bind:class="{'': !isHover, 'hover':isHover }">
  <div class="card-image">
    <figure class="image is-4by3">
      <?php $__currentLoopData = $product->productImage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <!-- <img src="<?php echo $image->name; ?>" alt="Placeholder image" v-on:mouseover="hoverCard" v-on:mouseleave="hoverCard"> -->
      <test :img-src="'<?php echo $image->name; ?>'"></test>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </figure>
  </div>
  <div class="card-content">
    <div class="media">
      <div class="media-content">
        <p class="title is-4"><?php echo $product->name; ?></p>
        <p class="subtitle is-6">Rp.<?php echo $product->price; ?></p>
      </div>
    </div>

    <div class="content">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
      Phasellus nec iaculis mauris. <a>@bulmaio</a>.     
    </div>
  </div>
   <footer class="card-footer">
            <span class="card-footer-item">
              <!-- <a class="button is-large is-info is-hovered" href="<?php echo e(URL::to('product/'.$product->id)); ?>">Buy</a> -->
            
            <buy-btn></buy-btn>  
            
            </span>
          </footer>
</div>
</div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>


        
      </article>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
  Vue.component('buy-btn',{
    data(){
      return {
        isOutlined:false
      };
    },
    template:`<a class="button is-info " v-on:mouseover="hoverButton" v-on:mouseleave="hoverButton" v-bind:class="{'': isOutlined, 'is-outlined':!isOutlined }" href="<?php echo e(URL::to('product/'.$product->id)); ?>">Buy</a>`,
    methods:{
      hoverButton() {
        this.isOutlined=!this.isOutlined;
      }
    }
  });

  Vue.component('test',{
    // template:`<img src="{{ imgSrc }}" alt="{{ imgSrc }}" v-on:mouseover="hoverCard" v-on:mouseleave="hoverCard">`,
     template:`<span>{{ imgSrc }}</span>`,
    props:['imgSrc'],
    data(){
      return {
        isHover:false
      };
    },
    methods:{
      hoverCard(){
        this.isHover=!this.isHover;
      }
    }
  });
 
  new Vue({
    el:"#app",
    data:{
      name:'wkwkwk',
      isHover:false,
    },
    methods:{
      hoverCard(){
        this.isHover=!this.isHover;
      }
    }
  })
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('frontend.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>