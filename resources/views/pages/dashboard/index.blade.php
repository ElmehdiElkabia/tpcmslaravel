@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Dashboard</h1>
                <p>Welcome to the dashboard!</p>
                @if ($pages->count() > 0)
                    <h2>List of Pages</h2>
                    <ul>
                        @foreach ($pages as $page)
                            <li>
                                {{ $page->title }}
                                <a href="{{ route('pages.show', $page->id) }}">View</a>
                                <form action="{{ route('pages.destroy', $page->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>No pages found.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
