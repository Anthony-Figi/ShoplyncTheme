<a href="<?php if(is_page(20)){ echo '#contact-form'; }else { echo home_url('/contact/'); } ?>" class="free-trial btn btn-primary rounded-30 hidden-lg-down <?php if ($args && isset($args['class'])){ echo $args['class'];}?> " >
<span>Free Trial</span>
</a>