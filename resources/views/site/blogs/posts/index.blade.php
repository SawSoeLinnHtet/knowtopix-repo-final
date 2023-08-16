@extends('site.blogs.layouts.app')

@section('content')
	
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-md-offset-2 col-xs-12">
				<div class="mainheading d-flex align-items-center justify-content-between">
					<h1 class="posttitle" style="font-size: 40px">
						{{ $post->title }}
					</h1>
					@if($owner)
						<div class="dropdown show">
							<a class="btn dropdown-toggle outline-none shadow-none" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa-solid fa-gear"></i>
							</a>

							<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
								<a class="dropdown-item text-info" href="{{ route('site.blog.post.edit', [$blog->slug, $post->slug]) }}"><i class="fa-regular fa-pen-to-square mr-2"></i>Edit</a>
								<a class="btn btn-link text-decoration-none text-danger ml-1" style="font-size: 15px" data-toggle="modal" data-target="#exampleModal">
									<i class="fa-solid fa-trash pl-2 mr-2"></i>Delete
								</a>
								<a href="{{ route('site.blog.post.feature', [$blog->slug, $post->slug]) }}" class="dropdown-item {{ $post->is_feature ? 'text-warning' : 'text-dark' }}" href="#">
									@if ($post->is_feature == 1)
										<i class="fa-solid fa-star"></i>
									@else
										<i class="fa-regular fa-star mr-2"></i>
									@endif
									Feature
								</a>
							</div>
						</div>
					@endif
				</div>

				<img class="featured-image img-fluid" src="{{ asset('images/blogs/posts/'.$post->post_thumbnail) }}" alt="">

				<div class="article-post">
					{!! $post->content !!}
				</div>

				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Are you sure to delete this post?</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="{{ route('site.blog.post.delete', [$blog->slug, $post->slug]) }}" method="POST" class="float-right">
									@csrf
									@method('DELETE')
									<a class="btn btn-secondary btn-sm" data-dismiss="modal" aria-label="Close">
										Back
									</a>
									<button type="submit" class="btn btn-danger btn-sm">
										Delete
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>

				{{-- <div class="after-post-tags">
					<ul class="tags">
						<li><a href="#">Design</a></li>
						<li><a href="#">Growth Mindset</a></li>
						<li><a href="#">Productivity</a></li>
						<li><a href="#">Personal Growth</a></li>
					</ul>
				</div> --}}
			</div>
		</div>
	</div>

	@include('site.blogs.posts.post-details-footer')

@endsection

