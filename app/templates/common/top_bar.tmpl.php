
<!-- Top bar -->

<div id="top_bar">

<div id="top_bar_links">
  <a href="/">Homepage</a> 
  <a href="/login/">Log in</a>
  <a href="/logout/">Log out</a>
<?php if( @$data['user']['is_admin'] ): ?>
  <a href="/admin/">Admin</a>
<?php endif; ?>
</div>


<?php if (@$data['user']): ?>
<div id="top_bar_user">
You're logged as <b><?= @$data['user']['login']; ?></b>!
</div>
<?php endif; ?>
  
<div class="clear_fix"></div>

</div>

<!-- /Top bar -->
