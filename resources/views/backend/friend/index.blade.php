@extends('backend.layouts.app')
@section('content')

<div class="main-content">
    <section class="section">
        @include('backend.layouts.page_info')
        <div class="section-header">
            <h1>Friends</h1>
        </div>

        <div class="section-body">
            <div class="table-responsive">
                <table class="myTable table table-bordered table-md">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>From User Name</th>
                            <th>To User Name</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($friends) !== 0)
                            @foreach ($friends as $key => $friend)
                                <tr>
                                    <td>
                                        {{ $key + 1 }}
                                    </td>
                                    <td>
                                        {{ $friend->RequestFromUser->name }}
                                    </td>
                                    <td>    
                                        {{ $friend->RequestFromUser->name }}
                                    </td>
                                    <td>
                                        {{ $friend->created_at->diffForHumans() }}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <div class="alert alert-warning text-white">
                                There is no data found!
                            </div>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

@endsection
