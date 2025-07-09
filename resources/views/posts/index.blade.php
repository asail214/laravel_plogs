@extends('layouts.app')

@section('title') All Posts @endsection

@section('content')
    <div class="page-header">
        <h1 class="page-title">
            <span class="material-icons me-3" style="font-size: 2.5rem; vertical-align: middle; color: var(--gold);">auto_stories</span>
            Discover Amazing Stories
        </h1>
        <p class="page-subtitle">
            Explore a collection of thoughtfully crafted posts from our community of writers
        </p>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="d-flex align-items-center">
                <span class="badge-luxury me-3">{{ $posts->count() }} Posts</span>
                <small class="text-muted">Updated recently</small>
            </div>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('posts.create') }}" class="btn-luxury-success">
                <span class="material-icons">add_circle</span>
                Create New Post
            </a>
        </div>
    </div>

    @if($posts->count() > 0)
        <div class="card-luxury">
            <div class="card-header-luxury">
                <span class="material-icons">library_books</span>
                All Posts
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-luxury mb-0">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 80px;">
                                    <span class="material-icons me-2" style="vertical-align: middle;">tag</span>
                                    ID
                                </th>
                                <th scope="col">
                                    <span class="material-icons me-2" style="vertical-align: middle;">title</span>
                                    Title
                                </th>
                                <th scope="col" style="width: 200px;">
                                    <span class="material-icons me-2" style="vertical-align: middle;">person</span>
                                    Author
                                </th>
                                <th scope="col" style="width: 150px;">
                                    <span class="material-icons me-2" style="vertical-align: middle;">schedule</span>
                                    Published
                                </th>
                                <th scope="col" style="width: 250px;">
                                    <span class="material-icons me-2" style="vertical-align: middle;">settings</span>
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="badge" style="background: var(--gold); color: white; padding: 5px 10px; border-radius: 10px; font-weight: 600;">
                                                {{ $post->id }}
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="me-3" style="width: 40px; height: 40px; background: var(--luxury-gradient); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                <span class="material-icons" style="color: white; font-size: 1.2rem;">description</span>
                                            </div>
                                            <div>
                                                <div class="fw-bold" style="color: var(--primary-green);">{{ $post->title }}</div>
                                                <small class="text-muted">{{ Str::limit($post->description, 50) }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="me-2" style="width: 35px; height: 35px; background: var(--accent-green); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                                <span class="material-icons" style="color: white; font-size: 1rem;">account_circle</span>
                                            </div>
                                            <div>
                                                <div class="fw-semibold" style="color: var(--primary-green);">
                                                    {{ $post->user ? $post->user->name : 'Unknown' }}
                                                </div>
                                                <small class="text-muted">Author</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="material-icons me-2" style="color: var(--gold); font-size: 1.2rem;">calendar_today</span>
                                            <div>
                                                <div class="fw-semibold" style="color: var(--primary-green);">{{ $post->created_at->format('M d') }}</div>
                                                <small class="text-muted">{{ $post->created_at->format('Y') }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('posts.show', $post->id) }}" class="btn-luxury-info" style="padding: 6px 12px; font-size: 0.85rem;">
                                                <span class="material-icons" style="font-size: 1rem;">visibility</span>
                                                View
                                            </a>
                                            <a href="{{ route('posts.edit', $post->id) }}" class="btn-luxury-primary" style="padding: 6px 12px; font-size: 0.85rem;">
                                                <span class="material-icons" style="font-size: 1rem;">edit</span>
                                                Edit
                                            </a>
                                            <form style="display: inline;" method="POST" action="{{ route('posts.destroy', $post->id) }}" onsubmit="return confirm('Are you sure you want to delete this post?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-luxury-danger" style="padding: 6px 12px; font-size: 0.85rem; border: none;">
                                                    <span class="material-icons" style="font-size: 1rem;">delete</span>
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="card-luxury">
            <div class="card-body-luxury">
                <div class="empty-state">
                    <div class="mb-4">
                        <span class="material-icons" style="font-size: 5rem; color: var(--gold); opacity: 0.6;">auto_stories</span>
                    </div>
                    <h3 class="mb-3" style="color: var(--primary-green); font-family: 'Playfair Display', serif;">No Posts Yet</h3>
                    <p class="text-muted mb-4" style="font-size: 1.1rem;">
                        Be the first to share your thoughts with the world.<br>
                        Create your first post and start your writing journey!
                    </p>
                    <a href="{{ route('posts.create') }}" class="btn-luxury-success" style="padding: 15px 35px; font-size: 1.1rem;">
                        <span class="material-icons">create</span>
                        Create Your First Post
                    </a>
                </div>
            </div>
        </div>
    @endif

    @if($posts->count() > 0)
        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card-luxury" style="text-align: center;">
                    <div class="card-body-luxury">
                        <div class="mb-3">
                            <span class="material-icons" style="font-size: 3rem; color: var(--gold);">trending_up</span>
                        </div>
                        <h5 style="color: var(--primary-green); font-family: 'Playfair Display', serif;">{{ $posts->count() }}</h5>
                        <p class="text-muted">Total Posts</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-luxury" style="text-align: center;">
                    <div class="card-body-luxury">
                        <div class="mb-3">
                            <span class="material-icons" style="font-size: 3rem; color: var(--gold);">people</span>
                        </div>
                        <h5 style="color: var(--primary-green); font-family: 'Playfair Display', serif;">{{ $posts->pluck('user_id')->unique()->count() }}</h5>
                        <p class="text-muted">Active Authors</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-luxury" style="text-align: center;">
                    <div class="card-body-luxury">
                        <div class="mb-3">
                            <span class="material-icons" style="font-size: 3rem; color: var(--gold);">schedule</span>
                        </div>
                        <h5 style="color: var(--primary-green); font-family: 'Playfair Display', serif;">{{ $posts->max('created_at') ? $posts->max('created_at')->diffForHumans() : 'N/A' }}</h5>
                        <p class="text-muted">Latest Post</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection