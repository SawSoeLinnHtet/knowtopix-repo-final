<div class="fixed-top mediumnavigation">
	<nav class="navbar navbar-expand-lg navbar-light container w-100">
		<div class="d-flex align-items-center justify-content-between w-100">
			<a class="navbar-brand" href="#">
				<img src="{{ asset('blogs/assets/img/logo.png') }}" alt="">
			</a>
			<button class="navbar-toggler border-0 shadow-none outline-none" type="button" data-toggle="collapse" data-target="#navbarNav"
					aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>
		<div class="collapse navbar-collapse mt-3 mt-lg-0 mt-xl-0" id="navbarNav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active mr-3">
					<a class="nav-link" href="{{ route('site.blog.details', $blog->slug) }}">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item mr-3">
					<a class="nav-link" href="author.html">Author</a>
				</li>
				<li class="nav-item dropdown mr-3">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
						Posts
					</a>
					<div class="dropdown-menu  bg-white mr-3">
						<a class="dropdown-item" href="{{ route('site.blog.post.create', $blog->slug) }}"><i class="fa-solid fa-pen mr-2"></i>Write Post</a>
					</div>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0 mx-0s">
				<input class="form-control mr-sm-2 border border-dark" type="text" placeholder="Search">
				<span class="search-icon mb-1"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25"><path d="M20.067 18.933l-4.157-4.157a6 6 0 1 0-.884.884l4.157 4.157a.624.624 0 1 0 .884-.884zM6.5 11c0-2.62 2.13-4.75 4.75-4.75S16 8.38 16 11s-2.13 4.75-4.75 4.75S6.5 13.62 6.5 11z"></path></svg></span>
			</form>
		</div>
	</nav>
</div>