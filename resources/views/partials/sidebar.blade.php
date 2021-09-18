
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
	<div class="profile-sidebar">
		<div class="profile-usertitle">
			<div class="page-title">Sports Court</div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="categories-container">
		<div><a href="/users/friends_list" class="categories-items">Friends</a></div>
		<!-- <div><a href="/courts/courts_list" class="categories-items">Courts</a></div> -->
		<div><a href="/users/userfields" class="categories-items">Favorite Fields</a></div>
		@if(auth()->user()->role->name == 'admin')
		<div><a href="/countries/list" class="categories-items">Countries</a></div>
		<div><a href="/cities/list" class="categories-items">Cities</a></div>
		<div><a href="/fields/list" class="categories-items">Fields</a></div>
		@endif
	</ul>
</div>