@extends('layouts.app')
@section('title', 'Users')
@section('content')


<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>User</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
   <!-- Custom Pagination -->
   <div class="pagination-container mt-4">
        <ul class="pagination flex justify-center">
            {{-- Previous Page Link --}}
            @if ($users->onFirstPage())
                <li class="disabled">
                    <span>&laquo; Previous</span>
                </li>
            @else
                <li>
                    <a href="{{ $users->previousPageUrl() }}" class="text-gray-700 hover:text-gray-900">&laquo; Previous</a>
                </li>
            @endif

            {{-- Page Indexes --}}
            @foreach ($users->links()->elements[0] as $page => $url)
                {{-- Skip "first" and "last" buttons --}}
                @if (is_numeric($page))
                    <li class="{{ $page == $users->currentPage() ? 'active' : '' }}">
                        <a href="{{ $url }}" class="py-1 px-3 text-gray-700 hover:text-gray-900 {{ $page == $users->currentPage() ? 'bg-blue-500 text-white' : '' }}">{{ $page }}</a>
                    </li>
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($users->hasMorePages())
                <li>
                    <a href="{{ $users->nextPageUrl() }}" class="text-gray-700 hover:text-gray-900">Next &raquo;</a>
                </li>
            @else
                <li class="disabled">
                    <span>Next &raquo;</span>
                </li>
            @endif
        </ul>
    </div>
</div>


@endsection