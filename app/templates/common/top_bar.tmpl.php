
<!-- Top bar -->

<div id="top_bar">

<div id="top_bar_links">
  <a href="/">Homepage</a> 
<?php if( @$data['user']['is_admin'] ): ?>
  <a href="/admin/">Admin</a>
<?php endif; ?>
</div>


<div id="top_bar_user">
<?php if (@$data['user']): ?>
You're logged as <b><?= @$data['user']['login']; ?></b>!
<a href="/logout/">Log out</a>
<?php elseif(@!$data['user']): ?>
<a href="/login/">Log in</a>
<a href="/registration/">Register</a>
<?php endif; ?>
</div>

<div class="clear_fix"></div>

</div>

<!-- /Top bar -->
