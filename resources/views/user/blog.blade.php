@extends('user.layouts.master')

@section('content')
<div class="py-5 px-5 mx-auto grid gap-5 grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($articles as $article)
            <div class="card w-full bg-base-200 shadow-xl">
                <figure>
                    @if ($article->image)
                        <img 
                            src="{{ asset('storage/images/' . $article->image) }}" 
                            alt="{{ $article->image }}" 
                            class="object-cover w-full h-60" 
                        />
                    @else
                        <img 
                            src="https://storage.googleapis.com/inditech-storage/apple.jpg" 
                            alt="Default Image" 
                            class="object-cover w-full h-60" 
                        />
                    @endif
                </figure>

                <div class="card-body flex flex-col justify-between">
                    <div class="min-h-[90px]">
                        <h2 class="card-title">
                            {{ Str::limit($article->title, 60) }}
                            @if(now()->diffInHours($article->created_at) < 24)
                                <div class="badge badge-info">NEW</div>
                            @endif
                        </h2>
                    </div>
                    <div class="h-full">
                        <div class="badge badge-primary text-white mb-2">
                            <p>{{ $article->category->name }}</p>    
                        </div>
                    </div>
                    <p class="text-gray-400 text-justify">{{ Str::limit($article->content, 280) }}</p>
                    <div class="text-sky-500 font-semibold">
                        <div class="flex space-x-2 pt-1">
                            @foreach ($article->tags as $tag)
                                <div class="badge badge-outline capitalize">
                                    #{{ $tag->name }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <a class="py-3 text-primary" href="{{ route('view', $article) }}">Read More</a>
                    <span>
                        Upload {{ $article->created_at->diffForHumans() }}
                    </span>
                </div>
            </div>
        @endforeach
    </div>
@endsection