@extends('layouts.app')

@section('title') Edit Post @endsection

@section('content')
    <div class="page-header">
        <h1 class="page-title">
            <span class="material-icons me-3" style="font-size: 2.5rem; vertical-align: middle; color: var(--gold);">edit</span>
            Edit Post
        </h1>
        <p class="page-subtitle">
            Refine your thoughts and perfect your story
        </p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            @if ($errors->any())
                <div class="alert-luxury alert-danger">
                    <div class="d-flex align-items-center mb-3">
                        <span class="material-icons me-3" style="font-size: 1.5rem;">error_outline</span>
                        <strong>Please fix the following errors:</strong>
                    </div>
                    <ul class="mb-0" style="padding-left: 2rem;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card-luxury">
                <div class="card-header-luxury">
                    <span class="material-icons">edit_note</span>
                    Update Post Details
                </div>
                <div class="card-body-luxury">
                    <form method="POST" action="{{ route('posts.update', $post->id) }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label class="form-label-luxury">
                                <span class="material-icons">title</span>
                                Post Title
                            </label>
                            <input 
                                name="title" 
                                type="text" 
                                class="form-control-luxury" 
                                value="{{ old('title', $post->title) }}" 
                                placeholder="Enter a captivating title for your post..."
                                style="font-size: 1.1rem;"
                            >
                            <small class="text-muted">Make it engaging and descriptive to attract readers.</small>
                        </div>

                        <div class="mb-4">
                            <label class="form-label-luxury">
                                <span class="material-icons">description</span>
                                Post Content
                            </label>
                            <textarea 
                                name="description" 
                                class="form-control-luxury" 
                                rows="10" 
                                placeholder="Update your amazing content here..."
                                style="font-size: 1rem; line-height: 1.6;"
                            >{{ old('description', $post->description) }}</textarea>
                            <small class="text-muted">Share your updated thoughts, insights, and experiences.</small>
                        </div>

                        <div class="mb-4">
                            <label class="form-label-luxury">
                                <span class="material-icons">person</span>
                                Post Author
                            </label>
                            <select name="post_creator" class="form-control-luxury">
                                <option value="">Select an author...</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ old('post_creator', $post->user_id) == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="text-muted">You can change the author if needed.</small>
                        </div>

                        <div class="d-flex gap-3 pt-3">
                            <button type="submit" class="btn-luxury-primary" style="padding: 15px 35px; font-size: 1.1rem;">
                                <span class="material-icons">save</span>
                                Update Post
                            </button>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn-luxury-secondary" style="padding: 15px 35px; font-size: 1.1rem;">
                                <span class="material-icons">cancel</span>
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <!-- Current Post Preview -->
            <div class="card-luxury mb-4">
                <div class="card-header-luxury">
                    <span class="material-icons">preview</span>
                    Current Post
                </div>
                <div class="card-body-luxury">
                    <div class="mb-3">
                        <h6 class="fw-bold mb-2" style="color: var(--primary-green);">{{ $post->title }}</h6>
                        <p class="text-muted mb-2" style="font-size: 0.9rem;">
                            {{ Str::limit($post->description, 100) }}
                        </p>
                        <small class="text-muted">
                            By {{ $post->user ? $post->user->name : 'Unknown' }} • 
                            {{ $post->created_at->format('M j, Y') }}
                        </small>
                    </div>
                    
                    <div class="d-flex gap-2">
                        <a href="{{ route('posts.show', $post->id) }}" class="btn-luxury-info" style="padding: 8px 15px; font-size: 0.85rem;">
                            <span class="material-icons" style="font-size: 1rem;">visibility</span>
                            View Post
                        </a>
                    </div>
                </div>
            </div>

            <!-- Post Statistics -->
            <div class="card-luxury mb-4">
                <div class="card-header-luxury">
                    <span class="material-icons">analytics</span>
                    Post Statistics
                </div>
                <div class="card-body-luxury">
                    <div class="row text-center">
                        <div class="col-6">
                            <div class="mb-3">
                                <span class="material-icons" style="font-size: 2rem; color: var(--gold);">article</span>
                                <div class="fw-bold" style="color: var(--primary-green);">{{ str_word_count($post->description) }}</div>
                                <small class="text-muted">Words</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <span class="material-icons" style="font-size: 2rem; color: var(--gold);">schedule</span>
                                <div class="fw-bold" style="color: var(--primary-green);">{{ ceil(str_word_count($post->description) / 200) }} min</div>
                                <small class="text-muted">Read Time</small>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mt-3">
                        <small class="text-muted">
                            <span class="material-icons me-1" style="vertical-align: middle; font-size: 1rem;">date_range</span>
                            Created {{ $post->created_at->diffForHumans() }}
                        </small>
                        @if($post->created_at != $post->updated_at)
                            <br>
                            <small class="text-muted">
                                <span class="material-icons me-1" style="vertical-align: middle; font-size: 1rem;">update</span>
                                Last updated {{ $post->updated_at->diffForHumans() }}
                            </small>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Writing Tips -->
            <div class="card-luxury">
                <div class="card-header-luxury">
                    <span class="material-icons">tips_and_updates</span>
                    Editing Tips
                </div>
                <div class="card-body-luxury">
                    <div class="mb-3">
                        <div class="d-flex align-items-center mb-2">
                            <span class="material-icons me-2" style="color: var(--gold);">check_circle</span>
                            <strong style="color: var(--primary-green);">Review & Refine</strong>
                        </div>
                        <small class="text-muted">Read through your content and improve clarity and flow.</small>
                    </div>
                    
                    <div class="mb-3">
                        <div class="d-flex align-items-center mb-2">
                            <span class="material-icons me-2" style="color: var(--gold);">spellcheck</span>
                            <strong style="color: var(--primary-green);">Check Grammar</strong>
                        </div>
                        <small class="text-muted">Ensure your post is free from spelling and grammar errors.</small>
                    </div>
                    
                    <div class="mb-3">
                        <div class="d-flex align-items-center mb-2">
                            <span class="material-icons me-2" style="color: var(--gold);">format_size</span>
                            <strong style="color: var(--primary-green);">Optimize Length</strong>
                        </div>
                        <small class="text-muted">Keep it concise but comprehensive enough to convey your message.</small>
                    </div>
                    
                    <div class="mb-0">
                        <div class="d-flex align-items-center mb-2">
                            <span class="material-icons me-2" style="color: var(--gold);">thumb_up</span>
                            <strong style="color: var(--primary-green);">Stay Authentic</strong>
                        </div>
                        <small class="text-muted">Maintain your unique voice and perspective throughout.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection