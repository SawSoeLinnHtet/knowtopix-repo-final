<div id="post-details-modal-wrap" class="post-details-modal-wrap" x-cloak x-show="openPostDetailsModal" @keyup.escape.window="openPostDetailsModal = false" x-init="$watch('openPostDetailsModal', toggleOverflow)"> 
    
</div>

@push('script')
    
    <script>
        // like function 
        $(document).on('click', '.details-like-btn', function (e) {
            e.preventDefault();

            if($(this).hasClass('text-danger')){
                $(this).removeClass('text-danger')
                $(this).addClass('text-white')
                var x = $(this).next('.like-count').attr('value')
                $(this).next('.like-count').text(Number(x) - 1).attr('value', Number(x) - 1)
            }else{
                $(this).addClass('text-danger')
                $(this).removeClass('text-white')
                var x = $(this).next('.like-count').attr('value')
                $(this).next('.like-count').text(Number(x) + 1).attr('value', Number(x) + 1)
                $(this).next('.like-count')
            }

            let like_url = $(this).data('url')

            $.ajax({
                url: like_url,
                data: {
                    '_token': "{{ csrf_token() }}"
                },
                type: 'POST',
                success: function(res){
                    return
                }
            })
        });
        // comment function
        $(document).on('click', '.details-comment-submit', function (e){
            e.preventDefault()
            
            var x = $(this).parent('').parent().prev('.card-body').children('.card-body-option').children('.comment-wrap').children('.comment-count')
            var x_val = x.attr('value')
            x.attr('value', Number(x_val) + 1).text(Number(x_val) + 1)

            var current = $(this)
            var comment = $(this).prev('.comment-box')
            create_url = $(this).data('url')

            $.ajax({
                url: create_url,
                data: {
                    '_token': "{{ csrf_token() }}",
                    'comment': comment.val()
                },
                type: "POST",
                beforeSend: function (){
                    $('#loading-spinner').show()
                },
                success: function(res){
                    $('#loading-spinner').hide()
                    var comment_wrap = current.parent().prev()

                    let template = `
                        <div class="comment-card">
                            <img src="{{ auth()->user()->acsr_check_profile }}" alt="">
                            <div class="text-wrap">
                                <a href="">
                                    <h6>
                                       {{ auth()->user()->name }} 
                                    </h6>
                                </a>
                                <span>
                                    ${ comment.val() }
                                </span>
                            </div>
                        </div>
                    `;

                    $('#details-comment-card-wrap').append(template);
                    comment.val('')
                }
            })
        });
    </script>

@endpush