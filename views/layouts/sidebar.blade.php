<div class="cleaner"></div>
<div id="sidebar">
	<div class="sidebar_top"></div>
	<div class="sidebar_bottom"></div>
		<h1>Sidebar Menu</h1>
	    <div class="sidebar_section">
		<h2>Categories</h2>
			<ul class="categories_list">
				<?php foreach ($this->shop_cats as $item): ?>
					<li><a href='<?php echo URL."category/".$item['cat_id']; ?>'><?php echo $item['cat_name'] ?></a></li>
					<?php if (isset($item['children'])): ?>
					<ul class="categories_list">
						<?php foreach ($item['children'] as $itemChild): ?>
							<li><a href='<?php echo URL."category/".$itemChild['cat_id']; ?>'><?php echo $itemChild['cat_name'] ?></a></li>
						<?php endforeach ?>
					</ul>
					<?php endif ?>
				<?php endforeach ?>
			</ul>
		</div>

<div class="sidebar_section">
<h2>Members</h2>
<?php if ($this->getSession('user_login_status') == 1): ?>
		<div id="userBox">
			<a href="<?php echo URL. 'user/' ?>" id="userLink"><?php echo $this->getSession('user_name'); ?></a><br>
			<a href="<?php echo URL ?>user/logout" onClick="logout();">Log Out</a>
		</div>
<?php else: ?>

	<?php if (! isset($this->hideLoginBox)): ?>
		<div id="loginBox">
			<label for="user_name">Your name or Your email</label>
			<input type="text" name="user_name" id="user_name" class="input_field" value="">
			<label for="user_password">Password</label>
			<input name="user_password" type="password" id="user_password" class="input_field" value="">
			<input id="submit_btn" type="button" onClick="login();" value="Войти">
			<a href="<?php echo URL ?>user/register" title="Регистрация">Регистрация</a>
      		<div class="cleaner"></div>
		</div>
	<?php endif ?>
		<div id="userBox" class="hideme">
			<a href="#" id="userLink"></a><br>
			<a href="<?php echo URL ?>user/logout" onClick="logout();">Log Out</a>
		</div>
<?php endif ?>
	</div>
	<div class="menuCaption">Basket</div>
	<a href="<?php echo URL ?>basket" title="Перейти в корзину">В корзине</a>
	<span id="basketcountProducts">
	<?php if ($this->basketcountProducts > 0): 
		echo $this->basketcountProducts;
		else: ?>
		Empty
		<?php endif ?>
	</span>
</div>

  <!-- end of sidebar -->