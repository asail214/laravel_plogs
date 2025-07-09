@extends('layouts.app')

@section('title') Create New Post @endsection

@section('content')
    <div class="page-header">
        <h1 class="page-title">
            <span class="material-icons me-3" style="font-size: 2.5rem; vertical-align: middle; color: var(--gold);">create</span>
            Create New Post
        </h1>
        <p class="page-subtitle">
            Share your thoughts, ideas, and stories with the world
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
                    Post Details
                </div>
                <div class="card-body-luxury">
                    <form method="POST" action="{{ route('posts.store') }}">
                        @csrf
                        
                        <div class="mb-4">
                            <label class="form-label-luxury">
                                <span class="material-icons">title</span>
                                Post Title
                            </label>
                            <input 
                                name="title" 
                                type="text" 
                                class="form-control-luxury" 
                                value="{{ old('title') }}" 
                                placeholder="Enter a captivating title for your post..."
                                style="font-size: 1.1rem;"
                            >
                            <small class="text-muted">A great title grabs attention and summarizes your post perfectly.</small>
                        </div>

                        <div class="mb-4">
                            <label class="form-label-luxury">
                                <span class="material-icons">description</span>
                                Post Content
                            </label>
                            <textarea 
                                name="description" 
                                class="form-control-luxury" 
                                rows="8" 
                                placeholder="Write your amazing content here... Share your thoughts, experiences, and insights with the world."
                                style="font-size: 1rem; line-height: 1.6;"
                            >{{ old('description') }}</textarea>
                            <small class="text-muted">Express yourself freely. Your words have the power to inspire and inform others.</small>
                        </div>

                        <div class="mb-4">
                            <label class="form-label-luxury">
                                <span class="material-icons">person</span>
                                Post Author
                            </label>
                            <select name="post_creator" class="form-control-luxury">
                                <option value="">Select an author...</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ old('post_creator') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="text-muted">Choose the author who will be credited for this post.</small>
                        </div>

                        <div class="d-flex gap-3 pt-3">
                            <button type="submit" class="btn-luxury-success" style="padding: 15px 35px; font-size: 1.1rem;">
                                <span class="material-icons">publish</span>
                                Publish Post
                            </button>
                            <a href="{{ route('posts.index') }}" class="btn-luxury-secondary" style="padding: 15px 35px; font-size: 1.1rem;">
                                <span class="material-icons">cancel</span>
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card-luxury">
                <div class="card-header-luxury">
                    <span class="material-icons">tips_and_updates</span>
                    Writing Tips
                </div>
                <div class="card-body-luxury">
                    <div class="mb-3">
                        <div class="d-flex align-items-center mb-2">
                            <span class="material-icons me-2" style="color: var(--gold);">lightbulb</span>
                            <strong style="color: var(--primary-green);">Engaging Title</strong>
                        </div>
                        <small class="text-muted">Make it specific, intriguing, and relevant to your content.</small>
                    </div>
                    
                    <div class="mb-3">
                        <div class="d-flex align-items-center mb-2">
                            <span class="material-icons me-2" style="color: var(--gold);">format_paragraph</span>
                            <strong style="color: var(--primary-green);">Clear Structure</strong>
                        </div>
                        <small class="text-muted">Break your content into paragraphs for better readability.</small>
                    </div>
                    
                    <div class="mb-3">
                        <div class="d-flex align-items-center mb-2">
                            <span class="material-icons me-2" style="color: var(--gold);">emoji_emotions</span>
                            <strong style="color: var(--primary-green);">Personal Touch</strong>
                        </div>
                        <small class="text-muted">Add your unique voice and perspective to make it memorable.</small>
                    </div>
                    
                    <div class="mb-0">
                        <div class="d-flex align-items-center mb-2">
                            <span class="material-icons me-2" style="color: var(--gold);">spellcheck</span>
                            <strong style="color: var(--primary-green);">Proofread</strong>
                        </div>
                        <small class="text-muted">Review your post before publishing to catch any errors.</small>
                    </div>
                </div>
            </div>
            
            <div class="card-luxury mt-4">
                <div class="card-header-luxury">
                    <span class="material-icons">insights</span>
                    Quick Stats
                </div>
                <div class="card-body-luxury">
                    <div class="row text-center">
                        <div class="col-6">
                            <div class="mb-3">
                                <span class="material-icons" style="font-size: 2rem; color: var(--gold);">article</span>
                                <div class="fw-bold" style="color: var(--primary-green);">{{ \App\Models\Post::count() }}</div>
                                <small class="text-muted">Total Posts</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <span class="material-icons" style="font-size: 2rem; color: var(--gold);">people</span>
                                <div class="fw-bold" style="color: var(--primary-green);">{{ \App\Models\User::count() }}</div>
                                <small class="text-muted">Authors</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection