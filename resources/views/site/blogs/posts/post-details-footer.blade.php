<div class="hideshare"></div>

<!-- Begin Related
================================================== -->
<div class="graybg mb-5">
	<div class="container">
		<div class="row listrecent listrelated">

			<!-- begin post -->
			@foreach ($posts as $post)
				<div class="col-md-4">
					<div class="card shadow-md">
						<a href="{{ route('site.blog.post.details', [$blog->slug, $post->slug]) }}">
							<img class="img-thumb" src="{{ asset('images/blogs/posts/'.$post->post_thumbnail) }}" alt="" width="100%" height="250px" style="object-fit: cover">
						</a>
						<div class="card-block py-3 px-3">
							<h2 class="card-title"><a href="{{ route('site.blog.post.details', [$blog->slug, $post->slug]) }}" style="font-size: 20px">{{ $post->title }}</a></h2>
							<div class="metafooter">
								<div class="wrapfooter">
									<span class="meta-footer-thumb">
										<a href="{{ route('site.blog.author_details', $blog->slug) }}"><img class="author-thumb" src="{{ asset('images/blogs/logo/artist-logo.png') }}" alt="Sal"></a>
									</span>
									<span class="author-meta">
										<span class="post-name"><a href="{{ route('site.blog.author_details', $blog->slug) }}">{{ $blog->author_name }}</a></span><br/>
										<span class="post-date">{{ $post->created_at->diffForHumans() }}</span><span class="dot"></span><span class="post-read">6 min read</span>
									</span>
									<span class="post-read-more">
                                        <a href="{{ route('site.blog.post.details', [$blog->slug, $post->slug]) }}">
                                            <i class="fa-solid fa-book-open h5"></i>
                                        </a>
                                    </span>
								</div>
							</div>
						</div>
					</div>
				</div>
			@endforeach
			<!-- end post -->
		</div>
	</div>
</div>

<div class="alertbar">
	<div class="container text-center">
		<img src="assets/img/logo.png" alt=""> &nbsp; Never miss a <b>story</b> from us, get weekly updates in your inbox. <a href="#" class="btn subscribe">Get Updates</a>
	</div>
</div>