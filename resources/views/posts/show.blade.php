@extends('layouts.app')

@section('title') {{ $post->title }} @endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <a href="{{ route('posts.index') }}" class="btn-luxury-secondary">
                    <span class="material-icons">arrow_back</span>
                    Back to Posts
                </a>
                <div class="d-flex gap-2">
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn-luxury-primary">
                        <span class="material-icons">edit</span>
                        Edit Post
                    </a>
                    <form style="display: inline;" method="POST" action="{{ route('posts.destroy', $post->id) }}" onsubmit="return confirm('Are you sure you want to delete this post?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-luxury-danger">
                            <span class="material-icons">delete</span>
                            Delete Post
                        </button>
                    </form>
                </div>
            </div>

            <!-- Main Post Content -->
            <div class="card-luxury mb-4">
                <div class="card-body-luxury">
                    <div class="mb-4">
                        <h1 class="display-5 fw-bold mb-3" style="color: var(--primary-green); font-family: 'Playfair Display', serif; line-height: 1.2;">
                            {{ $post->title }}
                        </h1>
                        
                        <div class="d-flex align-items-center text-muted mb-4">
                            <span class="material-icons me-2" style="color: var(--gold);">schedule</span>
                            <span class="me-4">Published {{ $post->created_at->format('F j, Y') }}</span>
                            
                            @if($post->created_at != $post->updated_at)
                                <span class="material-icons me-2" style="color: var(--gold);">update</span>
                                <span>Updated {{ $post->updated_at->format('F j, Y') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="post-content" style="font-size: 1.1rem; line-height: 1.8; color: #333;">
                        {!! nl2br(e($post->description)) !!}
                    </div>

                    <div class="mt-5 pt-4" style="border-top: 2px solid var(--gold); opacity: 0.3;">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <div class="me-3" style="width: 50px; height: 50px; background: var(--luxury-gradient); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                        <span class="material-icons" style="color: white; font-size: 1.5rem;">person</span>
                                    </div>
                                    <div>
                                        <div class="fw-bold" style="color: var(--primary-green);">
                                            {{ $post->user ? $post->user->name : 'Unknown Author' }}
                                        </div>
                                        <small class="text-muted">
                                            {{ $post->user ? $post->user->email : 'No email available' }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 text-end">
                                @if($post->user)
                                    <small class="text-muted">
                                        <span class="material-icons me-1" style="vertical-align: middle; font-size: 1rem;">date_range</span>
                                        Member since {{ $post->user->created_at->format('F Y') }}
                                    </small>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reading Experience Card -->
            <div class="card-luxury">
                <div class="card-header-luxury">
                    <span class="material-icons">auto_stories</span>
                    Reading Experience
                </div>
                <div class="card-body-luxury">
                    <div class="row text-center">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <span class="material-icons" style="font-size: 2rem; color: var(--gold);">schedule</span>
                                <div class="fw-bold" style="color: var(--primary-green);">{{ ceil(str_word_count($post->description) / 200) }} min</div>
                                <small class="text-muted">Read Time</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <span class="material-icons" style="font-size: 2rem; color: var(--gold);">article</span>
                                <div class="fw-bold" style="color: var(--primary-green);">{{ str_word_count($post->description) }}</div>
                                <small class="text-muted">Words</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <span class="material-icons" style="font-size: 2rem; color: var(--gold);">format_paragraph</span>
                                <div class="fw-bold" style="color: var(--primary-green);">{{ substr_count($post->description, "\n") + 1 }}</div>
                                <small class="text-muted">Paragraphs</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <span class="material-icons" style="font-size: 2rem; color: var(--gold);">visibility</span>
                                <div class="fw-bold" style="color: var(--primary-green);">{{ $post->created_at->diffForHumans() }}</div>
                                <small class="text-muted">Published</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <!-- Author Info Card -->
            <div class="card-luxury mb-4">
                <div class="card-header-luxury">
                    <span class="material-icons">account_circle</span>
                    About the Author
                </div>
                <div class="card-body-luxury text-center">
                    <div class="mb-3">
                        <div style="width: 80px; height: 80px; background: var(--luxury-gradient); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto;">
                            <span class="material-icons" style="color: white; font-size: 2.5rem;">person</span>
                        </div>
                    </div>
                    <h5 class="fw-bold mb-2" style="color: var(--primary-green); font-family: 'Playfair Display', serif;">
                        {{ $post->user ? $post->user->name : 'Unknown Author' }}
                    </h5>
                    <p class="text-muted mb-3">
                        {{ $post->user ? $post->user->email : 'No email available' }}
                    </p>
                    @if($post->user)
                        <div class="text-muted">
                            <small>
                                <span class="material-icons me-1" style="vertical-align: middle; font-size: 1rem;">date_range</span>
                                Joined {{ $post->user->created_at->format('F Y') }}
                            </small>
                        </div>
                        <div class="mt-3">
                            <span class="badge-luxury">
                                {{ \App\Models\Post::where('user_id', $post->user_id)->count() }} Posts
                            </span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Post Navigation -->
            @php
                $prevPost = \App\Models\Post::where('id', '<', $post->id)->orderBy('id', 'desc')->first();
                $nextPost = \App\Models\Post::where('id', '>', $post->id)->orderBy('id', 'asc')->first();
            @endphp

            @if($prevPost || $nextPost)
                <div class="card-luxury mb-4">
                    <div class="card-header-luxury">
                        <span class="material-icons">navigation</span>
                        More Posts
                    </div>
                    <div class="card-body-luxury">
                        @if($prevPost)
                            <div class="mb-3">
                                <small class="text-muted">Previous Post</small>
                                <div>
                                    <a href="{{ route('posts.show', $prevPost->id) }}" class="text-decoration-none" style="color: var(--primary-green);">
                                        <span class="material-icons me-1" style="vertical-align: middle; font-size: 1rem;">arrow_back</span>
                                        {{ Str::limit($prevPost->title, 30) }}
                                    </a>
                                </div>
                            </div>
                        @endif
                        
                        @if($nextPost)
                            <div class="mb-0">
                                <small class="text-muted">Next Post</small>
                                <div>
                                    <a href="{{ route('posts.show', $nextPost->id) }}" class="text-decoration-none" style="color: var(--primary-green);">
                                        {{ Str::limit($nextPost->title, 30) }}
                                        <span class="material-icons me-1" style="vertical-align: middle; font-size: 1rem;">arrow_forward</span>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            <!-- Quick Actions -->
            <div class="card-luxury">
                <div class="card-header-luxury">
                    <span class="material-icons">settings</span>
                    Quick Actions
                </div>
                <div class="card-body-luxury">
                    <div class="d-grid gap-2">
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn-luxury-primary text-center">
                            <span class="material-icons">edit</span>
                            Edit This Post
                        </a>
                        <a href="{{ route('posts.create') }}" class="btn-luxury-success text-center">
                            <span class="material-icons">add_circle</span>
                            Create New Post
                        </a>
                        <a href="{{ route('posts.index') }}" class="btn-luxury-secondary text-center">
                            <span class="material-icons">list</span>
                            View All Posts
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection