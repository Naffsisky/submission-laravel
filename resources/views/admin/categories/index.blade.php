<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="pt-3 pb-3">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 flex">
            <a href="{{ route('categories.create') }}" class="btn btn-primary btn-outline ml-auto">Add Category</a>
        </div>
    </div>
    @forelse($categories as $category)
        <div class="py-3">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex items-center justify-between">
                    <div class="p-6 text-gray-900">
                        {{ $category->name }}
                    </div>
                    <div class="flex space-x-2 p-3">
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary btn-outline">Edit ✏️</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="post" style="display:inline;">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-warning btn-outline" onclick="return confirm('Are you sure?')">Delete 🗑️</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
    <div class="py-3">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="items-center">
                <p class="text-center">No categories Found</p>
            </div>
        </div>
    </div>
    @endforelse

</x-app-layout>
