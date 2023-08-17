<div class="fixed-top mediumnavigation">
	<nav class="navbar navbar-expand-lg navbar-light container w-100">
		<div class="d-flex align-items-center justify-content-between w-100">
			<a class="navbar-brand" href="{{ route('site.blog.details', $blog->slug) }}">
				<img src="{{ asset('images/blogs/logo/'.$blog->logo) }}" alt="">
			</a>
			<button class="navbar-toggler border-0 shadow-none outline-none" type="button" data-toggle="collapse" data-target="#navbarNav"
					aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>
		<div class="collapse navbar-collapse mt-3 mt-lg-0 mt-xl-0" id="navbarNav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item mr-3 {{ request()->routeIs('site.blog.details') ? 'active' : ''}}">
					<a class="nav-link" href="{{ route('site.blog.details', $blog->slug) }}">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item mr-3 {{ request()->routeIs('site.blog.author_details') ? 'active' : ''}}">
					<a class="nav-link" href="{{ route('site.blog.author_details', $blog->slug) }}">Author</a>
				</li>
				@if($owner)
					<li class="nav-item mr-3 {{ request()->routeIs('site.blog.post.*') ? 'active' : ''}}">
						<a href="{{ route('site.blog.post.create', $blog->slug) }}" class="nav-link d-flex align-items-center"><i class="fa-solid fa-pen mr-2"></i>Write</a>	
					</li>						
				@endif
			</ul>
		</div>
	</nav>
</div>