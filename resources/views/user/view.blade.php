@extends('user.layouts.master')

@section('content')
<div class="mx-auto pt-6">
    <div class="avatar mx-20">
        <div class="w-16 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
            <img src="https://storage.googleapis.com/inditech-storage/hero.jpg" />
        </div>
        <span class="mx-5 my-auto">Created by <span class="text-primary">Prinafsika</span></span>
    </div>
</div>
<div class="pt-3 pb-3">
    <div class="text-center">
        <h1 class="text-3xl font-bold py-3 pb-6 capitalize">{{ Str::limit($article->title, 80) }}</h1>
    @if ($article->image)
        <img 
            class="object-cover rounded-3xl h-full w-1/2 mx-auto" 
            src="{{ asset('storage/images/' . $article->image) }}" 
            alt="{{ $article->image }}"
        />
    @else
        <img 
            src="https://storage.googleapis.com/inditech-storage/apple.jpg" 
            alt="Default Image" 
            class="object-cover rounded-3xl w-full h-100 mx-auto" 
        />
    @endif
    </div>
    <div class="mx-auto py-6">
        <div class="mx-20">
            <p class="text-justify" style="white-space: pre-line;">{{ $article->content }}</p>
            <div class="py-6 text-primary">
                <p>Category : {{ $article->category->name }}</p>
                <p>
                    @foreach ($article->tags as $tag)
                        #{{ $tag->name }}
                    @endforeach
                </p>
            </div>
        </div>
    </div>
</div>
@endsection